<?php

namespace App\Http\Controllers\Admin;
use App\Mail\SendNewMail;
use  App\Model\Category;
use  App\Model\Post;
use  App\Model\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//mail
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts_index = Post::with('category','tags')->orderBy('id','DESC')->paginate(100);

        //$posts = Post::paginate(3);
        //con paginate crea delle pagine in caso in cui gli elementi siano tanti
        //funziona con il metodo links(), vedi index.blade.php
        //funziona solo importando l'ultima versione di bootstrap da cdn
        return view('admin.posts.index',compact('posts_index') );    //compact('posts')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Manda informazione a store
    public function create()
    {

        $categories_create = Category::All();
        $tags_create = Tag::All();

        return view('admin.posts.create', compact('categories_create','tags_create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data =  $request->all();
       //la validazione(campi required), sara' presente in @error in create.blade
       $request->validate([
        'title' => 'required',
        'body' => 'required',
       ]);

       //una volta ricevuta una risposta si procere all'istanza di un nuovo record
       //si usa la funzione fill() per riempire le colonne automaticamente (bisogna renderle prima fillable dal modello)
       $new_post = new Post();
       $new_post->fill($data);
       //salvare sempre
       $new_post->save();
       // l'array lo generi in create.blade
       if( array_key_exists('array_generato', $data)  ){
        //tags() e' la function tags che c'e' nel modello Post
         $new_post->tags()->sync( $data['array_generato'] );
       }

       // invio mail di creazione post
       $mail_store = new SendNewMail($new_post);
       $user_email = Auth::user()->email;
       Mail::to($user_email)->send($mail_store);
       return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singolo_post = Post::findOrFail($id);

        return view('admin.posts.show', compact('singolo_post', $singolo_post->$id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //manda informazione a update
    public function edit($id)
    {
        $post_edit = Post::findOrFail($id);

         $categories_edit = Category::All();

         $tags_edit = Tag::All();


        return view('admin.posts.edit', compact('post_edit','categories_edit','tags_edit'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =  $request->all();
        $post_update = Post::findOrFail($id);

        //mi recupero l'id e con update() effettuo effettivamente la modifica
        $post_update->update($data);


        if( array_key_exists('array_generato', $data)  ){
            //tags() e' la function tags che c'e' nel modello Post
             $post_update->tags()->sync( $data['array_generato'] );
           }
           else{
            $post_update->tags()->sync([]);
           }


        return redirect()->route('admin.posts.show', $post_update->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_destroy =  Post::findOrFail($id);

        $post_destroy->tags()->sync([]);

        $post_destroy->delete();
        //mi recupero l'id e con delete() effettuo effettivamente la modifica
        return redirect()->route('admin.posts.index',  $post_destroy->id);

    }
}

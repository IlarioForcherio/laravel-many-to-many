<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
      'title',
      'body',
      'category_id',
    ];



    //relazione con la tabella categories
    public function category(){
        // relazione molti a...uno
        //belongsTo->
        //una solca categoria associata
        return $this->belongsTo('App\Model\Category');
    }

    //relazione con la tabella tag
    public function tags(){

        //belongs to many->molti a molti
        return $this->belongsToMany('App\Model\Tag');


    }

}

@extends('layouts.dashboard')

@section('content')
<div class="text-center">
 <h2>Singolo Post</h2>

 <div class="d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
     <img src="..." class="card-img-top" alt="...">
     <div class="card-body">
       <h5 class="card-title">{{$singolo_post->title}}</h5>
       <p class="card-text">{{$singolo_post->id}}</p>
       <p class="card-text">{{$singolo_post->body}}</p>

       <div class="d-flex" >
        {{-- Funzione edit, a cui si passa sempre l'id  del post che si vuole modificare --}}
       <a href="{{route('admin.posts.edit',$singolo_post->id)}}" class="btn btn-success">Modifica Post</a>

       {{-- Funzione destroy  --}}
       <form method="POST" action="{{route('admin.posts.destroy', $singolo_post->id )}}">
           @csrf
           @method('DELETE')
           <button type="submit" class="btn btn-danger ms-2">Elimina Post</button>
       </form>
       {{-- <a href="{{route('admin.posts.destroy', $singolo_post->id )}}" class="btn btn-danger">Elimina Post</a> --}}
       </div>

     </div>
   </div>
 </div>
</div>

@endsection

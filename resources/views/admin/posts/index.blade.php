@extends('layouts.dashboard')

{{-- yield del contenuto in dashboard - main --}}
{{-- creare la connessione in web.php --}}
@section('content')
<div class="text-center">
 <h1>Pagina dei post</h1>

 {{-- Funzione Create--}}
 <a href="{{route("admin.posts.create")}}" class="btn btn-warning mt-4">Crea un nuovo Post</a>
</div>


@foreach ($posts_index as $item)

<div class="d-flex justify-content-center mt-4 text-center">
   <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">titolo:{{$item->title}}</h5>
      {{-- <p class="card-text">{{$item->id}}</p> --}}

      @if (is_null($item->category))
      <p class="card-text">body:{{$item->body}}</p>
      @else
      <p class="card-text">categoria:{{$item->category['name']}}</p>
      @endif
      {{-- <p class="card-text">category id {{$item->category_id}} </p> --}}

      {{-- ciclo che entra dentro ogni post.tags e some elemento ci sara' l'oggetto tags da cui estraggo il name --}}
      @foreach($item->tags as $elem  )
      <p class="card-text">#{{$elem['name']}}</p>
      @endforeach
      <a href="{{route('admin.posts.show', $item->id)}}" class="btn btn-primary ">Visualizza Post</a>
    </div>
  </div>
</div>

@endforeach
{{-- link che fa funzionare il paginate --}}
<div class="d-flex justify-content-center">
    <div>
      {{ $posts_index->links() }}
    </div>

</div>


@endsection

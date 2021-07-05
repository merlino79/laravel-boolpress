@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
     <div class="col">
       <h1>{{ $post->title }}</h1>
       <h3>
          @if ($post->category)
            Category: {{ $post->category->name}}
          @else
            Nessuna categoria associata
          @endif
       </h3>
        <p>{{ $post->content }}</p>
       
     </div>
     <div class="col">
        <div>
        <a class="btn btn-info" href="{{ route('admin.posts.edit', $post) }}">EDIT</a>
    </div>
     </div>
   </div>
</div>
@endsection

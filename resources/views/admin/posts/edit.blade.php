@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
     <div class="col">
       <h1>{{ $post->title }}</h1>
        <a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">SHOW</a>
     </div>
     
   </div>    
       
</div>
<div class="container">
  <div class="row">
    <div class="col">
       <div class="col">
          <div>
        <form action="{{ route('admin.posts.update',$post) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label class="label-control" for="title">Titolo</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="label-control" for="content">Content</label>
                <textarea type="text" id="content" name="content" class="form-control" rows="5" >{{ $post->content }}</textarea>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Invio</button>
            </div>

        </form>
        </div>
       </div>
    </div>
  </div>
</div>
@endsection

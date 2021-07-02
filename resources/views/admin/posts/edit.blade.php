@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col text-center">
        <h1>{{ $post->title }}</h1>
          
      </div>
      <div class="container">
        <a class="btn btn-primary mb-3" href="{{ route('admin.posts.show', $post) }}">SHOW</a>
      </div>
     
   </div>    
       @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif  
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
                <input type="text" id="title" name="title" value="{{ old('title',$post->title) }}" class="form-control  @error('title') is-invalid @enderror" >
                @error('title')
                  <div class="text-danger">
                    {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="label-control" for="content">Content</label>
                <textarea type="text" id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5" >{{ old('content',$post->content) }}</textarea>
                @error('content')
                  <div class="text-danger">
                    {{ $message}}
                  </div>
                @enderror
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

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
     <div class="col">
       <h1>i miei posts</h1>
          @if (session('deleted'))
            <span class="alert alert-success">
                <strong>{{ session('deleted') }}</strong>
                eliminato correttamente!
            </span>
          @endif
       <table class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Tag</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        @if ($post->category)
                            {{ $post->category->name }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                       @forelse ($post->tags as $tag )
                          <span class="badge badge-primary">{{ $tag->name }}</span>
                       @empty
                            -
                       @endforelse
                    </td>
                   
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">SHOW</a>
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.posts.edit', $post) }}">EDIT</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.posts.destroy',$post) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
       </table>
     </div>
      
   </div>
   <section class="container">
        {{ $posts->links() }}
   </section>
   <div class="container">
     <div class="row">
       <div class="col d-flex mt-3">
         @foreach ($categories as $category)
           <h4>{{ $category->name }}</h4>
           <ul>
            @forelse ($category->posts as $post_category)
                {{-- qui viene stampato quello che trovo --}}
                <li class="mr-4">{{ $post_category->title }}</li>
            @empty
                {{-- se non trovo nulla stampo quello che metto qui --}}
                <li>nessun post presente</li>
            @endforelse
        </ul>
          @endforeach
       </div>
       
     </div>
    
   </div>

   
   
    
   
    
</div>
@endsection

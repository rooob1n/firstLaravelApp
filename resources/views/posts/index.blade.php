@extends('layouts.masters')

@section('content')
    <div class="col-md-8">

        @foreach ($posts as $post)
            @include('posts.post')
        @endforeach
        
    @if (Auth::check())
        <a class="btn btn-sm btn-primary" href="/Posts/create">Add Post</a>
    @endif
  
    
    </div>
@endsection
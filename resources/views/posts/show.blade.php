@extends('layouts.masters')

@section('content')
    @if ($post->update == null)
    <div class="col-md-12">
        <h1>{{ $post -> title}}</h1>

        @if (count($post->tags))
            <ul>
                @foreach ($post->tags as $tag)
                    <li><a href="/Posts/Tags/{{$tag->name}}">{{$tag->name}}</a></li>
                @endforeach
            </ul>
        @endif

        <p>{{ $post -> body}}</p>
    </div>

    @if (count($post->comments))
        <hr>

        <div class="comments">
            <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        {{ $comment->created_at->diffForHumans() }} : 
                    </strong>
                    {{ $comment->body}}
                </li>     
            @endforeach
            </ul>
        
        </div>
        
    @endif
        
        <hr>
        <div class="card">
            <div class="card-block">
                <form method="POST" action="/Posts/{{$post->id}}/comments">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea class="form-control" name="txtComment" id="txtComment"> </textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>

                </form>
                @include('layouts.error')
            </div>
        </div>

    
    @else
        <form method="POST" action="/Posts/{{$post->id}}/Update">
            {{csrf_field()}}
            <div class="col-md-12">
                <label for="txtTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="txtTitle" name="txtTitle" value="{{$post -> title}}">
            </div>
            <div class="col-md-12">
                <label for="txtDescription" class="form-label">Description</label>
                <textarea class="form-control" id="txtDescription" name="txtDescription">{{$post -> body}}</textarea>
            </div>
            <br>
            <div class="col-12">
                <input type="submit" class="btn btn-sm btn-primary" value="Update">
            </div>

        </form>

        @include('layouts.error')

    @endif
@endsection
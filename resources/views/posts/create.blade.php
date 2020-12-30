@extends('layouts.masters')

@section('content')
    <div class="col-md-8">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>

        <form method="POST" action="/Posts">
            {{csrf_field()}}
            <div class="col-md-12">
                <label for="txtTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="txtTitle" name="txtTitle">
            </div>
            <div class="col-md-12">
                <label for="txtDescription" class="form-label">Description</label>
                <textarea class="form-control" id="txtDescription" name="txtDescription"></textarea>
            </div>
            <div class="col-md-12">
                <label for="txtDescription" class="form-label">Tags</label>
                <select class="form-control" id="selTags" name="selTags[]" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="col-12">
                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                <input type="submit" class="btn btn-sm btn-primary" value="Publish">
            </div>

        </form>

        @include('layouts.error')

       
    </div>
@endsection
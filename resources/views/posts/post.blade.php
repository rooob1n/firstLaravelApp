<h1>
    <a href="/Posts/{{$post->id}}">{{ $post->title}} </a>

    @if (Auth::check() && session('id') == $post->user_id)
        <a class="btn btn-sm btn-success" href="/Posts/{{$post->id}}/Update" style="margin-left:28%;">Update</a>
        <a class="btn btn-sm btn-danger" href="/Posts/{{$post->id}}/Delete">Delete</a>
    @endif
</h1>

<p class="lead">
    {{ $post->body }} <br>

    {{-- {{ $post->user->name }} --}} :
    created at : {{ $post->created_at->toDayDateTimeString()}}
</p>
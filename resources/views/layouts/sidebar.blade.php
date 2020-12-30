<h4 class="font-italic">Archives</h4>
<ol class="list-unstyled mb-0">
    @foreach ($archives as $arch)
        <li><a href='/?month={{$arch['month']}}&year={{$arch['year']}}'>{{ $arch['month'] . ' ' . $arch['year'] }}</a></li>
    @endforeach
</ol>
<br>
<h4 class="font-italic">Tags</h4>
<ol class="list-unstyled mb-0">
    @foreach ($tags as $tag)
        <li><a href='/Posts/Tags/{{ $tag }}'>{{ $tag }}</a></li>
    @endforeach
</ol>
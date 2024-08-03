<h2>index page</h2>
<a href="/posts/create">create post</a>
<hr>
<ul>
    @foreach($posts as $post)
    <li>{{ $post->id }} <strong>{{ $post->title }}</strong></li>
    @endforeach
</ul>
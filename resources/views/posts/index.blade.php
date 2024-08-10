<x-layout.main title="Main page">
    <a href="/posts/create">create post</a>
    <hr>
    <ul>
        @foreach($posts as $post)
        <li>
            {{ $post->id }} 
            <strong>{{ $post->title }}</strong>
            <a href="{{ route('posts.show', [$post->id]) }}">show</a>
            <a href="/posts/{{ $post->id }}/edit">edit</a>
        </li>
        @endforeach
    </ul>
</x-layout.main>


<x-layout.main title="Main page">
    <a href="{{ route('posts.create') }}">create post</a>
    <hr>
    <ul>
        @foreach($posts as $post)
        <li>
            {{ $post->id }} 
            <strong>{{ $post->title }}</strong>
            <a href="{{ route('posts.show', [$post->id]) }}">show</a> |
            @if(auth()->user()->can('update', $post))
                <a href="{{ route('posts.edit', [$post->id]) }}">edit</a>
            @endif
        </li>
        @endforeach
    </ul>
</x-layout.main>


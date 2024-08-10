<h2>Edit post #{{$post->id}}</h2>
<form method="post" action="{{ route('posts.update', [$post->id]) }}">
    @method('PUT')
    @csrf
    <x-input label="title" name="title" default-value="{{ $post->title }}" />
    <x-input label="content" name="content" default-value="{{ $post->content }}" />
    <hr>
    <button>send</button>
</form>

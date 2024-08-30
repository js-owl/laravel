<h2>Create post</h2>
<form method="post" action="{{ route('posts.store') }}">
    @csrf
    <x-input label="title" name="title" />
    <x-input label="content" name="content" />
    <button>send</button>
</form>

<h2>Create post</h2>
<form method="post" action="/posts">
    @csrf
    <x-input label="title" name="title" />
    <x-input label="content" name="content" />
    <button>send</button>
</form>

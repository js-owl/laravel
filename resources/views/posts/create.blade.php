<h2>Create post</h2>
<form method="post" action="/posts">
    @csrf
    <div>title: <input name="title" value="{{ old('title') }}" /></div>
    <div>content: <textarea name="content">{{ old('content') }}</textarea></div>
    <hr>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <button>send</button>
</form>

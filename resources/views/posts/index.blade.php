<h2>{{ $some }}</h2>
<ul>
    @foreach($posts as $post)
    <li>{{ $post['id'] }}</li>
    @endforeach
</ul>
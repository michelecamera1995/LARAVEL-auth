<a class="nav-link" href="{{ route('admin.posts.create') }}">crea</a>

@foreach($posts as $post)
<h1>{{ $post->title}}</h1>
<p>{{ $post->content}}</p>
<a class="nav-link" href="{{ route('admin.posts.edit', $post) }}">modifica</a>
<form action="{{route('admin.posts.destroy', $post)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" value="">delete</button>
</form>
@endforeach
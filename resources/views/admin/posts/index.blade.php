<a class="nav-link" href="{{ route('admin.posts.create') }}">crea</a>

@foreach($posts as $post)
<h1>{{ $post->title}}</h1>
<p>{{ $post->content}}</p>
<a class="nav-link" href="{{ route('admin.posts.edit', $post) }}">modifica</a>
<a class="nav-link" href="{{ route('admin.posts.destroy', $post) }}">cancella</a>
@endforeach
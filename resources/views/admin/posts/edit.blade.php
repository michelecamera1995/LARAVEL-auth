<form action="{{route('admin.posts.update', $post)}}" method="POST">
    @csrf
    @method ('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title">
    </div>
    <div>
        <label for="content">Description</label>
        <input type="text" name="content">
    </div>
    <button type="submit">submit</button>
</form>
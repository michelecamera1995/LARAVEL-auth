<form action="{{route('admin.posts.store')}}" method="POST">
    @csrf
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
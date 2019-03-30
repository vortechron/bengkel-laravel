<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    Title:
    <input type="text" name="title">
    <br>
    Content:
    <textarea name="content" id="" cols="30" rows="10"></textarea>
    <br>
    Image:
    <input type="file" name="image">
    <button type="submit">Save</button>
</form>
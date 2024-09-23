<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
    </div>

    <div class="mb-3">
        <label for="created_by" class="form-label">Created By</label>
        <input type="text" class="form-control" id="created_by" name="created_by" value="{{ old('created_by', $post->created_by) }}">
    </div>

    <div class="mb-3">
        <label for="created_at" class="form-label">Created At</label>
        <input type="date" class="form-control" id="created_at" name="created_at" value="{{ old('created_at', $post->created_at->format('Y-m-d')) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update Post</button>
</form>

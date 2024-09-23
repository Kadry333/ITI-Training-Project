<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
        <label for="created_by" class="form-label">Created By</label>
        <input type="text" class="form-control" id="created_by" name="created_by" value="{{ old('created_by') }}">
    </div>

    <div class="mb-3">
        <label for="created_at" class="form-label">Created At</label>
        <input type="date" class="form-control" id="created_at" name="created_at" value="{{ old('created_at') }}">
    </div>

    <button type="submit" class="btn btn-primary">Create Post</button>
</form>
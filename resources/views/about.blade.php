@extends('layouts.app')

@section('title', 'User Management')

@section('styles')
    <style>
        /* Existing styles */
    </style>
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Created By</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ $p->created_by }}</td>
                <td>{{ $p->created_at->format('d-m-Y') }}</td>
                <td class="button-group">
                    <a href="{{ route('posts.show', $p->id) }}" class="action-button view-button">View</a>
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('posts.edit', $p->id) }}" class="action-button edit-button">Edit</a>
                        <form action="{{ route('posts.delete', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-button delete-button">Delete</button>
                        </form>
                    @elseif(Auth::user()->role === 'student')
                        @if($p->borrowed_at) <!-- If the book is already borrowed -->
                            <form action="{{ route('student.returnBook', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="action-button edit-button">Return</button>
                            </form>
                        @else <!-- If the book is available -->
                            <form action="{{ route('student.borrowBook', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="action-button edit-button">Borrow</button>
                            </form>
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="pagination">
        {{ $posts->links('vendor.pagination.simple') }} <!-- Reference your custom view -->
    </div>

    <!-- Button to add a new post -->
    @if(Auth::user()->role === 'admin')
    <div class="mt-3">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Add New Post</a>
    </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

@endsection

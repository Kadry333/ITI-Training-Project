@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('admin.borrowedBooks') }}" class="btn btn-primary">View Borrowed Books</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('admin.allBooks') }}" class="btn btn-primary">View All Books</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('admin.allUsers') }}" class="btn btn-primary">View All Users And Student Details</a>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('about') }}" class="btn btn-primary">Do Operations</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.searchStudent') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="student_id">Search Student by ID</label>
                    <input type="text" name="student_id" id="student_id" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Search</button>
            </form>
        </div>
    </div>
</div>
@endsection

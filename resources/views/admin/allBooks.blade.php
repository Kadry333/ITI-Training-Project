@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Books</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Created By</th>
                <th>Borrowed At</th>
                <th>Return Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allBooks as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->created_by }}</td>
                    <td>{{ $book->borrowed_at ?? 'Not Borrowed' }}</td>
                    <td>{{ $book->return_date ?? 'Not Returned' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

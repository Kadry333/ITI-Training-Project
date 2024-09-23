@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Borrowed Books</h1>
    @if(isset($message))
        <p>{{ $message }}</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Borrowed At</th>
                    <th>Return Date</th>
                    <th>Borrowed By</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrowedBooks as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->borrowed_at }}</td>
                        <td>{{ $book->return_date }}</td>
                        <td>{{ $book->user->name ?? 'Unknown' }}</td> <!-- Ensure user relation exists in Post model -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

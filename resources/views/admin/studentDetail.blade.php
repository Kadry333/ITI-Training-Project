@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Detail</h1>
    @if(isset($message))
        <p>{{ $message }}</p>
    @else
        <h3>Student Name: {{ $student->name }}</h3>
        <p>Email: {{ $student->email }}</p>
        <p>Role: {{ $student->role }}</p>
        <h4>Borrowed Books:</h4>
        @if($student->posts->isEmpty())
            <p>This student has not borrowed any books.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Borrowed At</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student->posts as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->borrowed_at }}</td>
                            <td>{{ $book->return_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
</div>
@endsection

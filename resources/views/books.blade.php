@foreach ($books as $book)
    <div>
        <h3>{{ $book->title }}</h3>
        <form action="{{ route('student.borrowBook', $book->id) }}" method="POST">
            @csrf
            <button type="submit">Borrow this book</button>
        </form>
    </div>
@endforeach

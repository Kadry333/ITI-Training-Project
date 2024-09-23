<h1>Your Borrowed Books</h1>
<table>
    <thead>
        <tr>
            <th>Book Title</th>
            <th>Borrowed At</th>
            <th>Return</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrowedBooks as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->borrowed_at }}</td>
                <td>
                    <form action="{{ route('student.returnBook', $book->id) }}" method="POST">
                        @csrf
                        <button type="submit">Return</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Available Books</h1>
<table>
    <thead>
        <tr>
            <th>Book Title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allBooks as $book)
            @if (!$book->borrowed_at) <!-- Show only available books -->
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>
                        <form action="{{ route('student.borrowBook', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit">Borrow</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

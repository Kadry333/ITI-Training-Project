<h1>Borrowed Books</h1>
<table>
    <thead>
        <tr>
            <th>Book Title</th>
            <th>Borrower</th>
            <th>Borrow Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($borrowedBooks as $borrow)
        <tr>
            <td>{{ $borrow->book->title }}</td>
            <td>{{ $borrow->student->name }}</td>
            <td>{{ $borrow->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

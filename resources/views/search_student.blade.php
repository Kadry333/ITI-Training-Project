<h1>Search Student</h1>
<form action="{{ route('admin.searchStudentResult') }}" method="POST">
    @csrf
    <label for="student_id">Student ID:</label>
    <input type="text" name="student_id" id="student_id" required>
    <button type="submit">Search</button>
</form>

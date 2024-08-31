<!DOCTYPE html>
<html>
<head>
    <title>書籍登録</title>
</head>
<body>
    <h1>書籍登録</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('book_records.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>
        <br>
        <label for="read_date">Read Date:</label>
        <input type="date" id="read_date" name="read_date" required>
        <br>
        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes"></textarea>
        <br>
        <button type="submit">Create Record</button>
    </form>
</body>
</html>

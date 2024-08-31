<!DOCTYPE html>
<html>
<head>
    <title>書籍登録</title>
</head>
<body>
    <h1>書籍登録</h1>

    <nav>
        <ul>
            <li><a href="{{ route('home') }}">記録一覧</a></li>
            {{-- <li><a href="{{ route('book_records.review') }}">Review Records</a></li>
            <li><a href="{{ route('book_records.purpose') }}">Set or View Purpose</a></li> --}}
        </ul>
    </nav>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('book_records.store') }}" method="POST">
        @csrf
        <label for="title">書籍:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="author">著者名:</label>
        <input type="text" id="author" name="author" required>
        <br>
        <label for="read_date">日付:</label>
        <input type="date" id="read_date" name="read_date" required>
        <br>
        <label for="notes">メモ:</label>
        <textarea id="notes" name="notes"></textarea>
        <br>
        <button type="submit">作成</button>
    </form>
</body>
</html>

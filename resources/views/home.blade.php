<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Book Record App</h1>

        <!-- ナビゲーションメニュー -->
        <nav>
            <ul>
                <li><a href="{{ route('book_records.create') }}">Add New Book Record</a></li>
                {{-- <li><a href="{{ route('book_records.review') }}">Review Records</a></li>
                <li><a href="{{ route('book_records.purpose') }}">Set or View Purpose</a></li> --}}
            </ul>
        </nav>

        <!-- 書籍の一覧を表示 -->
        <section>
            <h2>Book Records</h2>

            <!-- 書籍の一覧をテーブルで表示 -->
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Read Date</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookRecords as $bookRecord)
                        <tr>
                            <td>{{ $bookRecord->title }}</td>
                            <td>{{ $bookRecord->author }}</td>
                            <td>{{ $bookRecord->read_date }}</td>
                            <td>{{ $bookRecord->notes }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>

        <!-- フッター -->
        <footer>
            <p>&copy; 2024 Book Record App</p>
        </footer>
    </div>
</body>
</html>

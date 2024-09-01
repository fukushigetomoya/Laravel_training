<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>読書記録</h1>

        <!-- ナビゲーションメニュー -->
        <nav>
            <ul>
                <li><a href="{{ route('book_records.create') }}">記録の追加</a></li>
                {{-- <li><a href="{{ route('book_records.review') }}">Review Records</a></li>
                <li><a href="{{ route('book_records.purpose') }}">Set or View Purpose</a></li> --}}
            </ul>
        </nav>

        <!-- 書籍の一覧を表示 -->
        <section>
            <h2>書籍一覧</h2>

            <!-- 書籍の一覧をテーブルで表示 -->
            <table>
                <thead>
                    <tr>
                        <th>書籍</th>
                        <th>著者</th>
                        <th>日付</th>
                        <th>メモ</th>
                        <th>操作</th> <!-- 操作列を追加 -->
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookRecords as $bookRecord)
                        <tr>
                            <td>{{ $bookRecord->title }}</td>
                            <td>{{ $bookRecord->author }}</td>
                            <td>{{ $bookRecord->read_date }}</td>
                            <td>{{ $bookRecord->notes }}</td>
                            <td>
                                <!-- 削除ボタンのフォーム -->
                                <form action="{{ route('book_records.destroy', $bookRecord->id) }}" method="POST" onsubmit="return confirm('この書籍を削除してもよろしいですか？');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">削除</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">記録が見つかりませんでした。</td>
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


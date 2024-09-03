<!DOCTYPE html>
<html>
<head>
    <title>書籍詳細</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>書籍詳細</h1>

        <!-- 書籍の詳細情報 -->
        <div>
            <h2>{{ $bookRecord->title }}</h2>
            <p><strong>著者:</strong> {{ $bookRecord->author }}</p>
            <p><strong>読了日:</strong> {{ \Carbon\Carbon::parse($bookRecord->read_date)->format('Y-m-d') }}</p>
            <p><strong>メモ:</strong> {{ $bookRecord->notes }}</p>
        </div>

        <div>
            <form action="{{ route('book_records.destroy', $bookRecord->id) }}" method="POST" onsubmit="return confirm('この書籍を削除してもよろしいですか？');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>

        <!-- 戻るボタン -->
        <a href="{{ route('home') }}">ホームに戻る</a>
    </div>
</body>
</html>

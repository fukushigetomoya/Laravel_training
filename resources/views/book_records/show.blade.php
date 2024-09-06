<!DOCTYPE html>
<html>
<head>
    <title>書籍詳細</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
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

        <!-- メタ認知を促す質問 -->
        <section>
            <h3>メタ認知を促す質問</h3>
            <ul>
                @foreach ($questions as $question)
                    <li>
                        <strong>{{ $question->text }}</strong>
                        @php
                            $answer = $answers->get($question->id);
                        @endphp
                        <!-- 回答が保存されている場合は表示 -->
                        @if ($answer)
                            <p>回答: {{ $answer->answer }}</p>
                        @else
                            <!-- 回答フォーム -->
                            <form action="{{ route('book_records.storeAnswer', $bookRecord->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <input type="text" name="answer" placeholder="あなたの回答" required>
                                <button type="submit" class="btn btn-primary">回答を保存</button>
                            </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        </section>

        <!-- 削除ボタン -->
        <form action="{{ route('book_records.destroy', $bookRecord->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">削除</button>
        </form>

        <!-- 戻るボタン -->
        <a href="{{ route('home') }}">ホームに戻る</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>

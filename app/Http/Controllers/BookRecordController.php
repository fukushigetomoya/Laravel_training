<?php

namespace App\Http\Controllers;

use App\Models\BookRecord; // モデルをインポート
use Illuminate\Http\Request;

class BookRecordController extends Controller
{
    public function create()
    {
        return view('book_records.create');
    }

    public function store(Request $request)
    {
        // リクエストデータのバリデーション
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'read_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // バリデーションを通過したデータを使用して新しい書籍記録を作成
        BookRecord::create($request->only(['title', 'author', 'read_date', 'notes']));

        // 成功メッセージとともに登録フォームにリダイレクト
        return redirect()->route('book_records.create')->with('success', 'Book record created successfully.');
    }
}

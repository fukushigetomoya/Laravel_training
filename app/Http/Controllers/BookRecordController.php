<?php

namespace App\Http\Controllers;

use App\Models\BookRecord; // モデルをインポート
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;


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
        return redirect()->route('home')->with('success', 'Book record created successfully.');
    }


    public function destroy($id)
    {
        $bookRecord = BookRecord::findOrFail($id);
        $bookRecord->delete();

        return redirect()->route('home')->with('success', 'Book record deleted successfully.');
    }
    public function show($id)
    {
        $bookRecord = BookRecord::findOrFail($id);
    
        // 質問をランダムに取得（例として3つ）
        $questions = Question::inRandomOrder()->limit(1)->get(); 
    
        // 質問に対する回答を取得
        $answers = Answer::where('book_record_id', $bookRecord->id)
                         ->get()
                         ->keyBy('question_id');
    
        return view('book_records.show', compact('bookRecord', 'questions', 'answers'));
    }
    
    public function storeAnswer(Request $request, $id)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required|string',
        ]);
    
        $bookRecord = BookRecord::findOrFail($id);
    
        Answer::updateOrCreate(
            ['book_record_id' => $bookRecord->id, 'question_id' => $request->input('question_id')],
            ['answer' => $request->input('answer')]
        );
    
        return redirect()->route('book_records.show', $bookRecord->id)->with('success', '回答が保存されました。');
    }
    
}

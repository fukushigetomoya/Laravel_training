<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('book_records', function (Blueprint $table) {
            $table->id(); // 自動インクリメントするID
            $table->string('title'); // 書籍のタイトル
            $table->string('author'); // 書籍の著者
            $table->date('read_date'); // 読んだ日付
            $table->text('notes')->nullable(); // ノート（オプション）
            $table->timestamps(); // 作成日時と更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_records');
    }
};

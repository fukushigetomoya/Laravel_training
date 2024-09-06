<?php

// database/migrations/xxxx_xx_xx_create_questions_displayed_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsDisplayedTable extends Migration
{
    public function up()
    {
        Schema::create('questions_displayed', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_record_id')->constrained()->onDelete('cascade');
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions_displayed');
    }
}


<?php

// app/Models/QuestionDisplayed.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionDisplayed extends Model
{
    use HasFactory;

    protected $fillable = ['book_record_id', 'question_id'];
    protected $table = 'questions_displayed';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRecord extends Model
{
    use HasFactory;

    // マスアサインメントを許可する属性
    protected $fillable = [
        'title',
        'author',
        'read_date',
        'notes',
    ];

    // 日付型として扱う属性
    protected $dates = [
        'read_date',
    ];
}

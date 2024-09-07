<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('questions')->insert([
            ['text' => 'この本を読んで最も印象に残った部分はどこですか？'],
            ['text' => 'この本の内容はあなたの生活にどのように影響しましたか？'],
            ['text' => 'この本を他の人に勧めるとしたら、どのような理由で勧めますか？'],
        ]);
    }
}


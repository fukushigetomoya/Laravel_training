<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookRecordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('book_records/create', [BookRecordController::class, 'create'])->name('book_records.create');
Route::post('book_records', [BookRecordController::class, 'store'])->name('book_records.store');

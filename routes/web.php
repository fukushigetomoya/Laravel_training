<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookRecordController;
use App\Http\Controllers\HomePageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('book_records/create', [BookRecordController::class, 'create'])->name('book_records.create');
Route::post('book_records', [BookRecordController::class, 'store'])->name('book_records.store');
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::delete('book_records/{id}', [BookRecordController::class, 'destroy'])->name('book_records.destroy');
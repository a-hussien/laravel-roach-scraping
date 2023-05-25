<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\BtechController;
use App\Http\Controllers\ScrapperController;
use App\Http\Controllers\YallaKoraController;
use Illuminate\Support\Facades\Route;

Route::get('/filgoal-scrape', [ScrapperController::class, 'index'])->name('filgoal');
Route::get('/yallakora-scrape', [YallaKoraController::class, 'index'])->name('yallakora');
Route::get('/books-scrape', [BooksController::class, 'index'])->name('books');
Route::get('/btech-products', [BtechController::class, 'index'])->name('btech');

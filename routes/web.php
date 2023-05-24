<?php

use App\Http\Controllers\AmazonController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BtechController;
use App\Http\Controllers\ScrapperController;
use App\Http\Controllers\YallaKoraController;
use Illuminate\Support\Facades\Route;

Route::get('/filgoal-scrape', [ScrapperController::class, 'index']);
Route::get('/yallakora-scrape', [YallaKoraController::class, 'index']);
Route::get('/books-scrape', [BooksController::class, 'index']);
Route::get('/btech-products', [BtechController::class, 'index']);

<?php

namespace App\Http\Controllers;

use App\Spiders\BooksSpider;
use RoachPHP\Roach;
use Illuminate\View\View;

class BooksController extends Controller
{
    public function index(): View
    {
        $items = Roach::collectSpider(BooksSpider::class);

        return view('books', compact('items'));
    }
}

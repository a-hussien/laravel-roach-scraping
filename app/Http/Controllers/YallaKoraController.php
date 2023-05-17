<?php

namespace App\Http\Controllers;

use RoachPHP\Roach;
use Illuminate\View\View;
use App\Spiders\YallaKoraSpider;

class YallaKoraController extends Controller
{
    public function index(): View
    {
        $items = Roach::collectSpider(YallaKoraSpider::class);

        return view('yallakora', compact('items'));
    }
}

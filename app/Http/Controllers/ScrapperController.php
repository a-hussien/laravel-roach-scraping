<?php

namespace App\Http\Controllers;

use App\Spiders\NewsSpider;
use Illuminate\View\View;
use RoachPHP\Roach;

class ScrapperController extends Controller
{
    public function index(): View
    {
        $items = Roach::collectSpider(NewsSpider::class);

        return view('filgoal', compact('items'));
    }
}

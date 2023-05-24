<?php

namespace App\Http\Controllers;

use RoachPHP\Roach;
use Illuminate\View\View;
use App\Spiders\BtechSpider;

class BtechController extends Controller
{
    public function index(): View
    {
        $items = Roach::collectSpider(BtechSpider::class);

        return view('btech.products', compact('items'));
    }
}

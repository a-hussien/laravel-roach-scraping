<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class app extends Component
{
    public function __construct(
        public string $lang,
        public string $dir,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.layout.app');
    }
}

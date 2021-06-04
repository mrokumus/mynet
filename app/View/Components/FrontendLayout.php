<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class FrontendLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     * It's return backend layout view
     *
     * @return View
     */
    public function render(): View
    {
        return view('layouts.frontend');
    }
}

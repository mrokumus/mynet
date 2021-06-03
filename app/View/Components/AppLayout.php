<?php

namespace App\View\Components;

use App\Models\BackendMenu;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return View
     */
    public function render(): View
    {
        $menuItems = BackendMenu::all();
        return view('layouts.app')
            ->with('menuItems',$menuItems);
    }
}

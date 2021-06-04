<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Person;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{

    /**
     * Show admin dashboard with persons and addresses
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('views.backend.dashboard.dashboard')
            ->with('persons', Person::paginate(10))
            ->with('addresses', Address::paginate(10));
    }
}

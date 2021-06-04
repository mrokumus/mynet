<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Person;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function render()
    {

        return view('views.backend.dashboard.dashboard')
            ->with('persons', Person::paginate(10))
            ->with('addresses',Address::paginate(10));
    }
}

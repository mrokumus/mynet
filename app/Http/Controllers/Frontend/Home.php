<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Person;

class Home extends Controller
{
    public function index()
    {
        return view('views.frontend.welcome')
            ->with('persons', Person::paginate(10))
            ->with('addresses', Address::paginate(10));
    }
}

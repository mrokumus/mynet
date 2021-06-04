<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Person;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class Home extends Controller
{
    /**
     * Return home page with persons and addresses table
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('views.frontend.welcome')
            ->with('persons', Person::paginate(10))
            ->with('addresses', Address::paginate(10));
    }
}

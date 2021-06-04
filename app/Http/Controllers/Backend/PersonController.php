<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonStoreRequest;
use App\Http\Requests\PersonUpdateRequest;
use App\Models\Address;
use App\Models\Person;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('views.backend.person.person')
            ->with('persons', Person::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('views.backend.person.create-person')
            ->with('persons', Person::all('id', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PersonStoreRequest $request): RedirectResponse
    {
        Person::create($request->validated());
        return redirect()->back()->with('success', 'Successfully Stored');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        return view('views.backend.person.edit-person')
            ->with('person', Person::where('id', $id)->first())
            ->with('addresses', Address::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PersonUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PersonUpdateRequest $request, int $id): RedirectResponse
    {
        Person::where('id', $id)->update($request->validated());
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Person::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }
}

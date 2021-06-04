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

class PersonController extends Controller
{

    /**
     * Show the table for all persons.
     *
     */
    public function index()
    {
        return view('views.backend.person.person')
            ->with('persons', Person::paginate(10));
    }

    /**
     * Show the form for creating a new person.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('views.backend.person.create-person')
            ->with('persons', Person::all('id', 'name'));
    }

    /**
     * Store a newly created person in storage.
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
     * Show the form for editing the specified person.
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
     * Update the specified person in storage.
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
     * Remove the specified person from storage.
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

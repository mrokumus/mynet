<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressStoreRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Models\Address;
use App\Models\Person;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AddressController extends Controller
{

    /**
     * Show the table for all addresses.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('views.backend.address.address')
            ->with('addresses', Address::paginate(10));
    }

    /**
     * Show the form for creating a new address.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('views.backend.address.create-address')
            ->with('persons', Person::all('id', 'name'));
    }

    /**
     * Store a newly created address in storage.
     *
     * @param AddressStoreRequest $request
     * @return RedirectResponse
     */
    public function store(AddressStoreRequest $request): RedirectResponse
    {
        Address::create($request->validated());
        return redirect()->back()->with('success', 'Successfully Added');
    }

    /**
     * Show the form for editing the specified address.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        return view('views.backend.address.edit-address')
            ->with('address', Address::where('id', $id)->first())
            ->with('persons', Person::all('id', 'name'));
    }

    /**
     * Update the specified address in storage.
     *
     * @param AddressUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(AddressUpdateRequest $request, int $id): RedirectResponse
    {
        Address::where('id', $id)->update($request->validated());
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified address from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Address::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }
}

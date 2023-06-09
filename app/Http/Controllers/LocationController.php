<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Location;
use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        $titles = ['Addresses', 'address', 'locations'];

        return view('locations.index',compact('locations', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        $cities = City::all();
        $titles = ['Addresses', 'address', 'locations', 'Create'];

        return view('locations.create', compact('locations', 'cities', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LocationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LocationRequest $request)
    {
        $location = Location::create($request->all());

        $location->save();

        return redirect()->route('locations.index')
            ->with('success','The address successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        $titles = ['Addresses', 'address', 'locations', 'About'];

        return view('locations.show',compact('location', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $cities = City::all();
        $titles = ['Addresses', 'address', 'locations', 'Edit'];

        return view('locations.edit',compact('location', 'cities', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LocationRequest  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LocationRequest $request, Location $location)
    {
        $location->update($request->all());

        return redirect()->route('locations.index')
            ->with('success','The address successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('locations.index')
            ->with('success','The address successfully deleted!');
    }
}

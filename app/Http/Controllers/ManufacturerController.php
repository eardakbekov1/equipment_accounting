<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Http\Requests\ManufacturerRequest;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::all();

        $titles = ['Manufacturers', 'manufacturer', 'manufacturers'];

        return view('manufacturers.index',compact('manufacturers', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        $titles = ['Manufacturers', 'manufacturer', 'manufacturers', 'Create'];

        return view('manufacturers.create', compact('manufacturers', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ManufacturerRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ManufacturerRequest $request)
    {
        $manufacturer = Manufacturer::create($request->all());

        $manufacturer->save();

        return redirect()->route('manufacturers.index')
            ->with('success','The manufacturer successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\manufacturer  $manufacturer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        $titles = ['Manufacturers', 'manufacturer', 'manufacturers', 'About'];

        return view('manufacturers.show',compact('manufacturer', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        $titles = ['Manufacturers', 'manufacturer', 'manufacturers', 'Edit'];

        return view('manufacturers.edit',compact('manufacturer', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ManufacturerRequest  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->update($request->all());

        return redirect()->route('manufacturers.index')
            ->with('success','The manufacturer successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        return redirect()->route('manufacturers.index')
            ->with('success','The manufacturer successfully deleted!');
    }
}

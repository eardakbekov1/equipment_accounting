<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();

        $titles = ['Units', 'unit', 'units'];

        return view('units.index',compact('units', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        $titles = ['Units', 'unit', 'units', 'Create'];

        return view('units.create', compact('units', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UnitRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UnitRequest $request)
    {
        $unit = Unit::create($request->all());

        $unit->save();

        return redirect()->route('units.index')
            ->with('success','The unit successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(unit $unit)
    {
        $titles = ['Units', 'unit', 'units', 'About'];

        return view('units.show',compact('unit', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(unit $unit)
    {
        $titles = ['Units', 'unit', 'units', 'Edit'];

        return view('units.edit',compact('unit', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UnitRequest  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UnitRequest $request, unit $unit)
    {
        $unit->update($request->all());

        return redirect()->route('units.index')
            ->with('success','The unit successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(unit $unit)
    {
        $unit->delete();

        return redirect()->route('units.index')
            ->with('success','The unit successfully deleted!');
    }
}

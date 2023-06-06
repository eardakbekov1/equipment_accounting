<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::all();

        $titles = ['Districts', 'district', 'districts'];

        return view('districts.index',compact('districts', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();
        $titles = ['Districts', 'district', 'districts', 'Create'];

        return view('districts.create', compact('districts', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $district = District::create($request->all());

        $district->save();

        return redirect()->route('districts.index')
            ->with('success',"district successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(District $district)
    {
        $titles = ['Districts', 'district', 'districts', 'About'];

        return view('districts.show',compact('district', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        $titles = ['Districts', 'district', 'districts', 'Edit'];

        return view('districts.edit',compact('district', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, District $district)
    {
        $district->update($request->all());

        return redirect()->route('districts.index')
            ->with('success','district successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(District $district)
    {
        $district->delete();

        return redirect()->route('districts.index')
            ->with('success','district successfully deleted!');
    }
}

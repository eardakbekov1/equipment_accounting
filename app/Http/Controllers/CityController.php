<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();

        $titles = ['Cities', 'city', 'cities', 'Create'];

        return view('cities.index',compact('cities', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $titles = ['Cities', 'city', 'cities', 'Create'];

        return view('cities.create', compact('cities', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $city = City::create($request->all());

        $city->save();

        return redirect()->route('cities.index')
            ->with('success',"city successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $titles = ['Cities', 'city', 'cities', 'About'];

        return view('cities.show',compact('city', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $titles = ['Cities', 'city', 'cities', 'Create', 'Edit'];

        return view('cities.edit',compact('city', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, City $city)
    {
        $city->update($request->all());

        return redirect()->route('cities.index')
            ->with('success','city successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.index')
            ->with('success','city successfully deleted!');
    }
}

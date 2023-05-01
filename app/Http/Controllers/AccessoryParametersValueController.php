<?php

namespace App\Http\Controllers;

use App\Models\Accessory_parameters_value;
use Illuminate\Http\Request;

class AccessoryParametersValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $accessory_parameters_values = Accessory_parameters_value::latest()->paginate(5);

        return view('accessory_parameters_values.index',compact('accessory_parameters_values'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $accessory_parameters_values = Accessory_parameters_value::all();

        return view('accessory_parameters_values.create', compact('accessory_parameters_values'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $accessory_parameters_value = Accessory_parameters_value::create($request->all());

        $accessory_parameters_value->save();

        return redirect()->route('accessory_parameters_values.index')
            ->with('success',"accessory_parameters_value successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessory_parameters_value  $accessory_parameters_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Accessory_parameters_value $accessory_parameters_value)
    {
        return view('accessory_parameters_values.show',compact('accessory_parameters_value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessory_parameters_value  $accessory_parameters_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Accessory_parameters_value $accessory_parameters_value)
    {
        return view('accessory_parameters_values.edit',compact('accessory_parameters_value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessory_parameters_value  $accessory_parameters_value
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Accessory_parameters_value $accessory_parameters_value)
    {
        $accessory_parameters_value->update($request->all());

        return redirect()->route('accessory_parameters_values.index')
            ->with('success','accessory_parameters_value successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessory_parameters_value  $accessory_parameters_value
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Accessory_parameters_value $accessory_parameters_value)
    {
        $accessory_parameters_value->delete();

        return redirect()->route('accessory_parameters_values.index')
            ->with('success','accessory_parameters_value successfully deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Accessory_parameter_value;
use Illuminate\Http\Request;

class AccessoryParameterValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $accessory_parameter_values = Accessory_parameter_value::latest()->paginate(5);

        return view('accessory_parameter_values.index',compact('accessory_parameter_values'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $accessory_parameter_values = Accessory_parameter_value::all();

        return view('accessory_parameter_values.create', compact('accessory_parameter_values'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $accessory_parameter_value = Accessory_parameter_value::create($request->all());

        $accessory_parameter_value->save();

        return redirect()->route('accessory_parameter_values.index')
            ->with('success',"accessory_parameter_value successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessory_parameter_value  $accessory_parameter_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Accessory_parameter_value $accessory_parameter_value)
    {
        return view('accessory_parameter_values.show',compact('accessory_parameter_value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessory_parameter_value  $accessory_parameter_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Accessory_parameter_value $accessory_parameter_value)
    {
        return view('accessory_parameter_values.edit',compact('accessory_parameter_value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessory_parameter_value  $accessory_parameter_value
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Accessory_parameter_value $accessory_parameter_value)
    {
        $accessory_parameter_value->update($request->all());

        return redirect()->route('accessory_parameter_values.index')
            ->with('success','accessory_parameter_value successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessory_parameter_value  $accessory_parameter_value
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Accessory_parameter_value $accessory_parameter_value)
    {
        $accessory_parameter_value->delete();

        return redirect()->route('accessory_parameter_values.index')
            ->with('success','accessory_parameter_value successfully deleted!');
    }
}

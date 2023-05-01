<?php

namespace App\Http\Controllers;

use App\Models\parameters_device_name;
use Illuminate\Http\Request;

class ParametersDeviceNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $parameters_device_names = Parameters_device_name::latest()->paginate(5);

        return view('parameters_device_names.index',compact('parameters_device_names'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $parameters_device_names = Parameters_device_name::all();

        return view('parameters_device_names.create', compact('parameters_device_names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $parameters_device_name = Parameters_device_name::create($request->all());

        $parameters_device_name->save();

        return redirect()->route('parameters_device_names.index')
            ->with('success',"parameters_device_name successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameters_device_name  $parameters_device_name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Parameters_device_name $parameters_device_name)
    {
        return view('parameters_device_names.show',compact('parameters_device_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parameters_device_name  $parameters_device_name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Parameters_device_name $parameters_device_name)
    {
        return view('parameters_device_names.edit',compact('parameters_device_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parameters_device_name  $parameters_device_name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Parameters_device_name $parameters_device_name)
    {
        $parameters_device_name->update($request->all());

        return redirect()->route('parameters_device_names.index')
            ->with('success','parameters_device_name successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameters_device_name  $parameters_device_name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Parameters_device_name $parameters_device_name)
    {
        $parameters_device_name->delete();

        return redirect()->route('parameters_device_names.index')
            ->with('success','parameters_device_name successfully deleted!');
    }
}

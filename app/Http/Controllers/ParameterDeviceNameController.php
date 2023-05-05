<?php

namespace App\Http\Controllers;

use App\Models\Parameter_device_name;
use Illuminate\Http\Request;

class ParameterDeviceNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $parameter_device_names = Parameter_device_name::latest()->paginate(5);

        return view('parameter_device_names.index',compact('parameter_device_names'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $parameter_device_names = Parameter_device_name::all();

        return view('parameter_device_names.create', compact('parameter_device_names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $parameter_device_name = Parameter_device_name::create($request->all());

        $parameter_device_name->save();

        return redirect()->route('parameter_device_names.index')
            ->with('success',"parameter_device_name successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameter_device_name  $parameter_device_name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Parameter_device_name $parameter_device_name)
    {
        return view('parameter_device_names.show',compact('parameter_device_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parameter_device_name  $parameter_device_name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Parameter_device_name $parameter_device_name)
    {
        return view('parameter_device_names.edit',compact('parameter_device_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parameter_device_name  $parameter_device_name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Parameter_device_name $parameter_device_name)
    {
        $parameter_device_name->update($request->all());

        return redirect()->route('parameter_device_names.index')
            ->with('success','parameter_device_name successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameter_device_name  $parameter_device_name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Parameter_device_name $parameter_device_name)
    {
        $parameter_device_name->delete();

        return redirect()->route('parameter_device_names.index')
            ->with('success','parameter_device_name successfully deleted!');
    }
}

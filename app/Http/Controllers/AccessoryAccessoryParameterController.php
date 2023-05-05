<?php

namespace App\Http\Controllers;

use App\Models\Accessory_accessory_parameter;
use Illuminate\Http\Request;

class AccessoryAccessoryParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $accessory_accessory_parameters = Accessory_accessory_parameter::latest()->paginate(5);

        return view('accessory_accessory_parameters.index',compact('accessory_accessory_parameters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $accessory_accessory_parameters = Accessory_accessory_parameter::all();

        return view('accessory_accessory_parameters.create', compact('accessory_accessory_parameters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $accessory_accessory_parameter = Accessory_accessory_parameter::create($request->all());

        $accessory_accessory_parameter->save();

        return redirect()->route('accessory_accessory_parameters.index')
            ->with('success',"accessory_accessory_parameter successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessory_accessory_parameter  $accessory_accessory_parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Accessory_accessory_parameter $accessory_accessory_parameter)
    {
        return view('accessory_accessory_parameters.show',compact('accessory_accessory_parameter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessory_accessory_parameter  $accessory_accessory_parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Accessory_accessory_parameter $accessory_accessory_parameter)
    {
        return view('accessory_accessory_parameters.edit',compact('accessory_accessory_parameter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessory_accessory_parameter  $accessory_accessory_parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Accessory_accessory_parameter $accessory_accessory_parameter)
    {
        $accessory_accessory_parameter->update($request->all());

        return redirect()->route('accessory_accessory_parameters.index')
            ->with('success','accessory_accessory_parameter successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessory_accessory_parameter  $accessory_accessory_parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Accessory_accessory_parameter $accessory_accessory_parameter)
    {
        $accessory_accessory_parameter->delete();

        return redirect()->route('accessory_accessory_parameters.index')
            ->with('success','accessory_accessory_parameter successfully deleted!');
    }
}

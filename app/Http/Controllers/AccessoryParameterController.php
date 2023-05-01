<?php

namespace App\Http\Controllers;

use App\Models\Accessory_parameter;
use Illuminate\Http\Request;

class AccessoryParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $accessory_parameters = Accessory_parameter::latest()->paginate(5);

        return view('accessory_parameters.index',compact('accessory_parameters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $accessory_parameters = Accessory_parameter::all();

        return view('accessory_parameters.create', compact('accessory_parameters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $accessory_parameter = Accessory_parameter::create($request->all());

        $accessory_parameter->save();

        return redirect()->route('accessory_parameters.index')
            ->with('success',"accessory_parameter successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessory_parameter  $accessory_parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Accessory_parameter $accessory_parameter)
    {
        return view('accessory_parameters.show',compact('accessory_parameter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessory_parameter  $accessory_parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Accessory_parameter $accessory_parameter)
    {
        return view('accessory_parameters.edit',compact('accessory_parameter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessory_parameter  $accessory_parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Accessory_parameter $accessory_parameter)
    {
        $accessory_parameter->update($request->all());

        return redirect()->route('accessory_parameters.index')
            ->with('success','accessory_parameter successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessory_parameter  $accessory_parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Accessory_parameter $accessory_parameter)
    {
        $accessory_parameter->delete();

        return redirect()->route('accessory_parameters.index')
            ->with('success','accessory_parameter successfully deleted!');
    }
}

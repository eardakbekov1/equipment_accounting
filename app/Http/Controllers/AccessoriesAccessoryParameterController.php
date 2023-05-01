<?php

namespace App\Http\Controllers;

use App\Models\Accessories_accessory_parameter;
use Illuminate\Http\Request;

class AccessoriesAccessoryParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $accessories_accessory_parameters = Accessories_accessory_parameter::latest()->paginate(5);

        return view('accessories_accessory_parameters.index',compact('accessories_accessory_parameters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $accessories_accessory_parameters = Accessories_accessory_parameter::all();

        return view('accessories_accessory_parameters.create', compact('accessories_accessory_parameters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $accessories_accessory_parameter = Accessories_accessory_parameter::create($request->all());

        $accessories_accessory_parameter->save();

        return redirect()->route('accessories_accessory_parameters.index')
            ->with('success',"accessories_accessory_parameter successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessories_accessory_parameter  $accessories_accessory_parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Accessories_accessory_parameter $accessories_accessory_parameter)
    {
        return view('accessories_accessory_parameters.show',compact('accessories_accessory_parameter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessories_accessory_parameter  $accessories_accessory_parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Accessories_accessory_parameter $accessories_accessory_parameter)
    {
        return view('accessories_accessory_parameters.edit',compact('accessories_accessory_parameter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessories_accessory_parameter  $accessories_accessory_parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Accessories_accessory_parameter $accessories_accessory_parameter)
    {
        $accessories_accessory_parameter->update($request->all());

        return redirect()->route('accessories_accessory_parameters.index')
            ->with('success','accessories_accessory_parameter successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessories_accessory_parameter  $accessories_accessory_parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Accessories_accessory_parameter $accessories_accessory_parameter)
    {
        $accessories_accessory_parameter->delete();

        return redirect()->route('accessories_accessory_parameters.index')
            ->with('success','accessories_accessory_parameter successfully deleted!');
    }
}

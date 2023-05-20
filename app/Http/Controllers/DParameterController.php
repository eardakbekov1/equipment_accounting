<?php

namespace App\Http\Controllers;

use App\Models\D_parameter;
use App\Http\Requests\D_parameterRequest;

class DParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $d_parameters = D_parameter::latest()->paginate(5);

        return view('d_parameters.index',compact('d_parameters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $d_parameters = D_parameter::all();

        return view('d_parameters.create', compact('d_parameters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\D_parameterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(D_parameterRequest $request)
    {
        $d_parameter = D_parameter::create($request->all());

        $d_parameter->save();

        return redirect()->route('d_parameters.index')
            ->with('success',"New device parameter successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\D_parameter  $d_parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(D_parameter $d_parameter)
    {
        return view('d_parameters.show',compact('d_parameter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\D_parameter  $d_parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(D_parameter $d_parameter)
    {
        return view('d_parameters.edit',compact('d_parameter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\D_parameterRequest  $request
     * @param  \App\Models\D_parameter  $d_parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(D_parameterRequest $request, D_parameter $d_parameter)
    {
        $d_parameter->update($request->all());

        return redirect()->route('d_parameters.index')
            ->with('success','The device parameter successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\D_parameter  $d_parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(D_parameter $d_parameter)
    {
        $d_parameter->delete();

        return redirect()->route('d_parameters.index')
            ->with('success','The device parameter successfully deleted!');
    }
}

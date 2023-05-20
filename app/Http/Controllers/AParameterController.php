<?php

namespace App\Http\Controllers;

use App\Http\Requests\AParameterRequest;
use App\Models\A_parameter;

class AParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $a_parameters = A_parameter::latest()->paginate(5);

        return view('a_parameters.index',compact('a_parameters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $a_parameters = A_parameter::all();

        return view('a_parameters.create', compact('a_parameters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AParameterRequest $aParameterRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AParameterRequest $aParameterRequest)
    {
        $a_parameter = A_parameter::create($aParameterRequest->all());

        $a_parameter->save();

        return redirect()->route('a_parameters.index')
            ->with('success','The parameter of accessory successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\A_parameter  $a_parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(A_parameter $a_parameter)
    {
        return view('a_parameters.show',compact('a_parameter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\A_parameter  $a_parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(A_parameter $a_parameter)
    {
        return view('a_parameters.edit',compact('a_parameter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AParameterRequest $aParameterRequest
     * @param  \App\Models\A_parameter  $a_parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AParameterRequest $aParameterRequest, A_parameter $a_parameter)
    {
        $a_parameter->update($aParameterRequest->all());

        return redirect()->route('a_parameters.index')
            ->with('success','The parameter of accessory successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\A_parameter  $a_parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(A_parameter $a_parameter)
    {
        $a_parameter->delete();

        return redirect()->route('a_parameters.index')
            ->with('success','The parameter of accessory successfully deleted!');
    }
}

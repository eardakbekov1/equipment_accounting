<?php

namespace App\Http\Controllers;

use App\Models\D_p_value;
use App\Models\D_parameter;
use App\Models\Device;
use App\Http\Requests\D_p_valueRequest;
use Illuminate\Support\Facades\DB;

class DPValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $d_p_values = D_p_value::all();

        $titles = ['Device parameters values', 'device parameter value', 'd_p_values'];

        return view('d_p_values.index',compact('d_p_values', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $d_p_values = D_p_value::all();

        $devices = Device::all();
        $d_parameters = D_parameter::all();
        $titles = ['Device parameters values', 'device parameter value', 'd_p_values', 'Create'];

        return view('d_p_values.create', compact('d_p_values', 'devices', 'd_parameters', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\D_p_valueRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(D_p_valueRequest $request)
    {
        $d_p_value = D_p_value::create($request->all());

        $d_p_value->save();

        return redirect()->route('d_p_values.index')
            ->with('success','The device parameter value successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\D_p_value  $d_p_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(D_p_value $d_p_value)
    {
        $titles = ['Device parameters values', 'device parameter value', 'd_p_values', 'About'];

        return view('d_p_values.show',compact('d_p_value', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\D_p_value  $d_p_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(D_p_value $d_p_value)
    {
        $devices = Device::all();
        $d_parameters = D_parameter::all();
        $titles = ['Device parameters values', 'device parameter value', 'd_p_values', 'Edit'];

        return view('d_p_values.edit',compact('d_p_value', 'devices', 'd_parameters', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\D_p_valueRequest  $request
     * @param  \App\Models\D_p_value  $d_p_value
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(D_p_valueRequest $request, D_p_value $d_p_value)
    {
        $d_p_value->update($request->all());

        return redirect()->route('d_p_values.index')
            ->with('success','The device parameter value successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\D_p_value  $d_p_value
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(D_p_value $d_p_value)
    {
        $d_p_value->delete();

        return redirect()->route('d_p_values.index')
            ->with('success','The device parameter value successfully deleted!');
    }
}

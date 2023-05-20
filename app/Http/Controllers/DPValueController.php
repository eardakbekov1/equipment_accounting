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

        return view('d_p_values.index',compact('d_p_values'))
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

        return view('d_p_values.create', compact('d_p_values', 'devices', 'd_parameters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\D_p_valueRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(D_p_valueRequest $request)
    {

        $d_name_id = DB::table('devices')
            ->select('d_name_id')
            ->where('id', $request->device_id)->first();

        $d_name_d_parameter_id = DB::table('d_name_d_parameter')
            ->select('id')
            ->where('d_name_id', $d_name_id->d_name_id)
            ->where('d_parameter_id', $request->d_parameter_id)
            ->first();

        $request->replace([
            '_token' => $request->_token,
            'd_p_value' => $request->d_p_value,
            'd_name_d_parameter_id' => $d_name_d_parameter_id->id,
            'device_id' => $request->device_id
        ]);

        $d_p_value = D_p_value::create($request->all());

        $d_p_value->save();

        return redirect()->route('d_p_values.index')
            ->with('success','d_p_value successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\D_p_value  $d_p_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(D_p_value $d_p_value)
    {
        return view('d_p_values.show',compact('d_p_value'));
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

        return view('d_p_values.edit',compact('d_p_value', 'devices', 'd_parameters'));
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
        $d_name_id = DB::table('devices')
            ->select('d_name_id')
            ->where('id', $request->device_id)->first();

        $d_name_d_parameter_id = DB::table('d_name_d_parameter')
            ->select('id')
            ->where('d_name_id', $d_name_id->d_name_id)
            ->where('d_parameter_id', $request->d_parameter_id)
            ->first();

        $request->replace([
            '_token' => $request->_token,
            'd_p_value' => $request->d_p_value,
            'd_name_d_parameter_id' => $d_name_d_parameter_id->id,
            'device_id' => $request->device_id
        ]);

        $d_p_value->update($request->all());

        return redirect()->route('d_p_values.index')
            ->with('success','d_p_value successfully edited!');
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
            ->with('success','d_p_value successfully deleted!');
    }
}

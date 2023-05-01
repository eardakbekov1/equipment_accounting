<?php

namespace App\Http\Controllers;

use App\Models\Device_model;
use Illuminate\Http\Request;

class DeviceModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $device_models = Device_model::latest()->paginate(5);

        return view('device_models.index',compact('device_models'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $device_models = Device_model::all();

        return view('device_models.create', compact('device_models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $device_model = Device_model::create($request->all());

        $device_model->save();

        return redirect()->route('device_models.index')
            ->with('success',"device_model successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device_model  $device_model
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Device_model $device_model)
    {
        return view('device_models.show',compact('device_model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device_model  $device_model
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Device_model $device_model)
    {
        return view('device_models.edit',compact('device_model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device_model  $device_model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Device_model $device_model)
    {
        $device_model->update($request->all());

        return redirect()->route('device_models.index')
            ->with('success','device_model successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device_model  $device_model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Device_model $device_model)
    {
        $device_model->delete();

        return redirect()->route('device_models.index')
            ->with('success','device_model successfully deleted!');
    }
}

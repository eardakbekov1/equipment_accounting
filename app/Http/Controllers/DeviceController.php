<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\D_model;
use App\Models\D_name;
use App\Models\Device;
use App\Models\Location;
use App\Models\Purpose;
use App\Http\Requests\DeviceRequest;
class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::latest()->paginate(5);

        return view('devices.index',compact('devices'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $devices = Device::all();
        $d_names = D_name::all();
        $d_models = D_model::all();
        $purposes = Purpose::all();
        $locations = Location::all();
        $conditions = Condition::all();

        return view('devices.create', compact('devices', 'd_names', 'd_models', 'purposes', 'locations', 'conditions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DeviceRequest  $deviceRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DeviceRequest  $deviceRequest)
    {
        $device = Device::create($deviceRequest->all());

        $device->save();

        return redirect()->route('devices.index')
            ->with('success',"Device successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        return view('devices.show',compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $devices = Device::all();
        $d_names = D_name::all();
        $d_models = D_model::all();
        $purposes = Purpose::all();
        $locations = Location::all();
        $conditions = Condition::all();

        return view('devices.edit',compact('device', 'devices', 'd_names', 'd_models', 'purposes', 'locations', 'conditions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DeviceRequest  $deviceRequest
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DeviceRequest $deviceRequest, Device $device)
    {
        $device->update($deviceRequest->all());

        return redirect()->route('devices.index')
            ->with('success','Device successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('devices.index')
            ->with('success','Device successfully deleted!');
    }
}

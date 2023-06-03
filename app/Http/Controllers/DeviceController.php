<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Condition;
use App\Models\D_model;
use App\Models\D_name;
use App\Models\Device;
use App\Models\Location;
use App\Models\Purpose;
use App\Http\Requests\DeviceRequest;
use App\Models\Status;
use Illuminate\Validation\Rule;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();

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
        $statuses = Status::all();
        $conditions = Condition::all();

        return view('devices.create', compact('devices', 'd_names', 'd_models', 'purposes', 'conditions', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DeviceRequest $deviceRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DeviceRequest $deviceRequest)
    {

        if($deviceRequest->address == null){
            $locationId = Location::select('id')
                ->where('address', '=', 'Storage')
                ->first();
        }else{
            $locationId = Location::select('id')
                ->where('address', '=', $deviceRequest->address)
                ->first();

            if($locationId == null){

                $cityId = City::select('id')
                    ->where('name', 'Bishkek-Pervomaiskii')
                    ->first();

                $location = [
                    'address' => $deviceRequest->address,
                    'city_id' => $cityId->id
                ];

                Location::create($location);

                $locationId = Location::select('id')
                    ->where('address', '=', $deviceRequest->address)
                    ->first();
            }

            }

        $deviceRow = [
            'd_name_id' => $deviceRequest->d_name_id,
            'd_model_id' => $deviceRequest->d_model_id,
            'sponsor_inventory' => $deviceRequest->sponsor_inventory,
            'implementer_inventory' => $deviceRequest->implementer_inventory,
            'parent_id' => $deviceRequest->parent_id,
            'purpose_id' => $deviceRequest->purpose_id,
            'serial_number' => $deviceRequest->serial_number,
            'location_id' => $locationId->id,
            'condition_id' => $deviceRequest->condition_id,
            'notes' => $deviceRequest->notes,
            'status_id' => $deviceRequest->status_id
        ];



        Device::create($deviceRow);

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
        $statuses = Status::all();
        $conditions = Condition::all();

        return view('devices.edit',compact('device', 'devices', 'd_names', 'd_models', 'purposes', 'statuses', 'conditions'));
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
        if($deviceRequest->address == null){
            $locationId = Location::select('id')
                ->where('address', '=', 'Storage')
                ->first();
        }else{
            $locationId = Location::select('id')
                ->where('address', '=', $deviceRequest->address)
                ->first();

            if($locationId == null){

                $cityId = City::select('id')
                    ->where('name', 'Bishkek-Pervomaiskii')
                    ->first();

                $location = [
                    'address' => $deviceRequest->address,
                    'city_id' => $cityId->id
                ];

                Location::create($location);

                $locationId = Location::select('id')
                    ->where('address', '=', $deviceRequest->address)
                    ->first();
            }

        }

        $deviceRow = [
            'd_name_id' => $deviceRequest->d_name_id,
            'd_model_id' => $deviceRequest->d_model_id,
            'sponsor_inventory' => $deviceRequest->sponsor_inventory,
            'implementer_inventory' => $deviceRequest->implementer_inventory,
            'parent_id' => $deviceRequest->parent_id,
            'purpose_id' => $deviceRequest->purpose_id,
            'serial_number' => $deviceRequest->serial_number,
            'location_id' => $locationId->id,
            'condition_id' => $deviceRequest->condition_id,
            'notes' => $deviceRequest->notes,
            'status_id' => $deviceRequest->status_id
        ];

        $device->update($deviceRow);

        return redirect()->route('devices.index')
            ->with('success','Device successfully edited!!');
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

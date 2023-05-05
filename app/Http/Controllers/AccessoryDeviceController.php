<?php

namespace App\Http\Controllers;

use App\Models\Accessory_device;
use Illuminate\Http\Request;

class AccessoryDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $accessory_devices = Accessory_device::latest()->paginate(5);

        return view('accessory_devices.index',compact('accessory_devices'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $accessory_devices = Accessory_device::all();

        return view('accessory_devices.create', compact('accessory_devices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $accessory_device = Accessory_device::create($request->all());

        $accessory_device->save();

        return redirect()->route('accessory_devices.index')
            ->with('success',"accessory_device successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessory_device  $accessory_device
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Accessory_device $accessory_device)
    {
        return view('accessory_devices.show',compact('accessory_device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessory_device  $accessory_device
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Accessory_device $accessory_device)
    {
        return view('accessory_devices.edit',compact('accessory_device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessory_device  $accessory_device
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Accessory_device $accessory_device)
    {
        $accessory_device->update($request->all());

        return redirect()->route('accessory_devices.index')
            ->with('success','accessory_device successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessory_device  $accessory_device
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Accessory_device $accessory_device)
    {
        $accessory_device->delete();

        return redirect()->route('accessory_devices.index')
            ->with('success','accessory_device successfully deleted!');
    }
}

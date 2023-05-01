<?php

namespace App\Http\Controllers;

use App\Models\Device_name;
use Illuminate\Http\Request;

class DeviceNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $device_names = Device_name::latest()->paginate(5);

        return view('device_names.index',compact('device_names'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $device_names = Device_name::all();

        return view('device_names.create', compact('device_names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $device_name = Device_name::create($request->all());

        $device_name->save();

        return redirect()->route('device_names.index')
            ->with('success',"device_name successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device_name  $device_name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Device_name $device_name)
    {
        return view('device_names.show',compact('device_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device_name  $device_name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Device_name $device_name)
    {
        return view('device_names.edit',compact('device_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device_name  $device_name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Device_name $device_name)
    {
        $device_name->update($request->all());

        return redirect()->route('device_names.index')
            ->with('success','device_name successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device_name  $device_name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Device_name $device_name)
    {
        $device_name->delete();

        return redirect()->route('device_names.index')
            ->with('success','device_name successfully deleted!');
    }
}

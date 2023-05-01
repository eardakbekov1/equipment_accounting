<?php

namespace App\Http\Controllers;

use App\Models\Accessories_device;
use Illuminate\Http\Request;

class AccessoriesDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $accessories_devices = Accessories_device::latest()->paginate(5);

        return view('accessories_devices.index',compact('accessories_devices'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $accessories_devices = Accessories_device::all();

        return view('accessories_devices.create', compact('accessories_devices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $accessories_device = Accessories_device::create($request->all());

        $accessories_device->save();

        return redirect()->route('accessories_devices.index')
            ->with('success',"accessories_device successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessories_device  $accessories_device
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Accessories_device $accessories_device)
    {
        return view('accessories_devices.show',compact('accessories_device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessories_device  $accessories_device
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Accessories_device $accessories_device)
    {
        return view('accessories_devices.edit',compact('accessories_device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessories_device  $accessories_device
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Accessories_device $accessories_device)
    {
        $accessories_device->update($request->all());

        return redirect()->route('accessories_devices.index')
            ->with('success','accessories_device successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessories_device  $accessories_device
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Accessories_device $accessories_device)
    {
        $accessories_device->delete();

        return redirect()->route('accessories_devices.index')
            ->with('success','accessories_device successfully deleted!');
    }
}

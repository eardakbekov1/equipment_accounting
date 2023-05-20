<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessoryRequest;
use App\Models\Accessory;
use App\Models\Category;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $accessories = Accessory::latest()->paginate(5);

        return view('accessories.index',compact('accessories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $accessories = Accessory::all();
        $categories = Category::all();

        return view('accessories.create', compact('accessories', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AccessoryRequest $accessoryRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AccessoryRequest $accessoryRequest)
    {
        $accessory = Accessory::create($accessoryRequest->all());

        $accessory->save();

        return redirect()->route('accessories.index')
            ->with('success','Accessory successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Accessory $accessory)
    {
        return view('accessories.show',compact('accessory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Accessory $accessory)
    {
        $categories = Category::all();

        return view('accessories.edit',compact('accessory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AccessoryRequest $accessoryRequest
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AccessoryRequest $accessoryRequest, Accessory $accessory)
    {
        $accessory->update($accessoryRequest->all());

        return redirect()->route('accessories.index')
            ->with('success','Accessory successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Accessory $accessory)
    {
        $accessory->delete();

        return redirect()->route('accessories.index')
            ->with('success','Accessory successfully deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\D_model;
use App\Http\Requests\D_modelRequest;
use App\Models\Manufacturer;

class DModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $d_models = D_model::all();

        $titles = ['Device models', 'device model', 'd_models'];

        return view('d_models.index',compact('d_models', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $d_models = D_model::all();
        $manufacturers = Manufacturer::all();
        $titles = ['Device models', 'device model', 'd_models', 'Create'];

        return view('d_models.create', compact('d_models', 'manufacturers', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\D_modelRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(D_modelRequest $request)
    {
        $d_model = D_model::create($request->all());

        $d_model->save();

        return redirect()->route('d_models.index')
            ->with('success',"d_model successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\D_model  $d_model
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(D_model $d_model)
    {
        $titles = ['Device models', 'device model', 'd_models', 'About'];

        return view('d_models.show',compact('d_model', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\D_model  $d_model
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(D_model $d_model)
    {
        $manufacturers = Manufacturer::all();
        $titles = ['Device models', 'device model', 'd_models', 'Edit'];

        return view('d_models.edit',compact('d_model', 'manufacturers', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\D_modelRequest  $request
     * @param  \App\Models\D_model  $d_model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(D_modelRequest $request, D_model $d_model)
    {
        $d_model->update($request->all());

        return redirect()->route('d_models.index')
            ->with('success','d_model successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\D_model  $d_model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(D_model $d_model)
    {
        $d_model->delete();

        return redirect()->route('d_models.index')
            ->with('success','d_model successfully deleted!');
    }
}

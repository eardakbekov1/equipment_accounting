<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\D_name;
use App\Http\Requests\D_nameRequest;

class DNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $d_names = D_name::all();

        $titles = ['Device names', 'device name', 'd_names'];

        return view('d_names.index',compact('d_names', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $d_names = D_name::all();
        $categories = Category::all();
        $titles = ['Device names', 'device name', 'd_names', 'Create'];

        return view('d_names.create', compact('d_names', 'categories', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\D_nameRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(D_nameRequest $request)
    {
        $d_name = D_name::create($request->all());

        $d_name->save();

        return redirect()->route('d_names.index')
            ->with('success','The device name successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\D_name  $d_name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(D_name $d_name)
    {
        $titles = ['Device names', 'device name', 'd_names', 'About'];

        return view('d_names.show',compact('d_name', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\D_name  $d_name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(D_name $d_name)
    {
        $categories = Category::all();
        $titles = ['Device names', 'device name', 'd_names', 'Edit'];

        return view('d_names.edit',compact('d_name', 'categories', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\D_nameRequest  $request
     * @param  \App\Models\D_name  $d_name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(D_nameRequest $request, D_name $d_name)
    {
        $d_name->update($request->all());

        return redirect()->route('d_names.index')
            ->with('success','The device name successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\D_name  $d_name
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(D_name $d_name)
    {
        $d_name->delete();

        return redirect()->route('d_names.index')
            ->with('success','The device name successfully deleted!');
    }
}

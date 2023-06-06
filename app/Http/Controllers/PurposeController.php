<?php

namespace App\Http\Controllers;

use App\Models\Purpose;
use App\Http\Requests\PurposeRequest;

class PurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $purposes = Purpose::all();

        $titles = ['Purposes', 'purpose', 'purposes'];

        return view('purposes.index',compact('purposes', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $purposes = Purpose::all();
        $titles = ['Purposes', 'purpose', 'purposes', 'Create'];

        return view('purposes.create', compact('purposes', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PurposeRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PurposeRequest $request)
    {
        $purpose = Purpose::create($request->all());

        $purpose->save();

        return redirect()->route('purposes.index')
            ->with('success',"purpose successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purpose  $purpose
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Purpose $purpose)
    {
        $titles = ['Purposes', 'purpose', 'purposes', 'About'];

        return view('purposes.show',compact('purpose', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purpose  $purpose
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Purpose $purpose)
    {
        $titles = ['Purposes', 'purpose', 'purposes', 'Edit'];

        return view('purposes.edit',compact('purpose', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PurposeRequest  $request
     * @param  \App\Models\Purpose  $purpose
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PurposeRequest $request, Purpose $purpose)
    {
        $purpose->update($request->all());

        return redirect()->route('purposes.index')
            ->with('success','purpose successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purpose  $purpose
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Purpose $purpose)
    {
        $purpose->delete();

        return redirect()->route('purposes.index')
            ->with('success','purpose successfully deleted!');
    }
}

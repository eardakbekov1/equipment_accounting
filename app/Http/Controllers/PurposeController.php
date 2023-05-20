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
        $purposes = Purpose::latest()->paginate(5);

        return view('purposes.index',compact('purposes'))
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

        return view('purposes.create', compact('purposes'));
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
        return view('purposes.show',compact('purpose'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purpose  $purpose
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Purpose $purpose)
    {
        return view('purposes.edit',compact('purpose'));
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

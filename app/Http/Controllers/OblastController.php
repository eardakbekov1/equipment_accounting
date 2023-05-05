<?php

namespace App\Http\Controllers;

use App\Models\Oblast;
use Illuminate\Http\Request;

class OblastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $oblasts = Oblast::latest()->paginate(5);

        return view('oblasts.index',compact('oblasts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $oblasts = Oblast::all();

        return view('oblasts.create', compact('oblasts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $oblast = Oblast::create($request->all());

        $oblast->save();

        return redirect()->route('oblasts.index')
            ->with('success',"oblast successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oblast  $oblast
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Oblast $oblast)
    {
        return view('oblasts.show',compact('oblast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oblast  $oblast
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Oblast $oblast)
    {
        return view('oblasts.edit',compact('oblast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oblast  $oblast
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Oblast $oblast)
    {
        $oblast->update($request->all());

        return redirect()->route('oblasts.index')
            ->with('success','oblast successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oblast  $oblast
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Oblast $oblast)
    {
        $oblast->delete();

        return redirect()->route('oblasts.index')
            ->with('success','oblast successfully deleted!');
    }
}

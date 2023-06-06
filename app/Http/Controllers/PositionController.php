<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();

        $titles = ['Positions', 'position', 'positions'];

        return view('positions.index',compact('positions', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        $titles = ['Positions', 'position', 'positions', 'Create'];

        return view('positions.create', compact('positions', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $position = Position::create($request->all());

        $position->save();

        return redirect()->route('positions.index')
            ->with('success',"position successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        $titles = ['Positions', 'position', 'positions', 'About'];

        return view('positions.show',compact('position', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $titles = ['Positions', 'position', 'positions', 'Edit'];

        return view('positions.edit',compact('position', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Position $position)
    {
        $position->update($request->all());

        return redirect()->route('positions.index')
            ->with('success','position successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('positions.index')
            ->with('success','position successfully deleted!');
    }
}

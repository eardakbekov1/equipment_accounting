<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Employee;
use App\Models\History;
use App\Http\Requests\HistoryRequest;


class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $histories = History::all();

        $titles = ['Histories', 'history', 'histories'];

        return view('histories.index',compact('histories', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $histories = History::all();

        $devices = Device::all();
        $employees = Employee::all();
        $titles = ['Histories', 'history', 'histories', 'Create'];

        return view('histories.create', compact('histories', 'devices', 'employees', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\HistoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HistoryRequest $request)
    {
        $history = History::create($request->all());

        $history->save();

        return redirect()->route('histories.index')
            ->with('success',"history successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(History $history)
    {
        $titles = ['Histories', 'history', 'histories', 'About'];

        return view('histories.show',compact('history', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        $devices = Device::all();
        $employees = Employee::all();
        $titles = ['Histories', 'history', 'histories', 'Edit'];

        return view('histories.edit',compact('history', 'devices', 'employees', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\HistoryRequest  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HistoryRequest $request, History $history)
    {
        $history->update($request->all());

        return redirect()->route('histories.index')
            ->with('success','history successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(History $history)
    {
        $history->delete();

        return redirect()->route('histories.index')
            ->with('success','history successfully deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\statusRequest;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::latest()->paginate(5);

        return view('statuses.index',compact('statuses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();

        return view('statuses.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StatusRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StatusRequest $request)
    {
        $status = Status::create($request->all());

        $status->save();

        return redirect()->route('statuses.index')
            ->with('success','The status successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(status $status)
    {
        return view('statuses.show',compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(status $status)
    {
        return view('statuses.edit',compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StatusRequest  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StatusRequest $request, status $status)
    {
        $status->update($request->all());

        return redirect()->route('statuses.index')
            ->with('success','The status successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(status $status)
    {
        $status->delete();

        return redirect()->route('statuses.index')
            ->with('success','The status successfully deleted!');
    }
}

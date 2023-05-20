<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Http\Requests\ConditionRequest;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $conditions = Condition::latest()->paginate(5);

        return view('conditions.index',compact('conditions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $conditions = Condition::all();

        return view('conditions.create', compact('conditions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ConditionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ConditionRequest $request)
    {
        $condition = Condition::create($request->all());

        $condition->save();

        return redirect()->route('conditions.index')
            ->with('success',"condition successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Condition $condition)
    {
        return view('conditions.show',compact('condition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Condition $condition)
    {
        return view('conditions.edit',compact('condition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ConditionRequest  $request
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ConditionRequest $request, Condition $condition)
    {
        $condition->update($request->all());

        return redirect()->route('conditions.index')
            ->with('success','condition successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Condition $condition)
    {
        $condition->delete();

        return redirect()->route('conditions.index')
            ->with('success','condition successfully deleted!');
    }
}

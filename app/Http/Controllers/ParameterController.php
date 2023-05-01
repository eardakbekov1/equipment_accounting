<?php

namespace App\Http\Controllers;

use App\Models\parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $parameters = Parameter::latest()->paginate(5);

        return view('parameters.index',compact('parameters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $parameters = Parameter::all();

        return view('parameters.create', compact('parameters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $parameter = Parameter::create($request->all());

        $parameter->save();

        return redirect()->route('parameters.index')
            ->with('success',"parameter successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Parameter $parameter)
    {
        return view('parameters.show',compact('parameter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Parameter $parameter)
    {
        return view('parameters.edit',compact('parameter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Parameter $parameter)
    {
        $parameter->update($request->all());

        return redirect()->route('parameters.index')
            ->with('success','parameter successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Parameter $parameter)
    {
        $parameter->delete();

        return redirect()->route('parameters.index')
            ->with('success','parameter successfully deleted!');
    }
}

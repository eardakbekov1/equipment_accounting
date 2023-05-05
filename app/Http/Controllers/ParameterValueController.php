<?php

namespace App\Http\Controllers;

use App\Models\Parameter_value;
use Illuminate\Http\Request;

class ParameterValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $parameter_values = Parameter_value::latest()->paginate(5);

        return view('parameter_values.index',compact('parameter_values'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $parameter_values = Parameter_value::all();

        return view('parameter_values.create', compact('parameter_values'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $parameter_value = Parameter_value::create($request->all());

        $parameter_value->save();

        return redirect()->route('parameter_values.index')
            ->with('success',"parameter_value successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameter_value  $parameter_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Parameter_value $parameter_value)
    {
        return view('parameter_values.show',compact('parameter_value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parameter_value  $parameter_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Parameter_value $parameter_value)
    {
        return view('parameter_values.edit',compact('parameter_value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parameter_value  $parameter_value
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Parameter_value $parameter_value)
    {
        $parameter_value->update($request->all());

        return redirect()->route('parameter_values.index')
            ->with('success','parameter_value successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameter_value  $parameter_value
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Parameter_value $parameter_value)
    {
        $parameter_value->delete();

        return redirect()->route('parameter_values.index')
            ->with('success','parameter_value successfully deleted!');
    }
}

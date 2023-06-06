<?php

namespace App\Http\Controllers;

use App\Http\Requests\APValueRequest;
use App\Models\A_p_value;
use App\Models\A_parameter;
use App\Models\Accessory;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class APValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $a_p_values = A_p_value::all();

        $titles = ['Accessory parameters values', 'accessory parameter value', 'a_p_values'];

        return view('a_p_values.index',compact('a_p_values', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $a_p_values = A_p_value::all();
        $accessories = Accessory::all();
        $a_parameters = A_parameter::all();
        $titles = ['Accessory parameters values', 'accessory parameter value', 'a_p_values', 'Create'];

        return view('a_p_values.create', compact('a_p_values', 'accessories', 'a_parameters', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\APValueRequest $aPValueRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(APValueRequest $aPValueRequest)
    {
        $accessory_a_parameter = DB::table('accessory_a_parameter')
            ->select('accessory_a_parameter.id')
            ->where('accessory_a_parameter.accessory_id', '=', $aPValueRequest->accessory_id)
            ->where('accessory_a_parameter.a_parameter_id', '=', $aPValueRequest->a_parameter_id)
            ->first();

        if (!$accessory_a_parameter) {
            return redirect()->back()->withErrors(['message' => 'Invalid accessory or parameter selected.'])->withInput();
        }

        $a_p_value = new A_p_value();
        $a_p_value->a_p_value = $aPValueRequest->a_p_value;
        $a_p_value->accessory_a_parameter_id = $accessory_a_parameter->id;

        $a_p_value->save();

        return redirect()->route('a_p_values.index')
            ->with('success','The value for accessory parameter successfully set!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\A_p_value  $a_p_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(A_p_value $a_p_value)
    {
        $titles = ['Accessory parameters values', 'accessory parameter value', 'a_p_values', 'About'];

        return view('a_p_values.show',compact('a_p_value', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\A_p_value  $a_p_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(A_p_value $a_p_value)
    {
        $accessories = Accessory::all();
        $a_parameters = A_parameter::all();
        $titles = ['Accessory parameters values', 'accessory parameter value', 'a_p_values', 'Edit'];

        return view('a_p_values.edit',compact('a_p_value', 'accessories', 'a_parameters', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\APValueRequest $aPValueRequest
     * @param  \App\Models\A_p_value  $a_p_value
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(APValueRequest $aPValueRequest, A_p_value $a_p_value)
    {
        $accessory_a_parameter = DB::table('accessory_a_parameter')
            ->select('accessory_a_parameter.id')
            ->where('accessory_a_parameter.accessory_id', '=', $aPValueRequest->accessory_id)
            ->where('accessory_a_parameter.a_parameter_id', '=', $aPValueRequest->a_parameter_id)
            ->first();

        if (!$accessory_a_parameter) {
            return redirect()->back()->withErrors(['message' => 'Invalid accessory or parameter selected.'])->withInput();
        }

        $a_p_value = A_p_value::findOrFail($a_p_value->id);
        $a_p_value->a_p_value = $aPValueRequest->a_p_value;
        $a_p_value->accessory_a_parameter_id = $accessory_a_parameter->id;
        $a_p_value->save();

        return redirect()->route('a_p_values.index')
            ->with('success','The value for accessory parameter successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\A_p_value  $a_p_value
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(A_p_value $a_p_value)
    {
        $a_p_value->delete();

        return redirect()->route('a_p_values.index')
            ->with('success','The value for accessory parameter successfully deleted!');
    }
}

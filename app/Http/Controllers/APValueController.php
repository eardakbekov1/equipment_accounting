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
        $a_p_values = DB::table('a_p_values')
        ->leftJoin('accessory_a_parameter', 'a_p_values.accessory_a_parameter_id', '=', 'accessory_a_parameter.id')
        ->leftJoin('accessories', 'accessory_a_parameter.accessory_id', '=', 'accessories.id')
        ->leftJoin('a_parameters', 'accessory_a_parameter.a_parameter_id', '=', 'a_parameters.id')
        ->select('a_p_values.id as id', 'a_p_values.a_p_value as a_p_value', 'accessories.name as accessory_name', 'a_parameters.name as a_parameter_name')
        ->paginate(5);

        return view('a_p_values.index',compact('a_p_values'))
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

        return view('a_p_values.create', compact('a_p_values', 'accessories', 'a_parameters'));
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
        $accessory_a_parameter = DB::table('accessory_a_parameter')
            ->where('id', $a_p_value->accessory_a_parameter_id)
            ->first();

        if ($accessory_a_parameter) {
            $accessory = DB::table('accessories')
                ->select('name')
                ->where('id', $accessory_a_parameter->accessory_id)
                ->first();

            $a_parameter = DB::table('a_parameters')
                ->select('name')
                ->where('id', $accessory_a_parameter->a_parameter_id)
                ->first();

            $a_p_value->accessory_name = $accessory->name;
            $a_p_value->a_parameter_name = $a_parameter->name;
        }

        return view('a_p_values.show',compact('a_p_value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\A_p_value  $a_p_value
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(A_p_value $a_p_value)
    {
        $accessory_a_parameter = DB::table('accessory_a_parameter')
            ->where('id', $a_p_value->accessory_a_parameter_id)
            ->first();

        if ($accessory_a_parameter) {
            $accessory = DB::table('accessories')
                ->select('id', 'name')
                ->where('id', $accessory_a_parameter->accessory_id)
                ->first();

            $a_parameter = DB::table('a_parameters')
                ->select('id', 'name')
                ->where('id', $accessory_a_parameter->a_parameter_id)
                ->first();

            $a_p_value->accessory_id = $accessory->id;
            $a_p_value->accessory_name = $accessory->name;
            $a_p_value->a_parameter_id = $a_parameter->id;
            $a_p_value->a_parameter_name = $a_parameter->name;
        }

        $accessories = Accessory::all();
        $a_parameters = A_parameter::all();

        return view('a_p_values.edit',compact('a_p_value', 'accessories', 'a_parameters'));
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

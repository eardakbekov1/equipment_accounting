<?php

namespace App\Http\Controllers;

use App\Models\Branch_department;
use Illuminate\Http\Request;

class BranchDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $branch_departments = Branch_department::latest()->paginate(5);

        return view('branch_departments.index',compact('branch_departments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $branch_departments = Branch_department::all();

        return view('branch_departments.create', compact('branch_departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $branch_department = Branch_department::create($request->all());

        $branch_department->save();

        return redirect()->route('branch_departments.index')
            ->with('success',"branch_department successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch_department  $branch_department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Branch_department $branch_department)
    {
        return view('branch_departments.show',compact('branch_department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch_department  $branch_department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Branch_department $branch_department)
    {
        return view('branch_departments.edit',compact('branch_department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch_department  $branch_department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Branch_department $branch_department)
    {
        $branch_department->update($request->all());

        return redirect()->route('branch_departments.index')
            ->with('success','branch_department successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch_department  $branch_department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Branch_department $branch_department)
    {
        $branch_department->delete();

        return redirect()->route('branch_departments.index')
            ->with('success','branch_department successfully deleted!');
    }
}

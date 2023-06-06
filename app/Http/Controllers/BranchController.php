<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use App\Models\Location;
use App\Models\Organization;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();

        $titles = ['Branches', 'branch', 'branches'];

        return view('branches.index',compact('branches', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        $organizations = Organization::all();
        $locations = Location::all();
        $titles = ['Branches', 'branch', 'branches', 'Create'];

        return view('branches.create', compact('branches', 'organizations', 'locations', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BranchRequest $branchRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BranchRequest $branchRequest)
    {
        $branch = Branch::create($branchRequest->all());

        $branch->save();

        return redirect()->route('branches.index')
            ->with('success',"branch successfully added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        $titles = ['Branches', 'branch', 'branches', 'About'];

        return view('branches.show',compact('branch', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $organizations = Organization::all();
        $locations = Location::all();
        $titles = ['Branches', 'branch', 'branches', 'Edit'];

        return view('branches.edit',compact('branch', 'organizations', 'locations', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BranchRequest $branchRequest
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BranchRequest $branchRequest, Branch $branch)
    {
        $branch->update($branchRequest->all());

        return redirect()->route('branches.index')
            ->with('success','branch successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')
            ->with('success','branch successfully deleted!');
    }
}

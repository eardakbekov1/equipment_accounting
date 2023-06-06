<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        $titles = ['Permissions', 'permission', 'permissions'];

        return view('permissions.index',compact('permissions', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $titles = ['Permissions', 'permission', 'permissions', 'Create'];

        return view('permissions.create', compact('permissions', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PermissionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        $permission->save();

        return redirect()->route('permissions.index')
            ->with('success','The permission successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        $titles = ['Permissions', 'permission', 'permissions', 'About'];

        return view('permissions.show',compact('permission', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $titles = ['Permissions', 'permission', 'permissions', 'Edit'];

        return view('permissions.edit',compact('permission', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PermissionRequest  $request
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route('permissions.index')
            ->with('success','The permission successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')
            ->with('success','The permission successfully deleted!');
    }
}

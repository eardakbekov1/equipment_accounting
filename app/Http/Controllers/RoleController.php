<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        $titles = ['Roles', 'role', 'roles'];

        return view('roles.index', compact('roles', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $titles = ['Roles', 'role', 'roles', 'Create'];

        return view('roles.create', compact('roles', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());

        $role->save();

        return redirect()->route('roles.index')
            ->with('success', 'The role successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $titles = ['Roles', 'role', 'roles', 'About'];

        return view('roles.show', compact('role', 'titles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $titles = ['Roles', 'role', 'roles', 'Create', 'Edit'];

        return view('roles.edit', compact('role', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\RoleRequest $request
     * @param \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'The role successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'The role successfully deleted!');
    }

    public function assignRole(Request $request)
    {
        $userId = $request->user_id;
        $roleId = $request->role_id;

        $user = User::findOrFail($userId);
        $role = Role::findOrFail($roleId);
        if ($user->hasRole($role->name)) {
            $user->removeRole($role);
            $result='removed role';
        } else {
            $user->assignRole($role);
            $result='assigned role';
        }
        return response()->json(['success' => true, 'result' => $result]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();
        return view('backend.role.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.role.create', [
            'permission' => Permission::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $data = $request->validated();
        $role = Role::create($data);
        $role->givePermissionTo($data['role']);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('backend.role.edit', [
            'role' => $role,
            'permission' => Permission::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Role $role)
    {
        $data = $request->validated();
        $role = Role::find($role->id);
        $role->update([
            'name' => $data['name']
        ]);
        $role->syncPermissions($data['role']);
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

        // $users = User::with('roles:id,name')->get();

        // foreach ($users as $user) {
        //     foreach ($user->roles as $rl) {
        //         $role_id = $rl->id;
        //         if ($role_id === $role->id) {
        //             $user->syncRoles(['NormalUser']);
        //         }
        //     }
        // }

        $role->delete();

        return redirect()->route('role.index');
    }
}

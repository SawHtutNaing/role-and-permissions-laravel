<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Feature;
use App\Models\Permission;
use App\Models\Role;
use GuzzleHttp\Psr7\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return  view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        
        Role::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        
        $permissions = Permission::all();

        $features = Feature::with('permissions')->get();
        $rolePermissions = $role->permissions->pluck('id')->toArray(); // Get just the IDs of the permissions

     return view('roles.edit', compact('role' , 'permissions' ,  'features' ,   'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
     
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {

        $role->delete();
        return redirect()->route('roles.index');


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions.permission')->get();
        $permissions = Permission::with('feature')->get();

        return view('role_permission.index', compact('roles', 'permissions'));
    }

    public function assign(Request $request)
    {
        $role = Role::find($request->role_id);
        $role->permissions()->sync($request->permission_ids);

        return redirect()->back()->with('success', 'Permissions assigned successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        if (!auth()->user()->hasPermissionTo('user_view')) {
            abort(403, 'Unauthorized');
        }
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function store(Request $request)
    {

        
        if (!auth()->user()->hasPermissionTo('user_create')) {
            abort(403, 'Unauthorized');
        }
        
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|min:8|confirmed',
        //     'role_id' => 'required|exists:roles,id',
        // ]);

        $validatedData = $request->all();
        // dd($validatedData);
        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => $validatedData['role_id'],
        ]);

        // Redirect to the user list page with a success message
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit(User $user){
        
        $roles  = Role::all();
        
        return  view('users.edit', compact('user' , 'roles'));
    }
    
    
    public function update($id, Request $request){


        
        if (!auth()->user()->hasPermissionTo('user_update')) {
            abort(403, 'Unauthorized');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role_id' => 'required|exists:roles,id',
        ]);

       $user = User::findOrFail($id);
       
    $user->update($request->all());

    return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function create()
    {
        // Fetch all roles to display in the create form
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function destroy(User $user)
    {

        if (!auth()->user()->hasPermissionTo('user_delete')) {
            abort(403, 'Unauthorized');
        }
        $user->delete();
        return redirect()->route('users.index');
        
    }
}

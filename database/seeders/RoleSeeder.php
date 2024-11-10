<?php 

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

      
       

        // Fetch all permissions
        $allPermissions = Permission::all();

        // Assign all permissions to the admin role
        $admin->permissions()->sync($allPermissions->pluck('id'));

        // Assign only blog permissions to the user role
        $blogPermissions = Permission::whereIn('name', [
            'blog_create',
            'blog_view',
            'blog_update',
            'blog_delete',
        ])->get();

        $user->permissions()->sync($blogPermissions->pluck('id'));
    }
}

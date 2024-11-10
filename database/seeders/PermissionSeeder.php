<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;


class PermissionSeeder extends Seeder
{
    public function run()
    {
        // User CRUD permissions
        Permission::create(['name' => 'user_create' , 'feature_id' => 1 ]);
        Permission::create(['name' => 'user_view' , 'feature_id' => 1 ]);
        Permission::create(['name' => 'user_update' , 'feature_id' => 1 ]);
        Permission::create(['name' => 'user_delete' , 'feature_id' => 1 ]);

        // Blog CRUD permissions
        
        Permission::create(['name' => 'blog_create' , 'feature_id' => 2 ]);
        Permission::create(['name' => 'blog_view' , 'feature_id' => 2 ]);
        Permission::create(['name' => 'blog_update' , 'feature_id' => 2 ]);
        Permission::create(['name' => 'blog_delete' , 'feature_id' => 2 ]);
    }
}

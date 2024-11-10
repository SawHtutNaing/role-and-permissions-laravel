<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call Permission and Role seeders
        $this->call([
            FeatureSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);

        User::create([
            'name' =>'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111'),
            'role_id' => 1
        ]);
    }
}

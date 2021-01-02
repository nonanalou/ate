<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\Role::create([
            'name' => 'admin'
        ]);

        \App\Models\Role::create([
            'name' => 'member'
        ]);

        \App\Models\User::create([
            'name' => 'Test1',
            'email' => 'test1@example.com',
            'password' => Hash::make('P@ss0rd'),
            'role_id' => $admin->id
        ]);

        \App\Models\Project::factory()->count(4)->create();
    }
}

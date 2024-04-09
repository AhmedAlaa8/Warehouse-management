<?php

namespace Database\Seeders\MainSeeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator', // optional
            'description' => 'User is allowed to manage and edit other users', // optional
        ]);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '0101326488',
            'password' => Hash::make('123'),
            'is_admin' => true
        ]);

        $user->attachRole($admin);

        $this->command->info("Admin Role and User Seeded Successfully");
    }
}

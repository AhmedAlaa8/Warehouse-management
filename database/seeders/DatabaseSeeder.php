<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\MainSeeders\AdminSeeder;
use Database\Seeders\MainSeeders\PermissionSeeder;
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

        $this->call([
            AdminSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}

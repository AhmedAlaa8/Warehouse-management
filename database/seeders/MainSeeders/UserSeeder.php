<?php

namespace Database\Seeders\MainSeeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $this->command->info("User Table Seeded Successfully");
    }
}

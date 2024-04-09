<?php

namespace Database\Seeders\MainSeeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::factory(10)->create();

        $this->command->info("Store Table Seeded Successfully");
    }
}

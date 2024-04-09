<?php

namespace Database\Seeders\MainSeeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'علبة',
            'كرتونه',
            'كيلو',
            'جرام',
            'كيس',
        ];

        foreach($data as $name)
        {
            Unit::create([
                'name' => $name
            ]);
        }

        $this->command->info("Unit Table Seeded Successfully");
    }
}

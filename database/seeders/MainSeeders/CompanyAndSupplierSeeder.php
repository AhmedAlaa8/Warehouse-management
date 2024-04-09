<?php

namespace Database\Seeders\MainSeeders;

use App\Models\Company;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyAndSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(3)->create()->each(function(Company $company){
            Supplier::factory(5)->create(['company_id'=> $company->id]);
        });

        $this->command->info("Company And Supplier Table Seeded Successfully");
    }
}

<?php

namespace App\Http\Traits;

use App\Models\Company;

trait CompanyTrait
{
    private function getCompanies($numPerPage = null)
    {
        $query = Company::query();
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    public function randomCompanyData($faker)
    {
        return [
            'name' => $faker->name(),
            'phone1' => $faker->phoneNumber(),
            'phone2' => $faker->phoneNumber(),
            'address' => $faker->address(),
            'manager_name' => $faker->name(),
            'manager_phone' => $faker->phoneNumber(),
        ];
    }

    private function createRandomCompany()
    {
        return Company::factory()->create();
    }
}

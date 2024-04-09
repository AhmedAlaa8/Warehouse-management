<?php

namespace App\Http\Traits;

use App\Models\Supplier;

trait SupplierTrait
{
    use CompanyTrait;

    private function getSuppliers($numPerPage = null)
    {
        $query = Supplier::with(['company']);
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function randomSupplierData($faker,int $company_id = null) : array
    {
        return [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'company_id' => $company_id
        ];
    }

    private function createRandomSupplier()
    {
        $company = $this->createRandomCompany();
        return Supplier::factory()->create(['company_id'=> $company->id]);
    }
}

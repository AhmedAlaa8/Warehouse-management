<?php

namespace App\Http\Traits;

use App\Models\Unit;

trait UnitTrait
{
    private function getUnits($numPerPage = null)
    {
        $query = Unit::query();
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function randomUnitData($faker)
    {
        return [
            'name' => $faker->name
        ];
    }

    private function createRandomUnit()
    {
        return Unit::factory()->create();
    }
}

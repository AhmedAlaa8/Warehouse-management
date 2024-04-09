<?php

namespace App\Http\Traits;

use App\Models\Role;

trait RoleTrait
{
    private function getRoles($numPerPage = null)
    {
        $query = Role::query();
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function randomRoleData($faker) : array
    {
        return [
            'name' => $faker->name(),
            'display_name' => $faker->title(),
            'description' => $faker->text()
        ];
    }

    private function createRandomRole()
    {
        return Role::factory()->create();
    }
}

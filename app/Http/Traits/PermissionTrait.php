<?php

namespace App\Http\Traits;

use App\Models\Permission;

trait PermissionTrait
{
    private function getPermissions($numPerPage = null)
    {
        $query = Permission::query();
        if($numPerPage)
        {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }
}

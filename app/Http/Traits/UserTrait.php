<?php

namespace App\Http\Traits;

use App\Models\Supplier;
use App\Models\User;

trait UserTrait
{
    private function getUsers($numPerPage = null)
    {
        $query = User::query();
        if ($numPerPage) {
            return $query->paginate($numPerPage);
        }
        return $query->get();
    }

    private function getUsersAndSuppliers()
    {
        $users = collect(User::select(['id', 'name'])->get());

        $suppliers = collect(Supplier::select(['id', 'name'])->get());
        return $suppliers->merge($users);
    }

    private function getUsersWhoHasCarts()
    {
        $users = User::select(['id', 'name'])->whereHas('carts')->with('carts')->get();
        $suppliers = Supplier::select(['id', 'name'])->whereHas('carts')->with('carts')->get();

        return $users->merge($suppliers);
    }
}

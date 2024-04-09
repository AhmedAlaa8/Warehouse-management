<?php

use App\Services\Authorization\PermissionsService;
use Illuminate\Support\Facades\Route;

if(!function_exists('isRouteNamed'))
{
    function isRouteNamed($name)
    {
        return Route::currentRouteName() == $name;
    }
}
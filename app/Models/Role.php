<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    use HasFactory,SoftDeletes;
    public $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'phone1',
        'phone2',
        'address',
        'manager_name',
        'manager_phone'
    ];

    public function suppliers()
    {
        return $this->hasMany(Supplier::class, 'company_id');
    }
}

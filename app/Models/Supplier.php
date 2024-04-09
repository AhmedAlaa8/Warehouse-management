<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'phone1',
        'phone2',
        'email',
        'company_id'
    ];

    protected $appends = ['type'];

    public function company()
    {
        return $this->belongsTo(Company::class , 'company_id');
    }

    public function carts()
    {
        return $this->morphMany(Cart::class,'cartable');
    }

    public function profile()
    {
        return $this->morphOne(UserProfile::class,'profilable');
    }

    public function getTypeAttribute()
    {
        return "مورد";
    }
}

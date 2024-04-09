<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'phone1',
        'phone2',
        'home_phone',
        'address',
        'job',
        'type',
        'credit',
        'total_paid',
        'total_earned'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'profilable_id',
        'profilable_type',
        'phone1',
        'phone2',
        'home_phone',
        'address',
        'job',
        'type',
        'credit',
        'total_paid',
        'total_earned',
    ];
}

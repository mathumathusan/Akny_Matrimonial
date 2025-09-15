<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'profiles'; // 👈 make sure table name matches DB

    protected $fillable = [
        'name',
        'user_id',
        'country_of_residence',
        'dob',
        'gender',
        'height',
        'weight',
        'religion',
        'complexion',
        'rasi',
        'nakshatra',
        'education_level',
        'marital_status',
        'job',
        'caste',
        'register_person_name',
        'phone_number',
        'chartphoto',
        'expectation',
        'isApprove',
    ];
}

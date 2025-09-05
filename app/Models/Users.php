<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    // Specify the table name
    protected $table = 'user';

    // Specify which fields are mass assignable
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    // If you want, you can hide fields from JSON responses
    protected $hidden = [
        'password',
        
    ];
}

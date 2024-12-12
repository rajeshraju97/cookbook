<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Define the guard if you need a specific guard for admin
    protected $guard = 'admin';

    // Define fillable attributes for mass assignment
    protected $fillable = ['name', 'email', 'password'];
}

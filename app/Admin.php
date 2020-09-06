<?php

namespace App;

use App\Services\Permission\Traits\HasPermissions;
use App\Services\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable, HasPermissions , HasRoles;


    protected $guard = 'admin';

    protected $fillable = [
        'name', 'username', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}

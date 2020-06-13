<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use Notifiable;

    protected $guard = 'staff';

    protected $fillable = [
        'userID',
        'userName',
        'icNo',
        'address',
        'phoneNo',
        'usertype',
        'password',
    ];

    protected $primaryKey = 'userID';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $hidden = [
        'password', 'remember_token',
    ];
}

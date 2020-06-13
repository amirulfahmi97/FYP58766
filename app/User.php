<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *protected $casts = [
        *'email_verified_at' => 'datetime',
    *];
     * @var array
     */

}

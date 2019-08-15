<?php
use Illuminate\notifications\notifable;
use Illuminate\foundation\auth\user as authenticatable;
namespace App;

use Illuminate\Database\Eloquent\authenticatable;

class admin extends Model
{
    use notifibale;
    protected $guard = 'admin';
    protected $table = 'admins';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}

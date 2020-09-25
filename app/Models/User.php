<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'password_unhash'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'password_unhash',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_detail()
    {
        return $this->hasOne('App/Models/UserDetail');
    }
    public function role(){
        return $this->belongsTo('App/Models/Role','role_id');
    }

    public function company()
    {
        return $this->belongsTo('App/Models/Company','company_id');
    }

    public function customer()
    {
        return $this->hasOne('App/Models/Customer','user_id');
    }

}

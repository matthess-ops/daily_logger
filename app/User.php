<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Client;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password',
    ];

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
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isClient(){
        if($this->role == "client"){
            return true;
        }else{
            return false;
        }
    }

    public function isMentor(){
        if($this->role == "mentor"){
            return true;
        }else{
            return false;
        }
    }

    public function isAdmin(){
        if($this->role == "admin"){
            return true;
        }else{
            return false;
        }
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }


}

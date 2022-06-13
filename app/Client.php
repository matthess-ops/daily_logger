<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'street',
        'street_nr',
        'postcode',
        'phone_number',
        'city',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=> 'datetime',
    ];

 
}

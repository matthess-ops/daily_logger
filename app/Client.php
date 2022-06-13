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

    // public function user()
    // {
    //     return $this->hasOne(User::class, 'id', 'user_id');

    // }

    // $table->id();
    // $table->timestamps();
    // $table->string('user_id');
    // $table->string('firstname');
    // $table->string('lastname');
    // $table->string('street');
    // $table->string('street_nr');
    // $table->string('postcode');
    // $table->string('phonenumber');
    // $table->string('city');
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',


    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=> 'datetime',
        'filled'=> 'boolean',
        'started_at'=>'datetime',
        'questions' => 'array',
        'scores'=> 'array'

    ];
}

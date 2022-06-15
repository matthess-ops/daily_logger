<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'activity_data',


    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=> 'datetime',
        'activity_data' => 'array',

    ];

    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityValue extends Model
{
    protected $fillable = [
        'user_id',
        'scaled_activities',
        'main_activities',
      
       
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=> 'datetime',
        'main_activities' => 'array',
        'scaled_activities' => 'array',

    ];

    
}

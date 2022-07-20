<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportQuestion extends Model
{
    protected $fillable = [
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=> 'datetime',
        'questions' => 'array',
    ];
}

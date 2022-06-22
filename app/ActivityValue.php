<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ActivityValue
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $user_id
 * @property array $scaled_activities
 * @property array $main_activities
 * @property array $main_activities_colors
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityValue whereMainActivities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityValue whereMainActivitiesColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityValue whereScaledActivities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityValue whereUserId($value)
 * @mixin \Eloquent
 */
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
        'main_activities_colors' => 'array',
    ];

    
}

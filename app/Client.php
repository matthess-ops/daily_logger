<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Client
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $street
 * @property string $street_nr
 * @property string $postcode
 * @property string $phone_number
 * @property string $city
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereStreetNr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUserId($value)
 * @mixin \Eloquent
 */
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

    public function activityValue()
    {
        return $this->hasOne(ActivityValue::class,'user_id','user_id');
    }

    public function reports(){
        return $this->hasMany(Report::class,'user_id','user_id');
        // return $this->hasOne(Report::class,'user_id','user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function reportQuestions(){

    //     return $this->hasOne(ActivityValue::class,'user_id','user_id');

    // }

    public function reportQuestion()
    {
        return $this->hasOne(ReportQuestion::class,'user_id','user_id');
    }


}

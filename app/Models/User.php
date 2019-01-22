<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'phone',
        'country',
        'area',
        'thana',
        'district',
        'postal_code',
        'gender',
        'username',
        'email',
        'password',
        'confirm_password',
        'user_type',
        'doctor_type',
        'specialization',
        'fee',
        'visiting_hour',
        'degree',
        'chamber',
        'skype',
        'whatsapp',
        'viber',
        'imo',
        'profile_picture',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userBalance(){
        return $this->belongsTo('App\Models\UserBalance');
    }

    public function patient() {
        return $this->belongsTo('App\Models\Patient');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    public function patient() {
        return $this->belongsTo('App\Models\Patient');
    } 

    public function user() {
        return $this->belongsTo('App\Models\User','doctor_id');
    }

    public function client() {
        return $this->belongsTo('App\Models\User','user_id');
    }
}

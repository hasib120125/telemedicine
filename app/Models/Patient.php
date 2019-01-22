<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function treatment() {
        return $this->hasMany('App\Models\Treatment');
    } 
    public function user() {
        return $this->hasMany('App\Models\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $dates = ['date_assigned', 'deadline'];

    public function teams() {
        return $this->hasMany('App\Team');
    }

    public function tasks() {
        return $this->hasMany('App\Team');
    }
}

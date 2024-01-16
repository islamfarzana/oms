<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $dates = ['date_assigned', 'deadline'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'project_id',
        'employee_id',
        'Team_leader',
        'successful'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}

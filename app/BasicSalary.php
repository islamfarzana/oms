<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicSalary extends Model
{
    public function Employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id', 'id');
    }
}

<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employees';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'address',
        'nid',
        'date_of_birth',
        'nationality',
        'image',
        'status',
        'enrolment_date',
        'department_id',
        'designation_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_of_birth',
        'enrolment_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function department()
    {
        return $this->BelongsTo('App\Department');
    }

    public function designation()
    {
        return $this->BelongsTo('App\Designation');
    }

    public function basicSalarie() {
        return $this->hasOne('App\BasicSalary');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function teams()
    {
        return $this->hasMany('App\Team');
    }
    
    public function rating()
    {
        return $this->hasOne('App\Rating');
    }
    
    public function attendences()
    {
        return $this->hasMany('App\Attendance');
    }
    public function todaysAttendances()
    {
        return $this->hasMany('App\Attendance')->whereDate('entrytime', date('Y-m-d'));
    }

    public function lastMonthsAttendances() {
        $dt = Carbon::today()->subMonth(1);
        return $this->hasMany('App\Attendance')->whereMonth('entrytime', $dt->format('m'))->whereYear('entrytime', $dt->format('Y'));
    }

    public function lastMonthsMonthlySalaries() {
        $dt = Carbon::today()->subMonth(1);
        return $this->hasMany('App\MonthlySalary')->whereMonth('date', $dt->format('m'))->whereYear('date', $dt->format('Y'));
    }
}

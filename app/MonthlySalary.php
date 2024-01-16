<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlySalary extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'monthly_salaries';

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
                  'employee_id',
                  'basic_salary_id',
                  'total_overitme',
                  'total',
                  'status',
                  'date'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function basicSalary() {
        return $this->belongsTo('App\BasicSalary');
    }
}

<?php

use App\BasicSalary;
use Illuminate\Database\Seeder;

class BasicSalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BasicSalary::truncate();   //remove if records exiest

        BasicSalary::create(['employee_id' => '1', 'salary' => '60000', 'overtime_rate' => '1000']);
        BasicSalary::create(['employee_id' => '2', 'salary' => '50000', 'overtime_rate' => '700']);
        BasicSalary::create(['employee_id' => '3', 'salary' => '45000', 'overtime_rate' => '550']);
        BasicSalary::create(['employee_id' => '4', 'salary' => '35000', 'overtime_rate' => '500']);
        BasicSalary::create(['employee_id' => '5', 'salary' => '30000', 'overtime_rate' => '450']);
    }
}

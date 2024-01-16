<?php

use Carbon\Carbon;
use App\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::truncate();   //remove if role records exiest

        Department::create(['name' => 'HR Department', 'established_date' => Carbon::now()->format('Y-m-d H:i:s')]);
        Department::create(['name' => 'Accounting and Finance', 'established_date' => Carbon::now()->format('Y-m-d H:i:s')]);
        Department::create(['name' => 'Marketing', 'established_date' => Carbon::now()->format('Y-m-d H:i:s')]);
        Department::create(['name' => 'Production', 'established_date' => Carbon::now()->format('Y-m-d H:i:s')]);
        Department::create(['name' => 'Research and Development', 'established_date' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}

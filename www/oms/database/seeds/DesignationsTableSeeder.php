<?php

use App\Designation;
use Illuminate\Database\Seeder;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::truncate();   //remove if role records exiest

        Designation::create(['name' => 'Managing Director', 'department_id' => '1']);
        Designation::create(['name' => 'General Manager', 'department_id' => '1']);
        Designation::create(['name' => 'Manager', 'department_id' => '1']);
        Designation::create(['name' => 'Financial Manager', 'department_id' => '2']);
        Designation::create(['name' => 'Accountant', 'department_id' => '2']);
        Designation::create(['name' => 'Marketing Manager', 'department_id' => '3']);
        Designation::create(['name' => 'Supervisour', 'department_id' => '4']);
        Designation::create(['name' => 'Developer', 'department_id' => '5']);
    }
}

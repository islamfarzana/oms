<?php

use App\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();   //remove if role records exiest

        Employee::create([
            'name' => 'Admin',
            'gender' => 'Female',
            'address' => 'OMS',
            'nid' => '12345678912954',
            'date_of_birth' => Carbon::now()->subYears(25)->format('Y-m-d H:i:s'),
            'nationality' => 'Bangladeshi',
            'image' => 'default-user.jpg',
            'status' => 'Active',
            'enrolment_date' => Carbon::now()->subMonths(1)->format('Y-m-d H:i:s'),
            'department_id' => '1',
            'designation_id' => '1'
        ]);

        Employee::create([
            'name' => 'Bella',
            'gender' => 'Female',
            'address' => 'Uttara',
            'nid' => '1234567891234',
            'date_of_birth' => Carbon::now()->subYears(25)->format('Y-m-d H:i:s'),
            'nationality' => 'Bangladeshi',
            'image' => '2020091706240100000035227.jpg',
            'status' => 'Active',
            'enrolment_date' => Carbon::now()->subMonths(1)->format('Y-m-d H:i:s'),
            'department_id' => '1',
            'designation_id' => '1'
        ]);

        Employee::create([
            'name' => 'Della',
            'gender' => 'Female',
            'address' => 'Uttara',
            'nid' => '1234567891232',
            'date_of_birth' => Carbon::now()->subYears(25)->format('Y-m-d H:i:s'),
            'nationality' => 'Bangladeshi',
            'image' => '2020091716020000000013629.jpg',
            'status' => 'Active',
            'enrolment_date' => Carbon::now()->subMonths(1)->format('Y-m-d H:i:s'),
            'department_id' => '1',
            'designation_id' => '1'
        ]);

        Employee::create([
            'name' => 'Stella',
            'gender' => 'Female',
            'address' => 'Uttara',
            'nid' => '1234562891235',
            'date_of_birth' => Carbon::now()->subYears(25)->format('Y-m-d H:i:s'),
            'nationality' => 'Bangladeshi',
            'image' => 'default-user.jpg',
            'status' => 'Active',
            'enrolment_date' => Carbon::now()->subMonths(1)->format('Y-m-d H:i:s'),
            'department_id' => '1',
            'designation_id' => '1'
        ]);
        Employee::create([
            'name' => 'Aaley',
            'gender' => 'Female',
            'address' => 'Uttara',
            'nid' => '1234567891935',
            'date_of_birth' => Carbon::now()->subYears(25)->format('Y-m-d H:i:s'),
            'nationality' => 'Bangladeshi',
            'image' => 'default-user.jpg',
            'status' => 'Active',
            'enrolment_date' => Carbon::now()->subMonths(1)->format('Y-m-d H:i:s'),
            'department_id' => '2',
            'designation_id' => '4'
        ]);
        Employee::create([
            'name' => 'Dally',
            'gender' => 'Female',
            'address' => 'Uttara',
            'nid' => '1234567891265',
            'date_of_birth' => Carbon::now()->subYears(25)->format('Y-m-d H:i:s'),
            'nationality' => 'Bangladeshi',
            'image' => 'default-user.jpg',
            'status' => 'Active',
            'enrolment_date' => Carbon::now()->subMonths(1)->format('Y-m-d H:i:s'),
            'department_id' => '3',
            'designation_id' => '8'
        ]);
    }
}

<?php

use Carbon\Carbon;
use App\Attendance;
use Illuminate\Database\Seeder;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendance::truncate();   //remove if role records exiest

        for ($i = -6; $i <= 0; $i++) {
            Attendance::create([
                'employee_id' => '1',
                'entrytime' => Carbon::now()->subMonths(1)->addDay($i)->format('Y-m-d H:i:s'),
                'exittime' => Carbon::now()->subMonths(1)->addDay($i)->addHours(9)->format('Y-m-d H:i:s'),
                'overtime' => '60',
                'status' => 'Present',
                'user_id' => '2'
            ]);
            Attendance::create([
                'employee_id' => '2',
                'entrytime' => Carbon::now()->subMonths(1)->addDay($i)->format('Y-m-d H:i:s'),
                'exittime' => Carbon::now()->subMonths(1)->addDay($i)->addHours(9)->format('Y-m-d H:i:s'),
                'overtime' => '1',
                'status' => 'Present',
                'user_id' => '2'
            ]);
            Attendance::create([
                'employee_id' => '3',
                'entrytime' => Carbon::now()->subMonths(1)->addDay($i)->format('Y-m-d H:i:s'),
                'exittime' => Carbon::now()->subMonths(1)->addDay($i)->addHours(9)->format('Y-m-d H:i:s'),
                'overtime' => '1',
                'status' => 'Absent',
                'user_id' => '2'
            ]);
            Attendance::create([
                'employee_id' => '4',
                'entrytime' => Carbon::now()->subMonths(1)->addDay($i)->format('Y-m-d H:i:s'),
                'exittime' => Carbon::now()->subMonths(1)->addDay($i)->addHours(8)->format('Y-m-d H:i:s'),
                'overtime' => '0',
                'status' => 'Absent',
                'user_id' => '2'
            ]);
            Attendance::create([
                'employee_id' => '5',
                'entrytime' => Carbon::now()->subMonths(1)->addDay($i)->format('Y-m-d H:i:s'),
                'exittime' => Carbon::now()->subMonths(1)->addDay($i)->addHours(8)->format('Y-m-d H:i:s'),
                'overtime' => '0',
                'status' => 'Absent',
                'user_id' => '2'
            ]);
        }
    }
}

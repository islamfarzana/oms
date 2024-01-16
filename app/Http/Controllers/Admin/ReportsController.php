<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use Carbon\Carbon;
use App\Attendance;
use App\MonthlySalary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function attendanceReport(Request $request)
    {
        // To show the table data
        $arr = explode(" - ", $request['daterange']);
        if (!empty(array_values($arr)[0]) && !empty(array_values($arr)[1])) {
            $dateFrom = date('Y-m-d', strtotime(str_replace('-','/', array_values($arr)[0])));
            $toDate = date('Y-m-d', strtotime(str_replace('-','/', array_values($arr)[1])));
            $attendances = Attendance::whereBetween('entrytime', [$dateFrom,  $toDate])->get();
        } else {
            $attendances = Attendance::all();
        }

        // To show the attendance overall statistics
        $totalEmployee = Employee::all()->count();
        $totalPresentToday = $attendances->where('status', 'Present')->count();
        $absentToday = $attendances->where('status', 'Absent')->count();
        $onLeaveToday = $attendances->where('status', 'OnLeave')->count();
        $totalDays = Employee::all()->first();

        return view('admin.reports.attendanceReport')->with([
            'attendances' => $attendances,
            'totalEmployee' => $totalEmployee,
            'totalPresentToday' => $totalPresentToday,
            'absentToday' => $absentToday,
            'onLeaveToday' => $onLeaveToday,
            '$totalDays' => $totalDays,
        ]);
    }

    public function salaryReport(Request $request)
    {
        $arr = explode(" - ", $request['daterange']);
        if (!empty(array_values($arr)[0]) && !empty(array_values($arr)[1])) {
            $dateFrom = date('Y-m-d', strtotime(str_replace('-','/', array_values($arr)[0])));
            $toDate = date('Y-m-d', strtotime(str_replace('-','/', array_values($arr)[1])));
            $salaries = MonthlySalary::whereBetween('date', [$dateFrom,  $toDate])->get();
        } else {
            $salaries = MonthlySalary::all();
        }
        return view('admin.reports.salaryReport')->with('salaries', $salaries);
    }
}

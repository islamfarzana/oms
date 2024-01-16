<?php

namespace App\Http\Controllers;

use App\Task;
use App\Team;
use App\User;
use App\Event;
use App\Project;
use App\Employee;
use Carbon\Carbon;
use App\Attendance;
use App\MonthlySalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today();
        $dt = $today->subMonth(1); // last month
        $user = Auth::user(); // get current user details
        $userId = $user->employee_id; // get current user employee id
        $userRole = $user->roles->pluck('name')->first(); // get current user role
        
        // Admin Dashboard
        // Show the status
        $totalEmployee = Employee::all()->count();
        $presentToday = Attendance::whereDate('entrytime', date('Y-m-d'))->where('status', 'Present');
        $totalPresentToday = $presentToday->count();
        $onLeaveToday = Attendance::whereDate('entrytime', date('Y-m-d'))->where('status', 'On Leave')->count();
        $absentToday = $totalEmployee - $totalPresentToday;
        $oneHrLate = $presentToday->whereTime('entrytime', '>', '10:00:00')->count();
        $salaryPaid = MonthlySalary::whereMonth('date', $dt->format('m'))->whereYear('date', $dt->format('Y'))->where('status', 'Paid')->count();
        $salaryUnpaid = $totalEmployee - $salaryPaid;
        $totalPaid = MonthlySalary::whereMonth('date', $dt->format('m'))->whereYear('date', $dt->format('Y'))->where('status', 'Paid')->sum('total');

        $teamLeader = Team::where('employee_id', $userId)->where('team_leader', '1')->where('successful', '1')->first();

        // Notifications
        $eventNotif = Event::whereBetween('start', [$today,  $today->addDays(3)])->get();
        $taskNotif = null;
        if($teamLeader != null) {
            $projectId = $teamLeader->project_id;
            $taskNotif = Task::where('project_id', $projectId)->where('status', 'Completed')->where('rating', '0')->get();
        }

        // Data
        $allAttendance = Attendance::latest()->take(5)->get();
        $allTask = Task::where('status', "Completed")->take(5)->get();
        $allPreject = Project::latest()->get();

        $totalProject = Project::all()->count();
        $totalTask = Task::all()->count();
        $completedProject = Project::where('status', "Completed")->count();
        $completedTask = Task::where('status', "Completed")->count();


        // Sub-Admin & Employee Dashboard 
        $empRunningMonthPresent = Attendance::where('employee_id', $userId)->whereMonth('entrytime', $dt->format('m'))->whereYear('entrytime', $dt->format('Y'))->where('status', 'Present')->count();
        $empRunningMonthAbsent = Attendance::where('employee_id', $userId)->whereMonth('entrytime', $dt->format('m'))->whereYear('entrytime', $dt->format('Y'))->where('status', 'Absent')->count();
        $empRunningMonthOnLeave = Attendance::where('employee_id', $userId)->whereMonth('entrytime', $dt->format('m'))->whereYear('entrytime', $dt->format('Y'))->where('status', 'On Leave')->count();
        $empRunningMonthOvertime = Attendance::where('employee_id', $userId)->whereMonth('entrytime', $dt->format('m'))->whereYear('entrytime', $dt->format('Y'))->sum('overtime');
        $employeeTaskLish = Task::where('employee_id', $userId)->latest()->take(5)->get();
        $eventList = Event::latest()->take(5)->get();

        return view('home')->with([
            'totalEmployee' => $totalEmployee,
            'totalPresentToday' => $totalPresentToday,
            'absentToday' => $absentToday,
            'onLeaveToday' => $onLeaveToday,
            'oneHrLate' => $oneHrLate,
            'salaryPaid' => $salaryPaid,
            'salaryUnpaid' => $salaryUnpaid,
            'totalPaid' => $totalPaid,
            'taskNotif' => $taskNotif,
            'eventNotif' => $eventNotif,
            "allAttendance" => $allAttendance,
            'allTask' => $allTask,
            'allPreject' => $allPreject,
            'totalProject' => $totalProject,
            'totalTask' => $totalTask,
            'completedProject' => $completedProject,
            'completedTask' => $completedTask,
            'userRole' => $userRole,
            'empRunningMonthPresent' => $empRunningMonthPresent,
            'empRunningMonthAbsent' => $empRunningMonthAbsent,
            'empRunningMonthOnLeave' => $empRunningMonthOnLeave,
            'empRunningMonthOvertime' => $empRunningMonthOvertime,
            'eventList' => $eventList,
            'employeeTaskLish' => $employeeTaskLish,
        ]);
    }
}

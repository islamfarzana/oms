<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use Carbon\Carbon;
use App\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendancesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::whereDate('entrytime', date('Y-m-d'))->with('employee')->get();
        return view('admin.attendances.index')->with('attendances', $attendances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attendances = Attendance::whereDate('entrytime', date('Y-m-d'))->with('employee')->get('status');
        $employees = Employee::with('department', 'designation', 'todaysAttendances')->get();
        return view('admin.attendances.create')->with(['attendances' => $attendances, 'employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request['employee_id'] as $data) {
            $attendance = Attendance::where('employee_id', '=', $data)->whereDate('entrytime', '=', date('Y-m-d'))->first();
            if ($attendance == null) {
                Attendance::create([
                    'employee_id' => $data,
                    'status' => $request['status'][$data],
                    'entrytime' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            } elseif ($attendance != null) {
                $exittime = isset($request['exittime'][$data]) ? $request['exittime'][$data] : 0; // If true assign the value of "$request['outtime'][$data]" into $outtime, if false assign $outtime = 0
                if ($exittime != 0) {
                    if ($attendance->exittime == null) {
                        $attendance->exittime = Carbon::now()->format('Y-m-d H:i:s');
                    }
                    $entry = new Carbon($attendance->entrytime);
                    $exit = new Carbon($attendance->exittime);
                    $diff = $entry->diffInMinutes($exit);
                    $overtime = $diff - 480; // 480 min = 8hrs
                    if ($overtime > 30) {
                        $attendance->overtime = $overtime;
                    } else {
                        $attendance->overtime = 0;
                    }
                } else {
                    $attendance->exittime = null;
                    $attendance->overtime = 0;
                }
                $attendance->status = $request['status'][$data];
                $attendance->save();
            }
        }
        return redirect()->route('admin.attendances.index')->with('success_message', 'Attendance was successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $attendances = Attendance::all();
        return view('admin.attendances.show')->with('attendances', $attendances);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect()->route('admin.attendances.index')->with('success_message', 'Attendance was successfully deleted.');
    }
}

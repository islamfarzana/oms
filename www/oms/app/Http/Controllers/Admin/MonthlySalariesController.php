<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use Carbon\Carbon;
use App\Attendance;
use App\MonthlySalary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonthlySalariesController extends Controller
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
        $dt = Carbon::today()->subMonth(1);
        $monthlySalaries  = MonthlySalary::whereMonth('date', $dt->format('m'))->whereYear('date', $dt->format('Y'))->with('employee')->get();
        return view('admin.monthly_salaries.index')->with('monthlySalaries', $monthlySalaries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dt = Carbon::today();

        $newEmployee = Employee::whereMonth('enrolment_date', $dt->format('m'))->whereYear('enrolment_date', $dt->format('Y'))->pluck('id');
        $attandances = Attendance::whereDate('entrytime', date('Y-m-d'))->with('employee')->get('status');
        $employees = Employee::with('department', 'designation', 'lastMonthsAttendances', 'basicSalarie', 'lastMonthsMonthlySalaries')->whereNotIn('id', $newEmployee)->get();
        return view('admin.monthly_salaries.create')->with([
            'employees' => $employees,
            'attendance' => $attandances,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, MonthlySalary $monthlySalary)
    {
        $dt = Carbon::today()->subMonth(1);
        $paidOrUnpaid = '';
        foreach ($request['employee'] as $data) {
            $salaryPaid = MonthlySalary::where('employee_id', $data)->whereMonth('date', $dt->format('m'))->whereYear('date', $dt->format('Y'))->get()->first();
            if (empty($salaryPaid)) {
                if (!empty($request['paid'][$data])) {
                    $paidOrUnpaid = "Paid";
                } else {
                    $paidOrUnpaid = "Unpaid";
                }
                $monthlySalary::create([
                    'employee_id' => $data,
                    'basic_salary_id' => $request->basic_salary[$data],
                    'total_overitme' => $request->overtime[$data],
                    'total' => $request->total[$data],
                    'status' => $paidOrUnpaid,
                    'date' => Carbon::today()->subMonth(1)->lastOfMonth()
                ]);
            }
            else {
                if(!empty($request['paid'][$data]) && $salaryPaid->status != "paid") {
                    $salaryPaid->status = "Paid";
                }
                if(empty($request['paid'][$data])) {
                    $salaryPaid->status = "Unpaid";
                }
                $salaryPaid->save();
            }
        }
        return redirect()->route('admin.monthly_salaries.index')->with('success_message', 'Monthly Salary was successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MonthlySalary  $monthlySalary
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlySalary $monthlySalary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MonthlySalary  $monthlySalary
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlySalary $monthlySalary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MonthlySalary  $monthlySalary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlySalary $monthlySalary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MonthlySalary  $monthlySalary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monthlySalary = MonthlySalary::findOrFail($id);
        $monthlySalary->delete();
        return redirect()->route('admin.monthly_salaries.index')->with('success_message', 'Monthly salary was successfully deleted.');
    }
}

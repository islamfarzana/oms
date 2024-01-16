<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\BasicSalary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasicSalariesController extends Controller
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
        $basicSalaries = BasicSalary::all();
        return view('admin.basic_salaries.index')->with('basicSalaries', $basicSalaries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeId = BasicSalary::pluck('employee_id')->all();
        $employees = Employee::whereNotIn('id', $employeeId)->get();
        return view('admin.basic_salaries.create')->with('employees', $employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, BasicSalary $basicSalary)
    {
        $request->validate([
            'employee_id' => ['required', 'exists:App\Employee,id'],
            'salary' => ['required', 'numeric'],
            'overtime_rate' => ['required', 'integer'],
        ]);
        
        $basicSalary->employee_id = $request->employee_id;
        $basicSalary->salary = $request->salary;
        $basicSalary->overtime_rate = $request->overtime_rate;
        $basicSalary->save();
        return redirect()->route('admin.basic_salaries.index')->with('success_message', 'Basic Salary was successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BasicSalry  $basicSalry
     * @return \Illuminate\Http\Response
     */
    public function show(BasicSalary $basicSalary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BasicSalry  $basicSalry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $basic_salary = BasicSalary::findOrFail($id);
        return view('admin.basic_salaries.edit')->with('basic_salary', $basic_salary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BasicSalry  $basicSalry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $basicSalary = BasicSalary::findOrFail($id);
        $request->validate([
            'salary' => ['required', 'numeric'],
            'overtime_rate' => ['required', 'integer'],
        ]);
        
        $basicSalary->salary = $request->salary;
        $basicSalary->overtime_rate = $request->overtime_rate;
        $basicSalary->save();
        return redirect()->route('admin.basic_salaries.index')->with('success_message', 'Basic Salary was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BasicSalry  $basicSalry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $basic_salary = BasicSalary::findOrFail($id);
        $basic_salary->delete();
        return redirect()->route('admin.basic_salaries.index')->with('success_message', 'Basic Salary was successfully deleted.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Rating;
use App\Employee;
use App\Department;
use App\Designation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
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
        $employees = Employee::all();
        return view('admin.employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('admin.employees.create')->with(['departments' => $departments, 'designations' => $designations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employees)
    {
        $employees->name = $request->name;
        $employees->gender = $request->gender;
        $employees->address = $request->address;
        $employees->nid = $request->nid;
        $employees->date_of_birth = $request->date_of_birth;
        $employees->nationality = $request->nationality;
        if ($request->hasFile('image')) {

            $extension = $request->image->getClientOriginalExtension();
            $filename = date('YmdHisu') . rand(1, 99999) . '.' . $extension;
            $employees->image = $filename;
            $request->image->storeAs('public/user/image', $filename);
        } else {
            $employees->image = 'default-user.jpg';
        }

        $employees->status = $request->status;
        $employees->enrolment_date = $request->enrolment_date;
        $employees->department_id = $request->department_id;
        $employees->designation_id = $request->designation_id;
        $employees->save();
        return redirect()->route('admin.employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::where('id', $id)->first();
        $rating = Rating::where('employee_id', $id)->pluck('average')->first();
        return view('admin.employees.show')->with(['employee' => $employee, 'rating' => $rating]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all();
        $designations = Designation::all();
        $employees = Employee::findOrFail($id);
        return view('admin.employees.edit')->with(['departments' => $departments, 'designations' => $designations, 'employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employees = Employee::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'address' => ['required', 'string'],
            'nid' => ['required', 'digits:13', Rule::unique('employees')->ignore($employees)],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],
            'nationality' => ['required', 'string'],
            'image' => ['file', 'image', 'max:3072'],
            'status' => ['required', 'string'],
            'enrolment_date' => ['required', 'date_format:Y-m-d'],
            'department_id' => ['required', 'exists:App\Department,id'],
            'designation_id' => ['required', 'exists:App\Designation,id'],
        ]);

        $employees->name = $request->name;
        $employees->gender = $request->gender;
        $employees->address = $request->address;
        if ($employees->nid != $request->nid) {
            $employees->nid = $request->nid;
        }
        $employees->date_of_birth = $request->date_of_birth;
        $employees->nationality = $request->nationality;
        if ($request->hasFile('image')) {

            $extension = $request->image->getClientOriginalExtension();
            $filename = date('YmdHisu') . rand(1, 99999) . '.' . $extension;
            $employees->image = $filename;
            $request->image->storeAs('public/user/image', $filename);
        } else {
            $employees->image = $employees->image;
        }

        $employees->status = $request->status;
        $employees->enrolment_date = $request->enrolment_date;
        $employees->department_id = $request->department_id;
        $employees->designation_id = $request->designation_id;
        $employees->save();
        return redirect()->route('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success_message', 'Employee was successfully deleted.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationsController extends Controller
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
        $designations = Designation::all();
      
        return view('admin.designations.index')->with('designations', $designations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $departments = Department::all();
        return view('admin.designations.create')->with('departments', $departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Designation $designations)
    {
        $designations->name = $request->name;
        $designations->department_id = $request->department_id;
        $designations->save();
        return redirect()->route('admin.designations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designations = Designation::findOrFail($id);
        $departments = Department::all();
        return view('admin.designations.edit')->with(['designations' => $designations, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $designations = Designation::findOrFail($id);
        $designations->name = $request->name;
        $designations->update();
        return redirect()->route('admin.designations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designations = Designation::findOrFail($id);
        $designations->delete();
        return redirect()->route('admin.designations.index');
    }
}

<?php

namespace App\Http\Controllers\Employee;

use App\Task;
use App\Team;
use App\Rating;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('employee.tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $teamLeader = Team::where('project_id', $id)->where('team_leader', '1')->pluck('employee_id')->first();
        $employee = Auth::user()->employee_id;

        if ($teamLeader == $employee) {
            $teamsId = Team::where('project_id', $id)->pluck('employee_id');
            $availableTeams = Employee::whereIn('id', $teamsId)->get();
            $project = Project::where('id', $id)->first();
            return view('employee.tasks.create')->with(['availableTeams' => $availableTeams, 'project' => $project]);
        } else {
            return view('employee.tasks.show', $id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        $task->title = $request->title;
        $task->project_id = $request->project_id;
        $task->employee_id = $request->employee_id;
        $task->date_assigned = $request->date_assigned;
        $task->deadline = $request->deadline;
        $task->status = "Not Completed";
        $task->rating = "0.0";
        $task->remarks = "No Remarks";
        $task->save();
        return redirect()->route('employee.tasks.show', $request->project_id)->with('success_message', 'Task was successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teamLeader = Team::where('project_id', $id)->where('team_leader', '1')->pluck('employee_id')->first();
        $employee = Auth::user()->employee_id;

        if ($id != null && $teamLeader == $employee) {
            $tasks = Task::where('project_id', $id)->get();
        } else {
            $tasks = Task::where('project_id', $id)->where('employee_id', $employee)->get();
        }

        return view('employee.tasks.show')->with(['tasks' => $tasks, 'id' => $id, 'teamLeader' => $teamLeader, 'employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $teamLeader = Team::where('project_id', $task->project_id)->where('team_leader', '1')->pluck('employee_id')->first();
        return view('employee.tasks.edit')->with(['task' => $task, 'teamLeader' => $teamLeader]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $teamLeader = Team::where('project_id', $task->project_id)->where('team_leader', '1')->pluck('employee_id')->first();

        if ($teamLeader == Auth::user()->employee_id) {
            $task->title = $request->title;
            $task->project_id = $request->project_id;
            $task->employee_id = $request->employee_id;
            $task->date_assigned = $request->date_assigned;
            $task->deadline = $request->deadline;
            $task->status = $request->status;
            $task->rating = $request->rating;
            $task->remarks = $request->remarks;
        } else {
            $task->status = $request->status;
        }
        $task->save();
        $project = $task->project_id;

        return redirect()->route('employee.tasks.show', $project)->with('success_message', 'Task was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}

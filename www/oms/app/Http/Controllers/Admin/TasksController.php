<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use App\Team;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Rating;

class TasksController extends Controller
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
        $tasks = Task::all();
        return view('admin.tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $teamsId = Team::where('project_id', $id)->pluck('employee_id');
        $availableTeams = Employee::whereIn('id', $teamsId)->get();
        $project = Project::where('id', $id)->first();
        return view('admin.tasks.create')->with(['availableTeams' => $availableTeams, 'project' => $project]);
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
        return redirect()->route('admin.tasks.show', $request->project_id)->with('success_message', 'Task was successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id != null) {
            $tasks = Task::where('project_id', $id)->get();
            $project = $id;
        }

        return view('admin.tasks.show')->with(['tasks' => $tasks, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectId = Task::where('id', $id)->pluck('project_id')->first();
        $teamsId = Team::where('project_id', $projectId)->pluck('employee_id');
        $availableTeams = Employee::whereIn('id', $teamsId)->get();
        $task = Task::findOrFail($id);
        return view('admin.tasks.edit')->with(['availableTeams' => $availableTeams, 'task' => $task]);
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
        $task->title = $request->title;
        $task->project_id = $request->project_id;
        $task->employee_id = $request->employee_id;
        $task->date_assigned = $request->date_assigned;
        $task->deadline = $request->deadline;
        $task->status = $request->status;
        $task->rating = $request->rating;
        $task->remarks = $request->remarks;
        $task->save();

        $rating = Rating::where('employee_id', $request->employee_id)->first();
        if ($rating == null) {
            $rating = new Rating();
            $rating->employee_id = $request->employee_id;
            $average = Task::where('employee_id', $request->employee_id)->where('rating', '!=', '0')->get()->avg('rating');
            if($average != null) {
                $rating->average = $average;
            } else {
                $rating->average = "0";
            }
        } else {
            $rating->employee_id = $request->employee_id;
            $rating->average = Task::where('employee_id', $request->employee_id)->where('rating', '!=', '0')->get()->avg('rating');
        }
        $rating->save();

        return redirect()->route('admin.tasks.show', $request->project_id)->with('success_message', 'Task was successfully updated.');
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

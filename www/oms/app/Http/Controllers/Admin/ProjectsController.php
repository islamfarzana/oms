<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Project;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
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
        $projects = Project::all();
        return view('admin.projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teamsId = Team::where('successful', '1')->pluck('employee_id');
        $availableTeams = Employee::whereNotIn('id', $teamsId)->get();
        return view('admin.projects.create')->with('availableTeams', $availableTeams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $project->name = $request->name;
        $project->description = $request->description;
        $project->date_assigned = $request->date_assigned;
        $project->deadline = $request->deadline;
        $project->company = $request->company;
        $project->status = $request->status;
        $project->save();

        if(!empty($request['employee_id']))
        {
            foreach ($request['employee_id'] as $data) {
                if (!empty($request->team_leader == $data)) {
                    $team_leader = "1";
                } else {
                    $team_leader = "0";
                }
    
                $teams = Team::create([
                    'project_id' => $project->id,
                    'employee_id' => $data,
                    'Team_leader' => $team_leader,
                    'successful' => "1",
                ]);
            }
        }
        $teams->save();
        return redirect()->route('admin.projects.index')->with('success_message', 'Project was successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $member = Team::where('project_id', $id)->get()->sortByDesc('team_leader');
        return view('admin.projects.show')->with(['project' => $project, 'member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        $project = Project::findOrFail($id);
        $member = Team::where('project_id', $id)->get();
        $leader = $member->where('team_leader', "1")->pluck('employee_id')->first();
        $assignedMember = $member->pluck('employee_id');
        $teamsId = Team::where('successful', '1')->whereNotIn('employee_id', $assignedMember)->pluck('employee_id');
        $availableTeams = Employee::whereNotIn('id', $teamsId)->get();
        return view('admin.projects.edit')->with(['project' => $project, 'availableTeams' => $availableTeams, 'leader' => $leader, 'assignedMember' => $assignedMember]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->date_assigned = $request->date_assigned;
        $project->deadline = $request->deadline;
        $project->company = $request->company;
        $project->status = $request->status;
        $project->save();

        if(!empty($request['employee_id']))
        {
            // Remove Unassigned member
            Team::where('project_id', $id)->whereNotIn('employee_id', $request['employee_id'])->delete();

            // Updating the team members status
            foreach ($request['employee_id'] as $data) {
                $teams = Team::where('project_id', $id)->where('employee_id', $data)->first();
                if (!empty($request->team_leader == $data)) {
                    $team_leader = "1";
                } else {
                    $team_leader = "0";
                }
                if ($teams == null) {
                    Team::create([
                        'project_id' => $project->id,
                        'employee_id' => $data,
                        'Team_leader' => $team_leader,
                        'successful' => "1",
                    ]);
                } elseif ($teams != null) {
                    $teams->project_id = $id;
                    $teams->employee_id = $data;
                    $teams->team_leader = $team_leader;
                    if($request->status == "Completed" || $request->status == "Canceled") {
                        $teams->successful = "0";
                    } else {
                        $teams->successful = "1";
                    }
                    $teams->save();
                }
            }
        }
        return redirect()->route('admin.projects.index')->with('success_message', 'Project was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projects = Project::findOrFail($id);
        $projects->delete();
        return redirect()->route('admin.projects.index')->with('success_message', 'Project was successfully deleted.');
    }
}

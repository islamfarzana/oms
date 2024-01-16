@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Team Member') }}
                    </div>
                </h5>

                <div class="card-body">
                    <table class="table table-striped dTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Team Member</th>
                                <th scope="col">Project</th>
                                <th scope="col">Team Leader</th>
                                <th scope="col">Completion Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $key => $item)
                            <tr>
                                <td scope='row'>{{ $key+1 }}</td>
                                <td>{{ $item->employee->name }}</td>
                                <td>{{ $item->project->name }}</td>
                                <td>{{ ($item->team_leader == "1") ? "Yes" : "No" }}</td>
                                <td><span @if($item->successful == '0') class="bg-success px-2 rounded"
                                        @else class="bg-secondary px-2 rounded"
                                        @endif>{{ ($item->successful == "0") ? "Completed" : "Work In Progress" }}</span>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
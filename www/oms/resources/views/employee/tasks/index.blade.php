@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Task List') }}
                    </div>
                </h5>

                <div class="card-body">
                    <table class="table table-striped dTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task</th>
                                <th scope="col">Project</th>
                                <th scope="col">Assigned Employee</th>
                                <th scope="col">Date Assigned</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Ratings</th>
                                <th scope="col">Status</th>
                                <th scope="col">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $key => $item)
                            <tr>
                                <td scope='row'>{{ $key+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->project->name }}</td>
                                <td>{{ $item->employee->name }}</td>
                                <td>{{ $item->date_assigned->toDateString() }}</td>
                                <td>{{ $item->deadline->toDateString() }}</td>
                                <td><span @if($item->status == 'Completed' && $item->rating == '0') class="bg-warning
                                        px-2 rounded"
                                        @endif>{{ $item->rating }}</span></td>
                                <td><span @if($item->status == 'Completed') class="bg-success px-2 rounded"
                                        @else class="bg-warning px-2 rounded"
                                        @endif>{{ $item->status }}</span></td>
                                <td>{{ $item->remarks }}</td>
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
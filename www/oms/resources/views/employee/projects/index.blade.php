@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Projects') }}
                    </div>
                </h5>

                <div class="card-body">
                    <table class="table table-striped dTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Started</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Client Company</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $key => $item)
                            <tr>
                                <td scope='row'>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->date_assigned->toDateString() }}</td>
                                <td><span @if ($item->deadline->toDateString() < date('Y-m-d') && $item->status == "On
                                            Going" ||
                                            $item->deadline->toDateString() < date('Y-m-d') && $item->status ==
                                                "Pending")
                                                class="bg-warning px-2 rounded"
                                                @endif>{{ $item->deadline->toDateString() }}</span></td>
                                <td>{{ $item->company }}</td>
                                <td><span @if($item->status == 'Completed') class="bg-success px-2 rounded"
                                        @elseif($item->status == 'Canceled') class="bg-danger px-2 rounded"
                                        @else class="bg-warning px-2 rounded"
                                        @endif>{{ $item->status }}</span></td>
                                <td>
                                    <div class="btn-group btn-group-sm float-right">
                                        <a href="{{ route('employee.projects.show', $item->id ) }}"
                                            class="btn btn-sm mr-2"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="{{ route('employee.tasks.show', $item->id ) }}"
                                            class="btn btn-sm mr-2"><i class="fas fa-tasks" aria-hidden="true"
                                                data-toggle="tooltip" title="Assign Task"></i></a>
                                    </div>
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
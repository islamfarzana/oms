@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Attendence Record') }}
                    </div>
                </h5>

                <div class="card-body">
                    <table class="table table-striped dTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Arival at</th>
                                <th scope="col">Departure at</th>
                                <th scope="col">OT. <i class="fa fa-info-circle" aria-hidden="true"
                                        data-toggle="tooltip" title="Overtime in minutes"></i></th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $key => $item)
                            <tr>
                                <th scope="row">{{ $item->employee->id}}</th>
                                <td>{{ $item->employee->name }}</td>
                                <td>{{ $item->entrytime->toDateString() }}</td>
                                <td>{{ ($item->status == "Present") ? $item->entrytime->toTimeString() : '' }}</td>
                                <td>{{ ($item->exittime == "Present") ? $item->exittime->toTimeString() : '' }}</td>
                                <td>{{ ($item->status == "Present") ? $item->overtime : ''}}</td>
                                <td>{{ $item->status}}</td>
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
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3 mt-0">
            <div class="float-right">
                <a href="{{ route('admin.attendances.show', 0) }}" role="button"
                    class="btn-small btn-info rounded px-2 py-1">Show all attendances</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Attendence Record') }}
                        <div class="btn-group float-right">
                            <a href="{{ route('admin.attendances.create') }}" class="btn btn-lg"><i
                                    class="far fa-plus-square"></i></a>
                        </div>
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
                                <th scope="col" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $key => $item)
                            <tr>
                                <th scope="row">{{ $item->employee->id}}</th>
                                <td>{{ $item->employee->name }}</td>
                                <td>{{ $item->entrytime->toDateString() }}</td>
                                <td>{{ ($item->status == "Present") ? $item->entrytime->toTimeString() : '---' }}</td>
                                <td>{{ ($item->status == "Present" && $item->exittime != null) ? $item->exittime->toTimeString() : '---' }}
                                </td>
                                <td>{{ ($item->status == "Present") ? $item->overtime : '---'}}</td>
                                <td>{{ $item->status}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm float-right">
                                        <form action="{{ route('admin.attendances.destroy', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm"
                                                onclick="return confirm('Confirm deletion?')"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
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
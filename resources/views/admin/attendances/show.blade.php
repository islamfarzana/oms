@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('All Attendence Record') }}
                        <div class="btn-group float-right">
                            <a href="{{ route('admin.attendances.index') }}" class="btn btn-sm"><i
                                    class="text-light fas fa-arrow-left"></i></a>
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
                                @can('admin')
                                <th scope="col" class="text-right">Action</th>
                                @endcan
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
                                @can('admin')
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
                                @endcan
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
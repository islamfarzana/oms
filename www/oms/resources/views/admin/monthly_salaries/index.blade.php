@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Monthly Salary') }}
                        <div class="btn-group float-right">
                            <a href="{{ route('admin.monthly_salaries.create') }}" class="btn btn-lg"><i
                                    class="far fa-plus-square"></i></a>
                        </div>
                    </div>
                </h5>

                <div class="card-body">
                    <table class="table table-striped dTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee</th>
                                <th>Designation</th>
                                <th>Basic Salary</th>
                                <th>Total OT. <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip"
                                        title="Total overtime in minutes"></i></th>
                                <th>Total (TK)</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th scope="col" style="text-align: right !important">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($monthlySalaries as $key => $item)
                            <tr>
                                <th scope="row">{{ $key+1}}</th>
                                <td>{{ $item->employee->name }}</td>
                                <td>{{ $item->employee->designation->name }}</td>
                                <td>{{ !empty($item->basicSalary->salary) ? $item->basicSalary->salary : 0  }}
                                </td>
                                <td>{{ $item->total_overitme }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->date->toDateString() }}</td>
                                <td><span @if($item->status == 'Paid') class="bg-success px-2 rounded"
                                        @else class="bg-warning px-2 rounded"
                                        @endif>{{ $item->status }}</span></td>
                                <td>
                                    <div class="btn-group btn-group-sm float-right">
                                        <form action="{{ route('admin.monthly_salaries.destroy', $item) }}"
                                            method="POST">
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
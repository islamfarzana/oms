@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Basic Salary Records') }}
                        <div class="btn-group float-right">
                            <a href="{{ route('admin.basic_salaries.create') }}" class="btn btn-lg"><i
                                    class="far fa-plus-square"></i></a>
                        </div>
                    </div>
                </h5>

                <div class="card-body">
                    <table class="table table-striped dTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Employee Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Basic Salary</th>
                                <th scope="col">OT. Rate</th>
                                <th scope="col" style="text-align: right !important">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($basicSalaries as $key => $item)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $item->employee->name }}</td>
                                <td>{{ $item->employee->designation->name }}</td>
                                <td>{{ $item->salary }}</td>
                                <td>{{ $item->overtime_rate }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm float-right">
                                        <a href="{{ route('admin.basic_salaries.edit', $item->id ) }}"
                                            class="btn btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.basic_salaries.destroy', $item) }}" method="POST">
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
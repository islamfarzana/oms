@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card alert-light">
                <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">
                    {{ __('Provide Salary') }}
                    <span class="float-right">
                        <a href="{{ route('admin.monthly_salaries.index') }}" class="btn btn-sm"><i
                                class="text-light fas fa-arrow-left"></i></a>
                    </span>
                </div>

                <div class="card-body">
                    <form class="form-prevent" method="POST" action="{{ route('admin.monthly_salaries.store') }}">
                        @csrf

                        <table class="table table-striped dTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Basic Salary</th>
                                    <th scope="col">OT. <i class="fa fa-info-circle" aria-hidden="true"
                                            data-toggle="tooltip" title="Total overtime in minutes"></i></th>
                                    <th scope="col">OT. Amount <i class="fa fa-info-circle" aria-hidden="true"
                                            data-toggle="tooltip" title="Total overtime amount in TK"></i></th>
                                    <th scope="col">Totall</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">IsPaid</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->designation->name }}</td>
                                    <td>{{ !empty($item->basicSalarie->salary) ? $item->basicSalarie->salary : 0  }}
                                    </td>
                                    <td>{{ $overtime = $item->lastMonthsAttendances->sum('overtime') }}</td>
                                    <td>{{ $overtimeAmount = round($overtime * ((!empty($item->basicSalarie->overtime_rate) ? $item->basicSalarie->overtime_rate : 0) / 60), 2) }}
                                    </td>
                                    <td>{{ $total = round($overtimeAmount + (!empty($item->basicSalarie->salary) ? $item->basicSalarie->salary : 0), 2) }}
                                    </td>
                                    <td>{{ $item->status }}</td>
                                    </td>
                                    <td>
                                        <!-- Input field -->
                                        <input type="hidden" name="employee[]" id="employee" value="{{ $item->id }}">
                                        <input type="hidden" name="designation[{{ $item->id }}]" id="designation"
                                            value="{{ $item->designation->id }}">
                                        <input type="hidden" name="basic_salary[{{ $item->id }}]" id="basic_salary"
                                            value="{{ !empty($item->basicSalarie->id) ? $item->basicSalarie->id : '' }}">
                                        <input type="hidden" name="overtime[{{ $item->id }}]" id="overtime"
                                            value="{{ $overtime }}">
                                        <input type="hidden" name="total[{{ $item->id }}]" id="total"
                                            value="{{ $total }}">
                                        <input type="hidden" name="monthly_salary_id[{{ $item->id }}]"
                                            id="monthly_salary_id"
                                            value="{{ !empty($item->lastMonthsMonthlySalaries->id) }}">
                                        <div class="form-check pl-0">
                                            <input type="checkbox" class="leaved_checkbox" name="paid[{{ $item->id }}]"
                                                value="paid" @foreach($item->lastMonthsMonthlySalaries as $status )
                                            @if ( $status->status != null && $status->status != "Unpaid" )
                                            checked
                                            @endif
                                            @endforeach>
                                            <label>Yes</label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="form-group row mb-0">
                            <div class="col-8 offset-2">
                                <button type="submit" class="btn btn-secondary text-uppercase w-100 button-prevent">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
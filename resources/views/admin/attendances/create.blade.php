@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card alert-light">
                <div class="card-header text-center bg-secondary text-light text-uppercase">
                    {{ __('Take Attendance') }}
                    <span class="float-right">
                        <a href="{{ route('admin.attendances.index') }}" class="btn btn-sm"><i
                                class="text-light fas fa-arrow-left"></i></a>
                    </span>
                </div>

                <div class="card-body">
                    <form class="form-prevent" method="POST" action="{{ route('admin.attendances.store') }}">
                        @csrf

                        <table class="table table-striped dTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Attendance Status</th>
                                    <th scope="col">Departure</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->department->name }}</td>
                                    <td>{{ $item->designation->name }}</td>
                                    <td>
                                        <input type="hidden" name="employee_id[]" id="employee_id"
                                            value="{{ $item->id }}">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status[{{ $item->id }}]"
                                                id="present{{ $key+1 }}" class="present_status" value="Present"
                                                @foreach($item->todaysAttendances as $present )
                                            @if ( $present->status == 'Present' )
                                            checked
                                            @endif
                                            @endforeach>
                                            <label class="form-check-label" for="present{{ $key+1 }}">Present</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status[{{ $item->id }}]"
                                                id="absent{{ $key+1 }}" value="Absent" @foreach($item->todaysAttendances
                                            as $absent )
                                            @if ( $absent->status == 'Absent' )
                                            checked
                                            @endif
                                            @endforeach>
                                            <label class="form-check-label" for="absent{{ $key+1 }}">Absent</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status[{{ $item->id }}]"
                                                id="onleave{{ $key+1 }}" value="On Leave"
                                                @foreach($item->todaysAttendances as $onleave )
                                            @if ( $onleave->status == 'On Leave' )
                                            checked
                                            @endif
                                            @endforeach>
                                            <label class="form-check-label" for="absent{{ $key+1 }}">On Leave</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check pl-0">
                                            <input type="checkbox" class="leaved_checkbox"
                                                name="exittime[{{ $item->id }}]" value="1"
                                                @foreach($item->todaysAttendances as $item )
                                            @if ( $item->exittime != null )
                                            checked
                                            @endif
                                            @if ($item->status != "Present")
                                            disabled
                                            @endif
                                            @endforeach>
                                            <label>Exit</label>
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
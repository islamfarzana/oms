@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Attendence Reports') }}
                        <form action="{{ route('admin.reports.attendanceReport') }}" method="GET">
                            @csrf
                            @method('GET')

                            <div class="btn-group btn-group-sm float-right" role="group">
                                <label class="col-form-label-sm text-md-right text-muted p-0 m-0 pr-1 pt-1">Advanced
                                    search : </label>
                                <input type="text" name="daterange" class="form-control form-control-sm rangepicker"
                                    style="max-width: 160px">
                                <button type="submit" class="btn btn-sm btn-secondary" title="search">
                                    <i class="fas fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </h5>
                @if(count($attendances) == 0)
                <div class="card-body text-center">
                    <h4 class="text-muted">No records found.</h4>
                </div>
                @else
                <div class="card-body">
                    <table class="table table-striped dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Arival at</th>
                                <th scope="col">Departure at</th>
                                <th scope="col">OT. <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip"
                                    title="Overtime in minutes"></i></th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $key => $attendance)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $attendance->employee->name }}</td>
                                <td>{{ $attendance->entrytime->toTimeString() }}</td>
                                <td>{{ $attendance->exittime ? $attendance->exittime->toTimeString() : '' }}</td>
                                <td>{{ $attendance->overtime}}</td>
                                <td>{{ $attendance->entrytime->toDateString() }}</td>
                                <td>{{ $attendance->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Total Overtime</th>
                                <th scope="col" colspan="">OT. <i class="fa fa-info-circle" aria-hidden="true"
                                        data-toggle="tooltip" title="Overtime in minutes"></i></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
        
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @endif
        
            </div>
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Attendance overall statistics') }}
                    </div>
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
        
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Employee</span>
                                    <span class="info-box-number">
                                        {{ $totalEmployee }}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clock"></i></span>
        
                                <div class="info-box-content">
                                    <span class="info-box-text">Days Present</span>
                                    <span class="info-box-number">{{ $totalPresentToday }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
        
                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>
        
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
        
                                <div class="info-box-content">
                                    <span class="info-box-text">Days Absent</span>
                                    <span class="info-box-number">{{ $absentToday }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
        
                                <div class="info-box-content">
                                    <span class="info-box-text">Days On Leave</span>
                                    <span class="info-box-number">{{ $onLeaveToday }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
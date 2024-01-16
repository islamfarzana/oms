@extends('layouts.admin')

@section('link')
<style>
  .custom-card-header-bg {
    background: rgb(4 60 100 / 75%) !important;
    color: white !important;
  }

  /* .custom-card-footer-bg {
    background: rgb(184 218 255 / 1) !important;
  } */

  /* .card .table {
    background: rgb(184 218 255 / 1) !important;
  } */

  .info-box {
    border-bottom-width: 4px !important;
  }

  .info-box-container .info-box {
    border-bottom: 7px solid rgb(4 60 100 / 75%) !important;
    ;
    border-bottom-width: 6px !important;
  }
</style>
@endsection

@section('content')
<section class="content">
  @if($taskNotif != null)
  @foreach ($taskNotif as $taskNotification)
  <div class="alert alert-success successMessage">
    <i class=" fas fa-fw fa-check" aria-hidden="true"></i>
    Task: {{ $taskNotification->title }} task of "{{ $taskNotification->project->name }}" is completed by
    {{ $taskNotification->employee->name }} on {{ $taskNotification->updated_at->toDateString() }}. <span
      class="ml-2"><a href="{{ route('employee.tasks.show', $taskNotification->project_id) }}">Show all task</a></span>

    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endforeach
  @endif

  @if($eventNotif != null)
  @foreach ($eventNotif as $eventNotification)
  <div class="alert alert-success successMessage">
    <i class=" fas fa-fw fa-check" aria-hidden="true"></i>
    Event: {{ $eventNotification->title }} will be held on {{ $eventNotification->start>toDateString() }}

    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endforeach
  @endif

  @if ($userRole == "admin")
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box border border-info">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <a href="{{ route('admin.employees.index') }}">
              <span class="info-box-text text-primary">Total Employee</span>
              <span class="info-box-number text-primary">
                {{ $totalEmployee }}
              </span>
            </a>

          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 border border-success">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-clock"></i></span>

          <div class="info-box-content">
            <a href="{{ route('admin.attendances.index') }}">
              <span class="info-box-text">Present Today</span>
              <span class="info-box-number">{{ $totalPresentToday }}</span>
            </a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 border border-danger">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-clock"></i></span>

          <div class="info-box-content">
            <a href="{{ route('admin.attendances.index') }}">
              <span class="info-box-text">Absent Today</span>
              <span class="info-box-number">{{ $absentToday }}</span>
            </a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 border border-info">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-umbrella-beach"></i></span>

          <div class="info-box-content">
            <a href="{{ route('admin.attendances.index') }}">
              <span class="info-box-text">On Leave</span>
              <span class="info-box-number">{{ $onLeaveToday }}</span>
            </a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box border border-warning">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-clock"></i></span>

          <div class="info-box-content">
            <a href="{{ route('admin.attendances.index') }}">
              <span class="info-box-text">Late Came</span>
              <span class="info-box-number">
                {{ $oneHrLate }}
              </span>
            </a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 border border-success">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-alt"></i></span>

          <div class="info-box-content">
            <a href="{{ route('admin.monthly_salaries.index') }}">
              <span class="info-box-text">Salary Paid</span>
              <span class="info-box-number">{{ $salaryPaid }}</span>
            </a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 border border-warning">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-alt"></i></span>

          <div class="info-box-content">
            <a href="{{ route('admin.monthly_salaries.index') }}">
              <span class="info-box-text">Salary Unpaid</span>
              <span class="info-box-number">{{ $salaryUnpaid }}</span>
            </a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 border border-info">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-bill-alt"></i></span>

          <div class="info-box-content">
            <a href="{{ route('admin.monthly_salaries.index') }}">
              <span class="info-box-text">Total Paid</span>
              <span class="info-box-number">{{ $totalPaid }} TK</span>
            </a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="col-md-8">
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
          <div class="card-header border-transparent custom-card-header-bg">
            <h3 class="card-title">Latest Tasks</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Project</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allTask as $key => $task)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->status }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer custom-card-footer-bg clearfix">
            <a href="{{ route('admin.tasks.index') }}" class="btn btn-sm btn-secondary float-right">View All Tasks</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->

      <div class="col-md-4 info-box-container">
        <!-- Info Boxes Style 2 -->
        <div class="info-box mb-4 bg-warning">
          <span class="info-box-icon"><i class="fas fa-project-diagram"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Projects</span>
            <span class="info-box-number">{{ $totalProject }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-4 bg-success">
          <span class="info-box-icon"><i class="fas fa-tasks"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Tasks</span>
            <span class="info-box-number">{{ $totalTask }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-4 bg-danger">
          <span class="info-box-icon"><i class="fas fa-tasks"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Completed Task</span>
            <span class="info-box-number">{{ $completedTask }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-info">
          <span class="info-box-icon"><i class="fas fa-tasks"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Completed Projects</span>
            <span class="info-box-number">{{ $completedProject }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->

      </div>
      <!-- /.col -->
      <!-- Left col -->
      <div class="col-md-6">
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
          <div class="card-header border-transparent custom-card-header-bg">
            <h3 class="card-title">Attendances</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Employee</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allAttendance as $key => $attendance)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $attendance->employee->name }}</td>
                    <td>{{ $attendance->entrytime->toDateString() }}</td>
                    <td>{{ $attendance->status }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer custom-card-footer-bg clearfix">
            <a href="{{ route('admin.attendances.index') }}" class="btn btn-sm btn-secondary float-right">View All
              Attendances</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <!-- Left col -->
      <div class="col-md-6">
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
          <div class="card-header border-transparent custom-card-header-bg">
            <h3 class="card-title">Latest Projects</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Project</th>
                    <th>Deadline</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allPreject as $key => $preject)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $preject->name }}</td>
                    <td>{{ $preject->deadline->toDateString() }}</td>
                    <td>{{ $preject->status }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer custom-card-footer-bg clearfix">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-secondary float-right">View All
              Projects</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  @else
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 border border-success">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-clock"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Present <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip"
                title="Running month total present status count"></i></span>
            <span class="info-box-number">{{ $empRunningMonthPresent }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 border border-danger">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-clock"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Absent <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip"
                title="Running month total absent status count"></i></span>
            <span class="info-box-number">{{ $empRunningMonthAbsent }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 border border-info">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-umbrella-beach"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">On Leave <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip"
                title="Running month total onleave status count"></i></span>
            <span class="info-box-number">{{ $empRunningMonthOnLeave }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3 border border-success">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-clock"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total OT. <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip"
                title="Running month total overtime"></i></span>
            <span class="info-box-number">{{ $empRunningMonthOvertime }} TK</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-6">
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
          <div class="card-header border-transparent custom-card-header-bg">
            <h3 class="card-title">Latest Tasks</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Project</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($employeeTaskLish as $key => $task)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->status }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer custom-card-footer-bg clearfix">
            <a href="{{ route('employee.tasks.index') }}" class="btn btn-sm btn-secondary float-right">View All
              Tasks</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
          <div class="card-header border-transparent custom-card-header-bg">
            <h3 class="card-title">Latest Events</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Time</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($eventList as $key => $event)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->start->toDateString() }}</td>
                    <td>{{ $event->start->toTimeString() }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer custom-card-footer-bg clearfix">
            <a href="{{ route('employee.events.index') }}" class="btn btn-sm btn-secondary float-right">View All
              Events</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
  </div>
  @endif

  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection
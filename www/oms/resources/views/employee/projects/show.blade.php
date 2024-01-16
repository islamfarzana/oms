@extends('layouts.admin')

@section('content')
<style>
    .from-group dt,
    .from-group dd {
        font-size: 14px;
        margin-bottom: 20px;
        color: #484848e8;
    }

    .from-group dt {
        text-transform: uppercase;
        font-weight: 700;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">
                    {{ __('Project Details') }}
                    <span class="float-right">
                        <a href="{{ route('employee.projects.index') }}" class="btn btn-sm"><i
                                class="text-light fas fa-arrow-left"></i></a>
                    </span>
                </div>

                <div class="card-body py-0">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4 border-right bg-white pt-4 pb-3" style="padding-right: 20px">
                            @if(count($member) == 0)
                            <div class="card-body text-center text-muted">
                                <h6>No team member found.</h6>
                            </div>
                            @else
                            @foreach ($member as $item)
                            @if ($item->team_leader == "1")
                            <div class="col-12">
                                <label for="employee_id"
                                    class="col-form-label font-weight-bold text-muted text-uppercase">{{ __('Team Leader') }}</label>
                                <hr class="mt-0" />
                            </div>
                            <div class="info-box" style="max-height: 60px; min-height: auto">
                                <span class="info-box-icon" style="width:50px">
                                    <img src="{{ asset('storage/user/image/'.$item->employee->image) }}" width="50"
                                        height="50" alt="Image">
                                </span>

                                <div class="info-box-content text-muted small text-uppercase">
                                    <span class="info-box-text">
                                        <label class="pl-1">{{ $item->employee->name }}</label>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="col-12">
                                <label for="employee_id"
                                    class="col-form-label font-weight-bold text-muted text-uppercase">{{ __('Team member') }}</label>
                                <hr class="mt-0" />
                            </div>
                            @else
                            <div class="info-box" style="max-height: 60px; min-height: auto">
                                <span class="info-box-icon" style="width:50px">
                                    <img src="{{ asset('storage/user/image/'.$item->employee->image) }}" width="50"
                                        height="50" alt="Image">
                                </span>

                                <div class="info-box-content text-muted small text-uppercase">
                                    <span class="info-box-text">
                                        <label class="pl-1">{{ $item->employee->name }}</label>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>

                        <div class="col-12 offset-md-1 col-md-7 pt-4 pb-3">
                            <div class="from-group row">
                                <dt class="col-4">Name</dt>
                                <dd class="col-7 offset-1">{{ $project->name }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Description</dt>
                                <dd class="col-7 offset-1">{{ $project->description }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Project Started</dt>
                                <dd class="col-7 offset-1">{{ $project->date_assigned->toDateString() }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Deadline</dt>
                                <dd class="col-7 offset-1"><span @if ($project->deadline->toDateString() < date('Y-m-d')
                                            && $project->status == "On Going" ||
                                            $project->deadline->toDateString() < date('Y-m-d') && $project->status ==
                                                "Pending")
                                                class="bg-warning px-2 rounded"
                                                @endif>{{ $project->deadline->toDateString() }}</span></dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Client Company</dt>
                                <dd class="col-7 offset-1">{{ $project->company }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Status</dt>
                                <dd class="col-7 offset-1"><span @if($project->status == 'Completed') class="bg-success
                                        px-2
                                        rounded"
                                        @elseif($project->status == 'Canceled') class="bg-danger px-2 rounded"
                                        @else class="bg-warning px-2 rounded"
                                        @endif>{{ $project->status }}</span></dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
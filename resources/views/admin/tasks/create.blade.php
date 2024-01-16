@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card alert-light">
                <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">
                    {{ __('Add new Task') }}
                    <span class="float-right">
                        <a href="{{ route('admin.tasks.show', $project->id) }}" class="btn btn-sm"><i
                                class="text-light fas fa-arrow-left"></i></a>
                    </span>
                </div>

                <div class="card-body">
                    <form class="form-prevent" method="POST" action="{{ route('admin.tasks.store') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <select id="project_id" class="form-control @error('project_id') is-invalid @enderror"
                                    name="project_id" required>
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                </select>

                                @error('project_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <input id="title" type="text" placeholder="Task"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <select id="employee_id" class="form-control @error('employee_id') is-invalid @enderror"
                                    name="employee_id" required>
                                    <option value="" style="display: none">Select Employee</option>
                                    @foreach ($availableTeams as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                @error('employee_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_assigned"
                                class="col-8 offset-2 col-form-label text-muted">{{ __('Date Assigned') }}</label><br>
                            <div class="col-8 offset-2">
                                <input id="date_assigned" type="date"
                                    class="form-control @error('date_assigned') is-invalid @enderror"
                                    name="date_assigned" value="{{ old('date_assigned') }}" required
                                    autocomplete="date_assigned" autofocus>

                                @error('date_assigned')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name"
                                class="col-8 offset-2 col-form-label text-muted">{{ __('Deadline') }}</label><br>
                            <div class="col-8 offset-2">
                                <input id="deadline" type="date"
                                    class="form-control @error('deadline') is-invalid @enderror" name="deadline"
                                    value="{{ old('deadline') }}" required autocomplete="deadline" autofocus>

                                @error('deadline')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

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
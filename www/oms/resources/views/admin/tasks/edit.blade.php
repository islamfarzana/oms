@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card alert-light">
                <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">
                    {{ __('Edit Task') }}
                    <span class="float-right">
                        <a href="{{ route('admin.tasks.show', $task->project_id) }}" class="btn btn-sm"><i
                                class="text-light fas fa-arrow-left"></i></a>
                    </span>
                </div>

                <div class="card-body">
                    <form class="form-prevent" method="POST" action="{{ route('admin.tasks.update', $task->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <select id="project_id" class="form-control @error('project_id') is-invalid @enderror"
                                    name="project_id" required>
                                    <option value="{{ $task->project->id }}">{{ $task->project->name }}</option>
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
                                    value="{{ old('title', optional($task)->title) }}" required autocomplete="title"
                                    autofocus>

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
                                    <option value="{{ $item->id }}" @if ($item->id == $task->employee_id)
                                        selected
                                        @endif>{{ $item->name }}</option>
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
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <input id="date_assigned" type="date" placeholder="Assigned date"
                                    class="form-control @error('date_assigned') is-invalid @enderror"
                                    name="date_assigned"
                                    value="{{ old('date_assigned', optional($task)->date_assigned->toDateString()) }}"
                                    required autocomplete="date_assigned" autofocus>

                                @error('date_assigned')
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
                                <input id="deadline" type="date" placeholder="Deadline"
                                    class="form-control @error('deadline') is-invalid @enderror" name="deadline"
                                    value="{{ old('deadline', optional($task)->deadline->toDateString()) }}" required
                                    autocomplete="deadline" autofocus>

                                @error('deadline')
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
                                <select id="status" class="form-control @error('status') is-invalid @enderror"
                                    name="status" required>
                                    <option value="" style="display: none">Current Status</option>
                                    <option value="Not Completed" @if ($task->status == "Not Completed")
                                        selected
                                        @endif>Not Completed</option>
                                    <option value="Completed" @if ($task->status == "Completed")
                                        selected
                                        @endif>Completed</option>
                                </select>

                                @error('status')
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
                                <select id="rating" class="form-control @error('rating') is-invalid @enderror"
                                    name="rating">
                                    <option value="0">No ratings</option>
                                    <option value="1" @if ($task->rating == "1") selected @endif>&#x2605;</option>
                                    <option value="2" @if ($task->rating == "2") selected @endif>&#x2605; &#x2605;
                                    </option>
                                    <option value="3" @if ($task->rating == "3") selected @endif>&#x2605; &#x2605;
                                        &#x2605;</option>
                                    <option value="4" @if ($task->rating == "4") selected @endif>&#x2605; &#x2605;
                                        &#x2605; &#x2605;</option>
                                    <option value="5" @if ($task->rating == "5") selected @endif>&#x2605; &#x2605;
                                        &#x2605; &#x2605; &#x2605;</option>
                                </select>

                                @error('rating')
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
                                <textarea id="remarks" type="text" placeholder="Remarks"
                                    class="form-control @error('remarks') is-invalid @enderror" name="remarks" required
                                    autocomplete="remarks" autofocus>{{ $task->remarks }}</textarea>

                                @error('remarks')
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
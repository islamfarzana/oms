@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">Edit Basic
                Salary
                <span class="float-right">
                    <a href="{{ route('admin.basic_salaries.index') }}" class="btn btn-sm"><i
                            class="text-light fas fa-arrow-left"></i></a>
                </span>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form class="form-prevent" action="{{ route('admin.basic_salaries.update', $basic_salary->id)}}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="employee_id"
                            class="col-8 offset-2 col-form-label text-md-left text-muted">Employee</label>
                        <div class="col-8 offset-2">
                            <input id="employee_id" type="text"
                                class="form-control @error('salary') is-invalid @enderror" name="employee_id"
                                value="{{ $basic_salary->employee->name }}" required disabled autofocus>

                            @error('employee_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="salary" class="col-8 offset-2 col-form-label text-md-left text-muted">Salary</label>

                        <div class="col-8 offset-2">
                            <input id="salary" type="text" class="form-control @error('salary') is-invalid @enderror"
                                name="salary" value="{{ $basic_salary->salary }}" required autofocus>

                            @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="overtime_rate"
                            class="col-8 offset-2 col-form-label text-md-left text-muted">Overtime Rate </label>

                        <div class="col-8 offset-2">
                            <input id="overtime_rate" type="number"
                                class="form-control @error('overtime_rate') is-invalid @enderror" name="overtime_rate"
                                value="{{ $basic_salary->overtime_rate }}" required autofocus>

                            @error('overtime_rate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-8 offset-2">
                            <button type="submit" class="btn btn-secondary text-uppercase w-100 button-prevent">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card alert-light">
                <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">Edit Employee
                    <span class="float-right">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-sm"><i
                                class="text-light fas fa-arrow-left"></i></a>
                    </span>
                </div>
                <div class="card-body">
                    <form class="form-prevent" action="{{ route('admin.employees.update', $employees->id) }}"
                        method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <input id="name" type="text" placeholder="Name"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $employees->name }}" required autocomplete="name" autofocus>

                                @error('name')
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
                                <select class="form-control @error('gender') is-invalid @enderror" id="gender"
                                    name="gender" required="true">
                                    <option value="" style="display: none;" disabled selected class="text-muted">Gender
                                    </option>
                                    <option value="Female" @if ($employees->gender == 'Female') selected @endif>Female
                                    </option>
                                    <option value="Male" @if ($employees->gender == 'Male') selected @endif>Male
                                    </option>
                                    <option value="Others" @if ($employees->gender == 'Others') selected @endif>Others
                                    </option>

                                </select>
                                @error('gender')
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
                                <input id="address" type="text" placeholder="Address"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ $employees->address }}" required autocomplete="address" autofocus>

                                @error('address')
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
                                <input id="nid" type="text" placeholder="NID"
                                    class="form-control @error('nid') is-invalid @enderror" name="nid"
                                    value="{{ $employees->nid }}" required autocomplete="nid" autofocus>

                                @error('nid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_of_birth"
                                class="col-8 offset-2 text-muted">{{ __('Date of Birth') }}</label>


                            <div class="col-8 offset-2">
                                <input id="date_of_birth" type="date" placeholder="Date of Birth"
                                    class="form-control @error('date_of_birth') is-invalid @enderror"
                                    name="date_of_birth" value="{{ $employees->date_of_birth->toDateString() }}"
                                    required autocomplete="date_of_birth" autofocus>

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="nationality" class="col-md-4 col-form-label text-md-right">Nationality</label> --}}

                            <div class="col-8 offset-2">
                                <input id="nationality" type="text" placeholder="Nationality"
                                    class="form-control @error('nationality') is-invalid @enderror" name="nationality"
                                    value="{{ $employees->nationality }}" required autofocus>

                                @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-8 offset-2 col-form-label text-muted">Image</label>

                            <div class="col-8 offset-2">
                                <input id="image" type="file" placeholder="image"
                                    class="form-control @error('image') is-invalid @enderror" name="image" value=""
                                    autofocus>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-8 offset-2">
                                <img class="img-thumbnail" src="{{ asset('storage/user/image/'.$employees->image) }}"
                                    alt="avatar" style="width: 150px">
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="status" class="col-md-4 col-form-label text-md-right">Status</label> --}}

                            <div class="col-8 offset-2">
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status" required="true">
                                    <option value="" style="display: none;" disabled selected>Status</option>
                                    <option value="Active" @if ($employees->status == 'Active') selected @endif>Active
                                    </option>
                                    <option value="Inactive" @if ($employees->status == 'Inactive') selected
                                        @endif>Inactive</option>

                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="enrolment_date" class="col-8 offset-2 col-form-label text-muted">Enrolment
                                Date</label> <br>

                            <div class="col-8 offset-2">
                                <input id="enrolment_date" type="date" placeholder="Enrolment Date"
                                    class="form-control @error('enrolment_date') is-invalid @enderror"
                                    name="enrolment_date" value="{{ $employees->enrolment_date->toDateString() }}"
                                    required autofocus>

                                @error('enrolment_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="department_id" class="col-md-4 col-form-label text-md-right">Department</label> --}}
                            <div class="col-8 offset-2">
                                <select class="form-control @error('department_id') is-invalid @enderror"
                                    id="department_id" name="department_id" required="true">
                                    <option value="" style="display: none;" disabled selected>Select department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" @if ($employees->department_id ==
                                        $department->id)
                                        selected
                                        @endif>
                                        {{ $department->name }}
                                    </option>
                                    @endforeach
                                </select>

                                @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="designation_id" class="col-md-4 col-form-label text-md-right">Department</label> --}}
                            <div class="col-8 offset-2">
                                <select class="form-control @error('designation_id') is-invalid @enderror"
                                    id="designation_id" name="designation_id" required="true">
                                    @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}" @if ($employees->designation_id ==
                                        $designation->id)
                                        selected
                                        @endif>
                                        {{ $designation->name }} &nbsp; - &nbsp;<span"> &lt;{{ $designation->department->name }}&gt;</span>
                                    </option>
                                    @endforeach
                                </select>

                                @error('designation_id')
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
</div>
@endsection
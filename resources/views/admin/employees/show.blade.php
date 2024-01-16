@extends('layouts.admin')

@section('content')
<style>
    .from-group dt,
    .from-group dd {
        font-size: 14px;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: 700;
        color: #484848e8;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">
                    {{ __('Employee Details') }}
                    <span class="float-right">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-sm"><i
                                class="text-light fas fa-arrow-left"></i></a>
                    </span>
                </div>

                <div class="card-body py-0">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4 border-right bg-white pt-4 pb-3">
                            <div class="img-thumbnail col-12 col-md-8 mx-auto">
                                <img src="{{ asset('storage/user/image/'.$employee->image) }}" width="100%" alt="Image">
                            </div>
                            <div class="col-12 col-md-12 text-center mt-2">
                                <label>{{ $employee->name }}</label>
                            </div>
                            <div class="col-12 col-md-12 text-center">
                                <label class="font-weight-normal">{{ implode(', ', $employee->user->roles()->get()->pluck('name')->toArray()) }}</label>
                            </div>
                            <div class="text-center">
                                <span class="small text-info">
                                    @if ($rating > 0 && $rating <= 1) <span><i class="fas fa-star-half-alt"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                    @elseif ($rating > 1 && $rating <= 2) <span><i class="fas fa-star-half-alt"></i></span>
                                        <span><i class="fas fa-star-half-alt"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                    @elseif ($rating > 2 && $rating <= 3) <span><i class="fas fa-star-half-alt"></i></span>
                                        <span><i class="fas fa-star-half-alt"></i></span>
                                        <span><i class="fas fa-star-half-alt"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                    @elseif ($rating > 3 && $rating <= 4) <span><i class="fas fa-star-half-alt"></i></span>
                                        <span><i class="fas fa-star-half-alt"></i></span>
                                        <span><i class="fas fa-star-half-alt"></i></span>
                                        <span><i class="fas fa-star-half-alt"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                    @elseif ($rating > 4 && $rating <= 5) <span><i class="fas fa-star-half-alt"></i></span>
                                        <span><i class="fas fa-star-half-alt"></i></span>
                                        <span><i class="fas fa-star-half-alt"></i></span>
                                        <span><i class="fas fa-star-half-alt"></i></span>
                                        <span><i class="fas fa-star-half-alt"></i></span>
                                    @else
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                    @endif
                                </span>
                                <div class="small">Rating {{ ($rating != null) ? $rating : "0" }}: ( 1 - 5 )</div>
                            </div>
                        </div>
                        <div class="col-12 offset-md-1 col-md-7 pt-4 pb-3">
                            <div class="from-group row">
                                <dt class="col-4">Name</dt>
                                <dd class="col-7 offset-1">{{ $employee->name }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Gender</dt>
                                <dd class="col-7 offset-1">{{ $employee->gender }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Address</dt>
                                <dd class="col-7 offset-1">{{ $employee->address }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">NID</dt>
                                <dd class="col-7 offset-1">{{ $employee->nid }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Date Of Birth</dt>
                                <dd class="col-7 offset-1">{{ $employee->date_of_birth->toDateString() }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Nationality</dt>
                                <dd class="col-7 offset-1">{{ $employee->nationality }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Status</dt>
                                <dd class="col-7 offset-1">{{ $employee->status }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Enrolment Date</dt>
                                <dd class="col-7 offset-1">{{ $employee->enrolment_date->toDateString() }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Department</dt>
                                <dd class="col-7 offset-1">{{ $employee->department->name }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Designation</dt>
                                <dd class="col-7 offset-1">{{ $employee->designation->name }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Date Added</dt>
                                <dd class="col-7 offset-1">{{ $employee->created_at->toDateString() }}</dd>
                            </div>
                            <div class="from-group row">
                                <dt class="col-4">Last Updated</dt>
                                <dd class="col-7 offset-1">{{ $employee->updated_at->toDateString() }}</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
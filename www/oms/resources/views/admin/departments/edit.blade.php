@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card alert-light">
                <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">Edit
                    Department
                    <span class="float-right">
                        <a href="{{ route('admin.departments.index') }}" class="btn btn-sm"><i
                                class="fas fa-arrow-left text-light"></i></a>
                    </span>
                </div>
                <div class="card-body">
                    <form class="form-prevent" action="{{ route('admin.departments.update', $departments->id) }}"
                        method="POST">

                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <input id="name" type="text" value="{{ old('name', optional($departments)->name) }}"
                                    placeholder="Name" class="form-control @error('name') is-invalid @enderror"
                                    name="name" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-8 offset-2">
                                <button type="submit" class="btn btn-secondary text-uppercase w-100 ">
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
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card alert-light">
                <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">Edit role
                    <span class="float-right">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-sm"><i
                                class="text-light fas fa-arrow-left"></i></a>
                    </span>
                </div>

                <div class="card-body">
                    <form class="form-prevent" action="{{ route('admin.users.update', $users->id) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <select class="form-control @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id"
                                    required="true">
                                    <option value="{{ $users->employee->id }}" selected class="text-muted">{{  $users->employee->name }}</option>
                                </select>

                                @error('employee_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <input id="email" type="email" value="{{ $users->email }}" placeholder="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <input id="password" type="password" placeholder="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" autocomplete="password" autofocus>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="roles"
                                class="col-md-4 col-form-label font-weight-bold text-md-right">{{ __('Role : ') }}</label>
                            @foreach ($roles as $item)
                            <div class="from-check pt-2 pr-2">
                                <input type="checkbox" name="roles[]" value="{{ $item->id }}"
                                    @if($users->roles->pluck('id')->contains($item->id))
                                checked
                                @endif>
                                <label>{{ $item->name }}</label>

                            </div>
                            @endforeach

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
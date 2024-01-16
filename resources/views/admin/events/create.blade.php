@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card alert-light">
                <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">
                    {{ __('Add new Event') }}
                    <span class="float-right">
                        <a href="{{ route('admin.events.index') }}" class="btn btn-sm"><i
                                class="text-light fas fa-arrow-left"></i></a>
                    </span>
                </div>

                <div class="card-body">
                    <form class="form-prevent" method="POST" action="{{ route('admin.events.store') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <input id="title" type="text" placeholder="Title"
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
                            {{-- <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <input id="start" type="datetime-local"
                                    class="form-control @error('start') is-invalid @enderror" name="start"
                                    value="{{ old('start') }}" required autocomplete="start" autofocus>

                                @error('start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <input id="end" type="datetime-local" placeholder="end"
                                    class="form-control @error('end') is-invalid @enderror" name="end"
                                    value="{{ old('end') }}" autocomplete="end" autofocus>

                                @error('end')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <select class="form-control @error('backgroundbackgroundColor') is-invalid @enderror"
                                    id="backgroundColor" name="backgroundColor">
                                    <option value="" style="display: none;" disabled selected class="text-muted">Background Color</option>
                                    <option value="">Default</option>
                                    <option value="white">White</option>
                                    <option value="red">Red</option>
                                    <option value="green">Green</option>
                                    <option value="blue">Blue</option>
                                    <option value="yellow">Yellow</option>
                                    <option value="brown">Brown</option>
                                    <option value="purple">Purple</option>
                                    <option value="deeppink">Deep Pink</option>

                                </select>

                                @error('backgroundColor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="start" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <textarea id="description" type="text" placeholder="description"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    autocomplete="description" autofocus></textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-8 offset-2">
                                <button type="submit" class="btn btn-secondary text-uppercase w-100 button-prevent">
                                    {{ __('Create') }}
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
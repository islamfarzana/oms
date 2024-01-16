@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card alert-light">
                <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">
                    {{ __('Update Event') }}
                    <span class="float-right">
                        <a href="{{ route('admin.events.index') }}" class="btn btn-sm"><i
                                class="text-light fas fa-arrow-left"></i></a>
                    </span>
                </div>

                <div class="card-body">
                    <form class="form-prevent" method="POST" action="{{ route('admin.events.update', $event->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            {{-- <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <input id="title" type="text" placeholder="Title"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title', optional($event)->title) }}" required autocomplete="title"
                                    autofocus>

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
                                    value="{{ old('start', optional($event)->start->format("Y-m-d\Th:i")) }}" required
                                    autocomplete="start" autofocus>

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
                                    class="form-control @error('end') is-invalid @enderror" name="end" value="@if ($event->end != null)
                                        {{ $event->end->toDateString() }}
                                        @else {{ old('end') }}" @endif autocomplete="end" autofocus>

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
                                <select class="form-control @error('backgroundColor') is-invalid @enderror"
                                    id="backgroundColor" name="backgroundColor">
                                    <option value="" style="display: none;" disabled selected class="text-muted">Choose
                                        Background Color</option>
                                    <option value="" @if ($event->backgroundColor == null)
                                        selected
                                        @endif>Default color</option>
                                    <option value="white" @if ($event->backgroundColor == "white")
                                        selected
                                        @endif>White</option>
                                    <option value="red" @if ($event->backgroundColor == "red")
                                        selected
                                        @endif>Red</option>
                                    <option value="green" @if ($event->backgroundColor == "green")
                                        selected
                                        @endif>Green</option>
                                    <option value="blue" @if ($event->backgroundColor == "blue")
                                        selected
                                        @endif>Blue</option>
                                    <option value="yellow" @if ($event->backgroundColor == "yellow")
                                        selected
                                        @endif>Yellow</option>
                                    <option value="brown" @if ($event->backgroundColor == "brown")
                                        selected
                                        @endif>Brown</option>
                                    <option value="purple" @if ($event->backgroundColor == "purple")
                                        selected
                                        @endif>Purple</option>
                                    <option value="deeppink" @if ($event->backgroundColor == "deeppink")
                                        selected
                                        @endif>Deep Pink</option>

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
                                    autocomplete="description"
                                    autofocus>{{ old('description', optional($event)->description) }}</textarea>

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
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card alert-light">
                <div class="card-header text-center bg-secondary text-light font-weight-bold text-uppercase">
                    {{ __('Edit Project') }}
                    <span class="float-right">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-sm"><i
                                class="text-light fas fa-arrow-left"></i></a>
                    </span>
                </div>

                <div class="card-body">
                    <form class="form-prevent" method="POST"
                        action="{{ route('admin.projects.update', $project->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            --}}

                            <div class="col-8 offset-2">
                                <input id="name" type="text" placeholder="Name"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', optional($project)->name) }}" required autocomplete="name"
                                    autofocus>

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
                                <input id="description" type="text" placeholder="Description"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description', optional($project)->description) }}" required
                                    autocomplete="description" autofocus>

                                @error('description')
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
                                <input id="date_assigned" type="date" placeholder="Date Assigned"
                                    class="form-control @error('date_assigned') is-invalid @enderror"
                                    name="date_assigned"
                                    value="{{ old('date_assigned', optional($project)->date_assigned->toDateString()) }}"
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
                                    value="{{ old('deadline', optional($project)->deadline->toDateString()) }}" required
                                    autocomplete="deadline" autofocus>

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
                                <input id="company" type="text" placeholder="Company"
                                    class="form-control @error('company') is-invalid @enderror" name="company"
                                    value="{{ old('company', optional($project)->company) }}" required
                                    autocomplete="company" autofocus>

                                @error('company')
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
                                    <option value="Completed" @if ($project->status == "Completed")
                                        selected
                                        @endif>Completed</option>
                                    <option value="On going" @if ($project->status == "On going")
                                        selected
                                        @endif>On going</option>
                                    <option value="Pending" @if ($project->status == "Pending")
                                        selected
                                        @endif>Pending</option>
                                    <option value="Canceled" @if ($project->status == "Canceled")
                                        selected
                                        @endif>Canceled</option>
                                </select>

                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row py-5">
                            <div class="col-12">
                                <label for="employee_id"
                                    class="col-form-label font-weight-bold text-muted text-uppercase">{{ __('Select team member') }}</label>
                                <hr class="mt-0" />
                            </div>
                            @foreach ($availableTeams as $item)
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="info-box">
                                    <span class="info-box-icon img-thumbnail" style="width:66px">
                                        <img src="{{ asset('storage/user/image/'.$item->image) }}" width="50"
                                            height="50" alt="Image">
                                    </span>

                                    <div class="info-box-content text-muted small text-uppercase">
                                        <span class="info-box-text">
                                            <input type="checkbox" name="employee_id[]" value="{{ $item->id }}"
                                                @foreach($assignedMember as $team) @if ( $team==$item->id )
                                            checked
                                            @endif
                                            @if ($project->status == "Canceled" || $project->status == "Completed")
                                                disabled
                                            @endif
                                            @endforeach>
                                            <label class="pl-1">{{ $item->name }}</label>
                                        </span>
                                        <span class="info-box-number" class="team_leader">
                                            <input type="radio" name="team_leader" value="{{ $item->id }}" id="1"
                                                @if($item->id == $leader)
                                            checked
                                            @endif
                                            @if ($project->status == "Canceled" || $project->status == "Completed")
                                                disabled
                                            @endif>
                                            <label class="pl-1">Team Leader</label>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            @endforeach
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
<script>
    $(document).ready(function(){
        alert(jQuery);
        $('.team_leader :checkbox').click(function() {
            alert('asdfs');
            var $checkbox = $(this), checked = $checkbox.is(':checked');
            $checkbox.closest('.optionBox').find(':checkbox').prop('disabled', checked);
            $checkbox.prop('disabled', false);
        });
    });
</script>
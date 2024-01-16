@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('User Records') }}
                        <div class="btn-group float-right">
                            <a href="{{ route('register') }}" class="btn btn-lg"><i class="far fa-plus-square"></i></a>
                        </div>
                    </div>
                </h5>
                <div class="card-body">
                    <table class="table table-striped dTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                            <tr @if (Auth::user()->employee_id == $item->employee_id) class="text-muted" @endif>
                                <td scope='row'>{{ $key+1 }}</td>
                                <td>{{ $item->employee->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $role = implode(', ', $item->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm float-right" @if ($role=="admin" ) hidden @endif>
                                        <a href="{{ route('admin.users.edit', $item->id ) }}" class="btn btn-sm mr-2"
                                            role="button" aria-disabled="true"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.users.destroy', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm"
                                                onclick="return confirm('Confirm deletion?')"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
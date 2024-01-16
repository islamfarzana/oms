@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Designation Records') }}
                        <div class="btn-group float-right">
                            <a href="{{ route('admin.designations.create') }}" class="btn btn-lg"><i
                                    class="far fa-plus-square"></i></a>
                        </div>
                    </div>
                </h5>

                <div class="card-body">
                    <table class="table table-striped dTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Designation Name</th>
                                <th scope="col">Department</th>
                                <th scope="col" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designations as $key => $item)
                            <tr>
                                <td scope='row'>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->department->name }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm float-right">
                                        <a href="{{ route('admin.designations.edit', $item->id ) }}"
                                            class="btn btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.designations.destroy', $item) }}" method="POST">
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
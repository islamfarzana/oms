@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Employee List') }}
                    </div>
                </h5>

                <div class="card-body">
                    <table class="table table-striped dTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Image</th>
                                <th scope="col" class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $key => $item)
                            <tr>
                                <td scope='row'>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->department->name }}</td>
                                <td>{{ $item->designation->name }}</td>
                                <td><img src="{{ asset('storage/user/image/'.$item->image) }}" width="50" alt="Image">
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
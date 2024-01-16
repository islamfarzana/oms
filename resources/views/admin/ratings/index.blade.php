@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Employee Rating') }}
                    </div>
                </h5>

                <div class="card-body">
                    <table class="table table-striped dTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Ratings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ratings as $key => $item)
                            <tr>
                                <td scope='row'>{{ $key+1 }}</td>
                                <td>{{ $item->employee->name }}</td>
                                <td>{{ $item->employee->designation->name }}</td>
                                <td>
                                    <span class="small text-info">
                                        @if ($item->average > 0 && $item->average <= 1) <span><i
                                                class="fas fa-star-half-alt"></i></span>
                                    <span class="text-muted"><i class="far fa-star"></i></span>
                                    <span class="text-muted"><i class="far fa-star"></i></span>
                                    <span class="text-muted"><i class="far fa-star"></i></span>
                                    <span class="text-muted"><i class="far fa-star"></i></span>
                                    @elseif ($item->average > 1 && $item->average <= 2) <span><i
                                            class="fas fa-star-half-alt"></i></span>
                                        <span><i class="fas fa-star-half-alt"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        <span class="text-muted"><i class="far fa-star"></i></span>
                                        @elseif ($item->average > 2 && $item->average <= 3) <span><i
                                                class="fas fa-star-half-alt"></i></span>
                                            <span><i class="fas fa-star-half-alt"></i></span>
                                            <span><i class="fas fa-star-half-alt"></i></span>
                                            <span class="text-muted"><i class="far fa-star"></i></span>
                                            <span class="text-muted"><i class="far fa-star"></i></span>
                                            @elseif ($item->average > 3 && $item->average <= 4) <span><i
                                                    class="fas fa-star-half-alt"></i></span>
                                                <span><i class="fas fa-star-half-alt"></i></span>
                                                <span><i class="fas fa-star-half-alt"></i></span>
                                                <span><i class="fas fa-star-half-alt"></i></span>
                                                <span class="text-muted"><i class="far fa-star"></i></span>
                                                @elseif ($item->average > 4 && $item->average <= 5) <span><i
                                                        class="fas fa-star-half-alt"></i></span>
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
                                                    <span class="small">&nbsp; Rating {{ $item->average }}: ( 1 - 5
                                                        )</span>
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
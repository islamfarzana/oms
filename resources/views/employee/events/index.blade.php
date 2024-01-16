@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5>
                    <div class="card-header text-center">
                        {{ __('Event Records') }}
                    </div>
                </h5>

                <div class="card-body">
                    <div id="calendar"></div>
                    <table class="table table-striped dTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Color</th>
                                <th scope="col">Event Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $key => $item)
                            <tr>
                                <td scope='row'>{{ $key+1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->start }}</td>
                                <td>{{ $item->end }}</td>
                                <td>{{ ($item->backgroundColor == null) ? "default" : $item->backgroundColor }}</td>
                                <td>{{ $item->description }}</td>
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

@section('script')

@endsection
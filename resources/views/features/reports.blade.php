@extends('dashboard.admin.home')

@section('title', '| Reports')
@section('sub-content')
    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <div class="row">
            <div class="h3">View Reports</div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        @if (Auth::user()->user_role === 1 || Auth::user()->user_role === 3)
                            <th scope="col">Name</th>
                        @endif
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Location</th>
                        <th scope="col">Timestamp</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        @if ($report->user_id === Auth::user()->id && Auth::user()->user_role === 4)
                            <tr>
                                <th scope="row">{{ $report->title }}</th>
                                <td>{{ $report->loc_img }}</td>
                                <td>{{ $report->description }}</td>
                                <td>{{ $report->status }}</td>
                                <td>{{ $report->loc_lng . ' ' . $report->loc_lat }}</td>
                                <td>{{ $report->created_at }}</td>
                                <td>
                                    <form action="/user/reports/{{ $report->id }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @elseif (Auth::user()->user_role === 1 || Auth::user()->user_role === 3)
                            <tr>
                                <th scope="row">{{ $report->full_name }}</th>
                                <td>{{ $report->title }}</td>
                                <td>{{ $report->loc_img }}</td>
                                <td>{{ $report->description }}</td>
                                <td>{{ $report->status }}</td>
                                <td>{{ $report->loc_lng . ' ' . $report->loc_lat }}</td>
                                <td>{{ $report->created_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            @if (Auth::user()->user_role === 4)
                                                <form action="/user/reports/{{ $report->id }}" method="POST">
                                                @elseif (Auth::user()->user_role === 1)
                                                    <form action="/admin/reports/{{ $report->id }}" method="POST">
                                                    @elseif (Auth::user()->user_role === 3)
                                                        <form action="/brgy_official/reports/{{ $report->id }}"
                                                            method="POST">
                                            @endif
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                        <div class="col-2" style="margin-top: -1.5px">
                                            @if (Auth::user()->user_role === 1)
                                                <form action="/admin/reports/pending/{{ $report->id }}" method="POST">
                                                @elseif (Auth::user()->user_role === 3)
                                                    <form action="/brgy_official/reports/pending/{{ $report->id }}"
                                                        method="POST">
                                            @endif
                                            @csrf
                                            @method("POST")
                                            <button class="btn btn-warning"><i class="fas fa-clock"></i></i></button>
                                            </form>
                                        </div>
                                        <div class="col-2">
                                            @if (Auth::user()->user_role === 1)
                                                <form action="/admin/reports/confirm/{{ $report->id }}" method="POST">
                                                @elseif (Auth::user()->user_role === 3)
                                                    <form action="/brgy_official/reports/confirm/{{ $report->id }}"
                                                        method="POST">
                                            @endif
                                            @csrf
                                            @method("POST")
                                            <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

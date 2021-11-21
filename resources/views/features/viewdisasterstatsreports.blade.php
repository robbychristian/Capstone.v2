@extends('layouts.master')

@section('title', '| Disaster Statistical Reports')
@section('content')
    <div class="container-fluid" style="color: black;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Disaster Statistical Reports</h1>

            @if (Auth::user()->user_role === 3)
                <a href="{{ route('brgy_official.stats.create') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Create a
                    Disaster Statistical Reports</a>

            @elseif (Auth::user()->user_role === 1)
                <a href="{{ route('admin.stats.create') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Create a
                    Disaster Statistical Reports</a>
            @endif

        </div>

        @if (Session::get('success'))
            <div class="alert alert-success mt-3">
                {{ Session::get('success') }}
            </div>

        @endif

        @if (count($disasterstats) > 0)
            <div class="table-responsive mt-5">
                <table class="table table-hover">
                    <thead style="background-color: #004f91;">
                        <tr>
                            <th scope="col" style="color: white;">Created At</th>
                            <th scope="col" style="color: white;">Month of Disaster</th>
                            <th scope="col" style="color: white;">Year of Disaster</th>
                            <th scope="col" style="color: white;">Type of Disaster</th>
                            <th scope="col" style="color: white;">Barangay</th>
                            <th scope="col" style="color: white;">Families Affected</th>
                            <th scope="col" style="color: white;">Individuals Affected</th>
                            <th scope="col" style="color: white;">Evacuees</th>
                            <th scope="col" style="color: white;" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($disasterstats as $disaster)
                            <tr>
                                <th scope="row">{{ date('F d, Y', strtotime($disaster->created_at)) }}</th>
                                <td>{{ $disaster->month_disaster }}</td>
                                <td>{{ $disaster->year_disaster }}</td>
                                <td>{{ $disaster->type_disaster }}</td>
                                <td>{{ $disaster->barangay }}</td>
                                <td>{{ $disaster->families_affected }}</td>
                                <td>{{ $disaster->individuals_affected }}</td>
                                <td>{{ $disaster->evacuees }}</td>

                                @if (Auth::user()->user_role === 3)
                                    <td><a href="/brgy_official/stats/{{ $disaster->id }}/edit">
                                            <button class="btn btn-success">Edit</button>
                                        </a></td>
                                    <td>
                                        <form action="/brgy_official/stats/{{ $disaster->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                @elseif (Auth::user()->user_role === 1)
                                    <td><a href="/admin/stats/{{ $disaster->id }}/edit">
                                            <button class="btn btn-success">Edit</button>
                                        </a></td>
                                    <td>
                                        <form action="/admin/stats/{{ $disaster->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                @endif

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @else
            <div class="card mt-3">
                <div class="card-body" style="font-weight: 400; font-size: 1rem;">
                    There are no disaster statistical reports to show.
                </div>
            </div>
        @endif




    </div>


@endsection

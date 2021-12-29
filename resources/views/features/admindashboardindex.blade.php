@extends('layouts.master')
@section('title', '| Dashboard')
@section('content')

    <div class="container-fluid" style="color: black;">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="{{ route('admin.generate.index') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="row mt-3">

            @foreach ($barangays as $barangay)
                <div class="col-sm-6 mb-3">
                    <div class="card text-center">
                        <div class="card-body border-left-primary">
                            <h5 class="card-title">{{ $barangay->brgy_loc }}</h5>
                            <p class="card-text">View the Disaster Statistics Report of {{ $barangay->brgy_loc }}
                            </p>
                            <a href="/admin/dashboard/brgy/{{ $barangay->brgy_loc }}" class="btn btn-primary"><i
                                    class="fas fa-search"></i>
                                View
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach



        </div>
    </div>
@endsection

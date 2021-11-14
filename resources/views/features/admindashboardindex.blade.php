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

            <div class="col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Barangay Dela Paz</h5>
                        <p class="card-text">View the Disaster Statistics Report of Barangay Dela Paz
                        </p>
                        <a href="/admin/dashboard/brgy/Dela Paz" class="btn btn-primary"><i class="fas fa-search"></i> View
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Barangay Manggahan</h5>
                        <p class="card-text">View the Disaster Statistics Report of Barangay Manggahan
                        </p>
                        <a href="/admin/dashboard/brgy/Manggahan" class="btn btn-primary"><i class="fas fa-search"></i>
                            View
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Barangay Maybunga</h5>
                        <p class="card-text">View the Disaster Statistics Report of Barangay Maybunga
                        </p>
                        <a href="/admin/dashboard/brgy/Maybunga" class="btn btn-primary"><i class="fas fa-search"></i> View
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Barangay Rosario</h5>
                        <p class="card-text">View the Disaster Statistics Report of Barangay Rosario
                        </p>
                        <a href="/admin/dashboard/brgy/Rosario" class="btn btn-primary"><i class="fas fa-search"></i> View
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Barangay Santolan</h5>
                        <p class="card-text">View the Disaster Statistics Report of Barangay Santolan
                        </p>
                        <a href="/admin/dashboard/brgy/Santolan" class="btn btn-primary"><i class="fas fa-search"></i> View
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

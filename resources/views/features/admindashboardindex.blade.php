@extends('dashboard.admin.home')

@section('title', '| Dashboard')
@section('sub-content')
    <div class="col-xl-10 col-lg-9 col-md-8">
        <div class="d-grid gap-2  d-lg-flex d-md-flex justify-content-md-end mt-4">
            <a class="btn btn-primary" href="{{ route('admin.generate.index') }}" role="button">Generate Report</a>
        </div>

        <div class="row mt-3">

            <div class="col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Barangay Dela Paz</h5>
                        <p class="card-text">View the Disaster Statistics Report of Barangay Dela Paz
                        </p>
                        <a href="#" class="btn btn-primary"><i class="fas fa-search"></i> View </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Barangay Manggahan</h5>
                        <p class="card-text">View the Disaster Statistics Report of Barangay Manggahan
                        </p>
                        <a href="#" class="btn btn-primary"><i class="fas fa-search"></i> View </a>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Barangay Maybunga</h5>
                        <p class="card-text">View the Disaster Statistics Report of Barangay Maybunga
                        </p>
                        <a href="#" class="btn btn-primary"><i class="fas fa-search"></i> View </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Barangay Rosario</h5>
                        <p class="card-text">View the Disaster Statistics Report of Barangay Rosario
                        </p>
                        <a href="#" class="btn btn-primary"><i class="fas fa-search"></i> View </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Barangay Santolan</h5>
                        <p class="card-text">View the Disaster Statistics Report of Barangay Santolan
                        </p>
                        <a href="#" class="btn btn-primary"><i class="fas fa-search"></i> View </a>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

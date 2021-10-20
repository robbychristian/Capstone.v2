@extends('dashboard.admin.home')

@section('title', '| Barangay Manggahan')
@section('sub-content')

    <div class="col-xl-10 col-lg-9 col-md-8">

        <div class="d-grid gap-2  d-lg-flex d-md-flex justify-content-md-end mt-4">
            <a class="btn btn-primary" href="/lgu/generate" role="button">Generate Report</a>
        </div>
        <h3>Barangay Manggahan</h3>
        <div class="card mt-3" style="position: relative; height:50vh;">
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="card mt-3" style="position: relative; height:50vh;">
            <div class="card-body">
                <canvas id="indivChart"></canvas>
            </div>
        </div>

        <div class="card mt-3" style="position: relative; height:50vh;">
            <div class="card-body">
                <canvas id="evacChart"></canvas>
            </div>
        </div>
    </div>

    @include('dashboard.LGU.charts')

@endsection

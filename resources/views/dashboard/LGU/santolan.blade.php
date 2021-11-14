@extends('layouts.master')
@section('title', '| Barangay Santolan')
@section('content')

    <div class="container-fluid" style="color: black;">


        <div class="d-grid gap-2  d-lg-flex d-md-flex justify-content-md-end mt-4">
            <a class="btn btn-primary" href="/lgu/generate/{{ $barangay }}" role="button">Generate Report</a>
        </div>
        <h1 class="h3 mb-0 text-gray-800">{{ $barangay }}</h1>
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

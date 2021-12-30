@extends('layouts.master')

@section('title', '| Disaster Statistical Reports')
@section('content')
    <!-- comments: fix design // continue fixing edit report // fix generate report -->
    <div class="container-fluid" style="color: black;">
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm active mb-3" role="button"
            aria-pressed="true">Back</a>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">

                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card border-bottom-warning h-100">
                            <div class="card-body">

                                <div class="content mb-2">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4" style="font-weight: 500;">Type:</div>
                                                <div class="col-sm-8 col-md-8"> {{ $disasterstats->type_disaster }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="row">
                                                <div class="col-sm-4" style="font-weight: 500;">Name:</div>
                                                <div class="col-sm-8"> {{ $disasterstats->name_disaster }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="content mb-2">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4" style="font-weight: 500;">Date:</div>
                                                <div class="col-sm-8 col-md-8"> {{ $disasterstats->month_disaster }}
                                                    {{ $disasterstats->day_disaster }}, {{ $disasterstats->year_disaster }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-" style="font-weight: 500;">{{ $disasterstats->barangay }}</div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-xl-4 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Families Affected</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $disasterstats->families_affected }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-home fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Individuals Affected</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $disasterstats->individuals_affected }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-male fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Evacuees</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $disasterstats->evacuees }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-house-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>




                <div class="table-responsive">
                    <table class="table " style="color: black;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Affected Streets</th>
                                <th scope="col">Number of Families Affected</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($affectedstreets as $affectedstreet)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $affectedstreet->affected_streets }}</td>
                                    <td>{{ $affectedstreet->number_families_affected }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


@endsection

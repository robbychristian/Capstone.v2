@extends('layouts.master')

@section('title', '| Disaster Statistical Reports')
@section('content')
    <div class="container-fluid" style="color: black;">
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm active mb-3" role="button"
            aria-pressed="true">Back</a>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                {{ $disasterstats->id }}

                {{ $disasterstats->type_disaster }}


                <!-- Content Row -->
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Families Affected</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $disasterstats->families_affected }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-home fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Individuals Affected</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $disasterstats->individuals_affected }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-male fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Evacuees</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $disasterstats->evacuees }}</div>
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

    </div>


@endsection

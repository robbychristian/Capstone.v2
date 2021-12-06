@extends('layouts.master')
@section('title', '| Guidelines')
@section('content')

    <div class="container-fluid" style="color: black;">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Disaster Preparedness</h1>

            @if (Auth::user()->user_role === 3)
                <a href="" class="d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>
                    Add Guidelines </a>
            @elseif (Auth::user()->user_role === 1)
                <a href="" class="d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>
                    Add Guidelines</a>
            @endif
        </div>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="flood-tab" data-toggle="tab" href="#flood" role="tab" aria-controls="flood"
                    aria-selected="true">Flood</a>
                <a class="nav-link" id="earthquake-tab" data-toggle="tab" href="#earthquake" role="tab"
                    aria-controls="earthquake" aria-selected="false">Earthquake</a>
                <a class="nav-link" id="tropical-cyclone-tab" data-toggle="tab" href="#tropical-cyclone" role="tab"
                    aria-controls="tropical-cyclone" aria-selected="false">Tropical Cyclone</a>
                <a class="nav-link" id="tsunami-tab" data-toggle="tab" href="#tsunami" role="tab"
                    aria-controls="tsunami" aria-selected="false">Tsunami</a>
            </div>
        </nav>
        <div class="tab-content mt-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="flood" role="tabpanel" aria-labelledby="flood-tab">
                <div class="card-deck">
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">BEFORE</h5>
                            <ul class="list-group list-group-flush bg-transparent">
                                <li class="list-group-item bg-transparent"><i class="fas fa-angle-double-right mr-2" style="color: #004F91"></i>An item</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">DURING</h5>
                            <ul class="list-group list-group-flush bg-transparent">
                                <li class="list-group-item bg-transparent"><i class="fas fa-angle-double-right mr-2" style="color: #004F91"></i>An item</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">AFTER</h5>
                            <ul class="list-group list-group-flush bg-transparent">
                                <li class="list-group-item bg-transparent"><i class="fas fa-angle-double-right mr-2" style="color: #004F91"></i>An item</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="earthquake" role="tabpanel" aria-labelledby="earthquake-tab">Earthquake</div>
            <div class="tab-pane fade" id="tropical-cyclone" role="tabpanel" aria-labelledby="tropical-cyclone-tab">
                Tropical Cyclone</div>
            <div class="tab-pane fade" id="tsunami" role="tabpanel" aria-labelledby="tsunami-tab">Tsunami</div>
        </div>

    </div>


@endsection

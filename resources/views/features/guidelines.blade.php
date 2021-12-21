@extends('layouts.master')
@section('title', '| Guidelines')
@section('content')

    <div class="container-fluid" style="color: black;">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Disaster Preparedness</h1>

            @if (Auth::user()->user_role === 3)
                <a href="{{ route('user.guidelines.create') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i>
                    Add Guidelines </a>
            @elseif (Auth::user()->user_role === 1)
                <a href="{{ route('admin.guidelines.create') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i>
                    Add Guidelines</a>
            @endif
        </div>

        @if (Session::get('success'))
            <div class="alert alert-success mt-3 mb-3">
                {{ Session::get('success') }}
            </div>
        @endif

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

        <!-- FLOOD -->
        <div class="tab-content mt-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="flood" role="tabpanel" aria-labelledby="flood-tab">
                <div class="card-deck">
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">BEFORE</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Flood')
                                        @if ($guideline->time == 'Before')

                                            <li class="list-group-item bg-transparent">
                                                <div class="card border-left-primary h-100 py-2 w-100">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                                    <i
                                                                    class="fas fa-angle-double-right mr-2"
                                                                    style="color: #004F91"></i> {{ $guideline->guideline }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">DURING</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Flood')
                                        @if ($guideline->time == 'During')
                                            <li class="list-group-item bg-transparent"><i
                                                    class="fas fa-angle-double-right mr-2"
                                                    style="color: #004F91"></i>{{ $guideline->guideline }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">AFTER</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Flood')
                                        @if ($guideline->time == 'After')
                                            <li class="list-group-item bg-transparent"><i
                                                    class="fas fa-angle-double-right mr-2"
                                                    style="color: #004F91"></i>{{ $guideline->guideline }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EARTHQUAKE -->
            <div class="tab-pane fade" id="earthquake" role="tabpanel" aria-labelledby="earthquake-tab">
                <div class="card-deck">
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">BEFORE</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Earthquake')
                                        @if ($guideline->time == 'Before')
                                            <li class="list-group-item bg-transparent"><i
                                                    class="fas fa-angle-double-right mr-2"
                                                    style="color: #004F91"></i>{{ $guideline->guideline }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">DURING</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Earthquake')
                                        @if ($guideline->time == 'During')
                                            <li class="list-group-item bg-transparent"><i
                                                    class="fas fa-angle-double-right mr-2"
                                                    style="color: #004F91"></i>{{ $guideline->guideline }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">AFTER</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Earthquake')
                                        @if ($guideline->time == 'After')
                                            <li class="list-group-item bg-transparent"><i
                                                    class="fas fa-angle-double-right mr-2"
                                                    style="color: #004F91"></i>{{ $guideline->guideline }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TROPICAL CYCLONE -->
            <div class="tab-pane fade" id="tropical-cyclone" role="tabpanel" aria-labelledby="tropical-cyclone-tab">
                <div class="card-deck">
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">BEFORE</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tropical Cyclone')
                                        @if ($guideline->time == 'Before')
                                            <li class="list-group-item bg-transparent"><i
                                                    class="fas fa-angle-double-right mr-2"
                                                    style="color: #004F91"></i>{{ $guideline->guideline }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">DURING</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tropical Cyclone')
                                        @if ($guideline->time == 'During')
                                            <li class="list-group-item bg-transparent"><i
                                                    class="fas fa-angle-double-right mr-2"
                                                    style="color: #004F91"></i>{{ $guideline->guideline }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">AFTER</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tropical Cyclone')
                                        @if ($guideline->time == 'After')
                                            <li class="list-group-item bg-transparent"><i
                                                    class="fas fa-angle-double-right mr-2"
                                                    style="color: #004F91"></i>{{ $guideline->guideline }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TSUNAMI -->
            <div class="tab-pane fade" id="tsunami" role="tabpanel" aria-labelledby="tsunami-tab">
                <div class="card-deck">
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">BEFORE</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tsunami')
                                        @if ($guideline->time == 'Before')
                                            <li class="list-group-item bg-transparent"><i
                                                    class="fas fa-angle-double-right mr-2"
                                                    style="color: #004F91"></i>{{ $guideline->guideline }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">DURING</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tsunami')
                                        @if ($guideline->time == 'During')
                                            <li class="list-group-item bg-transparent"><i
                                                    class="fas fa-angle-double-right mr-2"
                                                    style="color: #004F91"></i>{{ $guideline->guideline }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4">AFTER</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tsunami')
                                        @if ($guideline->time == 'After')
                                            <li class="list-group-item bg-transparent"><i
                                                    class="fas fa-angle-double-right mr-2"
                                                    style="color: #004F91"></i>{{ $guideline->guideline }}</li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

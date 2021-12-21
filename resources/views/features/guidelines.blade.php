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
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">BEFORE</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Flood' && $guideline->time == 'Before')

                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">
                                                                <div class="dropdown">
                                                                    <a role="button" id="dropdownMenuLink"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        <i
                                                                            class="fas fa-ellipsis-v fa-2x text-gray-300"></i>
                                                                    </a>


                                                                    </button>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenu2">
                                                                        <a class="dropdown-item"
                                                                            href="/admin/guidelines/{{ $guideline->id }}/edit">Edit</a>
                                                                        <form
                                                                            action="/admin/guidelines/{{ $guideline->id }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="dropdown-item">Delete</button>
                                                                        </form>


                                                                    </div>
                                                                </div>


                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>


                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">DURING</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Flood' && $guideline->time == 'During')

                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">




                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">AFTER</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Flood' && $guideline->time == 'After')

                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">




                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

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
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">BEFORE</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Earthquake' && $guideline->time == 'Before')
                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">




                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">DURING</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Earthquake' && $guideline->time == 'During')

                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">




                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">AFTER</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Earthquake' && $guideline->time == 'After')

                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">




                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

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
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">BEFORE</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tropical Cyclone' && $guideline->time == 'Before')

                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">




                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">DURING</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tropical Cyclone' && $guideline->time == 'During')

                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>

                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">



                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">AFTER</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tropical Cyclone' && $guideline->time == 'After')

                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">



                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

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
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">BEFORE</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tsunami' && $guideline->time == 'Before')

                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">



                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">DURING</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tsunami' && $guideline->time == 'During')

                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">



                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card bg-transparent border-light">
                        <div class="card-body">
                            <h5 class="card-title text-center h4 font-weight-bold text-primary text-uppercase">AFTER</h5>
                            <ul class="list-group list-group-flush bg-transparent" style="font-size: 1rem">
                                @foreach ($guidelines as $guideline)
                                    @if ($guideline->disaster == 'Tsunami' && $guideline->time == 'After')

                                        <li class="list-group-item bg-transparent">
                                            <div class="card border-left-primary h-100 w-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-gray-800">
                                                                {{ $guideline->guideline }}
                                                            </div>
                                                        </div>
                                                        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                                            <div class="col-auto">



                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

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

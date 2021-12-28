@extends('layouts.master')
@section('title', '| Reports')
@section('content')
    <div class="container-fluid" style="color: black">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reports</h1>
        </div>

        <div class="card shadow mb-3 mt-3">
            <div class="card-body">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    style="background-color: white;">
                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm active" role="button"
                        aria-pressed="true">Back</a>

                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cogs fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Actions:</div>

                            <button class="dropdown-item" type="submit">Activate</button>

                            <button class="dropdown-item" type="submit">Dectivate</button>

                            <button class="dropdown-item" type="submit">Unblock</button>

                            <button class="dropdown-item" type="submit">Block</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection

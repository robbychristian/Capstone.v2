@extends('layouts.app')

@section('content')

    <div class="container-fluid mt-3">
        <div class="row">

            <!-- Vertical Navbar -->
            @include('layouts.navbar')

            <!-- Sub-Content (Features)-->
            @yield('sub-content')

        </div>
    </div>
@endsection

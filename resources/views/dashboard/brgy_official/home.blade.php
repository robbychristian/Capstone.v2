@extends('layouts.app')

@section('content')

    <div class="container-fluid mt-5">
        @if (Auth::user()->brgy_loc == "Barangay Santolan")
            <div class="row">
                
                <!-- Vertical Navbar -->
                @include('layouts.navbar')

                <!-- Sub-Content (Features)-->
                @yield('sub-content')

            </div>
        @endif
    </div>
@endsection

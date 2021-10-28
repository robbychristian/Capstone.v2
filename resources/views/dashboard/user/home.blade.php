@extends('layouts.app')

@section('content')

    <div class="container-fluid mt-3">
        @if (Auth::user()->is_blocked != 1)

            <div class="row">

                <!-- Vertical Navbar -->
                @include('layouts.navbar')

                <!-- Sub-Content (Features)-->
                @yield('sub-content')

            </div>

        @else
            You are blocked
        @endif
    </div>
@endsection

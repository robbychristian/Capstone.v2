@extends('layouts.master')
@section('title', '| Guidelines')
@section('content')

    <div class="container-fluid" style="color: black;">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Disaster Preparedness</h1>

            @if (Auth::user()->user_role === 3)
                <a href="{{ route('brgy_official.generate.index') }}"
                    class="d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report</a>
            @elseif (Auth::user()->user_role === 1)
                <a href="{{ route('admin.generate.index') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report</a>
            @endif
        </div>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
              <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
              <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
          </div>

    </div>


@endsection

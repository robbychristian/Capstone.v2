@extends('layouts.master')
@section('title', '| Manage Resident')
@section('content')
    <div class="container-fluid" style="color: black">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Resident Profile</h1>
        </div>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
              <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-4">
                    <img src="{{ URL::asset('KabisigGit/storage/app/public/profile_pics/' . $user->id . '/' . $profile->profile_pic) }}" class="rounded-circle mx-auto d-block" alt="...">
                    <h6> {{ $user->first_name }}{{ $profile->middle_name }}{{ $user->last_name }}</h6>
                </div>
                  <div class="col-sm-12 col-md-6 col-lg-8">
                     
                  </div>
              </div>
            </div>
        </div>

    </div>





@endsection

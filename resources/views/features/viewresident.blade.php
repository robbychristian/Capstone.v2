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
                        <img src="{{ URL::asset('KabisigGit/storage/app/public/profile_pics/' . $user->id . '/' . $profile->profile_pic) }}"
                            class="img-responsive" style="width: 100%; object-fit: cover; height: 300px;">
                        <h4 class="text-center mb-3 mt-4"> {{ $user->first_name }} {{ $profile->middle_name }}
                            {{ $user->last_name }}</h4>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8">



                        <div class="row">
                            <div class="col-sm-3 col-lg-2 font-weight-bold">User ID</div>
                            <div class="col-sm-9 col-lg-10">{{ $user->id }}</div>

                            <div class="col-sm-3 col-lg-2 font-weight-bold">Email</div>
                            <div class="col-sm-9 col-lg-10">{{ $user->email }}</div>


                            <div class="col-sm-3 col-lg-2 font-weight-bold">Contact Number</div>
                            <div class="col-sm-9 col-lg-10">{{ $profile->contact_no }}</div>

                            <div class="col-sm-3 col-lg-2 font-weight-bold">Birthday</div>
                            <div class="col-sm-9 col-lg-10">{{ $profile->birth_day }}</div>

                            <hr>


                            
                            <div class="col-sm-3 col-lg-2 font-weight-bold">Home Address</div>
                            <div class="col-sm-9 col-lg-10">{{ $profile->home_add }}</div>

                            <div class="col-sm-3 col-lg-2 font-weight-bold">Barangay</div>
                            <div class="col-sm-9 col-lg-10">{{ $user->brgy_loc }}</div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection

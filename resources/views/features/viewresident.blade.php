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
                        <h3 class="text-center mb-3 mt-4"> {{ $user->first_name }} {{ $profile->middle_name }}
                            {{ $user->last_name }}</h3>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8">
                        <h5 class="mb-3">Profile Information</h5>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3">User ID</div>
                                <div class="col-sm-9">{{ $user->id }}</div>
                            </div>
                        </div>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3">Role</div>

                                @if ($user->user_role == 2)
                                    <div class="col-sm-9"><span class="badge badge-pill badge-primary">Resident</span>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3">Full Name</div>
                                <div class="col-sm-9"> {{ $user->first_name }} {{ $profile->middle_name }}
                                    {{ $user->last_name }}</div>
                            </div>
                        </div>

                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3">Email</div>
                                @if ($user->email_verified_at != null)
                                    <div class="col-sm-9"><i
                                            class="fas fa-check-circle text-success mr-2"></i>{{ $user->email }}</div>

                                @else
                                    <div class="col-sm-9"><i
                                            class="fas fa-times-circle text-danger mr-2"></i>{{ $user->email }}</div>

                                @endif

                            </div>
                        </div>

                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3">Contact Number</div>
                                <div class="col-sm-9">{{ $profile->contact_no }}</div>
                            </div>
                        </div>

                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3">Birthday</div>
                                <div class="col-sm-9">{{ $profile->birth_day }}</div>
                            </div>
                        </div>


                        <hr>
                        <h5 class="mb-3">Residence Details</h5>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3 ">Home Address</div>
                                <div class="col-sm-9 ">{{ $profile->home_add }}</div>
                            </div>
                        </div>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3 ">Barangay</div>
                                <div class="col-sm-9 ">{{ $user->brgy_loc }}</div>
                            </div>
                        </div>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3 ">Residence Verification</div>

                                <div class="col-sm-9">
                                    @if ($user->is_valid == 1)
                                        <i class="fas fa-check-circle text-success mr-2"></i><span
                                            class="text-success font-weight-bold">Verified Resident</span>

                                    @else
                                        <i class="fas fa-times-circle text-danger mr-2"></i><span
                                            class="text-danger font-weight-bold">Unverified Resident</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection

@extends('layouts.master')
@section('title', '| Manage Resident')
@section('content')
    <div class="container-fluid" style="color: black">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm active mb-3" role="button"
            aria-pressed="true">Back</a>


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Resident Profile</h1>
        </div>

        <div class="card shadow mb-3 mt-3">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-12 d-flex" style="justify-content: center; align-items: center;">
                        <div class="profile-img"
                            style=" display: inline-block;">
                            <img src="{{ URL::asset('KabisigGit/storage/app/public/profile_pics/' . $user->id . '/' . $profile->profile_pic) }}"
                                style="  border-radius: 150%; 
                                width: 100px;
                                height: 100px;">

                        </div>


                    </div>
                    <div class="col-sm-12">
                        <h2 class="mt-4 text-uppercase text-center"> {{ $user->first_name }}
                            {{ $profile->middle_name }}
                            {{ $user->last_name }}</h2>

                        <ul class="list-inline" style="text-align:center;">
                            @if ($user->is_deactivated === 1)
                                <li class="list-inline-item"><span class="badge badge-pill badge-danger">Deactivated
                                        Account</span></li>
                            @else
                                <li class="list-inline-item"><span class="badge badge-pill badge-success">Active
                                        Account</span></li>
                            @endif

                            @if ($user->is_blocked === 1)
                                <li class="list-inline-item"><span class="badge badge-pill badge-danger">Blocked</span></li>
                            @else
                                <li class="list-inline-item"><span class="badge badge-pill badge-success">Not Blocked</span>
                                </li>
                            @endif

                            @if ($user->is_valid === 1)
                                <li class="list-inline-item"><span class="badge badge-pill badge-success">Verified
                                        Resident</span></li>
                            @else
                                <li class="list-inline-item"><span class="badge badge-pill badge-danger">Unverified
                                        Resident</span></li>
                            @endif

                        </ul>
                        <h5 class="mb-3" style="font-weight: 600;">Profile Information</h5>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: 500;">User ID</div>
                                <div class="col-sm-9">{{ $user->id }}</div>
                            </div>
                        </div>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: 500;">Role</div>
                                <div class="col-sm-9">
                                    @if ($user->user_role == 2)
                                        <span class="badge badge-pill badge-primary">Resident</span>
                                    @elseif ($user->user_role == 3)
                                        <span class="badge badge-pill badge-info">Barangay Official</span>
                                    @elseif ($user->user_role == 4)
                                        <span class="badge badge-pill badge-secondary">Barangay Secretary</span>
                                    @elseif ($user->user_role == 5)
                                        <span class="badge badge-pill badge-secondary">Barangay Co-Chairman</span>
                                    @elseif ($user->user_role == 5)
                                        <span class="badge badge-pill badge-secondary">Barangay Chairman</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: 500;">Full Name</div>
                                <div class="col-sm-9"> {{ $user->first_name }} {{ $profile->middle_name }}
                                    {{ $user->last_name }}</div>
                            </div>
                        </div>

                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: 500;">Email</div>
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
                                <div class="col-sm-3" style="font-weight: 500;">Contact Number</div>
                                <div class="col-sm-9">{{ $profile->contact_no }}</div>
                            </div>
                        </div>

                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: 500;">Birthday</div>
                                <div class="col-sm-9">{{ $profile->birth_day }}</div>
                            </div>
                        </div>


                        <hr>
                        <h5 class="mb-3" style="font-weight: 600">Residence Details</h5>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3 " style="font-weight: 500;">Home Address</div>
                                <div class="col-sm-9 ">{{ $profile->home_add }}</div>
                            </div>
                        </div>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3 " style="font-weight: 500;">Barangay</div>
                                <div class="col-sm-9 ">{{ $user->brgy_loc }}</div>
                            </div>
                        </div>
                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: 500;">Residence Verification</div>

                                <div class="col-sm-9">
                                    @if ($user->is_valid == 1)
                                        <i class="fas fa-check-circle text-success mr-2"></i>
                                        <span class="text-success font-weight-bold">Verified Resident</span>

                                    @else
                                        <i class="fas fa-times-circle text-danger mr-2"></i>
                                        <span class="text-danger font-weight-bold">Unverified Resident</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: 500;">Registration Date</div>
                                <div class="col-sm-9">
                                    {{ date('F d, Y \a\t h:i A', strtotime($user->created_at)) }}</div>
                            </div>
                        </div>

                        <div class="content mb-2">
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: 500;">Valid ID</div>
                                <div class="col-sm-9 ">
                                    <!-- Button trigger modal -->

                                    <a href="#" class="text-decoration-none" data-toggle="modal"
                                        data-target="#id{{ $user->id }}">View</a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="id{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ URL::asset('KabisigGit/storage/app/public/valid_id/' . $user->id . '/' . $profile->valid_id) }}"
                                                        class="img-fluid rounded mx-auto d-block">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection

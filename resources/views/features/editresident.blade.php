@extends('layouts.master')
@section('title', '| Manage Resident')
@section('content')

    <div class="container-fluid" style="color: black">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Resident Profile</h1>
        </div>

        @if (Session::get('success'))
            <div class="alert alert-success mt-3 mb-3">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card shadow mb-3 mt-3">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                style="background-color: white;">
                <a href="/admin/manageresident/" class="btn btn-primary btn-sm active" role="button"
                    aria-pressed="true">Back</a>

                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cogs fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Actions:</div>
                        @if ($user->is_deactivated === 1)
                            <form action="/admin/manageresident/activate/{{ $user->id }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="dropdown-item" type="submit">Activate</button>
                            </form>
                        @else
                            <form action="/admin/manageresident/deactivate/{{ $user->id }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="dropdown-item" type="submit">Dectivate</button>
                            </form>
                        @endif

                        @if ($user->is_blocked === 1)
                            <form action="/admin/manageresident/unblock/{{ $user->id }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="dropdown-item" type="submit">Unblock</button>
                            </form>

                        @else
                            <form action="/admin/manageresident/block/{{ $user->id }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="dropdown-item" type="submit">Block</button>
                            </form>

                        @endif

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-12 d-flex" style="justify-content: center; align-items: center;">
                        <div class="profile-img"
                            style=" display: inline-block; position: relative; width: 200px; height: 200px; overflow: hidden; border-radius: 50%;">
                            <img src="{{ URL::asset('KabisigGit/storage/app/public/profile_pics/' . $user->id . '/' . $profile->profile_pic) }}"
                                style=" width: auto; height: 100%; margin-left: -50px; ">

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

                                @if ($user->user_role == 2)
                                    <div class="col-sm-9">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><span
                                                    class="badge badge-pill badge-primary">Resident</span></li>
                                            <li class="list-inline-item">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <span class="badge badge-pill badge-primary">Resident</span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-inline-item" id="pen"><i
                                                    class="fas fa-pen fa-fw fa-sm text-gray-500"></i></li>
                                            <li class="list-inline-item" id="form">
                                                <select class="form-control form-control-sm">
                                                    <optgroup label="Higher Officials">
                                                        <option>Barangay Chairman</option>
                                                        <option>Barangay Kagawad</option>
                                                        <option>Barangay Secretary</option>
                                                    </optgroup>
                                                    <optgroup label="Subordinates">
                                                        <option>Barangay Official</option>
                                                    </optgroup>
                                                    <optgroup label="Basic User">
                                                        <option>Resident</option>
                                                    </optgroup>
                                                </select>
                                            </li>


                                        </ul>

                                    </div>
                                @endif

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
                                    <ul class="list-inline">
                                        <!-- Button trigger modal -->
                                        <li class="list-inline-item">
                                            <a href="#" class="text-decoration-none" data-toggle="modal"
                                                data-target="#id{{ $user->id }}">View</a>
                                        </li>

                                        @if ($user->is_valid === 0)
                                            <li class="list-inline-item">
                                                <form action="/admin/manageresident/approve/{{ $user->id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit"
                                                        style="color:#1cc88a; border:none; background-color:transparent;">Approve
                                                        Residency</button>
                                                </form>
                                            </li>


                                        @else
                                            <li class="list-inline-item">
                                                <form action="/admin/manageresident/disapprove/{{ $user->id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit"
                                                        style="color:#e74a3b; border:none; background-color:transparent;">Disapprove
                                                        Residency</button>
                                                </form>
                                            </li>
                                        @endif

                                    </ul>

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

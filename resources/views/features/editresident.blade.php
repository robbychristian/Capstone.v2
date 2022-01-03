@extends('layouts.master')
@section('title', '| Manage Resident')
@section('content')
    <!-- comment: assign roles for the dropdown fix else if depending on roles -->

    <div class="container-fluid" style="color: black">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Resident Profile</h1>
        </div>

        @if (Session::get('success'))
            <div class="alert alert-success mt-3 mb-3">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Auth::user()->user_role == 3)
            <div class="card shadow mb-3 mt-3">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    style="background-color: white;">

                    <a href="/user/manageresident/" class="btn btn-primary btn-sm active" role="button"
                        aria-pressed="true">Back</a>

                </div>

                <div class="card-body">
                    You are not authorized to configure this user.
                </div>
            </div>
        @endif

        @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 4)
            <div class="card shadow mb-3 mt-3">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    style="background-color: white;">
                    @if (Auth::user()->user_role == 1)
                        <a href="/admin/manageresident/" class="btn btn-primary btn-sm active" role="button"
                            aria-pressed="true">Back</a>

                    @elseif (Auth::user()->user_role >= 3)
                        <a href="/user/manageresident/" class="btn btn-primary btn-sm active" role="button"
                            aria-pressed="true">Back</a>
                    @endif

                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cogs fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Actions:</div>
                            @if ($user->is_deactivated === 1)
                                @if (Auth::user()->user_role == 1)
                                    <form action="/admin/manageresident/activate/{{ $user->id }}" method="POST">
                                    @elseif (Auth::user()->user_role >= 4)
                                        <form action="/user/manageresident/activate/{{ $user->id }}" method="POST">
                                @endif

                                @csrf
                                @method('POST')
                                <button class="dropdown-item" type="submit">Activate</button>
                                </form>
                            @else
                                @if (Auth::user()->user_role == 1)
                                    <form action="/admin/manageresident/deactivate/{{ $user->id }}" method="POST">
                                    @elseif (Auth::user()->user_role >= 4)
                                        <form action="/user/manageresident/deactivate/{{ $user->id }}" method="POST">
                                @endif
                                @csrf
                                @method('POST')
                                <button class="dropdown-item" type="submit">Dectivate</button>
                                </form>
                            @endif

                            @if ($user->is_blocked === 1)
                                @if (Auth::user()->user_role == 1)
                                    <form action="/admin/manageresident/unblock/{{ $user->id }}" method="POST">
                                    @elseif (Auth::user()->user_role >= 4)
                                        <form action="/user/manageresident/unblock/{{ $user->id }}" method="POST">
                                @endif
                                @csrf
                                @method('POST')
                                <button class="dropdown-item" type="submit">Unblock</button>
                                </form>

                            @else
                                @if (Auth::user()->user_role == 1)
                                    <form action="/admin/manageresident/block/{{ $user->id }}" method="POST">
                                    @elseif (Auth::user()->user_role >= 4)
                                        <form action="/user/manageresident/block/{{ $user->id }}" method="POST">
                                @endif
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
                            <div class="profile-img" style=" display: inline-block;">
                                <img src="{{ URL::asset('KabisigGit/storage/app/public/profile_pics/' . $user->id . '/' . $profile->profile_pic) }}"
                                    style="border-radius: 100%; width: 200px; height: 200px;">

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
                                    <li class="list-inline-item"><span class="badge badge-pill badge-danger">Blocked</span>
                                    </li>
                                @else
                                    <li class="list-inline-item"><span class="badge badge-pill badge-success">Not
                                            Blocked</span>
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
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-3" style="font-weight: 500;">Role</div>

                                    @if ($user->user_role == 2)
                                        <div class="col-sm-9">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle p-0 shadow-none" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span class="badge badge-pill badge-primary">Resident</span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            @if (Auth::user()->user_role == 1)
                                                                <div class="dropdown-header">Higher Officials</div>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="chairman">Barangay
                                                                    Chairman</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="co-chairman">Barangay
                                                                    Co-Chairman</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="secretary">Barangay
                                                                    Secretary</a>
                                                            @endif


                                                            <div class="dropdown-header">Subordinates</div>
                                                            <a class="dropdown-item" href="#" id="subordinates"
                                                                data-id="{{ $user->id }}">Barangay
                                                                Official</a>

                                                            <div class="dropdown-header">Basic User</div>
                                                            <a class="dropdown-item" href="#" id="basicuser"
                                                                data-id="{{ $user->id }}">Resident</a>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>

                                        </div>
                                    @endif

                                    @if ($user->user_role == 3)
                                        <div class="col-sm-9">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle p-0 shadow-none" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span class="badge badge-pill badge-info">Barangay
                                                                Official</span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            @if (Auth::user()->user_role == 1)
                                                                <div class="dropdown-header">Higher Officials</div>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="chairman">Barangay
                                                                    Chairman</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="co-chairman">Barangay
                                                                    Co-Chairman</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="secretary">Barangay
                                                                    Secretary</a>
                                                            @endif

                                                            <div class="dropdown-header">Subordinates</div>
                                                            <a class="dropdown-item" href="#" id="subordinates"
                                                                data-id="{{ $user->id }}">Barangay
                                                                Official</a>

                                                            <div class="dropdown-header">Basic User</div>
                                                            <a class="dropdown-item" href="#" id="basicuser"
                                                                data-id="{{ $user->id }}">Resident</a>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>

                                        </div>
                                    @endif

                                    @if ($user->user_role == 4)
                                        <div class="col-sm-9">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle p-0 shadow-none" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span class="badge badge-pill badge-secondary">Barangay
                                                                Secretary</span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            @if (Auth::user()->user_role == 1)
                                                                <div class="dropdown-header">Higher Officials</div>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="chairman">Barangay
                                                                    Chairman</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="co-chairman">Barangay
                                                                    Co-Chairman</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="secretary">Barangay
                                                                    Secretary</a>
                                                            @endif

                                                            <div class="dropdown-header">Subordinates</div>
                                                            <a class="dropdown-item" href="#" id="subordinates"
                                                                data-id="{{ $user->id }}">Barangay
                                                                Official</a>

                                                            <div class="dropdown-header">Basic User</div>
                                                            <a class="dropdown-item" href="#" id="basicuser"
                                                                data-id="{{ $user->id }}">Resident</a>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>

                                        </div>
                                    @endif

                                    @if ($user->user_role == 5)
                                        <div class="col-sm-9">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle p-0 shadow-none" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span class="badge badge-pill badge-warning">Barangay
                                                                Co-Chairman</span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            @if (Auth::user()->user_role == 1)
                                                                <div class="dropdown-header">Higher Officials</div>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="chairman">Barangay
                                                                    Chairman</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="co-chairman">Barangay
                                                                    Co-Chairman</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="secretary">Barangay
                                                                    Secretary</a>
                                                            @endif

                                                            <div class="dropdown-header">Subordinates</div>
                                                            <a class="dropdown-item" href="#" id="subordinates"
                                                                data-id="{{ $user->id }}">Barangay
                                                                Official</a>

                                                            <div class="dropdown-header">Basic User</div>
                                                            <a class="dropdown-item" href="#" id="basicuser"
                                                                data-id="{{ $user->id }}">Resident</a>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>

                                        </div>
                                    @endif

                                    @if ($user->user_role == 6)
                                        <div class="col-sm-9">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle p-0 shadow-none" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <span class="badge badge-pill badge-success">Barangay
                                                                Chairman</span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            @if (Auth::user()->user_role == 1)
                                                                <div class="dropdown-header">Higher Officials</div>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="chairman">Barangay
                                                                    Chairman</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="co-chairman">Barangay
                                                                    Co-Chairman</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-id="{{ $user->id }}" id="secretary">Barangay
                                                                    Secretary</a>
                                                            @endif

                                                            <div class="dropdown-header">Subordinates</div>
                                                            <a class="dropdown-item" href="#" id="subordinates"
                                                                data-id="{{ $user->id }}">Barangay
                                                                Official</a>

                                                            <div class="dropdown-header">Basic User</div>
                                                            <a class="dropdown-item" href="#" id="basicuser"
                                                                data-id="{{ $user->id }}">Resident</a>
                                                        </div>
                                                    </div>
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
                                                class="fas fa-check-circle text-success mr-2"></i>{{ $user->email }}
                                        </div>

                                    @else
                                        <div class="col-sm-9"><i
                                                class="fas fa-times-circle text-danger mr-2"></i>{{ $user->email }}
                                        </div>

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
                                                    @if (Auth::user()->user_role == 1)
                                                        <form action="/admin/manageresident/approve/{{ $user->id }}"
                                                            method="POST">

                                                        @elseif (Auth::user()->user_role >= 4)
                                                            <form action="/user/manageresident/approve/{{ $user->id }}"
                                                                method="POST">
                                                    @endif

                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit"
                                                        style="color:#1cc88a; border:none; background-color:transparent;">Approve
                                                        Residency</button>
                                                    </form>
                                                </li>


                                            @else
                                                <li class="list-inline-item">
                                                    @if (Auth::user()->user_role == 1)
                                                        <form action="/admin/manageresident/disapprove/{{ $user->id }}"
                                                            method="POST">

                                                        @elseif (Auth::user()->user_role >= 4)
                                                            <form
                                                                action="/user/manageresident/disapprove/{{ $user->id }}"
                                                                method="POST">
                                                    @endif


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
        @endif

    </div>

    @if (Auth::user()->user_role == 1)
        <script>
            $(document).on('click', '#chairman', function() {
                var id = $(this).data('id');
                console.log(id);

                swal({
                        title: "Are you sure?",
                        text: "You want to change the role of this user?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            });

                            $.ajax({
                                url: "https://kabisigapp.com/admin/manageresident/promotechairman/" +
                                    id,
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": id
                                },

                                success: function(response) {
                                    location.reload();
                                    swal("Success!", response.message, "success");
                                },

                                error: function(response) {
                                    console.log(response);
                                }
                            });
                        } else {
                            swal("No changes were made!");
                        }
                    });


            });

            $(document).on('click', '#co-chairman', function() {
                var id = $(this).data('id');
                console.log(id);

                swal({
                        title: "Are you sure?",
                        text: "You want to change the role of this user?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            });

                            $.ajax({
                                url: "https://kabisigapp.com/admin/manageresident/promotecochairman/" +
                                    id,
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": id
                                },

                                success: function(response) {
                                    location.reload();
                                    swal("Success!", response.message, "success");
                                },

                                error: function(response) {
                                    console.log(response);
                                }
                            });
                        } else {
                            swal("No changes were made!");
                        }
                    });


            });

            $(document).on('click', '#secretary', function() {
                var id = $(this).data('id');
                console.log(id);

                swal({
                        title: "Are you sure?",
                        text: "You want to change the role of this user?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            });

                            $.ajax({
                                url: "https://kabisigapp.com/admin/manageresident/promotesecretary/" +
                                    id,
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": id
                                },

                                success: function(response) {
                                    location.reload();
                                    swal("Success!", response.message, "success");
                                },

                                error: function(response) {
                                    console.log(response);
                                }
                            });
                        } else {
                            swal("No changes were made!");
                        }
                    });


            });

            $(document).on('click', '#subordinates', function() {
                var id = $(this).data('id');
                console.log(id);

                swal({
                        title: "Are you sure?",
                        text: "You want to change the role of this user?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            });

                            $.ajax({
                                url: "https://kabisigapp.com/admin/manageresident/promotesubordinate/" +
                                    id,
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": id
                                },

                                success: function(response) {
                                    location.reload();
                                    swal("Success!", response.message, "success");
                                },

                                error: function(response) {
                                    console.log(response);
                                }
                            });
                        } else {
                            swal("No changes were made!");
                        }
                    });


            });

            $(document).on('click', '#basicuser', function() {
                var id = $(this).data('id');
                console.log(id);

                swal({
                        title: "Are you sure?",
                        text: "You want to change the role of this user?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            });

                            $.ajax({
                                url: "https://kabisigapp.com/admin/manageresident/promoteresident/" +
                                    id,
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": id
                                },

                                success: function(response) {
                                    location.reload();
                                    swal("Success!", response.message, "success");
                                },

                                error: function(response) {
                                    console.log(response);
                                }
                            });
                        } else {
                            swal("No changes were made!");
                        }
                    });


            });
        </script>

    @elseif (Auth::user()->user_role >= 4)

        <script>
            $(document).on('click', '#subordinates', function() {
                var id = $(this).data('id');
                console.log(id);

                swal({
                        title: "Are you sure?",
                        text: "You want to change the role of this user?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            });

                            $.ajax({
                                url: "https://kabisigapp.com/user/manageresident/promotesubordinate/" +
                                    id,
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": id
                                },

                                success: function(response) {
                                    location.reload();
                                    swal("Success!", response.message, "success");
                                },

                                error: function(response) {
                                    console.log(response);
                                }
                            });
                        } else {
                            swal("No changes were made!");
                        }
                    });


            });

            $(document).on('click', '#basicuser', function() {
                var id = $(this).data('id');
                console.log(id);

                swal({
                        title: "Are you sure?",
                        text: "You want to change the role of this user?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            });

                            $.ajax({
                                url: "https://kabisigapp.com/user/manageresident/promoteresident/" +
                                    id,
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": id
                                },

                                success: function(response) {
                                    location.reload();
                                    swal("Success!", response.message, "success");
                                },

                                error: function(response) {
                                    console.log(response);
                                }
                            });
                        } else {
                            swal("No changes were made!");
                        }
                    });


            });
        </script>
    @endif


@endsection

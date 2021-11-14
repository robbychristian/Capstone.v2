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
            <h1 class="h3 mb-0 text-gray-800">Manage Resident</h1>
            @if (Auth::user()->user_role === 1)
                <a href="{{ route('admin.manageresident.create') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i>Add Resident</a>
            @elseif (Auth::user()->user_role === 3)
                <a href="{{ route('brgy_official.manageresident.create') }}"
                    class="d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Add
                    Resident</a>
            @endif
        </div>
        <hr>

        @if (count($users) > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background-color: #004f91;">
                        <tr>
                            <th scope="col" style="color: white;">Full Name</th>
                            <th scope="col" style="color: white;">Email</th>
                            <th scope="col" style="color: white;">Contact Number</th>
                            <th scope="col" style="color: white;">Barangay Location</th>
                            <th scope="col" colspan='2' style="color: white;text-align:'center';">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->contact_no }}</td>
                                <td>{{ $user->brgy_loc }}</td>

                                @if (Auth::user()->user_role === 3)
                                    <!--IF BRGY OFFICIAL-->
                                    @if ($user->is_blocked == true)
                                        <td>
                                            <form action="/brgy_official/manageresident/unblock/{{ $user->id }}"
                                                method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-warning">Unblock</button>
                                            </form>
                                        </td>
                                    @elseif ($user->is_blocked == false)
                                        <td>
                                            <form action="/brgy_official/manageresident/block/{{ $user->id }}"
                                                method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-warning">Block</button>
                                            </form>
                                        </td>
                                    @endif
                                    @if ($user->is_deactivated == true)
                                        <td>
                                            <form action="/brgy_official/manageresident/activate/{{ $user->id }}"
                                                method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-danger">Activate</button>
                                            </form>
                                        </td>
                                    @elseif ($user->is_deactivated == false)
                                        <td>
                                            <form action="/brgy_official/manageresident/deactivate/{{ $user->id }}"
                                                method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-danger">Deactivate</button>
                                            </form>
                                        </td>
                                    @endif
                                @endif

                                @if (Auth::user()->user_role === 1)
                                    <!--IF ADMIN-->
                                    @if ($user->is_blocked == true)
                                        <td>
                                            <form action="/admin/manageresident/unblock/{{ $user->id }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-warning">Unblock</button>
                                            </form>
                                        </td>
                                    @elseif ($user->is_blocked == false)
                                        <td>
                                            <form action="/admin/manageresident/block/{{ $user->id }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-warning">Block</button>
                                            </form>
                                        </td>
                                    @endif
                                    @if ($user->is_deactivated == true)
                                        <td>
                                            <form action="/admin/manageresident/activate/{{ $user->id }}"
                                                method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-danger">Activate</button>
                                            </form>
                                        </td>
                                    @elseif ($user->is_deactivated == false)
                                        <td>
                                            <form action="/admin/manageresident/deactivate/{{ $user->id }}"
                                                method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-danger">Deactivate</button>
                                            </form>
                                        </td>
                                    @endif
                                @endif


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @if (Auth::user()->user_role === 3)
                <div class="d-grid gap-2 mt-5 d-md-flex justify-content-md-end">
                    {{ $users->links() }}
                </div>
            @endif

        @else
            <div class="card mt-3">
                <div class="card-body" style="font-weight: 400; font-size: 1rem;">
                    There are no registered users.
                </div>
            </div>
        @endif



    </div>

@endsection

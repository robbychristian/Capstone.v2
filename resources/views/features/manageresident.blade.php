@extends('dashboard.admin.home')
@section('title', '| Manage Resident')
@section('sub-content')
    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="mb-4 col-10 h3">Manage resident</div>
            <div class="col-2 mb-4">
                @if (Auth::user()->user_role === 1)
                    <a href="{{ route('admin.manageresident.create') }}">
                    @elseif (Auth::user()->user_role === 3)
                        <a href="{{ route('brgy_official.manageresident.create') }}">
                @endif
                <button class="btn btn-primary">Add Resident</button>
                </a>
            </div>
        </div>
        <hr>
        <h3 class="mb-3">List of Residents</h3>

        <div class="row mr-5 ml-2">
            <table class="table table-hover">
                <thead>
                    <tr class="table-active">
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="h3">{{ $user->last_name }}, {{ $user->first_name }}
                                {{ $user->middle_name }}</td>
                            <td>
                                @if (Auth::user()->user_role === 3)
                                    <!--IF BRGY OFFICIAL-->
                                    @if ($user->is_blocked == true)
                                        <form action="/brgy_official/manageresident/unblock/{{ $user->id }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-secondary">Unblock</button>
                                        </form>
                                    @elseif ($user->is_blocked == false)
                                        <form action="/brgy_official/manageresident/block/{{ $user->id }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-secondary">Block</button>
                                        </form>
                                    @endif
                                    @if ($user->is_deactivated == true)
                                        <form action="/brgy_official/manageresident/activate/{{ $user->id }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-danger">Activate</button>
                                        </form>
                                    @elseif ($user->is_deactivated == false)
                                        <form action="/brgy_official/manageresident/deactivate/{{ $user->id }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-danger">Deactivate</button>
                                        </form>
                                    @endif
                                @endif
                                @if (Auth::user()->user_role === 1)
                                    <!--IF ADMIN-->
                                    @if ($user->is_blocked == true)
                                        <form action="/admin/manageresident/unblock/{{ $user->id }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-secondary">Unblock</button>
                                        </form>
                                    @elseif ($user->is_blocked == false)
                                        <form action="/admin/manageresident/block/{{ $user->id }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-secondary">Block</button>
                                        </form>
                                    @endif
                                    @if ($user->is_deactivated == true)
                                        <form action="/admin/manageresident/activate/{{ $user->id }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-danger">Activate</button>
                                        </form>
                                    @elseif ($user->is_deactivated == false)
                                        <form action="/admin/manageresident/deactivate/{{ $user->id }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-danger">Deactivate</button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Barangay Location</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{ $user->first_name }} {{ $user->middle_name }}{{ $user->last_name }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->contact_no }}</td>
                        <td>{{ $user->brgy_loc }}</td>
                        <td colspan="2">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-warning">Block</button>
                                <button type="button" class="btn btn-danger">Deactivate</button>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>

@endsection

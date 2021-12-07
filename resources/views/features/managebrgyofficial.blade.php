@extends('layouts.master')

@section('title', '| Add Barangay Officials')
@section('content')
    <div class="container-fluid" style="color: black;">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Barangay Officials</h1>
            <a href="{{ route('admin.managebrgy_official.create') }}"
                class="d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Add
                Barangay Official</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead style="background-color: #004f91;">
                    <tr class="table-active">
                        <th scope="col" style="color: white;">Full Name</th>
                        <th scope="col" style="color: white;">Email</th>
                        <th scope="col" style="color: white;">Contact Number</th>
                        <th scope="col" style="color: white;">Barangay Location</th>
                        <th scope="col" style="color: white;">Barangay Position</th>
                        <th scope="col" style="color: white;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brgy_officials as $brgy_official)
                        <tr>
                            <td>{{ $brgy_official->first_name }} {{ $brgy_official->middle_name }}
                                {{ $brgy_official->last_name }}</td>
                            <td>{{ $brgy_official->email }}</td>
                            <td>{{ $brgy_official->contact_no }}</td>
                            <td>{{ $brgy_official->brgy_loc }}</td>
                            <td>
                                <form action="/admin/managebrgy_official/{{ $brgy_official->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <form action="/admin/managebrgy_official/demote/{{ $brgy_official->id }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <button class="btn btn-danger">Demote</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

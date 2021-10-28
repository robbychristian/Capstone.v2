@extends('dashboard.admin.home')

@section('title', '| Add Barangay Officials')
@section('sub-content')
    <div class="col-xl-10 col-log-9 col-md-8 mt-3">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-10">
                <div class="h3">Manage Barangay Officials</div>
            </div>
            <div class="col-2 mb-4">
                <a href="{{ route('admin.managebrgy_official.create') }}">
                    <button class="btn btn-primary">Add Barangay Official</button>
                </a>
            </div>
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
                            <td>{{ $brgy_official->name }}</td>
                            <td>{{ $brgy_official->email }}</td>
                            <td>{{ $brgy_official->contact_no }}</td>
                            <td>{{ $brgy_official->brgy_loc }}</td>
                            <td>{{ $brgy_official->brgy_position }}</td>
                            <td>
                                <form action="/admin/managebrgy_official/{{ $brgy_official->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

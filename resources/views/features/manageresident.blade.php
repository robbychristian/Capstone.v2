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
                <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Barangay Location</th>
                            <th>Account Status</th>
                            <th>Submitted Valid ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
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


    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.manageresident.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'middle_name',
                        name: 'middle_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'contact_no',
                        name: 'contact_no'
                    },
                    {
                        data: 'brgy_loc',
                        name: 'brgy_loc'
                    },
                    {
                        data: 'is_valid',
                        name: 'is_valid'
                    },
                    {
                        data: 'valid_id',
                        name: 'valid_id'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],

            });





        });
    </script>



@endsection

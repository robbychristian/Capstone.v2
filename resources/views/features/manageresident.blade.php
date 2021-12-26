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

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table" id="dataTable" width="100%" cellspacing="0" style="color:#464646 !important">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Barangay Location</th>
                                <th>Resident Verification</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.manageresident.index') }}",
                columns: [{
                        data: 'full_name',
                        name: 'full_name'
                    },
                    {
                        data: 'user_role',
                        name: 'user_role'
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

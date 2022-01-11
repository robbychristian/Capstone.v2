@extends('layouts.master')
@section('title', '| Activity Log')
@section('content')
    <div class="container-fluid" style="color: black">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Activity Log</h1>
        </div>

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table" id="dataTable" width="100%" cellspacing="0"
                        style="color:#464646 !important">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>User</th>
                                <th>Event</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>


    @if (Auth::user()->user_role == 1)
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.activitylog.index') }}",
                    columns: [{
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'user',
                            name: 'user'
                        },
                        {
                            data: 'event',
                            name: 'event'
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

    @elseif (Auth::user()->user_role >= 3)
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('user.manageresident.index') }}",
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
    @endif




@endsection

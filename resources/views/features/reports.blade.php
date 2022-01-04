@extends('layouts.master')
@section('title', '| Reports')
@section('content')

    <div class="container-fluid" style="color: black;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">Reports</h1>
        </div>

        @if (Session::get('success'))
            <div class="alert alert-success mt-3 mb-3">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table" id="dataTable" width="100%" cellspacing="0"
                        style="color:#464646 !important">
                        <thead>
                            <tr>
                                @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 3)
                                    <th>Date</th>
                                    <th>Reported By</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                @elseif (Auth::user()->user_role == 2)
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <input type="text" name="" id="id" value="{{ Auth::user()->id }}" hidden>
                                @endif

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
                    ajax: "{{ route('admin.reports.index') }}",
                    columns: [{
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'full_name',
                            name: 'full_name'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'status',
                            name: 'status'
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
                    ajax: "{{ route('user.reports.index') }}",
                    columns: [{
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'full_name',
                            name: 'full_name'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'status',
                            name: 'status'
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

        @elseif (Auth::user()->user_role == 2)

        <script type="text/javascript">
            $(document).ready(function() {
                var id = $('#id').val();
                console.log(id);
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "/reports/getreports/" + id,
                    columns: [{
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'status',
                            name: 'status'
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

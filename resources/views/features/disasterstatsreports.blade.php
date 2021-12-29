@extends('layouts.master')

@section('title', '| Disaster Statistical Reports')
@section('content')
    <div class="container-fluid" style="color: black;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Disaster Statistical Reports</h1>

            @if (Auth::user()->user_role === 3)
                <a href="{{ route('brgy_official.stats.create') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Create a
                    Disaster Statistical Reports</a>

            @elseif (Auth::user()->user_role === 1)
                <a href="{{ route('admin.stats.create') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Create a
                    Disaster Statistical Reports</a>
            @endif

        </div>

        @if (Session::get('success'))
            <div class="alert alert-success mt-3">
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
                                <th>Created At</th>
                                <th>Month of Disaster</th>
                                <th>Year of Disaster</th>
                                <th>Barangay</th>
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
                ajax: "{{ route('admin.stats.index') }}",
                columns: [
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'month_disaster',
                        name: 'month_disaster'
                    },
                    {
                        data: 'year_disaster',
                        name: 'year_disaster'
                    },
                    {
                        data: 'type_disaster',
                        name: 'type_disaster'
                    },
                    {
                        data: 'barangay',
                        name: 'barangay'
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

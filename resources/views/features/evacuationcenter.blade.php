@extends('layouts.master')

@section('title', '| Evacuation Centers and Hospitals')
@section('content')

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })

        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }

        function initMap() {
            @if (Auth::user()->brgy_loc == 'Barangay Santolan' || Auth::user()->user_role == 1)
                var options = {
                zoom: 16,
                center: {
                lat: 14.6131,
                lng: 121.0880
                },
                }
            @endif

            @if (Auth::user()->brgy_loc == 'Barangay Dela Paz')
                var options = {
                zoom: 16,
                center: {
                lat: 14.6137,
                lng: 121.0960
                },
                }
            @endif

            @if (Auth::user()->brgy_loc == 'Barangay Manggahan')
                var options = {
                zoom: 16,
                center: {
                lat: 14.601887,
                lng: 121.093698
                },
                }
            @endif

            @if (Auth::user()->brgy_loc == 'Barangay Maybunga')
                var options = {
                zoom: 16,
                center: {
                lat: 14.5763,
                lng: 121.0850
                },
                }
            @endif

            @if (Auth::user()->brgy_loc == 'Barangay Rosario')
                var options = {
                zoom: 16,
                center: {
                lat: 14.5885,
                lng: 121.0891
                },
                }
            @endif

            var map = new google.maps.Map(document.getElementById('evac_map'), options);
            var markers = [
                @foreach ($evacuationcenters as $evacuationcenter)
                    ["{{ $evacuationcenter->evac_latitude }}","{{ $evacuationcenter->evac_longitude }}",
                    "{{ $evacuationcenter->is_approved }}",
                    "{{ $evacuationcenter->id }}"],
                @endforeach
            ];

            var is_added_marker = "https://kabisigapp.com/img/greenmarker.png"
            var is_not_added_marker = "https://kabisigapp.com/img/redmarker.png"

            for (var i = 0; i < markers.length; i++) {
                var data = markers[i]
                var location = new google.maps.LatLng(data[0], data[1]);
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    label: data[3],
                    icon: data[2] == "1" ? is_added_marker : is_not_added_marker,
                });

            }
        }
    </script>

    <div class="container-fluid mb-5" style="color: black;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">Evacuation Centers and Nearby Hospitals</h1>

            @if (Auth::user()->user_role >= 3)
                <a href="" class="d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>
                    Add Evacuation Centers or Nearby Hospitals</a>
            @elseif (Auth::user()->user_role === 1)
                <a href="{{ route('admin.evacuation.create') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i>
                    Add Evacuation Centers or Nearby Hospitals</a>
            @endif
        </div>

        @if (Session::get('success'))
            <div class="alert alert-success mt-3 mb-3">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">


                <ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab"
                            aria-controls="pills-map" aria-selected="true"><i class="far fa-map"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-table-tab" data-toggle="pill" href="#pills-table" role="tab"
                            aria-controls="pills-table" aria-selected="false"><i class="fas fa-list"></i></a>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                        @if (count($evacuationcenters) > 0)
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    @foreach ($evacuationcenters as $evacuationcenter)
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                @if ($evacuationcenter->is_approved === 0)
                                                    <h5><span class="badge badge-danger">Not yet Approved</span></h5>
                                                @endif
                                                <h5 class="card-title"><span
                                                        class="badge badge-primary mr-3">{{ $evacuationcenter->id }}</span><strong>{{ $evacuationcenter->evac_name }}</strong>
                                                </h5>
                                                <h6 class="card-subtitle mb-2 text-muted">
                                                    {{ $evacuationcenter->brgy_loc }}
                                                </h6>
                                                <p class="card-text">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><i
                                                            class="fas fa-directions mr-2 color"></i>Nearest Landmark:
                                                        {{ $evacuationcenter->nearest_landmark }}</li>
                                                    <li class="list-group-item"><i
                                                            class="fas fa-phone-square-alt mr-2 color"></i> Contact Number:
                                                        {{ $evacuationcenter->phone_no }}</li>
                                                    <li class="list-group-item"><i
                                                            class="fas fa-users mr-2 color"></i>Capacity:
                                                        {{ $evacuationcenter->capacity }}
                                                    </li>
                                                    @if ($evacuationcenter->availability === 'Available')
                                                        <li class="list-group-item"><span
                                                                class="badge badge-success">{{ $evacuationcenter->availability }}</span>
                                                        </li>
                                                    @else
                                                        <li class="list-group-item"><span
                                                                class="badge badge-danger">{{ $evacuationcenter->availability }}</span>
                                                        </li>
                                                    @endif
                                                </ul>
                                                </p>

                                                @if ($evacuationcenter->is_approved === 0)
                                                    <a href="/admin/evacuation/approve/{{ $evacuationcenter->id }}"
                                                        class="card-link"
                                                        onclick="event.preventDefault();document.getElementById('approve-evac').submit()">Approve</a>
                                                @endif

                                                <a href="/admin/evacuation/{{ $evacuationcenter->id }}/edit"
                                                    class="card-link">Edit</a>

                                                <a href="/admin/evacuation/{{ $evacuationcenter->id }}"
                                                    class="card-link"
                                                    onclick="event.preventDefault();document.getElementById('delete-evac').submit()">Delete</a>

                                                <form id="delete-evac"
                                                    action="/admin/evacuation/{{ $evacuationcenter->id }}" method="POST"
                                                    class="hidden">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <form id="approve-evac"
                                                    action="/admin/evacuation/approve/{{ $evacuationcenter->id }}"
                                                    method="POST" class="hidden">
                                                    @csrf
                                                    @method('POST')
                                                </form>

                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="d-grid gap-2 mt-3 d-md-flex justify-content-center">
                                        {{ $evacuationcenters->links() }}
                                    </div>



                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-8">
                                    <div id="evac_map" style="height:100%; width: 100%;"></div>
                                </div>


                            </div>

                        @else
                            <div class="card">
                                <div class="card-body">
                                    There are no evacuation centers added yet.
                                </div>
                            </div>
                        @endif
                    </div>


                    <div class="tab-pane fade" id="pills-table" role="tabpanel" aria-labelledby="pills-table-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Added By</th>
                                        <th>Evacuation Name</th>
                                        <th>Nearest Landmark</th>
                                        <th>Barangay Location</th>
                                        <th>Phone Number</th>
                                        <th>Capacity</th>
                                        <th>Status</th>
                                        <th>Approved</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


                @if (Auth::user()->user_role === 2)
                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            @foreach ($evacuationcenters as $evacuationcenter)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><span
                                                class="badge badge-primary mr-3">{{ $evacuationcenter->id }}</span>{{ $evacuationcenter->evac_name }}
                                        </h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $evacuationcenter->brgy_loc }}
                                        </h6>
                                        <p class="card-text">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Nearest Landmark:
                                                {{ $evacuationcenter->nearest_landmark }}</li>
                                            <li class="list-group-item">Contact Number:
                                                {{ $evacuationcenter->phone_no }}</li>
                                            <li class="list-group-item">Capacity: {{ $evacuationcenter->capacity }}
                                            </li>
                                            @if ($evacuationcenter->availability === 'Available')
                                                <li class="list-group-item"><span
                                                        class="badge badge-success">{{ $evacuationcenter->availability }}</span>
                                                </li>
                                            @else
                                                <li class="list-group-item"><span
                                                        class="badge badge-danger">{{ $evacuationcenter->availability }}</span>
                                                </li>
                                            @endif
                                        </ul>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-8">
                            <div id="evac_map" style="height:100%; width: 100%;"></div>
                        </div>
                    </div>

                @endif

            </div>
        </div>


    </div>


    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOhN8Ve4h6uAEKm4Kh_2eznLfx0GIbOTo&callback=initMap">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.evacuation.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'added_by',
                        name: 'added_by'
                    },
                    {
                        data: 'evac_name',
                        name: 'evac_name'
                    },
                    {
                        data: 'nearest_landmark',
                        name: 'nearest_landmark'
                    },
                    {
                        data: 'brgy_loc',
                        name: 'brgy_loc'
                    },
                    {
                        data: 'phone_no',
                        name: 'phone_no'
                    },
                    {
                        data: 'capacity',
                        name: 'capacity'
                    },
                    {
                        data: 'availability',
                        name: 'availability'
                    },
                    {
                        data: 'is_approved',
                        name: 'is_approved'
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

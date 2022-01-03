@extends('layouts.master')

@section('title', '| Evacuation Centers and Hospitals')
@section('content')
    <!--- COMMENTS (not yet accomplished): admin changeable buttons on the dropdown, resident side (not yet checked) -->
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

            var userBrgy = @json($barangays);
            var userLat = userBrgy[0]['brgy_lat'];
            var userLng = userBrgy[0]['brgy_lng'];

            @if (Auth::user()->user_role == 1)
                var options = {
                zoom: 12,
                center: {
                lat: 14.5764,
                lng: 121.0851
                },
                }
            
                var options2 = {
                zoom: 13,
                center: {
                lat: 14.5764,
                lng: 121.0851
                },
                }
            
            @elseif (Auth::user()->user_role >= 2)
                var options = {
                zoom: 12,
                center: {
                lat: userLat,
                lng: userLng
                },
                }
            
                var options2 = {
                zoom: 13,
                center: {
                lat: userLat,
                lng: userLng
                },
                }
            @endif




            var map = new google.maps.Map(document.getElementById('evac_map'), options);
            var allmap = new google.maps.Map(document.getElementById('evac_map_all'), options2);

            //paginate map
            var markers = [
                @foreach ($evacuationcenters as $evacuationcenter)
                    ["{{ $evacuationcenter->evac_latitude }}", //0
                    "{{ $evacuationcenter->evac_longitude }}", //1
                    "{{ $evacuationcenter->is_approved }}", //2
                    "{{ $evacuationcenter->id }}", //3
                    "{{ $evacuationcenter->evac_name }}", //4
                    "{{ $evacuationcenter->brgy_loc }}", //5
                    "{{ $evacuationcenter->nearest_landmark }}", //6
                    "{{ $evacuationcenter->phone_no }}", //7
                    "{{ $evacuationcenter->capacity }}", //8
                    "{{ $evacuationcenter->availability }}", //9
                    ],
                @endforeach
            ];

            var is_added_marker = "https://kabisigapp.com/img/greenmarker.png"
            var is_not_added_marker = "https://kabisigapp.com/img/redmarker.png"

            for (var i = 0; i < markers.length; i++) {
                var data = markers[i]
                var location = new google.maps.LatLng(data[0], data[1]);

                if (data[2] == '0') {
                    if (data[9] == 'Not Available') {
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map,
                            icon: data[2] == "1" ? is_added_marker : is_not_added_marker,
                            html: '<div class="card">' + '<div class="card-body">' +
                                '<h5><span class="badge badge-danger">Not yet Approved</span></h5>' +
                                '<h5 class="card-title"><strong>' + data[4] + '</strong></h5>' +
                                ' <h6 class="card-subtitle mb-2 text-muted">' + data[5] + '</h6>' +
                                '<p class="card-text"><div class="content mb-2"><i class="fas fa-directions mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Nearest Landmark: </span>' + data[6] +
                                '</div>' +
                                '<div class="content mb-2"><i class="fas fa-phone-square-alt mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Contact Number: </span>' + data[7] +
                                '</div>' +
                                '<div class="content mb-2"> <i class="fas fa-users mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Capacity: </span>' + data[8] +
                                '</div>' +
                                '<div class="content mb-2"><span class="badge badge-danger"> Not Available </span></div>' +
                                '</p>' +
                                '</div>' +
                                '</div>',
                        });
                    } else {
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map,
                            icon: data[2] == "1" ? is_added_marker : is_not_added_marker,
                            html: '<div class="card">' + '<div class="card-body">' +
                                '<h5><span class="badge badge-danger">Not yet Approved</span></h5>' +
                                '<h5 class="card-title"><strong>' + data[4] + '</strong></h5>' +
                                ' <h6 class="card-subtitle mb-2 text-muted">' + data[5] + '</h6>' +
                                '<p class="card-text"><div class="content mb-2"><i class="fas fa-directions mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Nearest Landmark: </span>' + data[6] +
                                '</div>' +
                                '<div class="content mb-2"><i class="fas fa-phone-square-alt mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Contact Number: </span>' + data[7] +
                                '</div>' +
                                '<div class="content mb-2"> <i class="fas fa-users mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Capacity: </span>' + data[8] +
                                '</div>' +
                                '<div class="content mb-2"><span class="badge badge-success"> Available </span></div>' +
                                '</p>' +
                                '</div>' +
                                '</div>',
                        });
                    }
                } else {
                    if (data[9] == 'Not Available') {
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map,
                            icon: data[2] == "1" ? is_added_marker : is_not_added_marker,
                            html: '<div class="card">' + '<div class="card-body">' +
                                '<h5 class="card-title"><strong>' + data[4] + '</strong></h5>' +
                                ' <h6 class="card-subtitle mb-2 text-muted">' + data[5] + '</h6>' +
                                '<p class="card-text"><div class="content mb-2"><i class="fas fa-directions mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Nearest Landmark: </span>' + data[6] +
                                '</div>' +
                                '<div class="content mb-2"><i class="fas fa-phone-square-alt mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Contact Number: </span>' + data[7] +
                                '</div>' +
                                '<div class="content mb-2"> <i class="fas fa-users mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Capacity: </span>' + data[8] +
                                '</div>' +
                                '<div class="content mb-2"><span class="badge badge-danger"> Not Available </span></div>' +
                                '</p>' +
                                '</div>' +
                                '</div>',
                        });
                    } else {
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map,
                            icon: data[2] == "1" ? is_added_marker : is_not_added_marker,
                            html: '<div class="card">' + '<div class="card-body">' +
                                '<h5 class="card-title"><strong>' + data[4] + '</strong></h5>' +
                                ' <h6 class="card-subtitle mb-2 text-muted">' + data[5] + '</h6>' +
                                '<p class="card-text"><div class="content mb-2"><i class="fas fa-directions mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Nearest Landmark: </span>' + data[6] +
                                '</div>' +
                                '<div class="content mb-2"><i class="fas fa-phone-square-alt mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Contact Number: </span>' + data[7] +
                                '</div>' +
                                '<div class="content mb-2"> <i class="fas fa-users mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Capacity: </span>' + data[8] +
                                '</div>' +
                                '<div class="content mb-2"><span class="badge badge-success"> Available </span></div>' +
                                '</p>' +
                                '</div>' +
                                '</div>',
                        });
                    }
                }

                (function(marker, data) {
                    google.maps.event.addListener(marker, "click", function(e) {
                        infoWindow.setContent(marker.html);
                        infoWindow.open(map, marker);
                    });
                })(marker, data);

            }

            //ALL EVAC MAP
            var allMarkers = [
                @foreach ($evacmaps as $evacmap)
                    ["{{ $evacmap->evac_latitude }}","{{ $evacmap->evac_longitude }}",
                    "{{ $evacmap->is_approved }}",
                    "{{ $evacmap->id }}",
                    "{{ $evacmap->evac_name }}",
                    "{{ $evacmap->brgy_loc }}",
                    "{{ $evacmap->nearest_landmark }}",
                    "{{ $evacmap->phone_no }}",
                    "{{ $evacmap->capacity }}",
                    "{{ $evacmap->availability }}",
                    ],
                @endforeach
            ];

            var infoWindow = new google.maps.InfoWindow();



            for (var i = 0; i < allMarkers.length; i++) {
                var data = allMarkers[i]
                var success_badge = '<span class="badge badge-success">' + data[9] + '</span>';
                var danger_badge = '<span class="badge badge-danger">' + data[9] + '</span>';
                var location = new google.maps.LatLng(data[0], data[1]);

                if (data[2] == '0') {
                    if (data[9] == 'Not Available') {
                        var marker = new google.maps.Marker({
                            position: location,
                            map: allmap,
                            icon: data[2] == "1" ? is_added_marker : is_not_added_marker,
                            html: '<div class="card">' + '<div class="card-body">' +
                                '<h5><span class="badge badge-danger">Not yet Approved</span></h5>' +
                                '<h5 class="card-title"><strong>' + data[4] + '</strong></h5>' +
                                ' <h6 class="card-subtitle mb-2 text-muted">' + data[5] + '</h6>' +
                                '<p class="card-text"><div class="content mb-2"><i class="fas fa-directions mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Nearest Landmark: </span>' + data[6] +
                                '</div>' +
                                '<div class="content mb-2"><i class="fas fa-phone-square-alt mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Contact Number: </span>' + data[7] +
                                '</div>' +
                                '<div class="content mb-2"> <i class="fas fa-users mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Capacity: </span>' + data[8] +
                                '</div>' +
                                '<div class="content mb-2"><span class="badge badge-danger"> Not Available </span></div>' +
                                '</p>' +
                                '</div>' +
                                '</div>',
                        });
                    } else {
                        var marker = new google.maps.Marker({
                            position: location,
                            map: allmap,
                            icon: data[2] == "1" ? is_added_marker : is_not_added_marker,
                            html: '<div class="card">' + '<div class="card-body">' +
                                '<h5><span class="badge badge-danger">Not yet Approved</span></h5>' +
                                '<h5 class="card-title"><strong>' + data[4] + '</strong></h5>' +
                                ' <h6 class="card-subtitle mb-2 text-muted">' + data[5] + '</h6>' +
                                '<p class="card-text"><div class="content mb-2"><i class="fas fa-directions mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Nearest Landmark: </span>' + data[6] +
                                '</div>' +
                                '<div class="content mb-2"><i class="fas fa-phone-square-alt mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Contact Number: </span>' + data[7] +
                                '</div>' +
                                '<div class="content mb-2"> <i class="fas fa-users mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Capacity: </span>' + data[8] +
                                '</div>' +
                                '<div class="content mb-2"><span class="badge badge-success"> Available </span></div>' +
                                '</p>' +
                                '</div>' +
                                '</div>',
                        });
                    }
                } else {
                    if (data[9] == 'Not Available') {
                        var marker = new google.maps.Marker({
                            position: location,
                            map: allmap,
                            icon: data[2] == "1" ? is_added_marker : is_not_added_marker,
                            html: '<div class="card">' + '<div class="card-body">' +
                                '<h5 class="card-title"><strong>' + data[4] + '</strong></h5>' +
                                ' <h6 class="card-subtitle mb-2 text-muted">' + data[5] + '</h6>' +
                                '<p class="card-text"><div class="content mb-2"><i class="fas fa-directions mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Nearest Landmark: </span>' + data[6] +
                                '</div>' +
                                '<div class="content mb-2"><i class="fas fa-phone-square-alt mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Contact Number: </span>' + data[7] +
                                '</div>' +
                                '<div class="content mb-2"> <i class="fas fa-users mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Capacity: </span>' + data[8] +
                                '</div>' +
                                '<div class="content mb-2"><span class="badge badge-danger"> Not Available </span></div>' +
                                '</p>' +
                                '</div>' +
                                '</div>',
                        });
                    } else {
                        var marker = new google.maps.Marker({
                            position: location,
                            map: allmap,
                            icon: data[2] == "1" ? is_added_marker : is_not_added_marker,
                            html: '<div class="card">' + '<div class="card-body">' +
                                '<h5 class="card-title"><strong>' + data[4] + '</strong></h5>' +
                                ' <h6 class="card-subtitle mb-2 text-muted">' + data[5] + '</h6>' +
                                '<p class="card-text"><div class="content mb-2"><i class="fas fa-directions mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Nearest Landmark: </span>' + data[6] +
                                '</div>' +
                                '<div class="content mb-2"><i class="fas fa-phone-square-alt mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Contact Number: </span>' + data[7] +
                                '</div>' +
                                '<div class="content mb-2"> <i class="fas fa-users mr-2 color"></i>' +
                                '<span class="text-primary font-weight-bold"> Capacity: </span>' + data[8] +
                                '</div>' +
                                '<div class="content mb-2"><span class="badge badge-success"> Available </span></div>' +
                                '</p>' +
                                '</div>' +
                                '</div>',
                        });
                    }
                }

                (function(marker, data) {
                    google.maps.event.addListener(marker, "click", function(e) {
                        infoWindow.setContent(marker.html);
                        infoWindow.open(allmap, marker);
                    });
                })(marker, data);

            }

            console.log(allMarkers);
        }
    </script>

    <div class="container-fluid mb-5" style="color: black;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">Evacuation Centers and Nearby Hospitals</h1>

            @if (Auth::user()->user_role >= 3)
                <a href="{{ route('user.evacuation.create') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i>
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
                            aria-controls="pills-map" aria-selected="true"><i class="fas fa-columns"
                                onClick="window.location.reload();"></i></a>
                    </li>
                    @if (Auth::user()->user_role == 1 || Auth::user()->user_role >= 4)
                        <li class="nav-item">
                            <a class="nav-link" id="pills-table-tab" data-toggle="pill" href="#pills-table" role="tab"
                                aria-controls="pills-table" aria-selected="false"><i class="fas fa-list"></i></a>
                        </li>

                    @endif
                    <li class="nav-item">
                        <a class="nav-link" id="pills-allMap-tab" data-toggle="pill" href="#pills-allMap" role="tab"
                            aria-controls="pills-allMap" aria-selected="false"><i class="fas fa-map-marked-alt"></i></a>
                    </li>

                </ul>
                <!-- MAP AND DETAILS -->
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
                                                <h5 class="card-title">
                                                    <strong>{{ $evacuationcenter->evac_name }}</strong>
                                                </h5>
                                                <h6 class="card-subtitle mb-2 text-muted">
                                                    {{ $evacuationcenter->brgy_loc }}
                                                </h6>
                                                <p class="card-text">
                                                <div class="content">
                                                    <i class="fas fa-directions mr-2 color"></i> <span
                                                        class="text-primary font-weight-bold"> Nearest Landmark:</span>
                                                    {{ $evacuationcenter->nearest_landmark }}
                                                </div>

                                                <div class="content">
                                                    <i class="fas fa-phone-square-alt mr-2 color"></i> <span
                                                        class="text-primary font-weight-bold">Contact Number:</span>
                                                    {{ $evacuationcenter->phone_no }}
                                                </div>


                                                <div class="content">
                                                    <i class="fas fa-users mr-2 color"></i> <span
                                                        class="text-primary font-weight-bold">Capacity:</span>
                                                    {{ $evacuationcenter->capacity }}
                                                </div>


                                                <div class="content">
                                                    @if ($evacuationcenter->availability === 'Available')
                                                        <span
                                                            class="badge badge-success">{{ $evacuationcenter->availability }}</span>

                                                    @else
                                                        <span
                                                            class="badge badge-danger">{{ $evacuationcenter->availability }}</span>

                                                    @endif
                                                </div>


                                                </p>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="d-grid gap-2 mt-3 d-md-flex justify-content-center">
                                        {{ $evacuationcenters->links() }}
                                    </div>



                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-8">
                                    <div id="evac_map" style="height:500px; width: 100%;"></div>
                                    <h6 class="mt-3 font-weight-bold">Legend:</h6>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class="fas fa-map-marker mr-2"
                                                style="color:#00a79d"></i>Approved</li>
                                        <li class="list-inline-item"><i class="fas fa-map-marker mr-2"
                                                style="color:#fb5968"></i>Not yet approved</li>
                                    </ul>
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

                    <!-- TABLE -->
                    <div class="tab-pane fade" id="pills-table" role="tabpanel" aria-labelledby="pills-table-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" id="dataTable" width="100%" cellspacing="0"
                                style="color:#464646 !important">
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

                    <!-- ALL EVAC MAPS -->
                    <div class="tab-pane fade" id="pills-allMap" role="tabpanel" aria-labelledby="pills-allMap-tab">
                        @if (count($evacmaps) > 0)
                            <div class="container-fluid">

                                @if (Auth::user()->user_role == 1)
                                    <div class="dropdown">
                                        <button class="btn btn-primary" type="button" id="dropdownMenu2"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-caret-down"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            @foreach ($barangays as $barangay)
                                                <button class="dropdown-item" id="{{ $barangay->id }}"
                                                    type="button">{{ $barangay->brgy_loc }}</button>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div id="evac_map_all" class="map-container mt-3" style="height: 500px; width:100%;"></div>
                                <h6 class="mt-3 font-weight-bold">Legend:</h6>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fas fa-map-marker mr-2"
                                            style="color:#00a79d"></i>Approved</li>
                                    <li class="list-inline-item"><i class="fas fa-map-marker mr-2"
                                            style="color:#fb5968"></i>Not yet approved</li>
                                </ul>


                            </div>

                        @else

                            <div class="card">
                                <div class="card-body">
                                    There are no evacuation centers added yet.
                                </div>
                            </div>

                        @endif

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


    @if (Auth::user()->user_role == 1)


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


                $(document).on('click', '#deleteEvacuationBtn', function() {
                    var evacuation_id = $(this).data('id');
                    console.log(evacuation_id);

                    var row = table.row($(this).closest('tr'));
                    var data_row = row.data();

                    swal({
                            title: "Are you sure?",
                            text: "You want to delete this evacaution center?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                                });

                                $.ajax({
                                    url: "https://kabisigapp.com/admin/evacuation/" + evacuation_id,
                                    type: 'DELETE',
                                    dataType: 'JSON',
                                    data: {
                                        "id": evacuation_id
                                    },

                                    success: function(response) {
                                        //row.remove().draw();
                                        table.ajax.reload();
                                        swal("Deleted!", response.message, "success");
                                    },

                                    error: function(response) {
                                        console.log(response);
                                    }
                                });
                            } else {
                                swal("No changes were made!");
                            }
                        });


                });


                $(document).on('click', '#approveEvacuationBtn', function() {
                    var evacuation_id = $(this).data('id');
                    console.log(evacuation_id);

                    var row = table.row($(this).closest('tr'));
                    var data_row = row.data();

                    swal({
                            title: "Are you sure?",
                            text: "You want to approve this evacaution center?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                                });

                                $.ajax({
                                    url: "https://kabisigapp.com/admin/evacuation/approve/" +
                                        evacuation_id,
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: {
                                        "id": evacuation_id
                                    },

                                    success: function(response) {
                                        //row.remove().draw();
                                        table.ajax.reload();
                                        swal("Approved!", response.message, "success");
                                    },

                                    error: function(response) {
                                        console.log(response);
                                    }
                                });
                            } else {
                                swal("No changes were made!");
                            }
                        });


                });

            });
        </script>

    @elseif (Auth::user()->user_role >= 4)
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('user.evacuation.index') }}",
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


                $(document).on('click', '#deleteEvacuationBtn', function() {
                    var evacuation_id = $(this).data('id');
                    console.log(evacuation_id);

                    var row = table.row($(this).closest('tr'));
                    var data_row = row.data();

                    swal({
                            title: "Are you sure?",
                            text: "You want to delete this evacaution center?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                                });

                                $.ajax({
                                    url: "https://kabisigapp.com/user/evacuation/" + evacuation_id,
                                    type: 'DELETE',
                                    dataType: 'JSON',
                                    data: {
                                        "id": evacuation_id
                                    },

                                    success: function(response) {
                                        //row.remove().draw();
                                        table.ajax.reload();
                                        swal("Deleted!", response.message, "success");
                                    },

                                    error: function(response) {
                                        console.log(response);
                                    }
                                });
                            } else {
                                swal("No changes were made!");
                            }
                        });


                });


                $(document).on('click', '#approveEvacuationBtn', function() {
                    var evacuation_id = $(this).data('id');
                    console.log(evacuation_id);

                    var row = table.row($(this).closest('tr'));
                    var data_row = row.data();

                    swal({
                            title: "Are you sure?",
                            text: "You want to approve this evacaution center?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                                });

                                $.ajax({
                                    url: "https://kabisigapp.com/user/evacuation/approve/" +
                                        evacuation_id,
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: {
                                        "id": evacuation_id
                                    },

                                    success: function(response) {
                                        //row.remove().draw();
                                        table.ajax.reload();
                                        swal("Approved!", response.message, "success");
                                    },

                                    error: function(response) {
                                        console.log(response);
                                    }
                                });
                            } else {
                                swal("No changes were made!");
                            }
                        });


                });

            });
        </script>


    @endif

@endsection

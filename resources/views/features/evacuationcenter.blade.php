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
            var allmap = new google.maps.Map(document.getElementById('evac_map_all'), options);

            //paginate map
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
                var success_badge = '<span class="badge badge-success">' + data[8] + '</span>';
                var location = new google.maps.LatLng(data[0], data[1]);
                var marker = new google.maps.Marker({
                    position: location,
                    map: allmap,
                    label: data[3],
                    icon: data[2] == "1" ? is_added_marker : is_not_added_marker,
                    html: '<div class="card">' + '<div class="card-body">' +
                        '<h5 class="card-title"><span class="badge badge-primary mr-3">'+ data[3] +'</span><strong>'+ data[4]+ '</strong></h5>'+
                        ' <h6 class="card-subtitle mb-2 text-muted">'+ data[5]+ '</h6>' +
                        '<p class="card-text">' +
                        '<ul class="list-group list-group-flush">' +
                        '<li class="list-group-item"><i class="fas fa-directions mr-2 color"></i>Nearest Landmark: ' +
                        data[6] + '</li>' +
                        '<li class="list-group-item"><i class="fas fa-phone-square-alt mr-2 color"></i>Contact Number: ' +
                        data[7] + '</li>' +
                        '<li class="list-group-item"><i class="fas fa-users mr-2 color"></i>Capacity: ' + data[8] +
                        '</li>' +
                        '<li class="list-group-item"></li>' +
                        '<li class="list-group-item"></li>' +
                        '</ul>' +
                        '</p>' +
                        '</div>' +
                        '</div>',
                });


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
                            aria-controls="pills-map" aria-selected="true"><i class="far fa-map"
                                onClick="window.location.reload();"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-table-tab" data-toggle="pill" href="#pills-table" role="tab"
                            aria-controls="pills-table" aria-selected="false"><i class="fas fa-list"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-allMap-tab" data-toggle="pill" href="#pills-allMap" role="tab"
                            aria-controls="pills-allMap" aria-selected="false"><i class="fas fa-map-marked-alt"></i></a>
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

                    <div class="tab-pane fade" id="pills-allMap" role="tabpanel" aria-labelledby="pills-allMap-tab">
                        @if (count($evacmaps) > 0)
                            <div class="container-fluid">
                                <div class="dropdown">
                                    <button class="btn btn-primary" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        @foreach ($barangays as $barangay)
                                            <button class="dropdown-item"
                                                type="button">{{ $barangay->brgy_loc }}</button>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="map-container mt-3">
                                    <div id="evac_map_all" style="height: 400px; width:auto;"></div>
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

@endsection

@extends('layouts.master')
@section('title', '| Add Barangays')
@section('content')

    <script type="text/javascript">
        function initMap() {
            @if (Auth::user()->user_role == 1)
                var options = {
                zoom: 13,
                center: {
                lat: 14.5764,
                lng: 121.0851
                },
                }
            @endif

            var map = new google.maps.Map(document.getElementById('map'), options);

            var markers = [
                @foreach ($barangays as $barangay)
                    ["{{ $barangay->brgy_lat }}","{{ $barangay->brgy_lng }}", "{{ $barangay->brgy_loc }}",
                    "{{ $barangay->is_added }}", "{{ $barangay->id }}"],
                
                @endforeach
            ];

            var is_added_marker = "https://kabisigapp.com/img/greenmarker.png"
            var is_not_added_marker = "https://kabisigapp.com/img/redmarker.png"

            var infoWindow = new google.maps.InfoWindow();

            for (var i = 0; i < markers.length; i++) {
                var data = markers[i]
                var location = new google.maps.LatLng(data[0], data[1]);
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    label: data[4],
                    icon: data[3] == "1" ? is_added_marker : is_not_added_marker,
                    html: '<h5>' + data[2] + '</h5> ' +

                        '<div class="d-grid gap-2 d-md-flex justify-content-md-center">' +

                        '<form action="/admin/managebarangay/addbarangaymap/' + data[4] + '" method="POST">' +
                        '@csrf' +
                        '@method("POST")' +
                        '<button class="btn btn-success mr-3">Add</button>' +
                        '</form>' +

                        '<form action="/admin/managebarangay/deletebarangay/' + data[4] + '" method="POST">' +
                        '@csrf' +
                        '@method("POST")' +
                        '<button class="btn btn-warning">Archive</button>' +
                        '</form>' +

                        '</div>'


                });

                (function(marker, data) {
                    google.maps.event.addListener(marker, "click", function(e) {
                        infoWindow.setContent(marker.html);
                        infoWindow.open(map, marker);
                    });
                })(marker, data);

            }
        }
    </script>
    <div class="container-fluid" style="color: black;">
        <h1 class="h3 mb-0 text-gray-800">Manage Barangays</h1>

        @if (Session::get('success'))
            <div class="alert alert-success mt-3 mb-3">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                <ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-table-tab" data-toggle="pill" href="#pills-table" role="tab"
                            aria-controls="pills-table" aria-selected="true"><i class="fas fa-list"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab"
                            aria-controls="pills-map" aria-selected="false"><i class="fas fa-columns"
                                onClick="window.location.reload();"></i></a>
                    </li>

                </ul>

                <div class="tab-content" id="pills-tabContent">
                     <!-- TABLE -->
                    <div class="tab-pane fade show active" id="pills-table" role="tabpanel"
                        aria-labelledby="pills-table-tab">
                        <div class="table-responsive">
                            <table class="table data-table" id="dataTable" width="100%" cellspacing="0" style="color:#464646 !important">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Barangay</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <!-- MAP -->
                    <div class="tab-pane fade " id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                        <div id="map" style="height: 600px; width: 100%;"></div>
                        <h6 class="mt-3 font-weight-bold">Legend:</h6>
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fas fa-map-marker mr-2"
                                    style="color:#00a79d"></i>Added</li>
                            <li class="list-inline-item"><i class="fas fa-map-marker mr-2" style="color:#fb5968"></i>Not yet
                                added</li>
                        </ul>
                    </div>

                </div>
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
                ajax: "{{ route('admin.managebarangay.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'brgy_loc',
                        name: 'brgy_loc'
                    },
                    {
                        data: 'is_added',
                        name: 'is_added'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],

            });

            $(document).on('click', '#addbtn', function() {
                var brgy_id = $(this).data('id');

                swal({
                        title: "Are you sure?",
                        text: "You want to add this barangay?",
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
                                url: "https://kabisigapp.com/admin/managebarangay/addbarangay/" +
                                    brgy_id,
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": brgy_id
                                },

                                success: function(response) {
                                    //row.remove().draw();
                                    table.ajax.reload();
                                    swal("Added!", response.message, "success");
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


            $(document).on('click', '#archivebtn', function() {
                var brgy_id = $(this).data('id');

                swal({
                        title: "Are you sure?",
                        text: "You want to archive this barangay?",
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
                                url: "https://kabisigapp.com/admin/managebarangay/delete/" +
                                    brgy_id,
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    "id": brgy_id
                                },

                                success: function(response) {
                                    //row.remove().draw();
                                    table.ajax.reload();
                                    swal("Archived!", response.message, "success");
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

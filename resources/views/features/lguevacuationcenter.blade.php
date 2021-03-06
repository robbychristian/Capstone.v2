@extends('layouts.master')

@section('title', '| Evacuation Centers and Hospitals')
@section('content')
    <!--- COMMENTS (not yet accomplished): admin changeable buttons on the dropdown -->


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

            //parsed

            var userLatparse = parseFloat(userLat);
            var userLngparse = parseFloat(userLng);

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
            //var brgyLat = document.getElementById("").value;
            //var brgyLat = $('.changeBrgy').attr("data-lat");
            //var brgyLng = $('.changeBrgy').attr("data-lng");
            //
            //function newLocation(newLat, newLng) {
            //    map.setCenter({
            //        lat: newLat,
            //        lng: newLng
            //    });
            //}
            //
            //$(document).ready(function() {
            //    $("#changeBrgy").on('click', function() {
            //        var brgyLat = $(this).attr('data-lat');
            //        var brgyLng = $(this).attr('data-lng');
            //        console.log(brgyLat)
            //        console.log(brgyLng)
            //    });
            //
            //});

            function newLocation(newLat, newLng) {
                allmap.setCenter({
                    lat: newLat,
                    lng: newLng
                });
                allmap.setZoom(16);
            }

            $(document).ready(function() {
                $("#1").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Bagong Ilog";
                    newLocation(14.5654, 121.0693);
                });

                $("#2").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Bagong Katipunan";
                    newLocation(14.5591, 121.0747);
                });

                $("#3").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Bambang";
                    newLocation(14.5554, 121.0801);
                });

                $("#4").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Buting";
                    newLocation(14.5547, 121.0672);
                });

                $("#5").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Caniogan";
                    newLocation(14.5719, 121.0779);
                });
                $("#6").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Kalawaan";
                    newLocation(14.5488, 121.0866);
                });
                $("#7").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Kapasigan";
                    newLocation(14.5638, 121.0758);
                });
                $("#8").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Kapitolyo";
                    newLocation(14.5692, 121.0602);
                });
                $("#9").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Malinao";
                    newLocation(14.5595, 121.0787);
                });
                $("#10").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Oranbo";
                    newLocation(14.5758, 121.0643);
                });
                $("#11").on('click', function() { //parang wala sa maps
                    document.getElementById('barangay-name').innerHTML = "Barangay Palatiw";
                    newLocation(14.5636, 121.0858);
                });
                $("#12").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Pineda";
                    newLocation(14.5636, 121.0636);
                });
                $("#13").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Sagad";
                    newLocation(14.5656, 121.0790);
                });
                $("#14").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay San Antonio";
                    newLocation(14.5827, 121.0615);
                });
                $("#15").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay San Joaquin";
                    newLocation(14.5522, 121.0758);
                });
                $("#16").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay San Jose";
                    newLocation(14.5605, 121.0740);
                });
                $("#17").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay San Nicolas";
                    newLocation(14.5609, 121.0804);
                });
                $("#18").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Sta. Cruz";
                    newLocation(14.5629, 121.0797);
                });
                $("#19").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Sta. Rosa";
                    newLocation(14.5577, 121.0711);
                });
                $("#20").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Sto. Tomas";
                    newLocation(14.5615, 121.0830);
                });
                $("#21").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Sumilang";
                    newLocation(14.5563, 121.0744);
                });
                $("#22").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Ugong";
                    newLocation(14.5829, 121.0726);
                });
                $("#23").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Dela Paz";
                    newLocation(14.6137, 121.0960);
                });
                $("#24").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Manggahan";
                    newLocation(14.60188, 121.093698);
                });
                $("#25").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Maybunga";
                    newLocation(14.5763, 121.0850);
                });
                $("#26").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Pinagbuhatan";
                    newLocation(14.5497, 121.0977);
                });
                $("#27").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Rosario";
                    newLocation(14.5885, 121.0891);
                });
                $("#28").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay San Miguel";
                    newLocation(14.5672, 121.0923);
                });
                $("#29").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Santolan";
                    newLocation(14.6131, 121.0880);
                });
                $("#30").on('click', function() {
                    document.getElementById('barangay-name').innerHTML = "Barangay Sta. Lucia";
                    newLocation(14.5840, 121.1012);
                });
            });


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

                    <li class="nav-item">
                        <a class="nav-link" id="pills-table-tab" data-toggle="pill" href="#pills-table" role="tab"
                            aria-controls="pills-table" aria-selected="false"><i class="fas fa-list"></i></a>
                    </li>


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

                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h3 class="h3 text-gray-800" id="barangay-name"></h3>
                                <div class="dropdown">
                                    <button class="btn btn-primary" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-caret-down"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        @foreach ($barangays as $barangay)
                                            <button class="dropdown-item changeBrgy" id="{{ $barangay->id }}"
                                                data-lat="{{ $barangay->brgy_lat }}"
                                                data-lng="{{ $barangay->brgy_lng }}"
                                                type="button">{{ $barangay->brgy_loc }}</button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <div id="evac_map_all" class="map-container mt-3" style="height: 500px; width:100%;">
                            </div>
                            <h6 class="mt-3 font-weight-bold">Legend:</h6>
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fas fa-map-marker mr-2"
                                        style="color:#00a79d"></i>Approved</li>
                                <li class="list-inline-item"><i class="fas fa-map-marker mr-2" style="color:#fb5968"></i>Not
                                    yet approved</li>
                            </ul>




                        @else

                            <div class="card">
                                <div class="card-body">
                                    There are no evacuation centers added yet.
                                </div>
                            </div>

                        @endif

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
                ajax: "{{ route('user.evacuation-lgu.index') }}",
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
                        name: 'is_approved',
                        orderable: false,
                        searchable: false
                    },

                ],

            });


        });
    </script>




@endsection

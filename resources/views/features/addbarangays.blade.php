@extends('layouts.master')
@section('title', '| Add Barangays')
@section('content')

    <script type="text/javascript">
        function initMap() {
            @if (Auth::user()->user_role == 1)
                var options = {
                zoom: 16,
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
                    html: '<h3>' + data[2] + '</h3> ' +
                        '<button type="button" class="btn btn-success btn-sm btn-block">Add</button>' +
                        '<button type="button" class="btn btn-warning btn-sm btn-block">Archive</button>'
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

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                <div id="map" style="height: 600px; width: 100%;"></div>
            </div>
        </div>
        <div class="table-responsive mt-5">
            <table class="table table-hover">
                <thead style="background-color: #004f91;">
                    <tr>
                        <th scope="col" style="color:white;">#</th>
                        <th scope="col" style="color:white;">Barangay</th>
                        <th scope="col" style="color:white;">Status</th>
                        <th scope="col" style="color:white;" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangays as $barangay)
                        <tr>
                            <th scope="row">{{ $barangay->id }}</th>
                            <td>{{ $barangay->brgy_loc }}</td>
                            <td>
                                @if ($barangay->is_added === 0)
                                    <h4> <span class="badge badge-secondary">Not Added</span></h4>
                                @else
                                    <h4> <span class="badge badge-secondary">Added</span></h4>
                                @endif
                            </td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-success">Add Barangay</button>
                                </form>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-warninh">Archive</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOhN8Ve4h6uAEKm4Kh_2eznLfx0GIbOTo&callback=initMap">
    </script>

@endsection

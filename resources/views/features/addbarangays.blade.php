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

            var is_added_marker = "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
            var is_not_added_marker = "http://maps.google.com/mapfiles/ms/icons/red-dot.png"

            //for (var i = 0; i < markers.length; i++) {
            //    var location = new google.maps.LatLng(markers[i][0], markers[i][1]);
            //    var marker = new google.maps.Marker({
            //        position: location,
            //        map: map,
            //        icon: marker[3] == "1" ? is_added_marker : is_not_added_marker,
            //        l
            //    });
            //
            //
            //}

            for (var i = 0; i < markers.length; i++) {
                var data = markers[i]
                var location = new google.maps.LatLng(data[0], data[1]);
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    label: data[4],
                    //icon: data[3] == "1" ? is_added_marker : is_not_added_marker,
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
    </div>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOhN8Ve4h6uAEKm4Kh_2eznLfx0GIbOTo&callback=initMap">
    </script>

@endsection

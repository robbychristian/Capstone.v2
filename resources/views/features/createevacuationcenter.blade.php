@extends('layouts.master')

@section('title', '| Evacuation Centers and Hospitals')
@section('content')

    <script type="text/javascript">
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

            var map = new google.maps.Map(document.getElementById('map'), options);

            var markers = [
                @foreach ($coordinates as $coordinate)
                    ["{{ $coordinate->lat }}","{{ $coordinate->lng }}"],
                
                @endforeach
            ];

            function newLocation(newLat, newLng) {
                map.setCenter({
                    lat: newLat,
                    lng: newLng
                });
            }
            //Setting Location with jQuery
            $(document).ready(function() {
                $("#brgyDelaPaz").on('click', function() {
                    newLocation(14.6137, 121.0960);
                });

                $("#brgyManggahan").on('click', function() {
                    newLocation(14.601887, 121.093698);
                });

                $("#brgyMaybunga").on('click', function() {
                    newLocation(14.5763, 121.0850);
                });

                $("#brgySantolan").on('click', function() {
                    newLocation(14.6131, 121.0880);
                });

                $("#brgyRosario").on('click', function() {
                    newLocation(14.5885, 121.0891);
                });
            });


            for (var i = 0; i < markers.length; i++) {
                var location = new google.maps.LatLng(markers[i][0], markers[i][1]);
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });


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

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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Disaster Preparedness</h1>

            @if (Auth::user()->user_role === 3)
                <a href="" class="d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>
                    Add Evacuation Centers or Hospitals</a>
            @elseif (Auth::user()->user_role === 1)
                <a href="" class="d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>
                    Add Evacuation Centers or Hospitals</a>
            @endif
        </div>
        @if (Auth::user()->user_role === 1)
            <form class="mb-3">
                <p class="vul-caption mt-3">Choose the barangay:</p>
                <div class="radio-button-wrap mt-2">
                    <input type="radio" name="brgy_loc" id="brgyDelaPaz" value="Barangay Dela Paz" hidden>
                    <label for="brgyDelaPaz" class="button-label">Barangay Dela Paz</label>

                    <input type="radio" name="brgy_loc" id="brgyManggahan" value="Barangay Manggahan" hidden>
                    <label for="brgyManggahan" class="button-label">Barangay Manggahan</label>

                    <input type="radio" name="brgy_loc" id="brgyMaybunga" value="Barangay Maybunga" hidden>
                    <label for="brgyMaybunga" class="button-label">Barangay Maybunga</label>

                    <input type="radio" name="brgy_loc" id="brgySantolan" value="Barangay Santolan" hidden>
                    <label for="brgySantolan" class="button-label">Barangay Santolan</label>

                    <input type="radio" name="brgy_loc" id="brgyRosario" value="Barangay Rosario" hidden>
                    <label for="brgyRosario" class="button-label">Barangay Rosario</label>
                </div>
            </form>
        @endif
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

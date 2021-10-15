@extends('dashboard.admin.home')

@section('title', '| Evacuation Centers and Hospitals')
@section('sub-content')

    <script type="text/javascript">
        function initMap() {
            var options = {
                zoom: 16,
                gestureHandling: "none",
                zoomControl: false,
                center: {
                    lat: 14.6131,
                    lng: 121.0880
                },
            }

            var map = new google.maps.Map(document.getElementById('map'), options);

            var markers = [
                @foreach ($coordinates as $coordinate)
                    ["{{ $coordinate->lat }}","{{ $coordinate->lng }}"],
                
                @endforeach
            ];

            for (var i = 0; i < markers.length; i++) {
                var location = new google.maps.LatLng(markers[i][0], markers[i][1]);
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });


            }
        }
    </script>
    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <h3 class="mb-3">Evacuation Centers and Nearby Hospitals</h3>
        <div id="map" style="height: 600px; width: 100%;"></div>
    </div>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOhN8Ve4h6uAEKm4Kh_2eznLfx0GIbOTo&callback=initMap">
    </script>

@endsection

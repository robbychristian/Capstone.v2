@extends('home')

@section('title', '| Evacuation Centers and Hospitals')
@section('sub-content')
    
    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <h3 class="mb-4">Nearby Evacuation Center and Hospitals</h3>
        <div id="map" style="height: 600px; width: 100%;"></div>
    </div>
    <script>
        function initMap() {
            var options = {
                zoom: 16,
                center: {
                    lat: 14.6131,
                    lng: 121.0880
                }
            }

            var map = new google.maps.Map(document.getElementById('map'), options);
        }
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOhN8Ve4h6uAEKm4Kh_2eznLfx0GIbOTo&callback=initMap">
    </script>

@endsection

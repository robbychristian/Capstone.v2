@extends('layouts.master')

@section('title', '| Add Barangays')

@section('content')

    <form>
        <div class="form-group required">
            <label class="control-label">Name of Barangay</label>
            <input type="text" class="form-control">
            <small class="form-text text-muted">Make sure to put the correct name of the barangay</small>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="control-label">Latitude</label>
                <input class="form-control" type="text" placeholder="Readonly input here..." readonly>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Longitude</label>
                <input class="form-control" type="text" placeholder="Readonly input here..." readonly>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

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

            //var markers = [
            //foreach ($coordinates as $coordinate)
            // ["{{ $coordinate->lat }}","{{ $coordinate->lng }}"],
            //
            // endforeach
            //];

            //function newLocation(newLat, newLng) {
            //    map.setCenter({
            //        lat: newLat,
            //        lng: newLng
            //    });
            //}
            ////Setting Location with jQuery
            //$(document).ready(function() {
            //    $("#brgyDelaPaz").on('click', function() {
            //        newLocation(14.6137, 121.0960);
            //    });
            //
            //    $("#brgyManggahan").on('click', function() {
            //        newLocation(14.601887, 121.093698);
            //    });
            //
            //    $("#brgyMaybunga").on('click', function() {
            //        newLocation(14.5763, 121.0850);
            //    });
            //
            //    $("#brgySantolan").on('click', function() {
            //        newLocation(14.6131, 121.0880);
            //    });
            //
            //    $("#brgyRosario").on('click', function() {
            //        newLocation(14.5885, 121.0891);
            //    });
            //});


            //for (var i = 0; i < markers.length; i++) {
            //    var location = new google.maps.LatLng(markers[i][0], markers[i][1]);
            //    var marker = new google.maps.Marker({
            //        position: location,
            //        map: map
            //    });
            //
            //
            //}
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

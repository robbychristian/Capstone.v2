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

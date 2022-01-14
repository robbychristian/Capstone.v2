@extends('layouts.master')
@section('title', '| Evacuation Centers and Hospitals')
@section('content')

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

            var evac_latitude = document.getElementById("evac_latitude").value;
            var evac_longitude = document.getElementById("evac_longitude").value;

            var options = {
                zoom: 16,
                center: {
                    lat: evac_latitude,
                    lng: evac_longitude
                },
            }

            var map = new google.maps.Map(document.getElementById('evac_map'), options);



            // creates a draggable marker to the given coords

            var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(evac_latitude, evac_longitude),
                draggable: true
            });
            // adds a listener to the marker
            // gets the coords when drag event ends
            // then updates the input with the new coords
            google.maps.event.addListener(vMarker, 'dragend', function(evt) {
                $("#evac_latitude").val(evt.latLng.lat().toFixed(6));
                $("#evac_longitude").val(evt.latLng.lng().toFixed(6));
                map.panTo(evt.latLng);
            });
            // centers the map on markers coords
            map.setCenter(vMarker.position);
            // adds the marker on the map
            vMarker.setMap(map);

            function newLocation(newLat, newLng) {
                map.setCenter({
                    lat: newLat,
                    lng: newLng
                });
                map.setZoom(16);
            }

            $("#dropdown").change(function() {
                var newLat = $("#dropdown option:selected").data('lat');
                var newLng = $("#dropdown option:selected").data('lng');

                var parseLat = parseFloat(newLat);
                var parseLng = parseFloat(newLng);

                console.log(parseLat);
                console.log(parseLng);
                console.log(typeof parseLat);
                console.log(typeof parseLng);
                newLocation(parseLat, parseLng);
            });
        }
    </script>

    <div class="container-fluid mb-5" style="color: black;">
        <h1 class="h3 mb-4 text-gray-800">Add an Evacuation Center or Nearby Hospitals</h1>
        <div class="card">
            <div class="card-body">
                <div class="text-muted"><em>Note: Locate the location first before submitting and make sure
                        to zoom in the map for accuracy of the position. </em></div>
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        @if (Auth::user()->user_role == 1)
                            <form action="/admin/evacuation/{{ $evacuationcenter->id }}" method="POST"
                                style="color: black;">
                            @elseif (Auth::user()->user_role >= 3)
                                <form action="/user/evacuation/{{ $evacuationcenter->id }}" method="POST"
                                    style="color: black;">
                        @endif
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Barangay</label>
                            @if (Auth::user()->user_role === 1)
                                <select name="brgy_loc" class="form-control" id="dropdown">
                                    @foreach ($barangays as $barangay)
                                        <option data-lat={{ $barangay->brgy_lat }} data-lng={{ $barangay->brgy_lng }}
                                            value='{{ $barangay->brgy_loc }}'
                                            {{ $evacuationcenter->brgy_loc == $barangay->brgy_loc ? 'selected' : '' }}>
                                            {{ $barangay->brgy_loc }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif

                            @if (Auth::user()->user_role >= 3)
                                <input class="form-control" type="text" name="brgy_loc"
                                    value="{{ $evacuationcenter->brgy_loc }}" readonly>
                            @endif
                            <small class="text-danger">@error('brgy_loc')
                                    {{ $message }}
                                @enderror</small>
                        </div>

                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="evac_name"
                                value="{{ $evacuationcenter->evac_name }}">

                            <small class="text-danger">@error('evac_name')
                                    {{ $message }}
                                @enderror</small>
                        </div>


                        <div class="form-group">
                            <div class="d-flex flex-row">
                                <div class="d-flex flex-row">
                                    <label>Latitude</label>
                                    <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
                                        data-content="The latitude changes based on the position of the marker on the map."><i
                                            class="fas fa-info-circle text-primary ml-2"></i></a>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="evac_latitude" id="evac_latitude"
                                value="{{ $evacuationcenter->evac_latitude }}" readonly>

                            <small class="text-danger">@error('evac_latitude')
                                    {{ $message }}
                                @enderror</small>
                        </div>


                        <div class="form-group">
                            <div class="d-flex flex-row">
                                <label>Longitude</label>
                                <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
                                    data-content="The longitude changes based on the position of the marker on the map."><i
                                        class="fas fa-info-circle text-primary ml-2"></i></a>
                            </div>
                            <input type="text" class="form-control" name="evac_longitude" id="evac_longitude"
                                value="{{ $evacuationcenter->evac_longitude }}" readonly>
                            <small class="text-danger">@error('evac_longitude')
                                    {{ $message }}
                                @enderror</small>
                        </div>

                        <div class="form-group">
                            <label>Nearest Landmark</label>
                            <input name="nearest_landmark" type="text" class="form-control"
                                value="{{ $evacuationcenter->nearest_landmark }}">
                            <small class="form-text text-muted">Indicate the nearby places in the specified evacuation
                                center.</small>
                            <small class="text-danger">@error('nearest_landmark')
                                    {{ $message }}
                                @enderror</small>
                        </div>

                        <div class="form-group">
                            <label>Contact Number</label>
                            <input name="phone_no" type="text" class="form-control"
                                value="{{ $evacuationcenter->phone_no }}">
                            <small class="text-danger">@error('phone_no')
                                    {{ $message }}
                                @enderror</small>
                        </div>

                        <div class="form-group">
                            <label>Capacity</label>
                            <input name="capacity" type="text" class="form-control"
                                onkeypress="return onlyNumberKey(event)" value="{{ $evacuationcenter->capacity }}">
                            <small class="text-danger">@error('capacity')
                                    {{ $message }}
                                @enderror</small>
                        </div>

                        <div class="form-group">
                            <label>Availability</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="availability" id="" value="Available"
                                    {{ $evacuationcenter->availability == 'Available' ? 'checked' : '' }}>
                                <label class="form-check-label" for="">
                                    Available
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="availability" id="" value="Not Available"
                                    {{ $evacuationcenter->availability == 'Not Available' ? 'checked' : '' }}>
                                <label class="form-check-label" for="">
                                    Not Available
                                </label>
                            </div>

                            <small class="text-danger">@error('availability')
                                    {{ $message }}
                                @enderror</small>
                        </div>



                        <div class="mt-5">
                            <button class="btn btn-primary btn-block" type="submit">Save</button>
                            @if (Auth::user()->user_role == 1)
                                <a class="btn btn-secondary btn-block" href="{{ route('admin.evacuation.index') }}"
                                    role="button">Cancel</a>

                            @elseif (Auth::user()->user_role >= 3)
                                <a class="btn btn-secondary btn-block" href="{{ route('user.evacuation.index') }}"
                                    role="button">Cancel</a>
                            @endif
                        </div>

                        </form>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8">
                        <div id="evac_map" style="height:100%; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOhN8Ve4h6uAEKm4Kh_2eznLfx0GIbOTo&callback=initMap">
    </script>

@endsection

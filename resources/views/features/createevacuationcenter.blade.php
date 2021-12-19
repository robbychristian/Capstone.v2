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

            var map = new google.maps.Map(document.getElementById('evac_map'), options);

            // creates a draggable marker to the given coords
            var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(14.6131, 121.0880),
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
                        <form action="{{ route('admin.evacuation.store') }}" method="POST" style="color: black;">
                            @csrf
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" name="evac_name" value="{{ old('evac_name') }}">

                                <small class="text-danger">@error('evac_name')
                                        {{ $message }}
                                    @enderror</small>
                            </div>


                            <div class="form-group">
                                <div class="d-flex flex-row">
                                    <label>Latitude</label>

                                    <button type="button" class="ml-1 btn btn-info btn-circle btn-sm" data-container="body"
                                        data-toggle="popover" data-placement="right"
                                        data-content="The latitude changes based on the position of the marker on the map.">
                                        <i class="fas fa-info-circle"></i>
                                    </button>

                                </div>
                                <input type="text" class="form-control" name="evac_latitude" id="evac_latitude"
                                    value="{{ old('evac_latitude') }}" readonly>

                                <small class="text-danger">@error('evac_latitude')
                                        {{ $message }}
                                    @enderror</small>
                            </div>


                            <div class="form-group">
                                <div class="d-flex flex-row">
                                    <label>Longitude</label>
                                    <button type="button" class="ml-1 btn btn-info btn-circle btn-sm" data-container="body"
                                        data-toggle="popover" data-placement="right"
                                        data-content="The longitude changes based on the position of the marker on the map.">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control" name="evac_longitude" id="evac_longitude"
                                    value="{{ old('evac_longitude') }}" readonly>
                                <small class="text-danger">@error('evac_longitude')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-group">
                                <label>Nearest Landmark</label>
                                <input name="nearest_landmark" type="text" class="form-control"
                                    value={{ old('nearest_landmark') }}>
                                <small class="form-text text-muted">Indicate the nearby places in the specified evacuation
                                    center.</small>
                                <small class="text-danger">@error('nearest_landmark')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-group">
                                <label>Barangay</label>
                                @if (Auth::user()->user_role === 1)
                                    <select name="brgy_loc" class="form-control">
                                        @foreach ($barangays as $barangay)
                                            <option disabled hidden selected>Select Barangay</option>
                                            <option value='{{ $barangay->brgy_loc }}' {{ old('brgy_loc') == $barangay->brgy_loc ? "selected" : "" }}>{{ $barangay->brgy_loc }}
                                            </option>
                                        @endforeach
                                    </select>
                                @endif

                                @if (Auth::user()->user_role >= 3)
                                    <input class="form-control" type="text" name="brgy_loc"
                                        value="{{ Auth::user()->brgy_loc }}" readonly>
                                @endif
                                <small class="text-danger">@error('brgy_loc')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-group">
                                <label>Contact Number</label>
                                <input name="phone_no" type="text" class="form-control" value={{ old('phone_no') }}>
                                <small class="text-danger">@error('phone_no')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-group">
                                <label>Capacity</label>
                                <input name="capacity" type="text" class="form-control"
                                    onkeypress="return onlyNumberKey(event)" value={{ old('capacity') }}>
                                <small class="text-danger">@error('capacity')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-group">
                                <label>Availability</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="availability" id=""
                                        value="Available">
                                    <label class="form-check-label" for="">
                                        Available
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="availability" id=""
                                        value="Not Available">
                                    <label class="form-check-label" for="">
                                        Not Available
                                    </label>
                                </div>
                                <small class="text-danger">@error('availability')
                                        {{ $message }}
                                    @enderror</small>
                            </div>


                            <div class="mt-5">
                                <button class="btn btn-primary btn-block" type="submit">Add Evacuation Center</button>
                                <a class="btn btn-secondary btn-block" href="{{ route('admin.evacuation.index') }}"
                                    role="button">Cancel</a>
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

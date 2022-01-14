@extends('layouts.master')
@section('title', '| Evacuation Centers and Hospitals')
@section('content')

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })

        $('.popover-dismiss').popover({
            trigger: 'focus'
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
            @if (Auth::user()->user_role == 1)
                var options = {
                zoom: 12,
                center: {
                lat: 14.5764,
                lng: 121.0851
                },
                }
            
                var options2 = {
                zoom: 13,
                center: {
                lat: 14.5764,
                lng: 121.0851
                },
                }
            
            @elseif (Auth::user()->user_role >= 2)
                var options = {
                zoom: 16,
                center: {
                lat: userLatparse,
                lng: userLngparse
                },
                }
            
                var options2 = {
                zoom: 16,
                center: {
                lat: userLatparse,
                lng: userLngparse
                },
                }
            @endif

            var map = new google.maps.Map(document.getElementById('evac_map'), options);

            @if (Auth::user()->user_role >= 3)
                // creates a draggable marker to the given coords
                var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(userLatparse, userLngparse),
                draggable: true
                });
            
            @elseif (Auth::user()->user_role == 1)
                // creates a draggable marker to the given coords
                var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(14.5764, 121.0851),
                draggable: true
                });
            @endif

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

            $(document).ready(function() {
                $("#1").on('click', function() {
                   
                    newLocation(14.5654, 121.0693);
                });

                $("#2").on('click', function() {
                   
                    newLocation(14.5591, 121.0747);
                });

                $("#3").on('click', function() {
                    
                    newLocation(14.5554, 121.0801);
                });

                $("#4").on('click', function() {
                   
                    newLocation(14.5547, 121.0672);
                });

                $("#5").on('click', function() {
                  
                    newLocation(14.5719, 121.0779);
                });
                $("#6").on('click', function() {
                  
                    newLocation(14.5488, 121.0866);
                });
                $("#7").on('click', function() {
                   
                    newLocation(14.5638, 121.0758);
                });
                $("#8").on('click', function() {
                   
                    newLocation(14.5692, 121.0602);
                });
                $("#9").on('click', function() {
                   
                    newLocation(14.5595, 121.0787);
                });
                $("#10").on('click', function() {
                   
                    newLocation(14.5758, 121.0643);
                });
                $("#11").on('click', function() { //parang wala sa maps
                   
                    newLocation(14.5636, 121.0858);
                });
                $("#12").on('click', function() {
                    
                    newLocation(14.5636, 121.0636);
                });
                $("#13").on('click', function() {
                    
                    newLocation(14.5656, 121.0790);
                });
                $("#14").on('click', function() {
                    
                    newLocation(14.5827, 121.0615);
                });
                $("#15").on('click', function() {
                   
                    newLocation(14.5522, 121.0758);
                });
                $("#16").on('click', function() {
                   
                    newLocation(14.5605, 121.0740);
                });
                $("#17").on('click', function() {
                   
                    newLocation(14.5609, 121.0804);
                });
                $("#18").on('click', function() {
                    
                    newLocation(14.5629, 121.0797);
                });
                $("#19").on('click', function() {
                   
                    newLocation(14.5577, 121.0711);
                });
                $("#20").on('click', function() {
                    
                    newLocation(14.5615, 121.0830);
                });
                $("#21").on('click', function() {
                   
                    newLocation(14.5563, 121.0744);
                });
                $("#22").on('click', function() {
                    
                    newLocation(14.5829, 121.0726);
                });
                $("#23").on('click', function() {
                    
                    newLocation(14.6137, 121.0960);
                });
                $("#24").on('click', function() {
                    
                    newLocation(14.60188, 121.093698);
                });
                $("#25").on('click', function() {
                    
                    newLocation(14.5763, 121.0850);
                });
                $("#26").on('click', function() {
                    
                    newLocation(14.5497, 121.0977);
                });
                $("#27").on('click', function() {
                   
                    newLocation(14.5885, 121.0891);
                });
                $("#28").on('click', function() {
                   
                    newLocation(14.5672, 121.0923);
                });
                $("#29").on('click', function() {
                    
                    newLocation(14.6131, 121.0880);
                });
                $("#30").on('click', function() {
                    
                    newLocation(14.5840, 121.1012);
                });
            });
        }
    </script>

    <div class="container-fluid mb-5" style="color: black;">
        <h1 class="h3 mb-4 text-gray-800">Add an Evacuation Center or Nearby Hospitals</h1>
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="text-muted"><em>Note: Locate the location first before submitting and make sure
                            to zoom in the map for accuracy of the position. </em></div>
                    <div class="dropdown">
                        <button class="btn btn-primary" type="button" id="dropdownMenu2" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-caret-down"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            @foreach ($barangays as $barangay)
                                <button class="dropdown-item changeBrgy" id="{{ $barangay->id }}"
                                    data-lat="{{ $barangay->brgy_lat }}" data-lng="{{ $barangay->brgy_lng }}"
                                    type="button">{{ $barangay->brgy_loc }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        @if (Auth::user()->user_role == 1)

                            <form action="{{ route('admin.evacuation.store') }}" method="POST" style="color: black;">
                            @elseif (Auth::user()->user_role >= 3)
                                <form action="{{ route('user.evacuation.store') }}" method="POST" style="color: black;">
                        @endif

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
                                <div class="d-flex flex-row">
                                    <label>Latitude</label>
                                    <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
                                        data-content="The latitude changes based on the position of the marker on the map."><i
                                            class="fas fa-info-circle text-primary ml-2"></i></a>
                                </div>
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
                                <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
                                    data-content="The longitude changes based on the position of the marker on the map."><i
                                        class="fas fa-info-circle text-primary ml-2"></i></a>
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
                                        <option value='{{ $barangay->brgy_loc }}'
                                            {{ old('brgy_loc') == $barangay->brgy_loc ? 'selected' : '' }}>
                                            {{ $barangay->brgy_loc }}
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
                                <input class="form-check-input" type="radio" name="availability" id="" value="Available"
                                    {{ old('availability') == 'Available' ? 'checked' : '' }}>
                                <label class="form-check-label" for="">
                                    Available
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="availability" id="" value="Not Available"
                                    {{ old('availability') == 'Not Available' ? 'checked' : '' }}>
                                <label class="form-check-label" for="">
                                    Not Available
                                </label>
                            </div>
                            <small class="text-danger">@error('availability')
                                    {{ $message }}
                                @enderror</small>
                        </div>

                        <div class="form-group d-none">
                            @if (Auth::user()->user_role >= 4)
                                <input name="is_approved" type="text" class="form-control" value="1">
                            @elseif (Auth::user()->user_role == 3)
                                <input name="is_approved" type="text" class="form-control" value="0">
                            @endif


                        </div>


                        <div class="mt-5">
                            <button class="btn btn-primary btn-block" type="submit">Add Evacuation Center</button>
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

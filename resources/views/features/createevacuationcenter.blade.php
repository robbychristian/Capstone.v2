@extends('layouts.master')
@section('title', '| Evacuation Centers and Hospitals')
@section('content')

    <script>
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

            var map = new google.maps.Map(document.getElementById('map'), options);
        }
    </script>

    <div class="container-fluid mb-5" style="color: black;">
        <h1 class="h3 mb-4 text-gray-800">Add an Evacuation Center</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ route('admin.evacuation.store') }}" method="POST" style="color: black;">
                            @csrf
                            <div class="form-group">
                                <label>Complete Address</label>
                                <input type="text" class="form-control" name="evac_name" value="{{ old('evac_name') }}">

                                <small class="text-danger">@error('evac_name')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" class="form-control" name="evac_latitude"
                                    value="{{ old('evac_latitude') }}" readonly>

                                <small class="text-danger">@error('evac_latitude')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control" name="evac_longitude"
                                    value="{{ old('evac_longitude') }}" readonly>
                                <small class="text-danger">@error('evac_longitude')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-group">
                                <label>Nearest Landmark</label>
                                <input name="nearest_landmark" type="text" class="form-control"
                                    value={{ old('landmark') }}>
                                <small class="form-text text-muted">Indicate the nearby places in the specified evacuation
                                    center.</small>
                                <small class="text-danger">@error('landmark')
                                        {{ $message }}
                                    @enderror</small>
                            </div>

                            <div class="form-group">
                                <label>Barangay</label>
                                @if (Auth::user()->user_role === 1)
                                    <select name="brgy_loc" class="form-control" value="{{ old('brgy_loc') }}">
                                        @foreach ($barangays as $barangay)
                                            <option value='{{ $barangay->brgy_loc }}'>{{ $barangay->brgy_loc }}
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
                            </div>

                            <div class="btn-group btn-group-toggle" style="margin-top: -5px" data-toggle="buttons">
                                <label class="btn btn-success">
                                    <input type="radio" name="availability" value="Available"> Available
                                </label>
                                <label class="btn btn-danger">
                                    <input type="radio" name="availability" value="Not Available"> Not Available
                                </label>
                            </div>
                            <small class="text-danger">@error('availability')
                                    {{ $message }}
                                @enderror</small>




                            <div class="mt-5">
                                <button class="btn btn-primary btn-block" type="submit">Add Evacuation Center</button>
                                <a class="btn btn-secondary btn-block" href="{{ route('admin.evacuation.index') }}"
                                    role="button">Cancel</a>
                            </div>

                        </form>
                    </div>
                    <div class="col-sm-12">
                        <div id="map" style="height: 600px; width: 100%;"></div>
                    </div>
                </div>



            </div>
        </div>


    </div>

@endsection

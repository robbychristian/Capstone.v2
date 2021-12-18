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
            var markers = [
                @foreach ($evacuationcenters as $evacuationcenter)
                    ["{{ $evacuationcenter->evac_latitude }}","{{ $evacuationcenter->evac_longitude }}",
                    "{{ $evacuationcenter->is_approved }}",
                    "{{ $evacuationcenter->id }}"],
                @endforeach
            ];

            var is_added_marker = "https://kabisigapp.com/img/greenmarker.png"
            var is_not_added_marker = "https://kabisigapp.com/img/redmarker.png"

            for (var i = 0; i < markers.length; i++) {
                var data = markers[i]
                var location = new google.maps.LatLng(data[0], data[1]);
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    label: data[3],
                    icon: data[2] == "1" ? is_added_marker : is_not_added_marker,
                });

            }
        }
    </script>

    <div class="container-fluid mb-5" style="color: black;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">Evacuation Centers and Nearby Hospitals</h1>

            @if (Auth::user()->user_role >= 3)
                <a href="" class="d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>
                    Add Evacuation Centers or Nearby Hospitals</a>
            @elseif (Auth::user()->user_role === 1)
                <a href="{{ route('admin.generate.create') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i>
                    Add Evacuation Centers or Nearby Hospitals</a>
            @endif
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        @foreach ($evacuationcenters as $evacuationcenter)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $evacuationcenter->evac_name }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $evacuationcenter->brgy_loc }}</h6>
                                    <p class="card-text">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Nearest Landmark:
                                            {{ $evacuationcenter->nearest_landmark }}</li>
                                        <li class="list-group-item">Contact Number: {{ $evacuationcenter->phone_no }}</li>
                                        <li class="list-group-item">Capacity: {{ $evacuationcenter->capacity }}</li>
                                        @if ($evacuationcenter->availability === 'Available')
                                            <li class="list-group-item"><span
                                                    class="badge badge-success">{{ $evacuationcenter->availability }}</span>
                                            </li>
                                        @else
                                            <li class="list-group-item"><span
                                                    class="badge badge-danger">{{ $evacuationcenter->availability }}</span>
                                            </li>
                                        @endif

                                        @if ($evacuationcenter->is_approved === 1)
                                            <li class="list-group-item text-success">Status:
                                                Approved</li>
                                        @else
                                            <li class="list-group-item text-danger">Status:
                                                Not Yet Approved</li>
                                        @endif


                                    </ul>
                                    </p>
                                </div>
                            </div>
                        @endforeach
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

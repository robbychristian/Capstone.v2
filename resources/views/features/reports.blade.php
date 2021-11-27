@extends('layouts.master')

@section('title', '| Reports')
@section('content')
    <div class="container-fluid" style="color: black;">
        <h1 class="h3 mb-4 text-gray-800">Reports History</h1>

        @if (count($reports) > 0)
            <div class="table-responsive mt-5">
                <table class="table table-hover">
                    <thead style="background-color: #004f91;">
                        <tr>
                            @if (Auth::user()->user_role === 1 || Auth::user()->user_role === 3)
                                <th scope="col" style="color: white;">Name</th>
                            @endif
                            <th scope="col" style="color: white;">Title</th>
                            <th scope="col" style="color: white;">Image</th>
                            <th scope="col" style="color: white;">Description</th>
                            @if (Auth::user()->user_role === 1 || Auth::user()->user_role === 3)
                                <th scope="col" style="color: white;">Barangay</th>
                            @endif
                            <th scope="col" style="color: white;">Status</th>
                            <th scope="col" style="color: white;">Location</th>
                            <th scope="col" style="color: white;">Timestamp</th>
                            <th scope="col" style="color: white;" colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            @if ($report->user_id === Auth::user()->id && Auth::user()->user_role === 4)
                                <tr>
                                    <th scope="row">{{ $report->title }}</th>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#id{{ $report->id }}">
                                            View Image
                                        </button>
                                    </td>
                                    <td>{{ $report->description }}</td>
                                    <td>
                                        @if ($report->status == 'Report Pending')
                                            <span class="badge badge-warning" style="font-size: 1rem;">
                                                {{ $report->status }}</span>
                                        @elseif($report->status == 'Report Confirmed')
                                            <span class="badge badge-success" style="font-size: 1rem;">
                                                {{ $report->status }}</span>
                                        @else
                                            <span class="badge badge-danger" style="font-size: 1rem;">
                                                {{ $report->status }}</span>
                                        @endif

                                    </td>
                                    <td> <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modalMap"
                                            onclick="initMap({{ $report->loc_lat }}, {{ $report->loc_lng }})">
                                            View Map
                                        </button></td>
                                    <td> {{ date('F d, Y \a\t h:i:s A', strtotime($report->created_at)) }}</td>
                                    <td>
                                        <form action="/user/reports/{{ $report->id }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @elseif (Auth::user()->user_role === 1 || Auth::user()->user_role === 3)
                                <tr>
                                    <th scope="row">{{ $report->full_name }}</th>
                                    <td>{{ $report->title }}</td>
                                    <td> <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#id{{ $report->id }}">
                                            View Image
                                        </button></td>
                                    <td>{{ $report->description }}</td>
                                    <td>{{ $report->brgy_loc }}</td>
                                    <td>
                                        @if ($report->status == 'Report Pending')
                                            <span class="badge badge-warning" style="font-size: 1rem;">
                                                {{ $report->status }}</span>
                                        @elseif($report->status == 'Report Confirmed')
                                            <span class="badge badge-success" style="font-size: 1rem;">
                                                {{ $report->status }}</span>
                                        @else
                                            <span class="badge badge-danger" style="font-size: 1rem;">
                                                {{ $report->status }}</span>
                                        @endif
                                    </td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modalMap"
                                            onclick="initMap({{ $report->loc_lat }}, {{ $report->loc_lng }})">
                                            View Map
                                        </button></td>
                                    <td> {{ date('F d, Y \a\t h:i:s A', strtotime($report->created_at)) }}</td>
                                    <td>
                                        @if (Auth::user()->user_role === 1)
                                            <form action="/admin/reports/confirm/{{ $report->id }}" method="POST">
                                            @elseif (Auth::user()->user_role === 3)
                                                <form action="/brgy_official/reports/confirm/{{ $report->id }}"
                                                    method="POST">
                                        @endif
                                        @csrf
                                        @method("POST")
                                        <button class="btn btn-success">
                                            <i class="fas fa-check fa-lg"></i>
                                        </button>
                                        </form>

                                    </td>

                                    <td>
                                        @if (Auth::user()->user_role === 1)
                                            <form action="/admin/reports/pending/{{ $report->id }}" method="POST">
                                            @elseif (Auth::user()->user_role === 3)
                                                <form action="/brgy_official/reports/pending/{{ $report->id }}"
                                                    method="POST">
                                        @endif
                                        @csrf
                                        @method("POST")
                                        <button class="btn btn-warning">
                                            <i class="fas fa-clock fa-lg"></i>
                                        </button>
                                        </form>
                                    </td>

                                    <td>
                                        @if (Auth::user()->user_role === 4)
                                            <form action="/user/reports/{{ $report->id }}" method="POST">
                                            @elseif (Auth::user()->user_role === 1)
                                                <form action="/admin/reports/{{ $report->id }}" method="POST">
                                                @elseif (Auth::user()->user_role === 3)
                                                    <form action="/brgy_official/reports/{{ $report->id }}"
                                                        method="POST">
                                        @endif
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="id{{ $report->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: center;">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="img-fluid rounded mx-auto d-block"
                                                src="{{ URL::asset('KabisigGit/storage/app/public/report_imgs/' . $report->user_id . '/' . $report->loc_img) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="modalMap" tabindex="-1" aria-labelledby="exampleModal"
                                aria-hidden="true" style="text-align: center;">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title w-100">Google Map <span id="lat"
                                                    class="float-right"></span></h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="map" style="height: 600px; width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-grid gap-2 mt-5 d-md-flex justify-content-md-end">
                {{ $reports->links() }}
            </div>

        @else
            <div class="card mt-3">
                <div class="card-body" style="font-weight: 400; font-size: 1rem;">
                    There are no reports to show.
                </div>
            </div>
        @endif



        <script type="text/javascript">
            //var element = $(this);
            var map;


            function initMap(loc_lat, loc_lng) {

                let lat = loc_lat.toString()
                let lng = loc_lng.toString()
                //
                let floatLat = parseFloat(lat)
                let floatLng = parseFloat(lng)
                console.log(typeof(lat) + " " + lat + typeof(floatLat) + " " + floatLat)
                console.log(typeof(lng) + " " + lng + typeof(floatLng) + " " + floatLng)

                //var location = {
                //    lat: Number(loc_lat),
                //    lng: Number(loc_lng)
                //}
                var options = {
                    zoom: 16,
                    gestureHandling: "none",
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: new google.maps.LatLng(floatLat, floatLng)
                }

                console.log(options.center)

                var latlng = new google.maps.LatLng(floatLat, floatLng)

                var marker = new google.maps.Marker({
                    position: latlng
                });

                map = new google.maps.Map(document.getElementById('map'), options);
                marker.setMap(map);
                //google.maps.event.trigger(map, 'resize');
            }



            //$('#modalMap').on('show.bs.modal', function() {
            //    //var element = $(e.relatedTarget);
            //    //var data = element.data("lat").split(',');
            //    //var latlng = new google.maps.LatLng(data[0], data[1]);
            //    //initMap(latlng);
            //    //$("#lat").html(latlng.lat() + ", " + latlng.lng());
            //    
            //});
        </script>

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOhN8Ve4h6uAEKm4Kh_2eznLfx0GIbOTo&callback=initMap">
        </script>
    </div>
@endsection

@extends('dashboard.admin.home')

@section('title', '| Reports')
@section('sub-content')
    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
        <div class="row">
            <div class="h3">View Reports</div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        @if (Auth::user()->user_role === 1 || Auth::user()->user_role === 3)
                            <th scope="col">Name</th>
                        @endif
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Location</th>
                        <th scope="col">Timestamp</th>
                        <th scope="col">Action</th>
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
                                <td>{{ $report->status }}</td>
                                <td> <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modalMap"
                                        onclick="initMap({{ $report->loc_lng }}, {{ $report->loc_lat }})">
                                        View Map
                                    </button>
                                    {{ $report->loc_lng . ' ' . $report->loc_lat }}</td>
                                <td>{{ $report->created_at }}</td>
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
                                <td>{{ $report->loc_img }}</td>
                                <td>{{ $report->description }}</td>
                                <td>{{ $report->status }}</td>
                                <td>{{ $report->loc_lng . ' ' . $report->loc_lat }}</td>
                                <td>{{ $report->created_at }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-2">
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
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                        <div class="col-2" style="margin-top: -1.5px">
                                            @if (Auth::user()->user_role === 1)
                                                <form action="/admin/reports/pending/{{ $report->id }}" method="POST">
                                                @elseif (Auth::user()->user_role === 3)
                                                    <form action="/brgy_official/reports/pending/{{ $report->id }}"
                                                        method="POST">
                                            @endif
                                            @csrf
                                            @method("POST")
                                            <button class="btn btn-warning"><i class="fas fa-clock"></i></i></button>
                                            </form>
                                        </div>
                                        <div class="col-2">
                                            @if (Auth::user()->user_role === 1)
                                                <form action="/admin/reports/confirm/{{ $report->id }}" method="POST">
                                                @elseif (Auth::user()->user_role === 3)
                                                    <form action="/brgy_official/reports/confirm/{{ $report->id }}"
                                                        method="POST">
                                            @endif
                                            @csrf
                                            @method("POST")
                                            <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                            </form>
                                        </div>
                                    </div>
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


        <script type="text/javascript">
            //var element = $(this);
            var map;


            function initMap(loc_lat, loc_lng) {

                let lat = loc_lat.toString()
                let lng = loc_lng.toString()

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
                    center: {
                    lat: floatLat,
                    lng: floatLng
                },
                }

                //var latlng = new google.maps.LatLng(floatLat, floatLng)

                //var marker = new google.maps.Marker({
                //    position: latlng
                //});

                map = new google.maps.Map(document.getElementById('map'), options);
                //marker.setMap(map);
                google.maps.event.trigger(map, 'resize');
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

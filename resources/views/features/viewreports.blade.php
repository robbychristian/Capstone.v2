@extends('layouts.master')
@section('title', '| Reports')
@section('content')

    <script type="text/javascript">
        function initMap() {
            var lat = document.getElementById('loc_lat').value;
            var lng = document.getElementById('loc_lng').value;
            @if (Auth::user()->brgy_loc == 'Barangay Santolan' || Auth::user()->user_role == 1)
                var options = {
                zoom: 16,
                center: new google.maps.LatLng(lat,lng)
                }
            @endif


            var map = new google.maps.Map(document.getElementById('map'), options);

            console.log(lat);
            console.log(lng);
            var latlng = new google.maps.LatLng(lat, lng);
            var marker = new google.maps.Marker({
                position: latlng
            });

            marker.setMap(map);
        }
    </script>
    <div class="container-fluid" style="color: black">
      
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm active mb-3" role="button"
            aria-pressed="true">Back</a>

        <div class="card shadow mb-3 mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="card">
                            <div class="card-body">
                                <div class="content d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('KabisigGit/storage/app/public/report_imgs/' . $report->user_id . '/' . $report->loc_img) }}"
                                        style="height: 300px; width: 300px; object-fit:contain;" data-toggle="modal"
                                        data-target="#id{{ $report->id }}">
                                </div>
                                <div class="content d-flex align-items-center justify-content-center">
                                    <div class="row">
                                        <div class="col-sm-12 text-center" style="font-weight: 700; font-size: 1.5rem;">
                                            {{ $report->title }}</div>
                                        <div class="col-sm-12 text-center">{{ $report->description }}</div>
                                    </div>
                                </div>

                                <hr>

                                <div class="content mb-2">
                                    <div class="row">
                                        <div class="col-sm-6" style="font-weight: 500;">Reported by</div>
                                        <div class="col-sm-6">{{ $report->full_name }}</div>
                                    </div>
                                </div>

                                <div class="content mb-2">
                                    <div class="row">
                                        <div class="col-sm-6" style="font-weight: 500;">Barangay Location</div>
                                        <div class="col-sm-6">{{ $report->brgy_loc }}</div>
                                    </div>
                                </div>

                                <div class="content mb-2">
                                    <div class="row">
                                        <div class="col-sm-6" style="font-weight: 500;">Status</div>
                                        <div class="col-sm-6">
                                            @if ($report->status == 'Report Confirmed')
                                                <span class="badge badge-pill badge-success">{{ $report->status }}</span>

                                            @elseif ($report->status == 'Report Pending')
                                                <span class="badge badge-pill badge-warning">{{ $report->status }}</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Not Confirmed</span>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="content d-flex justify-content-end mt-5">
                                    <form action="/admin/reports/confirm/{{ $report->id }}" method="post">
                                        @csrf
                                        @method("POST")
                                        <button class="btn btn-circle btn-success mr-2">
                                            <i class="fas fa-check"></i></button>
                                    </form>

                                    <form action="/admin/reports/pending/{{ $report->id }}" method="post">
                                        @csrf
                                        @method("POST")
                                        <button class="btn btn-circle btn-warning mr-2">
                                            <i class="fas fa-times"></i></button>
                                    </form>

                                    <form action="/admin/reports/{{ $report->id }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-circle btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8">
                        <div id="map" style="height:100%; width: 100%;"></div>
                        <input type="text" name="" id="loc_lat" value="{{ $report->loc_lat }}" hidden>
                        <input type="text" name="" id="loc_lng" value="{{ $report->loc_lng }}" hidden>
                    </div>
                </div>
            </div>
        </div>

    </div>

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

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOhN8Ve4h6uAEKm4Kh_2eznLfx0GIbOTo&callback=initMap">
    </script>

@endsection

@extends('layouts.master')
@section('title', '| Reports')
@section('content')

    <script type="text/javascript">
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


            var map = new google.maps.Map(document.getElementById('map'), options);
        }
    </script>
    <div class="container-fluid" style="color: black">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm active mb-3" role="button"
            aria-pressed="true">Back</a>

        <div class="card shadow mb-3 mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">

                        <div class="card">
                            <div class="card-body">
                                <div class="content d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('KabisigGit/storage/app/public/report_imgs/' . $report->user_id . '/' . $report->loc_img) }}" style="height: 300px; width: 300px; object-fit:contain;">
                                </div>
                                <div class="content d-flex align-items-center justify-content-center">
                                    <div class="row">
                                        <div class="col-sm-12 text-center" style="font-weight: 700; font-size: 1.5rem;">
                                            {{ $report->title }}</div>
                                        <div class="col-sm-12 text-center">{{ $report->description }}</div>
                                    </div>
                                </div>

                                <hr>

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6" style="font-weight: 500;">Reported by</div>
                                        <div class="col-sm-6">{{ $report->full_name }}</div>
                                    </div>
                                </div>

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6" style="font-weight: 500;">Barangay Location</div>
                                        <div class="col-sm-6">{{ $report->brgy_loc }}</div>
                                    </div>
                                </div>

                                <div class="content d-flex justify-content-end mt-3">
                                    <button class="btn btn-circle btn-success mr-2"><i class="fas fa-check"></i></button>
                                    <button class="btn btn-circle btn-warning mr-2"><i class="fas fa-times"></i></button>
                                    <button class="btn btn-circle btn-danger"><i class="fas fa-trash"></i></button>
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8">
                        <div id="map" style="height:100%; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOhN8Ve4h6uAEKm4Kh_2eznLfx0GIbOTo&callback=initMap">
    </script>

@endsection

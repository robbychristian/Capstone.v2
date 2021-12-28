@extends('layouts.master')

@section('title', '| Reports')
@section('content')
    <div class="container-fluid" style="color: black;">

        <div class="card shadow-card mb-3 mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table data-table" id="dataTable" width="100%" cellspacing="0" style="color:#464646 !important">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.reports.index') }}",
                columns: [
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'full_name',
                        name: 'full_name'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],

            });
        });
    </script>

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
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOhN8Ve4h6uAEKm4Kh_2eznLfx0GIbOTo&callback=initMap">
    </script>
@endsection

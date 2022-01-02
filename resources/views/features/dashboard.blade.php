@extends('layouts.master')

@section('title', '| Dashboard')
@section('content')

    <div class="container-fluid" style="color: black;">
        @if (Auth::user()->user_role === 1)
            <a href="/admin/dashboard" class="btn btn-primary btn-sm active mb-3" role="button" aria-pressed="true">Back</a>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

            @if (Auth::user()->user_role === 3)
                <a href="{{ route('brgy_official.generate.index') }}"
                    class="d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report</a>
            @elseif (Auth::user()->user_role === 1)
                <a href="{{ route('admin.generate.index') }}" class="d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report</a>
            @endif
        </div>

        <div class="card shadow ">
            <div class="card-body">
                <ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-chart-tab" data-toggle="pill" href="#pills-chart" role="tab"
                            aria-controls="pills-chart" aria-selected="true"><i class="fas fa-columns"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-table-tab" data-toggle="pill" href="#pills-table" role="tab"
                            aria-controls="pills-table" aria-selected="false"><i class="fas fa-list"></i></a>
                    </li>

                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-chart" role="tabpanel"
                        aria-labelledby="pills-chart-tab">
                        <div class="card mt-3" style="position: relative; height:50vh;">
                            <div class="card-body">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>

                        <div class="card mt-3" style="position: relative; height:50vh;">
                            <div class="card-body">
                                <canvas id="indivChart"></canvas>
                            </div>
                        </div>

                        <div class="card mt-3" style="position: relative; height:50vh;">
                            <div class="card-body">
                                <canvas id="evacChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-table" role="tabpanel" aria-labelledby="pills-table-tab">
                        <div class="table-responsive">
                            <table class="table data-table" id="dataTable" width="100%" cellspacing="0"
                                style="color:#464646 !important">
                                <thead>
                                    <tr>
                                        <th>Created At</th>
                                        <th>Month of Disaster</th>
                                        <th>Year of Disaster</th>
                                        <th>Type of Disaster</th>
                                        <th>Barangay</th>
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
        </div>


    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var stats_brgy = $(this).data('brgy');
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/admin/dashboard/brgy/" + stats_brgy,
                columns: [{
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'month_disaster',
                        name: 'month_disaster'
                    },
                    {
                        data: 'year_disaster',
                        name: 'year_disaster'
                    },
                    {
                        data: 'type_disaster',
                        name: 'type_disaster'
                    },
                    {
                        data: 'barangay',
                        name: 'barangay'
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

    <script>
        var jan_typhoon_count = <?php echo $jan_typhoon_count; ?>;
        var jan_flood_count = <?php echo $jan_flood_count; ?>;
        var jan_lpa_count = <?php echo $jan_lpa_count; ?>;
        var jan_earthquake_count = <?php echo $jan_earthquake_count; ?>;
        var jan_landslide_count = <?php echo $jan_landslide_count; ?>;
        var jan_others_count = <?php echo $jan_others_count; ?>;

        var feb_typhoon_count = <?php echo $feb_typhoon_count; ?>;
        var feb_flood_count = <?php echo $feb_flood_count; ?>;
        var feb_lpa_count = <?php echo $feb_lpa_count; ?>;
        var feb_earthquake_count = <?php echo $feb_earthquake_count; ?>;
        var feb_landslide_count = <?php echo $feb_landslide_count; ?>;
        var feb_others_count = <?php echo $feb_others_count; ?>;


        var mar_typhoon_count = <?php echo $mar_typhoon_count; ?>;
        var mar_flood_count = <?php echo $mar_flood_count; ?>;
        var mar_lpa_count = <?php echo $mar_lpa_count; ?>;
        var mar_earthquake_count = <?php echo $mar_earthquake_count; ?>;
        var mar_landslide_count = <?php echo $mar_landslide_count; ?>;
        var mar_others_count = <?php echo $mar_others_count; ?>;


        var apr_typhoon_count = <?php echo $apr_typhoon_count; ?>;
        var apr_flood_count = <?php echo $apr_flood_count; ?>;
        var apr_lpa_count = <?php echo $apr_lpa_count; ?>;
        var apr_earthquake_count = <?php echo $apr_earthquake_count; ?>;
        var apr_landslide_count = <?php echo $apr_landslide_count; ?>;
        var apr_others_count = <?php echo $apr_others_count; ?>;


        var may_typhoon_count = <?php echo $may_typhoon_count; ?>;
        var may_flood_count = <?php echo $may_flood_count; ?>;
        var may_lpa_count = <?php echo $may_lpa_count; ?>;
        var may_earthquake_count = <?php echo $may_earthquake_count; ?>;
        var may_landslide_count = <?php echo $may_landslide_count; ?>;
        var may_others_count = <?php echo $may_others_count; ?>;


        var jun_typhoon_count = <?php echo $jun_typhoon_count; ?>;
        var jun_flood_count = <?php echo $jun_flood_count; ?>;
        var jun_lpa_count = <?php echo $jun_lpa_count; ?>;
        var jun_earthquake_count = <?php echo $jun_earthquake_count; ?>;
        var jun_landslide_count = <?php echo $jun_landslide_count; ?>;
        var jun_others_count = <?php echo $jun_others_count; ?>;


        var jul_typhoon_count = <?php echo $jul_typhoon_count; ?>;
        var jul_flood_count = <?php echo $jul_flood_count; ?>;
        var jul_lpa_count = <?php echo $jul_lpa_count; ?>;
        var jul_earthquake_count = <?php echo $jul_earthquake_count; ?>;
        var jul_landslide_count = <?php echo $jul_landslide_count; ?>;
        var jul_others_count = <?php echo $jul_others_count; ?>;


        var aug_typhoon_count = <?php echo $aug_typhoon_count; ?>;
        var aug_flood_count = <?php echo $aug_flood_count; ?>;
        var aug_lpa_count = <?php echo $aug_lpa_count; ?>;
        var aug_earthquake_count = <?php echo $aug_earthquake_count; ?>;
        var aug_landslide_count = <?php echo $aug_landslide_count; ?>;
        var aug_others_count = <?php echo $aug_others_count; ?>;

        var sept_typhoon_count = <?php echo $sept_typhoon_count; ?>;
        var sept_flood_count = <?php echo $sept_flood_count; ?>;
        var sept_lpa_count = <?php echo $sept_lpa_count; ?>;
        var sept_earthquake_count = <?php echo $sept_earthquake_count; ?>;
        var sept_landslide_count = <?php echo $sept_landslide_count; ?>;
        var sept_others_count = <?php echo $sept_others_count; ?>;


        var oct_typhoon_count = <?php echo $oct_typhoon_count; ?>;
        var oct_flood_count = <?php echo $oct_flood_count; ?>;
        var oct_lpa_count = <?php echo $oct_lpa_count; ?>;
        var oct_earthquake_count = <?php echo $oct_earthquake_count; ?>;
        var oct_landslide_count = <?php echo $oct_landslide_count; ?>;
        var oct_others_count = <?php echo $oct_others_count; ?>;

        var nov_typhoon_count = <?php echo $nov_typhoon_count; ?>;
        var nov_flood_count = <?php echo $nov_flood_count; ?>;
        var nov_lpa_count = <?php echo $nov_lpa_count; ?>;
        var nov_earthquake_count = <?php echo $nov_earthquake_count; ?>;
        var nov_landslide_count = <?php echo $nov_landslide_count; ?>;
        var nov_others_count = <?php echo $nov_others_count; ?>;

        var dec_typhoon_count = <?php echo $dec_typhoon_count; ?>;
        var dec_flood_count = <?php echo $dec_flood_count; ?>;
        var dec_lpa_count = <?php echo $dec_lpa_count; ?>;
        var dec_earthquake_count = <?php echo $dec_earthquake_count; ?>;
        var dec_landslide_count = <?php echo $dec_landslide_count; ?>;
        var dec_others_count = <?php echo $dec_others_count; ?>;

        var dataFA = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                'Dec'
            ],
            datasets: [{
                    label: 'Typhoon',
                    data: [
                        jan_typhoon_count,
                        feb_typhoon_count,
                        mar_typhoon_count,
                        apr_typhoon_count,
                        may_typhoon_count,
                        jun_typhoon_count,
                        jul_typhoon_count,
                        aug_typhoon_count,
                        sept_typhoon_count,
                        oct_typhoon_count,
                        nov_typhoon_count,
                        dec_typhoon_count,
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Flood',
                    data: [
                        jan_flood_count,
                        feb_flood_count,
                        mar_flood_count,
                        apr_flood_count,
                        may_flood_count,
                        jun_flood_count,
                        jul_flood_count,
                        aug_flood_count,
                        sept_flood_count,
                        oct_flood_count,
                        nov_flood_count,
                        dec_flood_count,
                    ],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Low Pressure Area',
                    data: [
                        jan_lpa_count,
                        feb_lpa_count,
                        mar_lpa_count,
                        apr_lpa_count,
                        may_lpa_count,
                        jun_lpa_count,
                        jul_lpa_count,
                        aug_lpa_count,
                        sept_lpa_count,
                        oct_lpa_count,
                        nov_lpa_count,
                        dec_lpa_count,
                    ],
                    backgroundColor: [
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Earthquake',
                    data: [
                        jan_earthquake_count,
                        feb_earthquake_count,
                        mar_earthquake_count,
                        apr_earthquake_count,
                        may_earthquake_count,
                        jun_earthquake_count,
                        jul_earthquake_count,
                        aug_earthquake_count,
                        sept_earthquake_count,
                        oct_earthquake_count,
                        nov_earthquake_count,
                        dec_earthquake_count,
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Landslide',
                    data: [
                        jan_landslide_count,
                        feb_landslide_count,
                        mar_landslide_count,
                        apr_landslide_count,
                        may_landslide_count,
                        jun_landslide_count,
                        jul_landslide_count,
                        aug_landslide_count,
                        sept_landslide_count,
                        oct_landslide_count,
                        nov_landslide_count,
                        dec_landslide_count,
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Others',
                    data: [
                        jan_others_count,
                        feb_others_count,
                        mar_others_count,
                        apr_others_count,
                        may_others_count,
                        jun_others_count,
                        jul_others_count,
                        aug_others_count,
                        sept_others_count,
                        oct_others_count,
                        nov_others_count,
                        dec_others_count,
                    ],
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                    ],
                    borderWidth: 1
                },

            ]
        };

        var configFA = {
            type: 'bar',
            data: dataFA,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Families Affected per Disaster',
                        fontSize: 30,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
            }
        };

        var myChart = new Chart(
            document.getElementById('myChart').getContext('2d'),
            configFA
        );

        /* INDIVIDUALS AFFECTED */

        // INDIVIDUALS AFFECTED

        var jan_typhoon_count_indiv = <?php echo $jan_typhoon_count_indiv; ?>;
        var jan_flood_count_indiv = <?php echo $jan_flood_count_indiv; ?>;
        var jan_lpa_count_indiv = <?php echo $jan_lpa_count_indiv; ?>;
        var jan_earthquake_count_indiv = <?php echo $jan_earthquake_count_indiv; ?>;
        var jan_landslide_count_indiv = <?php echo $jan_landslide_count_indiv; ?>;
        var jan_others_count_indiv = <?php echo $jan_others_count_indiv; ?>;


        var feb_typhoon_count_indiv = <?php echo $feb_typhoon_count_indiv; ?>;
        var feb_flood_count_indiv = <?php echo $feb_flood_count_indiv; ?>;
        var feb_lpa_count_indiv = <?php echo $feb_lpa_count_indiv; ?>;
        var feb_earthquake_count_indiv = <?php echo $feb_earthquake_count_indiv; ?>;
        var feb_landslide_count_indiv = <?php echo $feb_landslide_count_indiv; ?>;
        var feb_others_count_indiv = <?php echo $feb_others_count_indiv; ?>;


        var mar_typhoon_count_indiv = <?php echo $mar_typhoon_count_indiv; ?>;
        var mar_flood_count_indiv = <?php echo $mar_flood_count_indiv; ?>;
        var mar_lpa_count_indiv = <?php echo $mar_lpa_count_indiv; ?>;
        var mar_earthquake_count_indiv = <?php echo $mar_earthquake_count_indiv; ?>;
        var mar_landslide_count_indiv = <?php echo $mar_landslide_count_indiv; ?>;
        var mar_others_count_indiv = <?php echo $mar_others_count_indiv; ?>;


        var apr_typhoon_count_indiv = <?php echo $apr_typhoon_count_indiv; ?>;
        var apr_flood_count_indiv = <?php echo $apr_flood_count_indiv; ?>;
        var apr_lpa_count_indiv = <?php echo $apr_lpa_count_indiv; ?>;
        var apr_earthquake_count_indiv = <?php echo $apr_earthquake_count_indiv; ?>;
        var apr_landslide_count_indiv = <?php echo $apr_landslide_count_indiv; ?>;
        var apr_others_count_indiv = <?php echo $apr_others_count_indiv; ?>;


        var may_typhoon_count_indiv = <?php echo $may_typhoon_count_indiv; ?>;
        var may_flood_count_indiv = <?php echo $may_flood_count_indiv; ?>;
        var may_lpa_count_indiv = <?php echo $may_lpa_count_indiv; ?>;
        var may_earthquake_count_indiv = <?php echo $may_earthquake_count_indiv; ?>;
        var may_landslide_count_indiv = <?php echo $may_landslide_count_indiv; ?>;
        var may_others_count_indiv = <?php echo $may_others_count_indiv; ?>;


        var jun_typhoon_count_indiv = <?php echo $jun_typhoon_count_indiv; ?>;
        var jun_flood_count_indiv = <?php echo $jun_flood_count_indiv; ?>;
        var jun_lpa_count_indiv = <?php echo $jun_lpa_count_indiv; ?>;
        var jun_earthquake_count_indiv = <?php echo $jun_earthquake_count_indiv; ?>;
        var jun_landslide_count_indiv = <?php echo $jun_landslide_count_indiv; ?>;
        var jun_others_count_indiv = <?php echo $jun_others_count_indiv; ?>;


        var jul_typhoon_count_indiv = <?php echo $jul_typhoon_count_indiv; ?>;
        var jul_flood_count_indiv = <?php echo $jul_flood_count_indiv; ?>;
        var jul_lpa_count_indiv = <?php echo $jul_lpa_count_indiv; ?>;
        var jul_earthquake_count_indiv = <?php echo $jul_earthquake_count_indiv; ?>;
        var jul_landslide_count_indiv = <?php echo $jul_landslide_count_indiv; ?>;
        var jul_others_count_indiv = <?php echo $jul_others_count_indiv; ?>;


        var aug_typhoon_count_indiv = <?php echo $aug_typhoon_count_indiv; ?>;
        var aug_flood_count_indiv = <?php echo $aug_flood_count_indiv; ?>;
        var aug_lpa_count_indiv = <?php echo $aug_lpa_count_indiv; ?>;
        var aug_earthquake_count_indiv = <?php echo $aug_earthquake_count_indiv; ?>;
        var aug_landslide_count_indiv = <?php echo $aug_landslide_count_indiv; ?>;
        var aug_others_count_indiv = <?php echo $aug_others_count_indiv; ?>;


        var sept_typhoon_count_indiv = <?php echo $sept_typhoon_count_indiv; ?>;
        var sept_flood_count_indiv = <?php echo $sept_flood_count_indiv; ?>;
        var sept_lpa_count_indiv = <?php echo $sept_lpa_count_indiv; ?>;
        var sept_earthquake_count_indiv = <?php echo $sept_earthquake_count_indiv; ?>;
        var sept_landslide_count_indiv = <?php echo $sept_landslide_count_indiv; ?>;
        var sept_others_count_indiv = <?php echo $sept_others_count_indiv; ?>;


        var oct_typhoon_count_indiv = <?php echo $oct_typhoon_count_indiv; ?>;
        var oct_flood_count_indiv = <?php echo $oct_flood_count_indiv; ?>;
        var oct_lpa_count_indiv = <?php echo $oct_lpa_count_indiv; ?>;
        var oct_earthquake_count_indiv = <?php echo $oct_earthquake_count_indiv; ?>;
        var oct_landslide_count_indiv = <?php echo $oct_landslide_count_indiv; ?>;
        var oct_others_count_indiv = <?php echo $oct_others_count_indiv; ?>;


        var nov_typhoon_count_indiv = <?php echo $nov_typhoon_count_indiv; ?>;
        var nov_flood_count_indiv = <?php echo $nov_flood_count_indiv; ?>;
        var nov_lpa_count_indiv = <?php echo $nov_lpa_count_indiv; ?>;
        var nov_earthquake_count_indiv = <?php echo $nov_earthquake_count_indiv; ?>;
        var nov_landslide_count_indiv = <?php echo $nov_landslide_count_indiv; ?>;
        var nov_others_count_indiv = <?php echo $nov_others_count_indiv; ?>;


        var dec_typhoon_count_indiv = <?php echo $dec_typhoon_count_indiv; ?>;
        var dec_flood_count_indiv = <?php echo $dec_flood_count_indiv; ?>;
        var dec_lpa_count_indiv = <?php echo $dec_lpa_count_indiv; ?>;
        var dec_earthquake_count_indiv = <?php echo $dec_earthquake_count_indiv; ?>;
        var dec_landslide_count_indiv = <?php echo $dec_landslide_count_indiv; ?>;
        var dec_others_count_indiv = <?php echo $dec_others_count_indiv; ?>;


        var dataIndiv = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                'Dec'
            ],
            datasets: [{
                    label: 'Typhoon',
                    data: [
                        jan_typhoon_count_indiv,
                        feb_typhoon_count_indiv,
                        mar_typhoon_count_indiv,
                        apr_typhoon_count_indiv,
                        may_typhoon_count_indiv,
                        jun_typhoon_count_indiv,
                        jul_typhoon_count_indiv,
                        aug_typhoon_count_indiv,
                        sept_typhoon_count_indiv,
                        oct_typhoon_count_indiv,
                        nov_typhoon_count_indiv,
                        dec_typhoon_count_indiv,
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Flood',
                    data: [
                        jan_flood_count_indiv,
                        feb_flood_count_indiv,
                        mar_flood_count_indiv,
                        apr_flood_count_indiv,
                        may_flood_count_indiv,
                        jun_flood_count_indiv,
                        jul_flood_count_indiv,
                        aug_flood_count_indiv,
                        sept_flood_count_indiv,
                        oct_flood_count_indiv,
                        nov_flood_count_indiv,
                        dec_flood_count_indiv,
                    ],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Low Pressure Area',
                    data: [
                        jan_lpa_count_indiv,
                        feb_lpa_count_indiv,
                        mar_lpa_count_indiv,
                        apr_lpa_count_indiv,
                        may_lpa_count_indiv,
                        jun_lpa_count_indiv,
                        jul_lpa_count_indiv,
                        aug_lpa_count_indiv,
                        sept_lpa_count_indiv,
                        oct_lpa_count_indiv,
                        nov_lpa_count_indiv,
                        dec_lpa_count_indiv,
                    ],
                    backgroundColor: [
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Earthquake',
                    data: [
                        jan_earthquake_count_indiv,
                        feb_earthquake_count_indiv,
                        mar_earthquake_count_indiv,
                        apr_earthquake_count_indiv,
                        may_earthquake_count_indiv,
                        jun_earthquake_count_indiv,
                        jul_earthquake_count_indiv,
                        aug_earthquake_count_indiv,
                        sept_earthquake_count_indiv,
                        oct_earthquake_count_indiv,
                        nov_earthquake_count_indiv,
                        dec_earthquake_count_indiv,
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Landslide',
                    data: [
                        jan_landslide_count_indiv,
                        feb_landslide_count_indiv,
                        mar_landslide_count_indiv,
                        apr_landslide_count_indiv,
                        may_landslide_count_indiv,
                        jun_landslide_count_indiv,
                        jul_landslide_count_indiv,
                        aug_landslide_count_indiv,
                        sept_landslide_count_indiv,
                        oct_landslide_count_indiv,
                        nov_landslide_count_indiv,
                        dec_landslide_count_indiv,
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Others',
                    data: [
                        jan_others_count_indiv,
                        feb_others_count_indiv,
                        mar_others_count_indiv,
                        apr_others_count_indiv,
                        may_others_count_indiv,
                        jun_others_count_indiv,
                        jul_others_count_indiv,
                        aug_others_count_indiv,
                        sept_others_count_indiv,
                        oct_others_count_indiv,
                        nov_others_count_indiv,
                        dec_others_count_indiv,
                    ],
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                    ],
                    borderWidth: 1
                },

            ]
        };

        var config2 = {
            type: 'bar',
            data: dataIndiv,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Individuals Affected per Disaster',
                        fontSize: 30,
                    }
                },

                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
            }
        };

        var indivChart = new Chart(
            document.getElementById('indivChart').getContext('2d'),
            config2
        );


        /* EVACUEES AFFECTED */

        // EVACUEES AFFECTED

        var jan_typhoon_count_evac = <?php echo $jan_typhoon_count_evac; ?>;
        var jan_flood_count_evac = <?php echo $jan_flood_count_evac; ?>;
        var jan_lpa_count_evac = <?php echo $jan_lpa_count_evac; ?>;
        var jan_earthquake_count_evac = <?php echo $jan_earthquake_count_evac; ?>;
        var jan_landslide_count_evac = <?php echo $jan_landslide_count_evac; ?>;
        var jan_others_count_evac = <?php echo $jan_others_count_evac; ?>;


        var feb_typhoon_count_evac = <?php echo $feb_typhoon_count_evac; ?>;
        var feb_flood_count_evac = <?php echo $feb_flood_count_evac; ?>;
        var feb_lpa_count_evac = <?php echo $feb_lpa_count_evac; ?>;
        var feb_earthquake_count_evac = <?php echo $feb_earthquake_count_evac; ?>;
        var feb_landslide_count_evac = <?php echo $feb_landslide_count_evac; ?>;
        var feb_others_count_evac = <?php echo $feb_others_count_evac; ?>;


        var mar_typhoon_count_evac = <?php echo $mar_typhoon_count_evac; ?>;
        var mar_flood_count_evac = <?php echo $mar_flood_count_evac; ?>;
        var mar_lpa_count_evac = <?php echo $mar_lpa_count_evac; ?>;
        var mar_earthquake_count_evac = <?php echo $mar_earthquake_count_evac; ?>;
        var mar_landslide_count_evac = <?php echo $mar_landslide_count_evac; ?>;
        var mar_others_count_evac = <?php echo $mar_others_count_evac; ?>;


        var apr_typhoon_count_evac = <?php echo $apr_typhoon_count_evac; ?>;
        var apr_flood_count_evac = <?php echo $apr_flood_count_evac; ?>;
        var apr_lpa_count_evac = <?php echo $apr_lpa_count_evac; ?>;
        var apr_earthquake_count_evac = <?php echo $apr_earthquake_count_evac; ?>;
        var apr_landslide_count_evac = <?php echo $apr_landslide_count_evac; ?>;
        var apr_others_count_evac = <?php echo $apr_others_count_evac; ?>;


        var may_typhoon_count_evac = <?php echo $may_typhoon_count_evac; ?>;
        var may_flood_count_evac = <?php echo $may_flood_count_evac; ?>;
        var may_lpa_count_evac = <?php echo $may_lpa_count_evac; ?>;
        var may_earthquake_count_evac = <?php echo $may_earthquake_count_evac; ?>;
        var may_landslide_count_evac = <?php echo $may_landslide_count_evac; ?>;
        var may_others_count_evac = <?php echo $may_others_count_evac; ?>;


        var jun_typhoon_count_evac = <?php echo $jun_typhoon_count_evac; ?>;
        var jun_flood_count_evac = <?php echo $jun_flood_count_evac; ?>;
        var jun_lpa_count_evac = <?php echo $jun_lpa_count_evac; ?>;
        var jun_earthquake_count_evac = <?php echo $jun_earthquake_count_evac; ?>;
        var jun_landslide_count_evac = <?php echo $jun_landslide_count_evac; ?>;
        var jun_others_count_evac = <?php echo $jun_others_count_evac; ?>;


        var jul_typhoon_count_evac = <?php echo $jul_typhoon_count_evac; ?>;
        var jul_flood_count_evac = <?php echo $jul_flood_count_evac; ?>;
        var jul_lpa_count_evac = <?php echo $jul_lpa_count_evac; ?>;
        var jul_earthquake_count_evac = <?php echo $jul_earthquake_count_evac; ?>;
        var jul_landslide_count_evac = <?php echo $jul_landslide_count_evac; ?>;
        var jul_others_count_evac = <?php echo $jul_others_count_evac; ?>;


        var aug_typhoon_count_evac = <?php echo $aug_typhoon_count_evac; ?>;
        var aug_flood_count_evac = <?php echo $aug_flood_count_evac; ?>;
        var aug_lpa_count_evac = <?php echo $aug_lpa_count_evac; ?>;
        var aug_earthquake_count_evac = <?php echo $aug_earthquake_count_evac; ?>;
        var aug_landslide_count_evac = <?php echo $aug_landslide_count_evac; ?>;
        var aug_others_count_evac = <?php echo $aug_others_count_evac; ?>;


        var sept_typhoon_count_evac = <?php echo $sept_typhoon_count_evac; ?>;
        var sept_flood_count_evac = <?php echo $sept_flood_count_evac; ?>;
        var sept_lpa_count_evac = <?php echo $sept_lpa_count_evac; ?>;
        var sept_earthquake_count_evac = <?php echo $sept_earthquake_count_evac; ?>;
        var sept_landslide_count_evac = <?php echo $sept_landslide_count_evac; ?>;
        var sept_others_count_evac = <?php echo $sept_others_count_evac; ?>;


        var oct_typhoon_count_evac = <?php echo $oct_typhoon_count_evac; ?>;
        var oct_flood_count_evac = <?php echo $oct_flood_count_evac; ?>;
        var oct_lpa_count_evac = <?php echo $oct_lpa_count_evac; ?>;
        var oct_earthquake_count_evac = <?php echo $oct_earthquake_count_evac; ?>;
        var oct_landslide_count_evac = <?php echo $oct_landslide_count_evac; ?>;
        var oct_others_count_evac = <?php echo $oct_others_count_evac; ?>;


        var nov_typhoon_count_evac = <?php echo $nov_typhoon_count_evac; ?>;
        var nov_flood_count_evac = <?php echo $nov_flood_count_evac; ?>;
        var nov_lpa_count_evac = <?php echo $nov_lpa_count_evac; ?>;
        var nov_earthquake_count_evac = <?php echo $nov_earthquake_count_evac; ?>;
        var nov_landslide_count_evac = <?php echo $nov_landslide_count_evac; ?>;
        var nov_others_count_evac = <?php echo $nov_others_count_evac; ?>;


        var dec_typhoon_count_evac = <?php echo $dec_typhoon_count_evac; ?>;
        var dec_flood_count_evac = <?php echo $dec_flood_count_evac; ?>;
        var dec_lpa_count_evac = <?php echo $dec_lpa_count_evac; ?>;
        var dec_earthquake_count_evac = <?php echo $dec_earthquake_count_evac; ?>;
        var dec_landslide_count_evac = <?php echo $dec_landslide_count_evac; ?>;
        var dec_others_count_evac = <?php echo $dec_others_count_evac; ?>;


        var dataevac = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                'Dec'
            ],
            datasets: [{
                    label: 'Typhoon',
                    data: [
                        jan_typhoon_count_evac,
                        feb_typhoon_count_evac,
                        mar_typhoon_count_evac,
                        apr_typhoon_count_evac,
                        may_typhoon_count_evac,
                        jun_typhoon_count_evac,
                        jul_typhoon_count_evac,
                        aug_typhoon_count_evac,
                        sept_typhoon_count_evac,
                        oct_typhoon_count_evac,
                        nov_typhoon_count_evac,
                        dec_typhoon_count_evac,
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 99, 132)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Flood',
                    data: [
                        jan_flood_count_evac,
                        feb_flood_count_evac,
                        mar_flood_count_evac,
                        apr_flood_count_evac,
                        may_flood_count_evac,
                        jun_flood_count_evac,
                        jul_flood_count_evac,
                        aug_flood_count_evac,
                        sept_flood_count_evac,
                        oct_flood_count_evac,
                        nov_flood_count_evac,
                        dec_flood_count_evac,
                    ],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 159, 64)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Low Pressure Area',
                    data: [
                        jan_lpa_count_evac,
                        feb_lpa_count_evac,
                        mar_lpa_count_evac,
                        apr_lpa_count_evac,
                        may_lpa_count_evac,
                        jun_lpa_count_evac,
                        jul_lpa_count_evac,
                        aug_lpa_count_evac,
                        sept_lpa_count_evac,
                        oct_lpa_count_evac,
                        nov_lpa_count_evac,
                        dec_lpa_count_evac,
                    ],
                    backgroundColor: [
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 205, 86)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Earthquake',
                    data: [
                        jan_earthquake_count_evac,
                        feb_earthquake_count_evac,
                        mar_earthquake_count_evac,
                        apr_earthquake_count_evac,
                        may_earthquake_count_evac,
                        jun_earthquake_count_evac,
                        jul_earthquake_count_evac,
                        aug_earthquake_count_evac,
                        sept_earthquake_count_evac,
                        oct_earthquake_count_evac,
                        nov_earthquake_count_evac,
                        dec_earthquake_count_evac,
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                        'rgb(75, 192, 192)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Landslide',
                    data: [
                        jan_landslide_count_evac,
                        feb_landslide_count_evac,
                        mar_landslide_count_evac,
                        apr_landslide_count_evac,
                        may_landslide_count_evac,
                        jun_landslide_count_evac,
                        jul_landslide_count_evac,
                        aug_landslide_count_evac,
                        sept_landslide_count_evac,
                        oct_landslide_count_evac,
                        nov_landslide_count_evac,
                        dec_landslide_count_evac,
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                        'rgb(54, 162, 235)',
                    ],
                    borderWidth: 1
                },

                {
                    label: 'Others',
                    data: [
                        jan_others_count_evac,
                        feb_others_count_evac,
                        mar_others_count_evac,
                        apr_others_count_evac,
                        may_others_count_evac,
                        jun_others_count_evac,
                        jul_others_count_evac,
                        aug_others_count_evac,
                        sept_others_count_evac,
                        oct_others_count_evac,
                        nov_others_count_evac,
                        dec_others_count_evac,
                    ],
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                    ],
                    borderWidth: 1
                },

            ]
        };

        var config3 = {
            type: 'bar',
            data: dataevac,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Evacuees per Disaster',
                        fontSize: 30,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
            }
        };

        var evacChart = new Chart(
            document.getElementById('evacChart').getContext('2d'),
            config3
        );
    </script>

@endsection

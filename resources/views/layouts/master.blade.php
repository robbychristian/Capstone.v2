<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KaBisig @yield('title')</title>

    <!--- icon -->
    <link rel="icon" href="{{ asset('img/title-website-icon.png') }}" type="image/png" sizes="16x16">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!--<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Sweet Alert -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--Chart JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"
        integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>



    <style>
        body {
            font-family: "Montserrat", sans-serif;
        }

        /* Announcements */

        .card-announce-custom-bg {
            background-color: #f5f5f5 !important;
        }

        .v-announcement-title {
            font-weight: bold;
            font-size: 1.5rem;
            text-decoration: underline;
        }

        .v-announcement-date-title {
            font-weight: bold;
        }

        /* Evacuation Center */

        /* SM BREAK POINT */
        @media (max-width: 575.98px) {
            #evac_map {
                height: 600px !important;
            }
        }

        /*GUIDELINES*/

        .guide-content-heading {
            font-weight: 700;
            font-size: 1rem;
            color: #004f91;
        }

        .icon-background {
            color: #004f91;
        }

        .duck-cover-hold-icon {
            display: block;
            margin: 0 auto;
            height: 70px;
        }

        /* Vulnerability Map */

        .radio-button-wrap {
            position: relative;
            top: 50%;
            margin-top: -2.5em;
        }

        .button-label {
            display: inline-block;
            padding: 1em 2em;
            margin: 0.5em;
            cursor: pointer;
            color: #292929;
            border-radius: 0.25em;
            background: #efefef;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.22);
            transition: 0.3s;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .button-label h1 {
            font-size: 1em;
        }

        .button-label:hover {
            background: #d6d6d6;
            color: #101010;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.32);
        }

        .button-label:active {
            transform: translateY(2px);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0px -1px 0 rgba(0, 0, 0, 0.22);
        }

        #degreeHigh:checked+.button-label {
            background: #d91e18;
            color: #efefef;
        }

        #degreeHigh:checked+.button-label:hover {
            background: #c21b15;
            color: #e2e2e2;
        }

        #degreeMedium:checked+.button-label {
            background: #ffa500;
            color: #efefef;
        }

        #degreeMedium:checked+.button-label:hover {
            background: #e69500;
            color: #e2e2e2;
        }

        #brgyDelaPaz:checked+.button-label {
            background: #3490dc;
            color: #efefef;
        }

        #brgyDelaPaz:checked+.button-label:hover {
            background: #3490dc;
            color: #e2e2e2;
        }

        #brgyManggahan:checked+.button-label {
            background: #3490dc;
            color: #efefef;
        }

        #brgyManggahan:checked+.button-label:hover {
            background: #3490dc;
            color: #e2e2e2;
        }

        #brgyMaybunga:checked+.button-label {
            background: #3490dc;
            color: #efefef;
        }

        #brgyMaybunga:checked+.button-label:hover {
            background: #3490dc;
            color: #e2e2e2;
        }

        #brgySantolan:checked+.button-label {
            background: #3490dc;
            color: #efefef;
        }

        #brgySantolan:checked+.button-label:hover {
            background: #3490dc;
            color: #e2e2e2;
        }

        #brgyRosario:checked+.button-label {
            background: #3490dc;
            color: #efefef;
        }

        #brgyRosario:checked+.button-label:hover {
            background: #3490dc;
            color: #e2e2e2;
        }

        #typhoon:checked+.button-label {
            background: #38c172;
            color: #efefef;
        }

        #typhoon:checked+.button-label:hover {
            background: #38c172;
            color: #e2e2e2;
        }

        #flood:checked+.button-label {
            background: #38c172;
            color: #efefef;
        }

        #flood:checked+.button-label:hover {
            background: #38c172;
            color: #e2e2e2;
        }

        #lpa:checked+.button-label {
            background: #38c172;
            color: #efefef;
        }

        #lpa:checked+.button-label:hover {
            background: #38c172;
            color: #e2e2e2;
        }

        #earthquake:checked+.button-label {
            background: #38c172;
            color: #efefef;
        }

        #earthquake:checked+.button-label:hover {
            background: #38c172;
            color: #e2e2e2;
        }

        #landslide:checked+.button-label {
            background: #38c172;
            color: #efefef;
        }

        #landslide:checked+.button-label:hover {
            background: #38c172;
            color: #e2e2e2;
        }


        #others:checked+.button-label {
            background: #38c172;
            color: #efefef;
        }

        #others:checked+.button-label:hover {
            background: #38c172;
            color: #e2e2e2;
        }

        .form-group.required .control-label:after {
            content: "*";
            color: red;
        }

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('common.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('common.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('common.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>


</body>

</html>

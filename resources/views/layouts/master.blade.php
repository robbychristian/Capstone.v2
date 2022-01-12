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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

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


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Sweet Alert
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <!--Chart JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"
        integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script> -->


    <!-- Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Data tables -->
    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">


    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        body {
            overflow-x: hidden;
            font-family: "Montserrat", sans-serif;
            background-color: white;
            color: #000000 !important;
        }

        .color {
            color: #004f91;
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


        .form-group.required .control-label:after {
            content: "*";
            color: red;
        }

    </style>

</head>


<body id="page-top">
    @if (Auth::user()->is_blocked == 1 || Auth::user()->is_valid == 0 || Auth::user()->is_deactivated == 1)
        <div id="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content" style="background-color: white">
                    <!-- Topbar -->
                    @include('common.header')
                    <!-- End of Topbar -->

                    <div class="container mt-3">

                        @if (Auth::user()->is_blocked == 1)
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Sorry! Your account has been blocked!</h4>
                                <p>Your account has been blocked due to falsifying submitted reports which could greatly
                                    harm the operation of the barangay.
                                    Please understand that blocking of accounts are done if you fail to comply on the
                                    regulations in using the system.</p>
                                <hr>
                                <p class="mb-0">If you wish to ask for assistance, please contact your
                                    respective barangay office.</p>
                            </div>


                        @elseif (Auth::user()->is_valid == 0)
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Sorry! Your account is not yet verified!</h4>
                                <p> Your account is not yet verified. Please wait for the confirmation of your residence
                                    after a couple of days. Thank you for your patience and understanding.</p>
                                <hr>
                                <p class="mb-0">If you wish to ask for assistance, please contact your
                                    respective barangay office.</p>
                            </div>

                        @elseif (Auth::user()->is_deactivated == 1)
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Sorry! Your account has been deactivated.</h4>
                                <hr>
                                <p class="mb-0">If you wish to activate your account, please contact
                                    your respective barangay office for assistance.</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>



    @else
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
    @endif

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


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>



</body>

</html>

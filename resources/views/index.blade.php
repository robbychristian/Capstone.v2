@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div data-aos="fade-right" class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-flex">
                <div class="mockup-img" style="margin: auto">
                    <img src="{{ URL::asset('img/appmockup.png') }}" alt="" srcset="" class="mockup">
                </div>
            </div>

            <div data-aos="fade-left" class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-flex">
                <div class="justify-content-center align-self-center app-content">
                    <h3 class="app-tagline"> Disaster Preparedness Companion.</h3>
                    <h3 class="app-tagline-2 mt-4"> We Are With You.</h3>
                    <p class="app-desc mt-4 ">Be our companion to be shelthered and protected. Together, let's help hand in
                        hand against disasters. KaBisig accompanies you with updates and guides.</p>
                    <a href="#" class="btn btn-dark btn-lg active mt-3" role="button" aria-pressed="true"><i
                            class="fab fa-android icon-android fa-spin mr-3"
                            style=" vertical-align: middle;"></i><strong>Download our Android App</strong></a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-kabisig p-5">
        <h1 class="heading-features mt-5 text-center color">
            Our Features
        </h1>

        <!--First Row Features-->
        <div class="row d-flex mt-3" style="justify-content: center; align-items: center">
            <div data-aos="zoom-in" class="col-xl-3 col-lg-5 col-md-5 col-sm-8 col-xs-5 py-4 mx-3 d-flex"
                style="border-radius: 2.5rem">
                <div class="card card-bg w-100 border-0"
                    style="height: 20rem; border-radius: 2.5rem; background-color: transparent">
                    <img class="card-img-top" src="{{ URL::asset('img/feature-icon-announcement.png') }}" alt="">
                    <div class="card-body feature-content">
                        <h4 class="card-title color feature-title">Announcements</h4>
                        <p class="card-text feature-text">Keep updated and posted on the following events within your
                            vicinity</p>
                    </div>
                </div>
            </div>
            <div data-aos="zoom-in" class="col-xl-3 col-lg-5 col-md-5 col-sm-8 col-xs-5 py-4 mx-3 d-flex"
                style="border-radius: 2.5rem">
                <div class="card card-bg w-100 border-0"
                    style="height: 20rem; border-radius: 2.5rem; background-color: transparent">
                    <img class="card-img-top" src="{{ URL::asset('img/feature-icon-protocol.png') }}" alt="">
                    <div class="card-body feature-content">
                        <h4 class="card-title color feature-title">Protocols</h4>
                        <p class="card-text feature-text">Prepare and be aware of the actions in the pre, during and post
                            disasters
                        </p>
                    </div>
                </div>
            </div>
            <div data-aos="zoom-in" class="col-xl-3 col-lg-5 col-md-5 col-sm-8 col-xs-5 py-4 mx-3 d-flex"
                style="border-radius: 2.5rem">
                <div class="card card-bg w-100 border-0"
                    style="height: 20rem; border-radius: 2.5rem; background-color: transparent">
                    <img class="card-img-top" src="{{ URL::asset('img/feature-icon-map.png') }}" alt="">
                    <div class="card-body feature-content">
                        <h4 class="card-title color feature-title">Vulnerability Map</h4>
                        <p class="card-text feature-text">Know the vulnerable areas and recognize the zones to prevent </p>
                    </div>
                </div>
            </div>
            <div data-aos="zoom-in" class="col-xl-3 col-lg-5 col-md-5 col-sm-8 col-xs-5 py-4 mx-3 d-flex"
                style="border-radius: 2.5rem">
                <div class="card card-bg w-100 border-0"
                    style="height: 20rem; border-radius: 2.5rem; background-color: transparent">
                    <img class="card-img-top" src="{{ URL::asset('img/feature-icon-report.png') }}" alt="">
                    <div class="card-body feature-content">
                        <h4 class="card-title color feature-title">Reports</h4>
                        <p class="card-text feature-text">Coordinate with the officials on the situation in response to
                            disasters
                        </p>
                    </div>
                </div>
            </div>
            <div data-aos="zoom-in" class="col-xl-3 col-lg-5 col-md-5 col-sm-8 col-xs-5 py-4 mx-3 d-flex"
                style="border-radius: 2.5rem">
                <div class="card card-bg w-100 border-0"
                    style="height: 20rem; border-radius: 2.5rem; background-color: transparent">
                    <img class="card-img-top" src="{{ URL::asset('img/feature-icon-emergency.png') }}" alt="">
                    <div class="card-body feature-content">
                        <h4 class="card-title color feature-title">Emergency Messages</h4>
                        <p class="card-text feature-text">Early warning and alerts from the officials sent through SMS</p>
                    </div>
                </div>
            </div>
            <div data-aos="zoom-in" class="col-xl-3 col-lg-5 col-md-5 col-sm-8 col-xs-5 py-4 mx-3 d-flex"
                style="border-radius: 2.5rem">
                <div class="card card-bg w-100 border-0"
                    style="height: 20rem; border-radius: 2.5rem; background-color: transparent">
                    <img class="card-img-top" src="{{ URL::asset('img/feature-icon-chat.png') }}" alt="">
                    <div class="card-body feature-content">
                        <h4 class="card-title color feature-title">Chat</h4>
                        <p class="card-text feature-text">Communicate within your range through Peer-to-Peer WiFi Direct
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div data-aos="fade-up" class="d-flex-row justify-content-center align-items-start app-content">
        <h3 class="text-motto"> Overcome Disasters Hand in Hand</h3>
        <h3 class="text-motto-2"> Your Safety is Everything to Us</h3>
    </div>

    <div class="d-flex justify-content-center align-items-start">
        <div class="img-motto" style="margin: auto">
            <div class="row">
                <div class="col-6" data-aos="zoom-in-right">
                    <img class="img-motto img-fluid" src="{{ url::asset('img/Community-white.gif') }}" alt="" srcset="">
                </div>
                <div class="col-6" data-aos="zoom-in-left">
                    <img class="img-motto img-fluid" src="{{ url::asset('img/Team-spirit.gif') }}" alt="" srcset="">
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="page-footer font-small teal pt-4">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 text-light" style="background-color: #004F91;">© 2021 Copyright:
            QuadCore</div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        test()
        console.log(moment('1995-12-25'))
        AOS.init();
    </script>
@endsection

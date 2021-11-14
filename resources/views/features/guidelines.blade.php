@extends('layouts.master')
@section('title', '| Guidelines')
@section('content')

    <div class="container-fluid" style="color: black;">



        <!-- CONTAINER OF TRANSLATION -->

        <div class="tab-content" id="pills-tabContent">
            <!-- ENGLISH CONTENT -->
            <div class="tab-pane fade show active" id="pills-eng" role="tabpanel" aria-labelledby="pills-eng-tab">
                <h3 class="mb-3">Disaster Preparedness</h3>

                <!-- NAVIGATION OF DISASTER -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="flood-tab" data-toggle="tab" href="#flood" role="tab"
                            aria-controls="flood" aria-selected="true">Flood</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="earthquake-tab" data-toggle="tab" href="#earthquake" role="tab"
                            aria-controls="earthquake" aria-selected="false">Earthquake</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tropical-cyclone-tab" data-toggle="tab" href="#tropical-cyclone"
                            role="tab" aria-controls="tropical-cyclone" aria-selected="false">Tropical Cyclone</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tsunami-tab" data-toggle="tab" href="#tsunami" role="tab"
                            aria-controls="tsunami" aria-selected="false">Tsunami</a>
                    </li>

                </ul> <!-- END OF NAVIGATION OF DISASTER -->

                <!-- MAIN CONTAINER OF THE CONTENT OF GUIDELINES -->
                <div class="tab-content" id="myTabContent">

                    <!-- FLOOD CONTENT -->
                    <div class="tab-pane fade show active" id="flood" role="tabpanel" aria-labelledby="flood-tab">

                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">BEFORE</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">KNOW THE HAZARDS IN YOUR AREA.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-bullhorn fa-stack-1x" style="color: white;"></i>
                                                    </span>
                                                </div>
                                                <div class="col-10 guide-content-subheading">Monitor the news for weather
                                                    updates, warnings, and advisories.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-map-marked fa-stack-1x" style="color: white;"></i>
                                                    </span>
                                                </div>
                                                <div class="col-10 guide-content-subheading">Know the flood early warning
                                                    and evacuation plan of the community.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-hands-helping fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Participate in community flood
                                                    preparedness actions and drills.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-couch fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Secure your home. Move
                                                    essential furniture and items to the upper floor.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-bolt fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Before evacuating, turn off all
                                                    main switches of electricity, water and LPG tanks.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-dog fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Put livestock and pets in a
                                                    safe area or designed evacuation sites for animals.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-running fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">When order is received,
                                                    immediately evacuate to higher and safer grounds.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">DURING</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">STAY ON HIGHER GROUNDS</div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-door-closed fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Stay indoors and stay tuned for
                                                    latest news and weather updates.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-plug fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">DO NOT touch electrical
                                                    equipment
                                                    if you are wet or standing in floodwater.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-swimmer fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">DO NOT go swimming or boating
                                                    in
                                                    swollen rivers.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-water fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">DO NOT cross streams when water
                                                    level is already above the knee.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-car fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading"> &nbsp; DO NOT walk or drive
                                                    through flooded areas.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">AFTER</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">STAY ALERT AND KEEP SAFE.</div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-door-open fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Leave the evacuation area only
                                                    when authorities say it is safe to return home. </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-tree fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Report fallen trees and
                                                    electric posts to proper authorities.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-bolt fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Check for wet or submerged
                                                    electrical outlets and applicances before turning on electricity.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-house-damage fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Check your house for possible
                                                    damages and repair as necessary.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-skull-crossbones fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Make sure that the food and
                                                    water for drinking are not contaminated by flood water.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-database fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Throw away rainwater in cans,
                                                    pots, and tires to prevent breeding of mosquitoes.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- credits of flood -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="text-copyright"><strong>&copy; Republic of the Philippines - Office of Civil
                                    Defense</strong></div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="text-copyright"><i><a href="https://mmda.gov.ph/images/FAQ/flood.jpg"
                                        target="_blank">See source here</a></i></div>
                        </div>

                        <!-- end of credits -->
                    </div> <!-- END DIV OF FLOOD CONTENT -->

                    <!-- EARTHQUAKE CONTENT -->
                    <div class="tab-pane fade" id="earthquake" role="tabpanel" aria-labelledby="earthquake-tab">

                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">BEFORE</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">KNOW THE HAZARDS IN YOUR AREA.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-first-aid fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">
                                                    <div class="row">
                                                        <div class="col-12">Familiarize yourself with the
                                                            following:</div>
                                                        <div class="col-12">
                                                            <ul>
                                                                <li style="list-style: none">Fire Extinguishers</li>
                                                                <li style="list-style: none">Medical Kit</li>
                                                                <li style="list-style: none">Exit Routes</li>
                                                                <li style="list-style: none">Evacuation Plan</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-tools fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Check your house and have it
                                                    repaired if necessary.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas  fa-fire fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Store harmful chemicals and
                                                    flammable materials properly.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-couch fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Secure heavy furniture and
                                                    hanging objects.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-suitcase fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Prepare your family's GO BAG
                                                    containing items needed for survival.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-hands-helping fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Participate in office and
                                                    community earthquake drills.</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">DURING</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">WHEN INSIDE A BUILDING, STAY CALM
                                                    AND DO THE:</div>

                                                <img src="{{ URL::asset('img/duckcoverholdicon.png') }}"
                                                    class="duck-cover-hold-icon" alt="">

                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-door-closed fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Stay indoors and stay tuned
                                                    for
                                                    latest news and weather updates.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <img
                                                        src="{{ URL::asset('img/icon-duck.png') }}"
                                                        class="duck-cover-hold-icon" alt=""
                                                        style="height: 65px; width: 65px;">
                                                </div>
                                                <div class="col-10 guide-content-subheading">Duck under a strong table and
                                                    hold
                                                    on to it. Stay alert for potential threats.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-border-all fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Stay away from glass windows,
                                                    shelves and heavy objects.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-door-open fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">After shaking stops, exit the
                                                    building and go to designated evacuation centers.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">WHEN YOU ARE OUTSIDE, MOVE TO AN
                                                    OPEN
                                                    AREA!</div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-building fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Stay away from buildings,
                                                    trees,
                                                    electric posts and landslide prone areas.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-car-side fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">If you're in a moving vehicle,
                                                    stop and exit the vehicle.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">AFTER</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">STAY ALERT FOR AFTERSHOCKS!</div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-band-aid fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Assess yourself and others for
                                                    injuries. Provide first aid if necessary. </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-wheelchair fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Prioritize the needs of older
                                                    persons, pregnant women, PWDs and children.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-water fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">If in a coastal area and there
                                                    is a threat of a tsunami, evacuate to higher ground immediately.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-skull-crossbones fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Check for spills of toxic and
                                                    flammable chemicals.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-house-damage fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Stay out of the building until
                                                    advised that it is safe to return.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-charging-station fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Check for damages in water and
                                                    electrical lines, and gas or LPG leaks.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- credits of earthquake -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="text-copyright"><strong>&copy; Republic of the Philippines - Office of Civil
                                    Defense</strong></div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="text-copyright"><i><a href="https://mmda.gov.ph/images/FAQ/Earthquake.jpg"
                                        target="_blank">See source here</a></i></div>
                        </div>
                        <!-- end of credits -->
                    </div>
                    <!-- END DIV OF EARTHQUAKE -->

                    <!-- TROPICAL CYCLONE CONTENT -->
                    <div class="tab-pane fade" id="tropical-cyclone" role="tabpanel"
                        aria-labelledby="tropical-cyclone-tab">

                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">BEFORE</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">KNOW THE HAZARDS IN YOUR AREA.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-bullhorn fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Monitor the news for weather
                                                    updates, warnings and advisories.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-clipboard-list fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Know the early warning and
                                                    evacuation plan of the community.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-hammer fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Check the integrity of your
                                                    house and repair weak parts.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-suitcase fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Prepare your family's GO BAG
                                                    containing items needed for survival.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-cat fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Put livestock and pets in safe
                                                    area or designated evacuation site for animals.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-map-pin fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">When notified, immediately go
                                                    to the designated evacuation center.</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">DURING</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">STAY ALERT AND STAY TUNED.</div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-door-closed fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Stay calm. Stay indoors and
                                                    tune
                                                    in for latest news and weather updates.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-charging-station fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Turn off main electrical
                                                    switch
                                                    and water valve.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-lightbulb fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Use flashlight or emergency
                                                    lamp.
                                                    Be cautious in using candles and gas lamps.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-border-all fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Stay
                                                    away from glass windows.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">AFTER</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">REMAIN ALERT AND BE CAUTIOUS.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-user-check fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Wait for authorities to
                                                    declare that it is safe to return home. </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-tree fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Stay away from fallen trees,
                                                    damaged structures and power lines.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-hiking fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Do not go sightseeing as you
                                                    may hinder the work of emergency services.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-tools fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Be cautious in checking and
                                                    repairing the damaged parts of your house..</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-charging-station fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Check for wet or submerged
                                                    electrical outlets and appliances before turning on electricity.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-database fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Throw away rainwater in cans,
                                                    pots and tires to prevent breeding of mosquitoes.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- credits of earthquake -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="text-copyright"><strong>&copy; Republic of the Philippines - Office of Civil
                                    Defense</strong></div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="text-copyright"><i><a href="https://mmda.gov.ph/images/FAQ/Tropical-Cyclone.jpg"
                                        target="_blank">See source here</a></i></div>
                        </div>
                        <!-- end of credits -->
                    </div>
                    <!-- END DIV OF TROPICAL CYCLONE -->

                    <!-- TSUNAMI CONTENT -->
                    <div class="tab-pane fade" id="tsunami" role="tabpanel" aria-labelledby="tsunami-tab">

                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">BEFORE</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">KNOW THE HAZARDS IN YOUR AREA.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-bullhorn fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Know if your area has
                                                    potential threat of tsunami.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-map-marked fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Know the location of the
                                                    evacuation site and the fastest and safest way to go there.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-hands-helping fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Participate in community
                                                    tsunami preparedness actions and drills.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-seedling fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Plant mangroves and trees near
                                                    the shore.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-suitcase fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Prepare your family's GO BAG
                                                    containing items needed for survival.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">DURING</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">KNOW THE SIGNS OF AN INCOMING
                                                    TSUNAMI
                                                </div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-chart-line fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Earthquake that is strong
                                                    enough
                                                    to be felt.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-sun fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading"> &nbsp;&nbsp;&nbsp; Sudden
                                                    drop or
                                                    rise of sea water level.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-volume-up fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Roaring sound of incoming tsunami.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">STAY ON HIGHER GROUNDS.</div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-mountain fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Do not stay in low-lying
                                                    coastal
                                                    area after a strong earthquake. Move to higher ground immediately.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-camera fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Never go down the beach to
                                                    watch
                                                    or take pictures of the tsunami.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">AFTER</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">STAY ALERT AND KEEP SAFE.</div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-door-open fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Leave the evacuation area only
                                                    when authorities say it is safe to return home.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-search-location fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Check for missing persons and
                                                    report it to authorities.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-ambulance fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Bring the injured and sick to
                                                    the nearest hospital.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-charging-station fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Check for wet or submerged
                                                    electrical outlets and appliances before turning on electricity.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-house-damage fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Check your house for possible
                                                    damages and repair as necessary.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- credits of earthquake -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="text-copyright"><strong>&copy; Republic of the Philippines - Office of Civil
                                    Defense</strong></div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="text-copyright"><i><a href="https://mmda.gov.ph/images/FAQ/Tsunami.jpg"
                                        target="_blank">See source here</a></i></div>
                        </div>
                        <!-- end of credits -->
                    </div>
                    <!-- END DIV OF TSUNAMI -->

                    <!-- LANDSLIDE CONTENT -->
                    <div class="tab-pane fade" id="landslide" role="tabpanel" aria-labelledby="landslide-tab">Landslide
                    </div>
                    <!-- END DIV OF LANDSLIDE -->

                </div> <!-- END MAIN CONTAINER OF THE CONTENT OF GUIDELINES -->



            </div>
            <!--END ENGLISH CONTENT -->

            <!-- FILPINO CONTENT -->

            <div class="tab-pane fade" id="pills-fil" role="tabpanel" aria-labelledby="pills-fil-tab">
                <h3 class="mb-3">Paghahanda para sa Kalamidad</h3>
                <!-- NAVIGATION OF DISASTER -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="baha-tab" data-toggle="tab" href="#baha" role="tab"
                            aria-controls="baha" aria-selected="true">Baha</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="lindol-tab" data-toggle="tab" href="#lindol" role="tab"
                            aria-controls="lindol" aria-selected="false">Lindol</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="bagyo-tab" data-toggle="tab" href="#bagyo" role="tab"
                            aria-controls="bagyo" aria-selected="false">Bagyo</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="fil-tsunami-tab" data-toggle="tab" href="#fil-tsunami" role="tab"
                            aria-controls="tsunami" aria-selected="false">Tsunami</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="lupa-tab" data-toggle="tab" href="#lupa" role="tab"
                            aria-controls="lupa" aria-selected="false">Pagguho ng Lupa</a>
                    </li>
                </ul> <!-- END OF NAVIGATION OF DISASTER -->

                <!-- MAIN CONTAINER OF THE CONTENT OF GUIDELINES -->
                <div class="tab-content" id="myTabContent">

                    <!-- FLOOD CONTENT -->
                    <div class="tab-pane fade show active" id="baha" role="tabpanel" aria-labelledby="baha-tab">

                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">BAGO BUMAHA</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">ALAMIN ANG PELIGRO SA INYONG
                                                    LUGAR.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-bullhorn fa-stack-1x" style="color: white;"></i>
                                                    </span>
                                                </div>
                                                <div class="col-10 guide-content-subheading">Alamin and balita tukol sa
                                                    panahon at mga anunsyong pangkaligtasan.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-map-marked fa-stack-1x" style="color: white;"></i>
                                                    </span>
                                                </div>
                                                <div class="col-10 guide-content-subheading">Alamin ang plano ng komunidad
                                                    sa pagbibigay-babala at paglikas dahil sa baha.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-hands-helping fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Makilahok sa mga pagsasanay at
                                                    paghahanda ng komunidad sa baha.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-couch fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Siguraduhing ligtas ang iyong
                                                    tahanan, iakyat ang mga mahahalagang kagamitan sa mas mataas na lugar.
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-bolt fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Bago lumikas, isarado ang mga
                                                    main switches ng kuryente,tubig at tanke ng LPG.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-dog fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Ilikas ang mga alagang hayop
                                                    sa
                                                    ligtas na lugar.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-running fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Kapag inabisuhan ng
                                                    kinauukulan, mabilis na lumikas.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">HABANG BUMABAHA</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">Manatili sa mas mataas na mga
                                                    lugar</div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-door-closed fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Manatili sa loob ng bahay at
                                                    patuloy na makinig sa ulat ng panahon.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-plug fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Huwag hawakan ang mga
                                                    kagamitang de
                                                    kuryente kung ikaw ay basa o nakatayo sa tubig baha.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-swimmer fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Huwag lumangoy o mamangka sa
                                                    umaapaw na ilog.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-water fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Huwag tumawid ng sapa o ilog
                                                    kung
                                                    lagpas tuhod ang tubig.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-car fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading"> &nbsp; Huwag maglakad o
                                                    magmaneho
                                                    sa lugar na baha.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">PAGKATAPOS NG BAHA</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">MANATILING ALERTO AT MANATILING
                                                    LIGTAS.</div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-door-open fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Lisanin lamang ang evacuation
                                                    area kapag ligtas na ayon sa kinauukulan. </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-tree fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">pagbigay-alam sa kinauukulan
                                                    ang mga natumbang puno at poste ng kuryente o nga kubta bg tubig at
                                                    telepono.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-bolt fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Siguraduhing walang basa o
                                                    nakababad na outlet o kagamitan bago buksan ang linya ng kuryente.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-house-damage fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Suriin ang bahay kung may mga
                                                    nasira at ipaayos ang mga ito kung kailangan.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-skull-crossbones fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Siguraduhing malinis ang
                                                    pagkain at inuming tubig.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-database fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Itapon ang naipong tubig sa
                                                    mga
                                                    lata, paso at gulong upang hindi pamahayan ng lamok.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- END DIV OF FLOOD CONTENT -->

                    <!-- EARTHQUAKE CONTENT -->
                    <div class="tab-pane fade" id="lindol" role="tabpanel" aria-labelledby="lindol-tab">
                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">BAGO LUMINDOL</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">ALAMIN ANG PELIGRO SA INYONG
                                                    LUGAR.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-first-aid fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">
                                                    <div class="row">
                                                        <div class="col-12">Alamin ang mga sumusunod:</div>
                                                        <div class="col-12">
                                                            <ul>
                                                                <li style="list-style: none">Mga pang-apula ng apoy</li>
                                                                <li style="list-style: none">Mga gamit pang-medikal</li>
                                                                <li style="list-style: none">Ligtas na daanan palabas ng
                                                                    gusali</li>
                                                                <li style="list-style: none">Plano sa paglikas ng mga tao
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-tools fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Siguraduhing matibay ang bahay
                                                    at ipakumpuni ang mga sirang bahagi nito.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas  fa-fire fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Ayusing ang pag-iimbak ng mga
                                                    nakalalasong kemikal at mga bagay na maaring maging sanhi ng sunog.
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-couch fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Siguraduhing ligtas ang
                                                    pagkakalagay nga mga mabibigat at mga nakabiting bagay.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-suitcase fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Ihanda ang GO BAG na
                                                    naglalaman
                                                    nga mga pangangailangan ng pamilya.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-hands-helping fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Makilajok sa mga pagsasanay
                                                    ukol sa lindol.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">HABANG LUMILINDOL</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">KAPAG SA LOOB NG GUSALI,
                                                    MANATILING
                                                    KALMADO AT
                                                    GAWIN ANG SUMUSUNOD:</div>

                                                <img src="{{ URL::asset('img/duckcoverholdicon.png') }}"
                                                    class="duck-cover-hold-icon" alt="">

                                            </div>


                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <img
                                                        src="{{ URL::asset('img/icon-duck.png') }}"
                                                        class="duck-cover-hold-icon" alt=""
                                                        style="height: 65px; width: 65px;">
                                                </div>
                                                <div class="col-10 guide-content-subheading">Yumuko at magtago sailalim ng
                                                    matibay na mesa at kumapit sa mga paa bito, Manatiling alerto sa mga
                                                    banta
                                                    ng panganib sa paligid.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-border-all fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Umiwas sa mga bintanang
                                                    salamin,
                                                    mga aparador at mabibigat na gamit na maaaring mahulog.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-door-open fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Matapos ang pagyanig, agad na
                                                    lisanin ang gusali at pumunta sa evacuation area.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">WKAPAG NASA LABAS KA,LUMIPAT SA
                                                    ISANG
                                                    BUKAS NA LUGAR
                                                    AREA!</div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-building fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Lumayo sa mga gusali puno
                                                    poste at
                                                    mga lugar na may panganib ng pagguho ng lupa.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-car-side fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Kapag nagmamaneho, itabi at
                                                    ihinto
                                                    ang sasakyan at lumabas.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">PAGKATAPOS NG LINDOL</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">MANATILING ALERTO PARA SA MGA
                                                    MAPAMINSALANG LINDOL!</div>
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-band-aid fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Suriing ang iyong sarili at
                                                    mga
                                                    kasama kung may tinamong pinsala, Magbigay ng paunang lunas kung
                                                    kailangan. </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-wheelchair fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Unahin ang mga pangangailangan
                                                    ng mga matatanda, buntis, may kapansana at mga bata.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-water fa-stack-1x" style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Kapag nasa tabing dagat at mgy
                                                    bata ng tsunami, agad na lumikas papunta sa ligtas at mataas ng lugar.
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-skull-crossbones fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Suriin kung may natapong
                                                    nakakalasong kemikal at mga bahay na maaaring pagmulan ng sunog.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-house-damage fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Huwag bumalik sa loob ng
                                                    gusali
                                                    hangang walang abiso na ligtas na ito.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"> <span
                                                        class="fa-stack fa-2x">
                                                        <i class="fa fa-circle fa-stack-2x icon-background"></i>
                                                        <i class="fas fa-charging-station fa-stack-1x"
                                                            style="color: white;"></i>
                                                    </span></div>
                                                <div class="col-10 guide-content-subheading">Suriin ang mga linya ng tubif
                                                    at kuryente para sa maaring pinsala, suriin din ang tangke ng gas o LPG.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- END DIV OF EARTHQUAKE -->

                    <!-- TROPICAL CYCLONE CONTENT -->
                    <div class="tab-pane fade" id="bagyo" role="tabpanel" aria-labelledby="bagyo-tab">
                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">BAGO BUMAGYO</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col"></div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">HABANG BUMABAGYO</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col"></div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">PAGKATAPOS NG BAGYO</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- END DIV OF TROPICAL CYCLONE -->

                    <!-- TSUNAMI CONTENT -->
                    <div class="tab-pane fade" id="fil-tsunami" role="tabpanel" aria-labelledby="fil-tsunami-tab">
                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">BAGO BUMAHA</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col"></div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">HABANG BUMABAHA</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col"></div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center">PAGKATAPOS NG BAHA</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END DIV OF TSUNAMI -->


                </div> <!-- END MAIN CONTAINER OF THE CONTENT OF GUIDELINES -->
            </div> <!-- END FILPINO CONTENT -->

        </div> <!-- END CONTAINER OF TRANSLATION -->


        <!-- BUTTON FOR THE TRANSLATION -->

        <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">

            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-eng-tab" data-toggle="pill" href="#pills-eng" role="tab"
                    aria-controls="pills-eng" aria-selected="true">ENG</a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-fil-tab" data-toggle="pill" href="#pills-fil" role="tab"
                    aria-controls="pills-fil" aria-selected="false">FIL</a>
            </li>
        </ul> <!-- END TAG OF BUTTON FOR THE TRANSLATION -->

    </div>


@endsection

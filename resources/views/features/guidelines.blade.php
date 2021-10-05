@extends('dashboard.user.home')

@section('title', '| Guidelines')
@section('sub-content')

    <div class="col-xl-10 col-lg-9 col-md-8 mt-3">



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

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="landslide-tab" data-toggle="tab" href="#landslide" role="tab"
                            aria-controls="landslide" aria-selected="false">Landslides</a>
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
                                        <div class="col h4 text-center guideline-top-heading">BEFORE</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">KNOW THE HAZARDS IN YOUR AREA.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-bullhorn fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Monitor the news for weather
                                                    updates, warnings, and advisories.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-map-marked-alt fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Know the flood early warning
                                                    and evacuation plan of the community.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-hands-helping fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Participate in community flood
                                                    preparedness actions and drills.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-couch fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Secure your home. Move
                                                    essential furniture and items to the upper floor.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-bolt fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Before evacuating, turn off all
                                                    main switches of electricity, water and LPG tanks.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-dog fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Put livestock and pets in a
                                                    safe area or designed evacuation sites for animals.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-running fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">When order is received,
                                                    immediately evacuate to higher and safer grounds.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center guideline-top-heading">DURING</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="row mb-3">
                                            <div class="col-12 guide-content-heading">STAY ON HIGHER GROUNDS</div>
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-door-closed fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">Stay indoors and stay tuned for
                                                latest news and weather updates.</div>
                                        </div>

                                        <div class="row mb-3 ">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-plug fa-3x"></i></i></div>
                                            <div class="col-10 guide-content-subheading">DO NOT touch electrical equipment
                                                if you are wet or standing in floodwater.</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-swimmer fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">DO NOT go swimming or boating in
                                                swollen rivers.
                                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-water fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">DO NOT cross streams when water
                                                level is already above the knee.</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-car fa-4x"></i></div>
                                            <div class="col-10 guide-content-subheading">DO NOT walk or drive
                                                through flooded areas.
                                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center guideline-top-heading">AFTER</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">STAY ALERT AND KEEP SAFE.</div>
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-house-user fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Leave the evacuation area only
                                                    when authorities say it is safe to return home. </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-tree fa-3x"></i></i></div>
                                                <div class="col-10 guide-content-subheading">Report fallen trees and
                                                    electric posts to proper authorities.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-bolt fa-3x"></i></i></div>
                                                <div class="col-10 guide-content-subheading">Check for wet or submerged
                                                    electrical outlets and applicances before turning on electricity.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-house-damage fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Check your house for possible
                                                    damages and repair as necessary.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-skull-crossbones fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Make sure that the food and
                                                    water for drinking are not contaminated by flood water.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-database fa-3x"></i></div>
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
                                        <div class="col h4 text-center guideline-top-heading">BEFORE</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">KNOW THE HAZARDS IN YOUR AREA.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-first-aid fa-3x"></i></div>
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
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-tools fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Check your house and have it
                                                    repaired if necessary.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-fire fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Store harmful chemicals and
                                                    flammable materials properly.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-couch fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Secure heavy furniture and
                                                    hanging objects.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-suitcase fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Prepare your family's GO BAG
                                                    containing items needed for survival.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-hands-helping fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Participate in office and
                                                    community earthquake drills.</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center guideline-top-heading">DURING</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="row mb-3">
                                            <div class="col-12 guide-content-heading">WHEN INSIDE A BUILDING, STAY CALM AND
                                                DO THE:</div>
                                            <div class="col-2 guide-content-icon text-center"></div>
                                            <div class="col-10 guide-content-subheading">DUCK COVER HOLD</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-house-user fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">Stay indoors and stay tuned for
                                                latest news and weather updates.</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"></div>
                                            <div class="col-10 guide-content-subheading">Duck under a strong table and hold
                                                on to it. Stay alert for potential threats.</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-border-all fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">Stay away from glass windows,
                                                shelves and heavy objects.
                                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-door-open fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">After shaking stops, exit the
                                                building and go to designated evacuation centers.</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 guide-content-heading">WHEN YOU ARE OUTSIDE, MOVE TO AN OPEN
                                                AREA!</div>
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-building fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">Stay away from buildings, trees,
                                                electric posts and landslide prone areas.</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-car-side fa-3x"></i></i></div>
                                            <div class="col-10 guide-content-subheading">If you're in a moving vehicle,
                                                stop and exit the vehicle.</div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center guideline-top-heading">AFTER</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">STAY ALERT FOR AFTERSHOCKS!</div>
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-band-aid fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Assess yourself and others for
                                                    injuries. Provide first aid if necessary. </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-wheelchair fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Prioritize the needs of older
                                                    persons, pregnant women, PWDs and children.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-water fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">If in a coastal area and there
                                                    is a threat of a tsunami, evacuate to higher ground immediately.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-skull-crossbones fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Check for spills of toxic and
                                                    flammable chemicals.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-house-damage fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Stay out of the building until
                                                    advised that it is safe to return.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-faucet fa-3x"></i></div>
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
                                        <div class="col h4 text-center guideline-top-heading">BEFORE</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">KNOW THE HAZARDS IN YOUR AREA.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-bullhorn fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Monitor the news for weather
                                                    updates, warnings and advisories.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-clipboard-list fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Know the early warning and
                                                    evacuation plan of the community.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-hammer fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Check the integrity of your
                                                    house and repair weak parts.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-suitcase fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Prepare your family's GO BAG
                                                    containing items needed for survival.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-cat fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Put livestock and pets in safe
                                                    area or designated evacuation site for animals.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-map-pin fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">When notified, immediately go
                                                    to the designated evacuation center.</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center guideline-top-heading">DURING</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="row mb-3">
                                            <div class="col-12 guide-content-heading">STAY ALERT AND STAY TUNED.</div>
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-house-user fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">Stay calm. Stay indoors and tune
                                                in for latest news and weather updates.</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-charging-station fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">Turn off main electrical switch
                                                and water valve.
                                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-lightbulb fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">Use flashlight or emergency lamp.
                                                Be cautious in using candles and gas lamps.</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-border-all fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">Stay
                                                away from glass windows.
                                                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center guideline-top-heading">AFTER</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">REMAIN ALERT AND BE CAUTIOUS.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-user-check fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Wait for authorities to
                                                    declare that it is safe to return home. </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-tree fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Stay away from fallen trees,
                                                    damaged structures and power lines.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-hiking fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Do not go sightseeing as you
                                                    may hinder the work of emergency services.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-tools fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Be cautious in checking and
                                                    repairing the damaged parts of your house.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-charging-station fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Check for wet or submerged
                                                    electrical outlets and appliances before turning on electricity.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-database fa-3x"></i></div>
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
                                        <div class="col h4 text-center guideline-top-heading">BEFORE</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">KNOW THE HAZARDS IN YOUR AREA.
                                                </div>
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-bullhorn fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Know if your area has
                                                    potential threat of tsunami.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-map-marked-alt fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Know the location of the
                                                    evacuation site and the fastest and safest way to go there.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-hands-helping fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Participate in community
                                                    tsunami preparedness actions and drills.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-seedling fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Plant mangroves and trees near
                                                    the shore.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-suitcase fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Prepare your family's GO BAG
                                                    containing items needed for survival.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center guideline-top-heading">DURING</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="row mb-3">
                                            <div class="col-12 guide-content-heading">KNOW THE SIGNS OF AN INCOMING TSUNAMI
                                            </div>
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-chart-line fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">Earthquake that is strong enough
                                                to be felt.</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-sun fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading" style="padding: 0rem 3rem;">Sudden drop or
                                                rise of sea water level.</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-volume-up fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading" style="padding: 0rem 3rem;">
                                                Roaring sound of incoming tsunami.</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12 guide-content-heading">STAY ON HIGHER GROUNDS.</div>
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-mountain fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">Do not stay in low-lying coastal
                                                area after a strong earthquake. Move to higher ground immediately.</div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-2 guide-content-icon text-center"><i
                                                    class="fas fa-camera fa-3x"></i></div>
                                            <div class="col-10 guide-content-subheading">Never go down the beach to watch
                                                or take pictures of the tsunami.</div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center guideline-top-heading">AFTER</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <div class="col-12 guide-content-heading">STAY ALERT AND KEEP SAFE.</div>
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-door-open fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Leave the evacuation area only
                                                    when authorities say it is safe to return home.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-search-location fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Check for missing persons and
                                                    report it to authorities.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-ambulance fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Bring the injured and sick to
                                                    the nearest hospital.</div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-charging-station fa-3x"></i></div>
                                                <div class="col-10 guide-content-subheading">Check for wet or submerged
                                                    electrical outlets and appliances before turning on electricity.</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-2 guide-content-icon text-center"><i
                                                        class="fas fa-house-damage fa-3x"></i></div>
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
                                        <div class="col h4 text-center guideline-top-heading">BAGO BUMAHA</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col"></div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center guideline-top-heading">HABANG BUMABAHA</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col"></div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="row mb-3">
                                        <div class="col h4 text-center guideline-top-heading">PAGKATAPOS NG BAHA</div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- END DIV OF FLOOD CONTENT -->

                    <!-- EARTHQUAKE CONTENT -->
                    <div class="tab-pane fade" id="lindol" role="tabpanel" aria-labelledby="lindol-tab">Lindol</div>
                    <!-- END DIV OF EARTHQUAKE -->

                    <!-- TROPICAL CYCLONE CONTENT -->
                    <div class="tab-pane fade" id="bagyo" role="tabpanel" aria-labelledby="bagyo-tab">Bagyo</div>
                    <!-- END DIV OF TROPICAL CYCLONE -->

                    <!-- TSUNAMI CONTENT -->
                    <div class="tab-pane fade" id="fil-tsunami" role="tabpanel" aria-labelledby="fil-tsunami-tab">Tsunami
                    </div>
                    <!-- END DIV OF TSUNAMI -->

                    <!-- LANDSLIDE CONTENT -->
                    <div class="tab-pane fade" id="lupa" role="tabpanel" aria-labelledby="lupa-tab">Lupa</div>
                    <!-- END DIV OF LANDSLIDE -->



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

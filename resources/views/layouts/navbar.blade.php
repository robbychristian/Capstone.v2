<!---------------------->
<!--- Vertical Navbar -->
<!---------------------->

<!--USER SIDE NAVBAR-->
@if (Auth::user()->user_role === 4)
    <div class="d-none d-md-block d-lg-block d-xl-block col-xl-2 col-lg-3 col-md-4">
        <nav class="navbar navbar-expand-md navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sideNavBar"
                aria-controls="sideNavBar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="sideNavBar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/user/account/{{ Auth::user()->id }}/edit"> <i
                                class="fas fa-user-circle mr-2"></i>Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.announcements.index') }}"> <i
                                class="fas fa-bullhorn mr-2"></i></i>Announcements</a>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link" style="margin: 0; color:#3490dc;"> <i
                                class="fas fa-bookmark mr-2"></i>Protocols
                        </p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="{{ route('user.guidelines.index') }}">Guidelines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="{{ route('user.evacuation.index') }}">Evacuation Centers
                            & Hospitals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-marked mr-2"></i>Vulnerability
                            Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i>Reports</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
<!--BRGY OFFICIAL SIDE NAVBAR-->
@elseif (Auth::user()->user_role === 3)
    <div class="d-none d-md-block d-lg-block d-xl-block col-xl-2 col-lg-3 col-md-4">
        <nav class="navbar navbar-expand-md navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sideNavBar"
                aria-controls="sideNavBar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="sideNavBar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/brgy_official/account/{{ Auth::user()->id }}/edit"> <i
                                class="fas fa-user-circle mr-2"></i>Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('brgy_official.announcements.index') }}"> <i
                                class="fas fa-bullhorn mr-2"></i></i>Announcements</a>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link" style="margin: 0; color:#3490dc;"> <i
                                class="fas fa-bookmark mr-2"></i>Protocols
                        </p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="{{ route('brgy_official.guidelines.index') }}">Guidelines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3" href="{{ route('brgy_official.evacuation.index') }}">Evacuation
                            Centers
                            & Hospitals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-marked mr-2"></i>Vulnerability
                            Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i>Reports</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope mr-2"></i>Emergency Alert
                            Message</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('brgy_official.manageresident.index') }}"><i class="fas fa-house-user mr-2"></i>Manage Resident</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
<!--ADMIN SIDE NAVBAR-->
@elseif (Auth::user()->user_role === 1)
    <div class="d-none d-md-block d-lg-block d-xl-block col-xl-2 col-lg-3 col-md-4">
        <nav class="navbar navbar-expand-md navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sideNavBar"
                aria-controls="sideNavBar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="sideNavBar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#"> <i
                                class="fas fa-user-circle mr-2"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.announcements.index') }}"> <i
                                class="fas fa-bullhorn mr-2"></i></i>Announcements</a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link text-dark"> <i
                                class="fas fa-bookmark mr-2"></i>Protocols
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4" href="{{ route('admin.guidelines.index') }}"><div class="ml-3">Guidelines</div></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4" href="{{ route('admin.evacuation.index') }}"><div class="ml-3">Evacuation Centers & Hospitals</div></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-marked mr-2"></i>Vulnerability
                            Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i>Reports</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope mr-2"></i>Emergency Alert
                            Message</a>
                    </li>

                    <li class="nav-item">
                        <div class="nav-link text-dark" href="#"><i class="fas fa-house-user mr-2"></i>User Role</div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link ml-4" href="{{ route('admin.manageresident.index') }}"><div class="ml-3">Manage Residents</div></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link ml-4" href="{{ route('admin.managebrgy_official.index') }}"><div class="ml-3">Manage Barangay Officials</div></a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
@endif

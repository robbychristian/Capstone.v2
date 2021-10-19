<!---------------------->
<!--- Vertical Navbar -->
<!---------------------->

<!--==========================================================================USER SIDE NAVBAR===============================================================================-->
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
                        <a class="nav-link nav-size" href="/user/account/{{ Auth::user()->id }}/edit"> <i
                                class="fas fa-user-circle mr-2"></i>Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-size" href="{{ route('user.announcements.index') }}"> <i
                                class="fas fa-bullhorn mr-2"></i></i>Announcements</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed text-truncate submenu nav-size" href="#submenu1"
                            data-toggle="collapse" data-target="#submenu1"><i class="fas fa-bookmark mr-2"></i> <span
                                class="d-none d-sm-inline">Protocols</span></a>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item">
                                    <a class="nav-link ml-3 nav-size"
                                        href="{{ route('user.guidelines.index') }}">Guidelines</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-3 nav-size"
                                        href="{{ route('user.evacuation.index') }}">Evacuation
                                        Centers
                                        & Hospitals</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-size" href="{{ route('user.vulnerabilitymap.index') }}"><i
                                class="fas fa-map-marked mr-2"></i>Vulnerability
                            Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-size" href="{{ route('user.reports.index') }}"><i
                                class="fas fa-edit mr-2"></i>Reports</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
    <!--==========================================================================BRGY SIDE NAVBAR===============================================================================-->
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
                        <a class="nav-link" href="{{ route('brgy_official.dashboard.index') }}"> <i class="fas fa-chart-bar mr-2"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/brgy_official/account/{{ Auth::user()->id }}/edit"> <i
                                class="fas fa-user-circle mr-2"></i>Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('brgy_official.announcements.index') }}"> <i
                                class="fas fa-bullhorn mr-2"></i></i>Announcements</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed text-truncate submenu" href="#submenu1" data-toggle="collapse"
                            data-target="#submenu1"><i class="fas fa-bookmark mr-2"></i> <span
                                class="d-none d-sm-inline">Protocols</span></a>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item">
                                    <a class="nav-link ml-3"
                                        href="{{ route('brgy_official.guidelines.index') }}">Guidelines</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-3"
                                        href="{{ route('brgy_official.evacuation.index') }}">Evacuation
                                        Centers
                                        & Hospitals</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('brgy_official.vulnerabilitymap.index') }}"><i
                                class="fas fa-map-marked mr-2"></i>Vulnerability
                            Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('brgy_official.reports.index') }}"><i
                                class="fas fa-edit mr-2"></i>Reports</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope mr-2"></i>Emergency Alert
                            Message</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('brgy_official.stats.index') }}"> <i class="fas fa-clipboard mr-2"></i>Disaster Statistics</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('brgy_official.manageresident.index') }}"><i class="fas fa-users mr-2"></i>Manage Resident</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>



    <!--==========================================================================ADMIN SIDE NAVBAR===============================================================================-->
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
                        <a class="nav-link" href="{{ route('admin.dashboard.index') }}"> <i class="fas fa-chart-bar mr-2"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.announcements.index') }}"> <i
                                class="fas fa-bullhorn mr-2"></i></i>Announcements</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed text-truncate submenu" href="#submenu1" data-toggle="collapse"
                            data-target="#submenu1"><i class="fas fa-bookmark mr-2"></i> <span
                                class="d-none d-sm-inline">Protocols</span></a>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item">
                                    <a class="nav-link ml-3"
                                        href="{{ route('admin.guidelines.index') }}">Guidelines</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-3" href="{{ route('admin.evacuation.index') }}">Evacuation
                                        Centers
                                        & Hospitals</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.vulnerabilitymap.index') }}"><i
                                class="fas fa-map-marked mr-2"></i>Vulnerability
                            Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.reports.index') }}"><i
                                class="fas fa-edit mr-2"></i>Reports</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope mr-2"></i>Emergency Alert
                            Message</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed text-truncate submenu" href="#submenu2" data-toggle="collapse"
                            data-target="#submenu2"><i class="fas fa-house-user mr-2"></i> <span
                                class="d-none d-sm-inline">User Role</span></a>
                        <div class="collapse" id="submenu2" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item">
                                    <a class="nav-link ml-3"
                                        href="{{ route('admin.manageresident.index') }}">Manage Residents</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-3"
                                        href="{{ route('admin.managebrgy_official.index') }}">Manage Barangay
                                        Officials</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>
    </div>

    <!--==========================================================================LGU SIDE NAVBAR===============================================================================-->
@elseif (Auth::user()->user_role === 5)
<div class="d-none d-md-block d-lg-block d-xl-block col-xl-2 col-lg-3 col-md-4">
    <nav class="navbar navbar-expand-md navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sideNavBar"
            aria-controls="sideNavBar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="sideNavBar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lgu.brgy_delapaz.index') }}"> <i
                            class="fas fa-chevron-right mr-2"></i>Barangay Dela Paz</a>
                </li>   
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lgu.brgy_manggahan.index') }}"> <i
                            class="fas fa-chevron-right mr-2"></i>Barangay Manggahan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lgu.brgy_maybunga.index') }}"> <i class="fas fa-chevron-right mr-2"></i></i>Barangay Maybunga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lgu.brgy_rosario.index') }}"><i
                            class="fas fa-chevron-right mr-2"></i>Barangay Rosario</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lgu.brgy_santolan.index') }}"><i class="fas fa-chevron-right mr-2"></i>Barangay Santolan</a>
                </li>



            </ul>

        </div>
    </nav>
</div>

@endif

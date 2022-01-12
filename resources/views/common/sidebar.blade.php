<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #004F91">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo-navbar.png') }}" alt="" srcset="" height="60" width="60">
        </div>
        <div class="sidebar-brand-text mx-3">KaBisig</div>
    </a>

    <!-- Divider 
    <hr class="sidebar-divider my-0">-->

    @if (Auth::user()->user_role == 2)
        <!-- Nav Item - Account -->
        <li class="nav-item ">
            <a class="nav-link" href="/user/account/{{ Auth::user()->id }}/edit">
                <i class="fas fa-fw fa-user-circle"></i>
                <span>Account</span></a>
        </li>

        <!-- Nav Item - Announcements -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.announcements.index') }}">
                <i class="fas fa-fw fa-bullhorn"></i>
                <span>Announcements</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>Protocols</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('user.guidelines.index') }}">Guidelines</a>
                    <a class="collapse-item" href="{{ route('user.evacuation.index') }}">Evacuation
                        Centers <br> and Hospitals</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Announcements -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.vulnerabilitymap.index') }}">
                <i class="fas fa-fw fa-map-marked"></i>
                <span>Vulnerability Map</span></a>
        </li>

        <!-- Nav Item - Reports -->
        <li class="nav-item">
            <a class="nav-link" href="/user/getreports/{{ Auth::user()->id }}">
                <i class="fas fa-fw fa-edit"></i>
                <span>Reports</span></a>
        </li>

    @elseif (Auth::user()->user_role === 7)
        <!-- Nav Item - Dashboard -->
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('user.dashboard.index') }}">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>Protocols</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('user.guidelines.index') }}">Guidelines</a>
                    <a class="collapse-item" href="{{ route('user.evacuation.index') }}">Evacuation
                        Centers <br> and Hospitals</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Announcements -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.vulnerabilitymap.index') }}">
                <i class="fas fa-fw fa-map-marked"></i>
                <span>Vulnerability Map</span></a>
        </li>


    @elseif (Auth::user()->user_role >= 3)

        @if (Auth::user()->user_role >= 4)
            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('user.dashboard.index') }}">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Dashboard</span></a>
            </li>
        @endif


        <!-- Nav Item - Account -->
        <li class="nav-item">
            <a class="nav-link" href="/user/account/{{ Auth::user()->id }}/edit">
                <i class="fas fa-fw fa-user-circle"></i>
                <span>Account</span></a>
        </li>

        <!-- Nav Item - Announcements -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.announcements.index') }}">
                <i class="fas fa-fw fa-bullhorn"></i>
                <span>Announcements</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>Protocols</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('user.guidelines.index') }}">Guidelines</a>
                    <a class="collapse-item" href="{{ route('user.evacuation.index') }}">Evacuation
                        Centers <br> and Hospitals</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Announcements -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.vulnerabilitymap.index') }}">
                <i class="fas fa-fw fa-map-marked"></i>
                <span>Vulnerability Map</span></a>
        </li>

        <!-- Nav Item - Reports -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.reports.index') }}">
                <i class="fas fa-fw fa-edit"></i>
                <span>Reports</span></a>
        </li>
        @if (Auth::user()->user_role >= 4)
            <!-- Nav Item - Reports -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.emergencymessage.create') }}">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Emergency Alert
                        Message</span></a>
            </li>

            <!-- Nav Item - Reports -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.stats.index') }}">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Disaster Statistics</span></a>
            </li>
        @endif


        <!-- Nav Item - Reports -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.manageresident.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Manage Resident</span></a>
        </li>


    @elseif (Auth::user()->user_role === 1)

        <!-- Nav Item - Dashboard -->
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - Announcements -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.announcements.index') }}">
                <i class="fas fa-fw fa-bullhorn"></i>
                <span>Announcements</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>Protocols</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.guidelines.index') }}">Guidelines</a>
                    <a class="collapse-item" href="{{ route('admin.evacuation.index') }}">Evacuation
                        Centers <br> and Hospitals</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Announcements -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.vulnerabilitymap.index') }}">
                <i class="fas fa-fw fa-map-marked"></i>
                <span>Vulnerability Map</span></a>
        </li>

        <!-- Nav Item - Reports -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.reports.index') }}">
                <i class="fas fa-fw fa-edit"></i>
                <span>Reports</span></a>
        </li>

        <!-- Nav Item - Reports -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.emergencymessage.create') }}">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Emergency Alert
                    Message</span></a>
        </li>

        <!-- Nav Item - Reports -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.stats.index') }}">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Disaster Statistics</span></a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-user-tag"></i>
                <span>Users Management</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.manageresident.index') }}">Manage Resident</a>
                    <a class="collapse-item" href="{{ route('admin.managebrgy_official.index') }}">Manage Barangay
                        <br>
                        Officials</a>
                    <a class="collapse-item" href="{{ route('admin.managebarangay.index') }}">Manage Barangays
                        <br></a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Reports -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.activitylog.index') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>Audit Logs</span></a>
        </li>
    @endif

    <!-- Divider 
    <hr class="sidebar-divider">-->

    <!-- Heading 
    <div class="sidebar-heading">
        Interface
    </div> -->


    <!-- Nav Item - Utilities Collapse Menu 
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="">Colors</a>
                <a class="collapse-item" href="">Borders</a>
                <a class="collapse-item" href="">Animations</a>
                <a class="collapse-item" href="">Other</a>
            </div>
        </div>
    </li>-->

    <!-- Heading 
    <div class="sidebar-heading">
        Addons
    </div>-->

    <!-- Nav Item - Pages Collapse Menu 
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="">Login</a>
                <a class="collapse-item" href="">Register</a>
                <a class="collapse-item" href="">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="">404 Page</a>
                <a class="collapse-item" href="">Blank Page</a>
            </div>
        </div>
    </li>-->



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message 
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!
        </p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>-->

</ul>

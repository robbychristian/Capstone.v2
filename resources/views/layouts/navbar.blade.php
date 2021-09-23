<!---------------------->
<!--- Vertical Navbar -->
<!---------------------->

<div class="d-none d-md-block d-lg-block d-xl-block col-xl-2 col-lg-3 col-md-4">
    <nav class="navbar navbar-expand-md navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sideNavBar"
            aria-controls="sideNavBar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="sideNavBar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.account.index') }}"> <i class="fas fa-user-circle mr-2"></i>Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> <i class="fas fa-bullhorn mr-2"></i></i>Announcements</a>
                </li>
                <li class="nav-item">
                    <p class="nav-link" style="margin: 0; color:#3490dc;"> <i class="fas fa-bookmark mr-2"></i>Protocols
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

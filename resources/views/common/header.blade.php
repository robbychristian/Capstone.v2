<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <?php
        $profile_pic = DB::table('user_profiles')
            ->select('profile_pic')
            ->where('id', Auth::user()->id)
            //->get('profile_pic');
            ->first();
        
        $profile_pic_brgy = DB::table('brgy_officials')
            ->select('profile_pic')
            ->where('id', Auth::user()->id)
            //->get('profile_pic');
            ->first();
        ?>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @if (Auth::user()->user_role === 3 || Auth::user()->user_role === 1)
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>

                @elseif (Auth::user()->user_role === 4)
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }}</span>
                    <img class="img-profile rounded-circle"
                        src="{{ URL::asset('KabisigGit/storage/app/public/profile_pics/' . Auth::user()->id . '/' . $profile_pic->profile_pic) }}">
                @endif

                <!-- admin -->
                @if (Auth::user()->user_role === 1)
                    <img class="img-profile rounded-circle" src="{{ URL::asset('img/undraw_profile_pic_ic5t.png') }}">
                @endif

                <!-- brgy_official -->
                @if (Auth::user()->user_role === 3)
                    <img class="img-profile rounded-circle"
                        src="{{ URL::asset('KabisigGit/storage/app/public/brgy_officials/' . Auth::user()->id . '/' . $profile_pic_brgy->profile_pic) }}">
                @endif
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!--
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a> 
                <div class="dropdown-divider"></div>-->
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>

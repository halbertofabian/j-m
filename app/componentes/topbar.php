<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="<?php echo $url ?>" class="logo">
            <!-- <img src="<?php //echo $url .'app/assets/'?>images/logo.png" alt="" height="20" class="logo-large">
            <img src="<?php //echo $url .'app/assets/'?>images/logo-sm.png" alt="" height="22" class="logo-sm"> -->
            <span class="text-light" style="font-weight: bold; font-size: 22px;">J&M</span>
        </a>
    </div>

    <nav class="navbar-custom">
        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input" type="search" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <ul class="navbar-right d-flex list-inline float-right mb-0">
           

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                    <i class="mdi mdi-magnify noti-icon"></i>
                </a>
            </li>

            
            <!-- User-->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="<?php echo $url .'app/assets/'?>images/users/avatar-6.jpg" alt="user"
                        class="rounded-circle">
                    <span class="d-none d-md-inline-block ml-1">Alberto F. <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                    <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> My Wallet</a>
                    <a class="dropdown-item" href="#"><span class="badge badge-success float-right m-t-5">5</span><i
                            class="dripicons-gear text-muted"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $url .'salir' ?>"><i class="dripicons-exit text-muted"></i> Logout</a>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
        </ul>

    </nav>

</div>
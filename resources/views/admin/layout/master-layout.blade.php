<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

<head>
    @include('admin.layout.head')@include('admin.layout.head')
</head>

<body>
<div class="wrap">
    <!-- page HEADER -->
    <!-- ========================================================= -->
    <div class="page-header">
        <!-- LEFTSIDE header -->
        <div class="leftside-header">
            <div class="logo">
                <a href="index.html" class="on-click">
                    <img alt="logo" src="{{ asset('admin/images/header-logo.png') }}" />
                </a>
            </div>
            <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <!-- RIGHTSIDE header -->
        <div class="rightside-header">
            <div class="header-middle"></div>
            <!--SEARCH HEADERBOX-->
            <div class="header-section" id="search-headerbox">
                <a style="margin-top: 8px;" class="btn btn-success" href="{{ route('home') }}" target="_blank"><i class="fa fa-home"></i> Website Visit</a>
                <input type="text" name="search" id="search" placeholder="Search...">
                <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                <div class="header-separator"></div>
            </div>
            <!--USER HEADERBOX -->
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <img alt="profile photo" src="{{ asset('admin') }}/images/avatar/avatar_user.jpg" />
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            @if(session('admin'))
                                <?php
                                $admin =  \App\Models\User::where('id','=',session('admin'))->first();
                                ?>
                                    {{ ucwords($admin->name) }}
                            @endif
                        </span>
                        <span class="user-profile">Admin</span>
                    </div>
                    <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                    <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                </div>
                <div class="user-options dropdown-box">
                    <div class="drop-content basic">
                        <ul>
                            <li> <a href=""><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                            <li> <a href=""><i class="fa fa-lock" aria-hidden="true"></i> Lock Screen</a></li>
                            <li><a href=""><i class="fa fa-cog" aria-hidden="true"></i> Configurations</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-separator"></div>
            <!--Log out -->
            <div class="header-section">
                <a data-toggle="tooltip" data-placement="left" title="Logout" class="dropdown-item" href="{{ route('admin.logout') }}">
                    <i class="fa fa-sign-out log-out" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body">
        <!-- LEFT SIDEBAR -->
        <!-- ========================================================= -->
        <div class="left-sidebar">
            <!-- left sidebar HEADER -->
            <div class="left-sidebar-header">
                <div class="left-sidebar-title">Navigation</div>
                <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                    <span></span>
                </div>
            </div>


            <!-- NAVIGATION -->
            <!-- ========================================================= -->
            @include('admin.layout.navigation')
        </div>



        <!-- CONTENT -->
        <!-- ========================================================= -->
        <div class="content">
            @yield('content')
        </div>

        <!--scroll to top-->
        <a href="" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
    </div>
</div>

<!--BASIC scripts-->
<!-- ========================================================= -->
@include('admin.layout.footer')
</body>
</html>

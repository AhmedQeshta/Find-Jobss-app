<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="">
                <img src="{{asset('adminAssets/assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        @if(Auth::user()->avatar)
                            <img alt="" class="img-circle" src="{{asset(Auth::user()->avatar)}}" />
                         @else
                            <img alt="" class="img-circle" src="{{asset('image/admin/avatar/avatar.png')}}" />
                        @endif
                        <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{route('admin.profile')}}">
                                <i class="icon-user"></i> My Profile </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="{{route('admin.logout')}}">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>

<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- END HEADER -->


{{--<!-- ########## START: HEAD PANEL ########## -->--}}
{{--<div class="sl-header">--}}
{{--    <div class="sl-header-left">--}}
{{--        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>--}}
{{--        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>--}}
{{--    </div><!-- sl-header-left -->--}}
{{--    <div class="sl-header-right">--}}
{{--        <nav class="nav">--}}
{{--            <div class="dropdown">--}}
{{--                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">--}}
{{--                    <span class="logged-name"><span class="hidden-md-down">{{Auth::user()->name}}</span></span>--}}
{{--                    @if(Auth::user()->avatar)--}}
{{--                        <img  src="{{asset(Auth::user()->avatar)}}" class="wd-30 rounded-circle" alt="">--}}
{{--                    @else--}}
{{--                        <img src="{{asset('image/admin/avatar/avatar.png')}}" class="wd-32 rounded-circle" alt="">--}}
{{--                    @endif--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-header wd-200">--}}
{{--                    <ul class="list-unstyled user-profile-nav">--}}
{{--                        <li><a href="{{route('admin.profile')}}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>--}}
{{--                        <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>--}}
{{--                        <li><a href="{{route('admin.logout')}}"><i class="icon ion-power"></i> Sign Out</a></li>--}}
{{--                    </ul>--}}
{{--                </div><!-- dropdown-menu -->--}}
{{--            </div><!-- dropdown -->--}}
{{--        </nav>--}}
{{--        <div class="navicon-right">--}}
{{--            <a id="btnRightMenu" href="" class="pos-relative">--}}
{{--                <i class="icon ion-ios-bell-outline"></i>--}}
{{--                <!-- start: if statement -->--}}
{{--                <span class="square-8 bg-danger"></span>--}}
{{--                <!-- end: if statement -->--}}
{{--            </a>--}}
{{--        </div><!-- navicon-right -->--}}
{{--    </div><!-- sl-header-right -->--}}
{{--</div><!-- sl-header -->--}}
{{--<!-- ########## END: HEAD PANEL ########## -->--}}

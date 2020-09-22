<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

            <li class="nav-item  {{ Request::is('admin','admin/home') ? 'start active open' : '' }}">
                <a href="{{route('admin.DashBord')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>
            <li class="nav-item  {{ Request::is('admin/jobs','admin/jobs/*') ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Jop</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::is('admin/jobs') ? 'active ' : '' }} ">
                        <a href="{{route('admin.jobs')}}" class="nav-link ">
                            <span class="title">All Job</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/jobs/create') ? 'active ' : '' }} ">
                        <a href="{{route('admin.jobs.create')}}" class="nav-link ">
                            <span class="title">Create Jobs</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="#" class="nav-link ">
                            <span class="title">Job need it</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  {{ Request::is('admin/quiz','admin/quiz/*') ? 'active open' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Quiz</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ Request::is('admin/quiz') ? 'active ' : '' }} ">
                        <a href="{{route('admin.quiz')}}" class="nav-link ">
                            <span class="title">All Questions</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/quiz/create') ? 'active ' : '' }} ">
                        <a href="{{route('admin.quiz.create')}}" class="nav-link ">
                            <span class="title">Create Questions</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/quiz/users/answers') ? 'active ' : '' }} ">
                        <a href="{{route('admin.quiz.users.answers')}}" class="nav-link ">
                            <span class="title">User Answer</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->

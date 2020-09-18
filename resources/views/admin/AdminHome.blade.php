<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ########## START: link ########## -->
         @include('admin.layouts.header._main')
     <!-- ########## End: link ########## -->
</head>

    @guest

    @else
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">

            <!-- ########## START: HEAD PANEL ########## -->
                @include('admin.layouts.header.header')
            <!-- ########## END: HEAD PANEL ########## -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
              @include('admin.layouts.slideBar.leftBar')

                @yield('content')
              @include('admin.layouts.slideBar.rightBar')
            </div>
            <!-- END CONTAINER -->



            @include('admin.layouts.footer.footer')
        </div>

    @endguest


    @yield('admin_content')


    <!-- ########## START: Script ########## -->
    @include('admin.layouts.footer._main')
    <!-- ########## End: Script ########## -->
    </body>
</html>


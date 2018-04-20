<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    @include('cpanel.include.header')
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            @include('cpanel.include.topheader')
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">

                @include('cpanel.include.sidebar')

                <!-- BEGIN CONTENT -->
                @yield('pageContent')
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            @include('cpanel.include.footer')
        </div>
        @include('cpanel.include.script')
    </body>

</html>
<!DOCTYPE html>
<!-- saved from url=(0036)http://bitlers.com/glade/light/html/ -->
<html ><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta-Information -->
    <title>Online Courses</title>



    <!-- Vendor: Bootstrap Stylesheets http://getbootstrap.com -->

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/cards.css">

    <!-- Our Website CSS Styles -->
{{--
    <link rel="stylesheet" href="/assets/css/materialize.min.css">
--}}
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/icons.css">
    <link rel="stylesheet" href="/assets/css/main.css">

    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/css/pnotify.css">
    <link rel="stylesheet" href="/assets/css/pnotify.buttons.css">
    <link rel="stylesheet" href="/assets/css/pnotify.nonblock.css">
    <link rel="stylesheet" href="/assets/css/pnotify.nonblock.css">
    <link rel="stylesheet" href="/assets/css/nprogress.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/jquery-2.1.3.js"></script>
    <script src="/assets/js/moment.js"></script>
    <script src="/assets/js/bootstrap-datetimepicker.js"></script>

{{--
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
--}}

</head>

<body style="margin-bottom: 0px;padding-top: 0px;">
@yield('modal')
@yield('addFileDialog')
@yield('addAssignmentDialog')




    <header class="simple-normal light">
        <div class="top-bar">
            <div class="logo" style="margin-right: 0px;">
                <a href="/home" title=""><i class="fa fa-bullseye"></i> Islamic University</a>
            </div>
            <div class=" menu-options"><span class="menu-action"><i></i></span></div>

            <div class=" top-bar-quick-sec col-lg-offset-9">
                <ul class="quick-notify-section custom-dropdowns ">
                    <li class=" message-list dropdown">
                        <a href="{{url('/logout')}}">Logout</a>

                    </li>


                </ul>
                <div class="name-area">

                    <a href="javascript:void(0)" title=""><img src="/assets/images/me.jpg" alt=""> <strong>{{\Auth::user()->username}}</strong></a>

                </div>


            </div>

        </div><!-- Top Bar -->
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="side-menu-sec" id="header-scroll" style="overflow: hidden; width: auto; height: 100%; top: 67px;">


                <div class="my-profile-widget">
                    <div class="profile-widget-head">
                        <h3>{{\Auth::user()->username}}</h3>
                        <i>Welcome ...</i>
                        <span><img alt="" src="/assets/images/me.jpg"></span>
                    </div>


                </div>


                <div class="side-menus">
                    <span>MAIN LINKS</span>
                    <nav>
                        <ul class="parent-menu">
                            <li class="menu-item-has-children active">
                                <a title=""><i class="ti-desktop"></i><span>Dashboard </span></a>
                                <ul style="display: block;">
                                    @yield('side')


                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div><div class="slimScrollBar" style="background: rgb(135, 135, 135); width: 2px; position: absolute; top: 106px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 0px; height: 442.057px;"></div><div class="slimScrollRail" style="width: 2px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.1; z-index: 90; right: 0px;"></div></div>
    </header>
    <div class="main-content"  >

        <div class="panel-content" style="margin-top: 67px;">
            <div class="main-title-sec">
                <div class="row">
                    <div class="col-md-3 column">
                        <div class="heading-profile">
                            <h2>Dashboard</h2>
                            <span>Welcome back, John</span>
                        </div>
                    </div>

                </div>
            </div><!-- Heading Sec -->
            <ul class="breadcrumbs">
                <li><a href="javascript:void(0)" title="">Home</a></li>
                <li><a href="javascript:void(0)" title="">Dashboard</a></li>
            </ul>

        </div>
        <div>

        @yield('course')
        @yield('content')
        @yield('AssContent')





        <!-- Vendor: Javascripts -->


<script src="/assets/js/jquery-2.1.3.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/style.js"></script>
<script src="/assets/js/jquery-ui.min.js"></script>
<script src="/assets/js/moment.js"></script>
<script src="/assets/js/moment.min.js"></script>
<script src="/assets/js/bootstrap-datetimepicker.js"></script>
<script src="/assets/js/daterangepicker.js"></script>


        <!-- Our Website Javascripts -->
        <script src="/assets/js/app.js"></script>
        <script src="/assets/js/common.js"></script>
        <script src="/assets/js/home1.js"></script>
        <script src="/assets/js/prettify-1.0.min.js"></script>
        <script src="/assets/js/base.js"></script>



 </body></html>
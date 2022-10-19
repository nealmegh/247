<!DOCTYPE html>
<html lang="en">
<head>
    @include('Backend.Associate.head')
    @yield('css')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/admin/dashboard" class="site_title"><i class="fa fa-paw"></i> <span>{{$siteSettings[9]->value}}</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{ URL::to('/') }}/images/user.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{Auth::user()->name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                @include('Backend.Sidebar.main')
{{--                @yield('Backend.Sidebar.main')--}}
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                @include('Backend.Sidebar.sidebarFooter')
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        @include('Backend.Associate.header')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            @yield('content')
        {{--@include('Backend.demo')--}}
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('Backend.Associate.footer')
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset("js/jquery.min.js")}}"></script>
<!-- Bootstrap -->
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<!-- FastClick -->
<script src="{{asset("js/fastclick.js")}}"></script>
<!-- NProgress -->
<script src="{{asset("js/nprogress.js")}}"></script>
<!-- Chart.js -->
<script src="{{asset("js/Chart.min.js")}}"></script>
<!-- gauge.js -->
<script src="{{asset("js/gauge.min.js")}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset("js/bootstrap-progressbar.min.js")}}"></script>
<!-- iCheck -->
<script src="{{asset("js/icheck.min.js")}}"></script>
<!-- Skycons -->
<script src="{{asset("js/skycons.js")}}"></script>
<!-- Flot -->
<script src="{{asset("js/jquery.flot.js")}}"></script>
<script src="{{asset("js/jquery.flot.pie.js")}}"></script>
<script src="{{asset("js/jquery.flot.time.js")}}"></script>
<script src="{{asset("js/jquery.flot.stack.js")}}"></script>
<script src="{{asset("js/jquery.flot.resize.js")}}"></script>
<!-- Flot plugins -->
<script src="{{asset("js/jquery.flot.orderBars.js")}}"></script>
<script src="{{asset("js/jquery.flot.spline.min.js")}}"></script>
<script src="{{asset("js/curvedLines.js")}}"></script>
<!-- DateJS -->
<script src="{{asset("js/date.js")}}"></script>
<!-- JQVMap -->
<script src="{{asset("js/jquery.vmap.js")}}"></script>
<script src="{{asset("js/jquery.vmap.world.js")}}"></script>
<script src="{{asset("js/jquery.vmap.sampledata.js")}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset("js/moment.min.js")}}"></script>
<script src="{{asset("js/daterangepicker.js")}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset("js/custom.min.js")}}" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
@yield('js')

</body>
</html>




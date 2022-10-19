<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('theme.head')
@yield('head-customization')
</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
   @include('theme.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
    @include('theme.sidebar')
    <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        {{--        <div id="content" class="main-content">--}}
        {{--            <div class="container">--}}

        {{--                <div class="container">--}}

        {{--                    <div class="row layout-top-spacing">--}}
        {{--                        <div class="col-xl-9 col-lg-9 col-md-9 col-9 layout-spacing">--}}
        {{--                            <div class="widget widget-content-area br-4">--}}
        <div id="content" class="main-content">

            @if ($errors->any())
                <div class="alert alert-danger col-md-6 mt-2" style="margin-left: 25% !important;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                    @yield('main-content')


            @include('theme.footer')
        </div>
    <!-- END MAIN CONTAINER -->

    @include('theme.js')
    @yield('js-customization')
</body>
</html>

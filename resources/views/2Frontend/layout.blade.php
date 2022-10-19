<!DOCTYPE html>
<html lang="en">

<head>
    @include('2Frontend.Associate.head')
    @yield('css')
    <style>
        .booking-form {
            padding: 20px;
            margin: 0px auto;
            border-radius: 3px;
            border: 1px solid #CCCCCC);
            webkit-box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width:66%;

        }
        @media (max-width:768px){
            .booking-form{
                width:90%;
            }
        }

        .booking-form h1 {
            margin: 0px 0px 40px 0px ;
        }

        .booking-form input {
            padding: 5px 20px 5px 20px;
            margin: 5px 0px 5px 0px;
            border-radius: 3px;
            width: 100%;
            border:1px solid #ccc;
            height:35px;
            transition: all 0.5s;


        }
        .booking-form input:hover,
        .booking-form select:hover,
        .booking-form textarea:hover
        {
            -webkit-box-shadow: 0px 3px 4px 0px rgba(183, 183, 183, 0.75);
            -moz-box-shadow: 0px 3px 4px 0px rgba(183, 183, 183, 0.75);
            box-shadow: 0px 3px 4px 0px rgba(183, 183, 183, 0.75);
            transition: all 0.5s;
        }

        .booking-form select {
            padding: 5px 20px 5px 20px;
            margin: 5px 0px 5px 0px;
            border-radius: 3px;
            width: 100%;
            border:1px solid #ccc;
            height:35px;
            transition: all 0.5s;

        }

        .booking-form textarea {
            padding: 5px 20px 5px 20px;
            margin: 5px 0px 5px 0px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
            height: 140px;
            transition: all 0.5s;

        }

        .booking-form label {
            color: #f2a158;
            text-transform: none;
            margin-top: 15px;

        }
        .journey-details,.passenger-details{
            border:1px solid #ccc;
            padding:10px;
            border-radius: 3px;
            margin-top: 10px;
        }
        .journey-details-title,.passenger-details-title{
            color: #f2a158;
            margin-top: 15px;
        }
        .journey-details:before{

        }

        .passenger-details{}
        .passenger-details:before{}
        .payment-btn {
            margin: 20px 0px 10px 0px;
            font-size: 24px;
            width: 50%;
        }

        .confirmBtn1 {
            width: 100%;
            font-size: 30px;
            color: white;
            font-weight: 800;
            background-color: #0358b7;
            border: solid #0358b7 1px;
            border-radius: 3px;
        }

        .confirmBtn {

            width: 200px;
            font-size: 25px;
            color: white;
            font-weight: 800;
            background-color: #0358b7;
            border: solid #0358b7 1px;
            border-radius: 3px;
        }
        .confirm
        {
            text-align: center;
            margin-right: 10%;
            margin-left: 0;
            width: 100%;
        }
        .confirmBtn:hover{
            color:#e4e3e3;
        }

        .dropbtn {
            background-color: transparent;
            color: #332f2f;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 8px;
            overflow: hidden;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .logout input[type=submit] {
            width: 100%;
            background-color: #4CAF50; !important
        color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .dropdown-content a:hover {
            background-color: #333333;
            color: #fff !important;
        }
        .dropdown-content .logout{
            background-color:transparent;
            border:none;
            text-transform: uppercase;

        }

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {
            background-color: transparent;
            color: #fff;}
        .navbar-fixed-top {
            display: block !important;
            background-color: #ffffff !important;
        }
        .header-section-space {
            margin-top: 6%;
        }
        @media only screen and (max-width: 600px) {
        .header-section-space {
            margin-top: 0%;
        }
        }

        @media only screen and (max-width: 360px){
            .confirmBtn {
                width: 100%;
                font-size: 16px;
            }
        }
        @media only screen and (max-width: 767px) {
        .navbar-header {
            width: 100% !important;
        }
        .mobile-logo{
            width: 25%;
        }
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="75">

<!--================================= NAVIGATION START =============================================-->
<nav class="navbar navbar-default navbar-fixed-top menu-bg" id="top-nav">
    @include('2Frontend.Associate.navigation')
</nav>
<!--================================= NAVIGATION END =============================================-->

<!--================================= HEADER-1 START =============================================-->
<div class="container-fluid header-bgimage bgimage-property header-section-space" id="home">
    <div class="container">
        <div class="col-md-12 column-center no-padding white-text">
            <h1 class="center header-head1-bottom">safe &amp; trusted service</h1>
            <h3 class="center">We Pick Up &amp; Drop You On Time by Best Tariff </h3>
            <div class="center btn-top">
                <a href="#book">
                    <div class="header-btn">Book Now</div>
                </a>
            </div>
        </div>
    </div>
</div>
<!--================================= HEADER-1 END =============================================-->
<!-- TrustBox widget - Micro Review Count -->
{{--<div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="5ccdf0bc4786990001508f46" data-style-height="94px" data-style-width="100%" data-theme="light"> <a href="https://uk.trustpilot.com/review/taxiincambridge.co.uk" target="_blank" rel="noopener">Trustpilot</a> </div> <!-- End TrustBox widget -->--}}
@yield('content')
{{--Booking Form Start--}}




{{--Booking Form End--}}
<!--================================= MAINTENANCE START =============================================-->
@include('2Frontend.Associate.maintenance')
<!--================================= MAINTENANCE END =============================================-->

<!--================================= OUR AWESOME SERVICES START =============================================-->
@include('2Frontend.Associate.service')
<!--================================= OUR AWESOME SERVICES END =============================================-->

<!--================================= OUR AWESOME FEATURES START =============================================-->
@include('2Frontend.Associate.features')

<!--================================= AVAILABLE CAR TYPES START =============================================-->
<section id="car_type" class="container-fluid section-space section-bg-1">
    <div class="container">
        <h2 class="center h2-bottom">available car types</h2>
        <!--=============== ROW-1 ==================-->
        <div class="row types-row-bottom">
            <div class="col-md-10 column-center no-padding res-width-full">
                <div class="col-md-6 res-image-bottom res-image-bottom-1">
                    <div class="left">
                        <img src="{{asset('images/2Frontend/750x350x1.jpg')}}" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-6">
                    <h4 class="left h4-bottom">Saloon car</h4>
                    <p class="left">We have a range of state-of-the art saloon cars in our fleet. All of our saloon cars allow 4 passengers, maximum 23kg 2pcs luggage and 8kg 2pcs cabin bags or 30kg 1pcs luggage and 8kg 2pcs cabin bags or 8kg 4pcs cabin bags only. If you need more information about our car capacity, do not hesitate to contact us.</p>

                    <div class="left btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--=============== ROW-2 ==================-->
        <div class="row types-row-bottom">
            <div class="col-md-10 column-center no-padding res-width-full">
                <div class="col-md-6 res-image-bottom res-image-bottom-1">
                    <div class="left">
                        <img src="{{asset('images/2Frontend/750x350x2.jpg')}}" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-6">
                    <h4 class="left h4-bottom">Estate car</h4>
                    <p class="left">We have a range of spacious and modern estate/station wagon cars in our fleet. All of our Estate cars allow 4 passengers and maximum 23kg 3pcs luggage and 8kg 3pcs cabin bags or 30kg 2pcs luggage and 8kg 2pcs cabin bags. If you need more information about our car capacity, do not hesitate to contact us.</p>

                    <div class="left btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--=============== ROW-3 ==================-->
        <div class="row types-row-bottom">
            <div class="col-md-10 column-center no-padding res-width-full">
                <div class="col-md-6 res-image-bottom res-image-bottom-1">
                    <div class="left">
                        <img src="{{asset('images/2Frontend/750x350x3.jpg')}}" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-6">
                    <h4 class="left h4-bottom">Executive car</h4>
                    <p class="left">We are committed to provide airport transfer services with our luxury Executive cars. All of our Executive cars allow up to 4 passengers and maximum 23kg 2pcs luggage and 8kg 2pcs cabin bags or 30kg 1pcs luggage and 8kg 2pcs cabin bags or 8kg 4pcs cabin bags only. If you need more information about our car capacity, do not hesitate to contact us.</p>

                    <div class="left btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--=============== ROW-4 ==================-->
        <div class="row types-row-bottom">
            <div class="col-md-10 column-center no-padding res-width-full">
                <div class="col-md-6 res-image-bottom res-image-bottom-1">
                    <div class="left">
                        <img src="{{asset('images/2Frontend/750x350x4.jpg')}}" alt="image" class="img-responsive image-center" />
                    </div>
                </div>

                <div class="col-md-6">
                    <h4 class="left h4-bottom">Large Multi-seater</h4>
                    <p class="left">If you are in a group or have extra baggage, larger muti-seater is perfect for you. All of our Multi-seater vehicles allow up to 8 passengers and maximum 23kg 5pcs luggage and 8kg 4pcs cabin bags or 30kg 3pcs luggage and 8kg 5pcs cabin bags only. If you need more information about our car capacity, do not hesitate to contact us.</p>

                    <div class="left btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================= AVAILABLE CAR TYPES END =============================================-->


<!--================================= BEST PRICING PACKAGES START =============================================-->
<section class="container-fluid section-space section-bg-2" id="price">
    <div class="container">
        <h2 class="center h2-bottom">Our Top Destinations</h2>
        <div class="row">
            <!--=============== COLUMN-1 ==================-->
            <div class="col-md-4 col-sm-4 price-fixed price-res-bottom">
                <div class="packages-bg">
                    <h4 class="center">{{$siteSettings[45]->value}}</h4>
                    <p class="center pricing-tag ls">From {{'£'.$siteSettings[48]->value}} 0ne way</p>
                    <div class="price-list-bottom">
                        <p class="center ls">Book online or by phone</p>
                        <p class="center ls">24 hours drop off service</p>
                        <p class="center ls">Meet & Greet available</p>

                    </div>
                    <div class="center btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>

            <!--=============== COLUMN-2 ==================-->
            <div class="col-md-4 col-sm-4 price-fixed price-res-bottom">
                <div class="packages-bg">
                    <h4 class="center">{{$siteSettings[46]->value}}</h4>
                    <p class="center pricing-tag ls">From {{'£'.$siteSettings[49]->value}} One way</p>
                    <div class="price-list-bottom">
                        <p class="center ls">Book online or by phone</p>
                        <p class="center ls">24 hours drop off service</p>
                        <p class="center ls">Meet & Greet available</p>

                    </div>
                    <div class="center btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>

            <!--=============== COLUMN-3 ==================-->
            <div class="col-md-4 col-sm-4 price-fixed price-res-bottom">
                <div class="packages-bg">
                    <h4 class="center">{{$siteSettings[47]->value}}</h4>
                    <p class="center pricing-tag ls">From {{'£'.$siteSettings[50]->value}} One way</p>
                    <div class="price-list-bottom">
                        <p class="center ls">Book online or by phone</p>
                        <p class="center ls">24 hours drop off service</p>
                        <p class="center ls">Meet & Greet available</p>

                    </div>
                    <div class="center btn-top-1">
                        <a href="#book">
                            <div class="btn-1">book now</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================= BEST PRICING PACKAGES END =============================================-->


<!--================================= OUR BEST TARIFF PLANS START =============================================-->
<section class="container-fluid section-space section-bg-1">
    <div class="container">
        <h2 class="center h2-bottom" style="margin-bottom: 0 !important;">our best tariffs</h2>
        <p style="text-align:center; padding-top: 0; padding-bottom: 20px;"><i style=" ">starts from</i></p>
        <div class="row">
            <div class="col-md-8 column-center">
                <!--=============== ROW-1 ==================-->
                <div class="distab plans-radius plans-bg-2">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">{{$siteSettings[31]->value}}</a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">{{'£'.$siteSettings[38]->value}}</p>
                </div>

                <!--=============== ROW-2 ==================-->
                <div class="distab plans-bg-1">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">{{$siteSettings[32]->value}}</a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">{{'£'.$siteSettings[39]->value}}</p>
                </div>

                <!--=============== ROW-3 ==================-->
                <div class="distab plans-bg-2">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">{{$siteSettings[33]->value}}</a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">{{'£'.$siteSettings[40]->value}}</p>
                </div>
                <!--=============== ROW-3.1 ==================-->
                <div class="distab plans-bg-1">
                    <h4 class=" center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">{{$siteSettings[34]->value}}</a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">{{'£'.$siteSettings[41]->value}}</p>
                </div>

                <!--=============== ROW-3.2 ==================-->
                <div class="distab plans-bg-2">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">{{$siteSettings[35]->value}}</a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">{{'£'.$siteSettings[42]->value}}</p>
                </div>

                <!--=============== ROW-4 ==================-->
                <div class="distab plans-bg-1">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">{{$siteSettings[36]->value}}</a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">{{'£'.$siteSettings[43]->value}}</p>
                </div>

                <!--=============== ROW-5 ==================-->
                <div class="distab plans-bg-2 plans-radius-1">
                    <h4 class="center plans-fs distab-cell-middle plans-br plans-pad"><a href="#">{{$siteSettings[37]->value}}</a>
                    </h4>

                    <p class="center plans-fs plans-price-fs ls distab-cell-middle plans-pad">{{'£'.$siteSettings[44]->value}}</p>
                </div>

                <p style="text-align:center; padding-top: 0; padding-bottom: 20px;"><i style=" ">All rates from CB1</i></p>
            </div>

        </div>
    </div>
</section>
<!--================================= OUR BEST TARIFF PLANS END =============================================-->


<!--================================= FOOTER START =============================================-->
@include('2Frontend.Associate.footer')
<!--================================= FOOTER END =============================================-->


<!-- JQUERY LIBRARY -->
{{--<script type="text/javascript" src="js/vendor/jquery.min.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/jquery.min.js")}}" ></script>
<!-- BOOTSTRAP -->
{{--<script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/bootstrap.min.js")}}" ></script>

<!-- SUBSCRIBE MAILCHIMP -->
{{--<script type="text/javascript" src="js/vendor/subscribe/subscribe_validate.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/subscribe/subscribe_validate.js")}}" ></script>

<!-- VALIDATION  -->
{{--<script type="text/javascript" src="js/vendor/validate/jquery.validate.min.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/validate/jquery.validate.min.js")}}" ></script>

<!-- COUNTER JS FILES -->
{{--<script type="text/javascript" src="js/vendor/counter/counter-lib.js"></script>--}}
{{--<script type="text/javascript" src="js/vendor/counter/jquery.counterup.min.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/counter/counter-lib.js")}}" ></script>
<script src="{{asset("js/2Frontend/vendor/counter/jquery.counterup.min.js")}}" ></script>

<!-- SLIDER JS FILES -->
{{--<script type="text/javascript" src="js/vendor/slider/owl.carousel.min.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/slider/owl.carousel.min.js")}}" ></script>
{{--<script type="text/javascript" src="js/vendor/slider/carousel.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/slider/carousel.js")}}" ></script>

<!-- SUBSCRIBE MAILCHIMP -->
{{--<script type="text/javascript" src="js/vendor/subscribe/subscribe_validate.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/subscribe/subscribe_validate.js")}}" ></script>

<!-- VIDEO -->
{{--<script type="text/javascript" src="js/vendor/video/video.js"></script>--}}
<script src="{{asset("js/2Frontend/vendor/video/video.js")}}" ></script>


<!-- THEME JS -->
{{--<script type="text/javascript" src="js/custom/custom.js"></script>--}}
<script src="{{asset("js/2Frontend/custom/custom.js")}}" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="{{asset("js/2Frontend/moment.min.js")}}"></script>
<script src="{{asset("js/2Frontend/daterangepicker.js")}}"></script>

@yield('js')

</body>


</html>

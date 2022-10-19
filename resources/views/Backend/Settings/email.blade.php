@extends('theme.base')
@section('head-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/regular.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/fontawesome.css")}}>
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link href={{asset("css/theme/scrollspyNav.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/animate/animate.css")}} rel="stylesheet" type="text/css" />
    <script src={{asset("css/theme/plugins/sweetalerts/promise-polyfill.js")}}></script>
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/tabs-accordian/custom-tabs.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/forms/switches.css" )}} rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href={{asset("css/theme/plugins/editors/markdown/simplemde.min.css" )}}>
    <style>
        .create-button{
            position: relative;
            width: fit-content;
        }
        .button-holder{
            padding-top: 1.5%;
            padding-bottom: 30px;
            margin-bottom: 2px;

        }
        .create-button-btn{
            position: absolute;
            right: 0% !important;
        }
        .custom-bipon.active{
            box-shadow: 0px 5px 15px 0px rgb(0 0 0 / 30%) !important;
            background-color: #009688!important;
            border-color: transparent!important;
            border-radius: 0.625rem !important;
            /* background-color: #ffffff; */
            /* border: solid 1px #e4e2e2; */
            /* padding: 11px 23px; */
            text-align: center!important;
            width: 100px!important;
            padding: 20px!important;
        }
        .custom-bipon{
            border-radius: 0.625rem !important;
            background-color: #ffffff!important;
            border: solid 1px #e4e2e2!important;
            text-align: center!important;
            width: 100px!important;
            padding: 20px!important;
        }
    </style>

@endsection

@section('main-content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            @if(Session::has('message'))
                <div class="alert alert-gradient mb-4" role="alert">
                    <button  type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>{{ Session::get('message') }}</strong>
                </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">


                    <div class="col 12 button-holder" style="display: flex">
                        <div class="col-8">
                            <h3>Email Settings</h3>
                        </div>
                        <div class="create-button col-4">
{{--                            <a href="{{route('cars.create')}}" class="create-button-btn btn btn-success mb-6 mr-4 btn-lg"> Create</a>--}}
                        </div>
                    </div>
                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('setting.update.email')}}">
                        @csrf
                    <div class="row mb-4 mt-3">
                        <div class="col-sm-4 col-12">
                            <div class=" nav flex-column nav-pills mb-sm-0 mb-3" id="rounded-vertical-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="custom-bipon nav-link mb-2 active mx-auto" id="rounded-vertical-pills-home-tab" data-toggle="pill" href="#rounded-vertical-pills-home" role="tab" aria-controls="rounded-vertical-pills-home" aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    Host</a>
                                <a class="custom-bipon nav-link mb-2 mx-auto" id="rounded-vertical-pills-profile-tab" data-toggle="pill" href="#rounded-vertical-pills-profile" role="tab" aria-controls="rounded-vertical-pills-profile" aria-selected="false">
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
                                     Preference</a>
{{--                                <a class="custom-bipon nav-link mb-2 mx-auto" id="rounded-vertical-pills-messages-tab" data-toggle="pill" href="#rounded-vertical-pills-messages" role="tab" aria-controls="rounded-vertical-pills-messages" aria-selected="false">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>--}}
{{--                                    Messages</a>--}}
{{--                                <a class="custom-bipon nav-link mb-2 mx-auto" id="rounded-vertical-pills-terms-tab" data-toggle="pill" href="#rounded-vertical-pills-terms" role="tab" aria-controls="rounded-vertical-pills-terms" aria-selected="false">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>--}}
{{--                                    Terms</a>--}}
                            </div>
                        </div>

                        <div class="col-sm-8 col-12">
                            <div class="tab-content" id="rounded-vertical-pills-tabContent">
                                    <div class="tab-pane fade show active" id="rounded-vertical-pills-home" role="tabpanel" aria-labelledby="rounded-vertical-pills-home-tab">
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="mail_host">Email Host</label>
                                            <input type="text" id="mail_host" name="mail_host" placeholder="Email Host" value="{{($useSettings['mail_host'][0] != Null) ? $useSettings['mail_host'][0] :''}}"  class="form-control" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="mail_username">Email Username</label>
                                            <input type="text" id="mail_username" name="mail_username" placeholder="Username" value="{{($useSettings['mail_username'][0] != Null) ? $useSettings['mail_username'][0] :''}}"  class="form-control" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="mail_password">Password</label>
                                            <input type="text" id="mail_password" name="mail_password" placeholder="Email Password" value="{{($useSettings['mail_password'][0] != Null) ? $useSettings['mail_password'][0] :''}}"  class="form-control" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="mail_from_name">Name</label>
                                            <input type="text" id="mail_from_name" name="mail_from_name" placeholder="Email From Name" value="{{($useSettings['mail_from_name'][0] != Null) ? $useSettings['mail_from_name'][0] :''}}"  class="form-control" >
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="rounded-vertical-pills-profile" role="tabpanel" aria-labelledby="rounded-vertical-pills-profile-tab">
                                        <div class="form-group mb-4" style="display: flex">
                                            <div class="col-md-3" >
                                                <label class="control-label" for="s_email_customer_booking">Customer Booking</label><br>
                                                <label class="switch s-icons s-outline s-outline-success mr-2">
                                                    @if($useSettings['email_customer_booking'][0] == 1)
                                                        <input id="s_email_customer_booking" name="s_email_customer_booking" type="checkbox" value="1" checked>
                                                    @else
                                                        <input id="s_email_customer_booking" name="s_email_customer_booking" type="checkbox" value="0">
                                                    @endif
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <input type="hidden" id="email_customer_booking" name="email_customer_booking" value="{{$useSettings['email_customer_booking'][0]}}">
                                            <input type="hidden" id="email_customer_payment" name="email_customer_payment" value="{{$useSettings['email_customer_payment'][0]}}">
                                            <input type="hidden" id="email_customer_driver" name="email_customer_driver" value="{{$useSettings['email_customer_driver'][0]}}">
                                            <input type="hidden" id="email_customer_trip_end" name="email_customer_trip_end" value="{{$useSettings['email_customer_trip_end'][0]}}">
                                            <div class="col-md-3">
                                                <label class="control-label" for="s_email_customer_payment">Customer Payment</label> <br>
                                                <label class="switch s-icons s-outline s-outline-success mr-2">
                                                    @if($useSettings['email_customer_payment'][0] == 1)
                                                        <input id="s_email_customer_payment" name="s_email_customer_payment" type="checkbox" value="1" checked>
                                                    @else
                                                        <input id="s_email_customer_payment" name="s_email_customer_payment" type="checkbox" value="0">
                                                    @endif

                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label" for="s_email_customer_driver">Customer Driver</label><br>
                                                <label class="switch s-icons s-outline s-outline-success mr-2">
                                                    @if($useSettings['email_customer_driver'][0] == 1)
                                                        <input id="s_email_customer_driver" name="s_email_customer_driver" type="checkbox" value="1" checked>
                                                    @else
                                                        <input id="s_email_customer_driver" name="s_email_customer_driver" type="checkbox" value="0">
                                                    @endif

                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label" for="s_email_customer_trip_end">Trip End to Customer</label><br>
                                                <label class="switch s-icons s-outline s-outline-success mr-2">
                                                    @if($useSettings['email_customer_trip_end'][0] == 1)
                                                        <input id="s_email_customer_trip_end" name="s_email_customer_trip_end" type="checkbox" value="1" checked>
                                                    @else
                                                        <input id="s_email_customer_trip_end" name="s_email_customer_trip_end" type="checkbox" value="0">
                                                    @endif

                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4" style="display: flex">
                                            <div class="col-md-3" >
                                                <label class="control-label" for="s_email_customer_booking_end">Customer Booking End</label><br>
                                                <label class="switch s-icons s-outline s-outline-success mr-2">
                                                    @if($useSettings['email_customer_booking_end'][0] == 1)
                                                        <input id="s_email_customer_booking_end" name="s_email_customer_booking_end" type="checkbox" value="1" checked>
                                                    @else
                                                        <input id="s_email_customer_booking_end" name="s_email_customer_booking_end" type="checkbox" value="0">
                                                    @endif
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <input type="hidden" id="email_customer_booking_end" name="email_customer_booking_end" value="{{$useSettings['email_customer_booking_end'][0]}}">
                                            <input type="hidden" id="email_customer_update" name="email_customer_update" value="{{$useSettings['email_customer_update'][0]}}">
                                            <input type="hidden" id="email_driver_trip" name="email_driver_trip" value="{{$useSettings['email_driver_trip'][0]}}">
                                            <input type="hidden" id="email_driver_bill" name="email_driver_bill" value="{{$useSettings['email_driver_bill'][0]}}">
                                            <div class="col-md-3">
                                                <label class="control-label" for="s_email_customer_update">Customer Update</label> <br>
                                                <label class="switch s-icons s-outline s-outline-success mr-2">
                                                    @if($useSettings['email_customer_update'][0] == 1)
                                                        <input id="s_email_customer_update" name="s_email_customer_update" type="checkbox" value="1" checked>
                                                    @else
                                                        <input id="s_email_customer_update" name="s_email_customer_update" type="checkbox" value="0">
                                                    @endif

                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label" for="s_email_driver_trip">Driver Trip </label><br>
                                                <label class="switch s-icons s-outline s-outline-success mr-2">
                                                    @if($useSettings['email_driver_trip'][0] == 1)
                                                        <input id="s_email_driver_trip" name="s_email_driver_trip" type="checkbox" value="1" checked>
                                                    @else
                                                        <input id="s_email_driver_trip" name="s_email_driver_trip" type="checkbox" value="0">
                                                    @endif

                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label" for="s_email_driver_bill">Trip End to Customer</label><br>
                                                <label class="switch s-icons s-outline s-outline-success mr-2">
                                                    @if($useSettings['email_driver_bill'][0] == 1)
                                                        <input id="s_email_driver_bill" name="s_email_driver_bill" type="checkbox" value="1" checked>
                                                    @else
                                                        <input id="s_email_driver_bill" name="s_email_driver_bill" type="checkbox" value="0">
                                                    @endif

                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                        <div style="padding-left: 40%">
                            <a href="{{url()->previous()}}" class="btn btn-danger ml-3 mt-3">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success ml-3 mt-3">Submit</button>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('js-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src= {{ asset("js/theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js") }}></script>
    <script src= {{ asset("js/theme/plugins/editors/markdown/simplemde.min.js") }}></script>
    <script src= {{ asset("js/theme/plugins/editors/markdown/custom-markdown.js") }}></script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src={{asset("js/theme/js/scrollspyNav.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/sweetalert2.min.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/custom-sweetalert.js")}}></script>
    <script src={{asset("js/theme/plugins/highlight/highlight.pack.js")}}></script>
    <!-- END THEME GLOBAL STYLE -->
    <script>
        $(document).on("click", "#s_email_customer_trip_end", function(){
            if(document.getElementById('s_email_customer_trip_end').value === '1')
            {
                document.getElementById('s_email_customer_trip_end').value = '0';
                document.getElementById('email_customer_trip_end').value= '0';
            }
            else {
                document.getElementById('s_email_customer_trip_end').value = '1';
                document.getElementById('email_customer_trip_end').value='1';
            }

        });
        $(document).on("click", "#s_email_customer_driver", function(){
            if(document.getElementById('s_email_customer_driver').value === '1')
            {
                document.getElementById('s_email_customer_driver').value = '0';
                document.getElementById('email_customer_driver').value= '0';
            }
            else {
                document.getElementById('s_email_customer_driver').value = '1';
                document.getElementById('email_customer_driver').value='1';
            }

        });
        $(document).on("click", "#s_email_customer_payment", function(){
            if(document.getElementById('s_email_customer_payment').value === '1')
            {
                document.getElementById('s_email_customer_payment').value = '0';
                document.getElementById('email_customer_payment').value= '0';
            }
            else {
                document.getElementById('s_email_customer_payment').value = '1';
                document.getElementById('email_customer_payment').value='1';
            }

        });
        $(document).on("click", "#s_email_customer_booking", function(){
            if(document.getElementById('s_email_customer_booking').value === '1')
            {
                document.getElementById('s_email_customer_booking').value = '0';
                document.getElementById('email_customer_booking').value= '0';
            }
            else {
                document.getElementById('s_email_customer_booking').value = '1';
                document.getElementById('email_customer_booking').value='1';
            }

        });
    </script>
    <script>
        $(document).on("click", "#s_email_customer_update", function(){
            if(document.getElementById('s_email_customer_update').value === '1')
            {
                document.getElementById('s_email_customer_update').value = '0';
                document.getElementById('email_customer_update').value= '0';
            }
            else {
                document.getElementById('s_email_customer_update').value = '1';
                document.getElementById('email_customer_update').value='1';
            }

        });
        $(document).on("click", "#s_email_customer_booking_end", function(){
            if(document.getElementById('s_email_customer_booking_end').value === '1')
            {
                document.getElementById('s_email_customer_booking_end').value = '0';
                document.getElementById('email_customer_booking_end').value= '0';
            }
            else {
                document.getElementById('s_email_customer_booking_end').value = '1';
                document.getElementById('email_customer_booking_end').value='1';
            }

        });
        $(document).on("click", "#s_email_driver_trip", function(){
            if(document.getElementById('s_email_driver_trip').value === '1')
            {
                document.getElementById('s_email_driver_trip').value = '0';
                document.getElementById('email_driver_trip').value= '0';
            }
            else {
                document.getElementById('s_email_driver_trip').value = '1';
                document.getElementById('email_driver_trip').value='1';
            }

        });
        $(document).on("click", "#s_email_driver_bill", function(){
            if(document.getElementById('s_email_driver_bill').value === '1')
            {
                document.getElementById('s_email_driver_bill').value = '0';
                document.getElementById('email_driver_bill').value= '0';
            }
            else {
                document.getElementById('s_email_driver_bill').value = '1';
                document.getElementById('email_driver_bill').value='1';
            }

        });
    </script>
@endsection



@extends('theme.base')
@section('head-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/datatables.css")}}>--}}
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/custom_dt_html5.css")}}>--}}
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/dt-global_style.css")}}>--}}
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/regular.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/fontawesome.css")}}>
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link href={{asset("css/theme/scrollspyNav.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/animate/animate.css")}} rel="stylesheet" type="text/css" />
    <script src={{asset("css/theme/plugins/sweetalerts/promise-polyfill.js")}}></script>
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/forms/switches.css" )}} rel="stylesheet" type="text/css" />
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
        @media (min-width: 900px){
            .bipon-form{
                margin-left: 25%;
            }
        }
    </style>

@endsection

@section('main-content')
    <div class="layout-px-spacing">
        @if(Session::has('message'))
            <div class="alert alert-gradient mb-4" role="alert">
                <button  type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  data-dismiss="alert" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif
        <div class="row layout-top-spacing">
            <div class="col-xl-6 col-lg-12 col-sm-12  layout-spacing bipon-form">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h2><small>create</small> Driver </h2>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('driver.store') }}">
                            @csrf
                            <div class="form-row mb-4">
                                <label class="control-label" for="first_name">First Name <span class="required">*</span>
                                </label>
                                <input id="first_name" class="form-control" data-validate-length-range="6" data-validate-words="2" name="first_name" placeholder="Enter Forename" required="required" type="text">
                            </div>

                            <div class="form-row mb-4">
                                <label class="control-label"  for="last_name">Last Name <span class="required">*</span>
                                </label>
                                <input id="last_name" class="form-control" data-validate-length-range="6" data-validate-words="2" name="last_name" placeholder="Enter Surname" required="required" type="text">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label"  for="email">Email <span class="required">*</span>
                                </label>
                                <input type="email" id="email" name="email" placeholder="Email Address" required="required" class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label"  for="phone">Phone <span class="required">*</span>
                                </label>
                                <input type="text" id="phone" name="phone_number" placeholder="Enter Driver's Phone Number" required="required"  class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label"  for="private_hire_license">Private Hire License Number <span class="required">*</span>
                                </label>
                                <input type="text" id="private_hire_license" name="private_hire_license" placeholder="Enter Private Hire License Number" required="required"  class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label"  for="vehicle_reg">Vehicle Reg <span class="required">*</span>
                                </label>
                                <input type="text" id="vehicle_reg" name="vehicle_reg" placeholder="Enter VRM Number" required="required"  class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label"  for="vehicle_make">Vehicle Make <span class="required">*</span>
                                </label>
                                <input type="text" id="vehicle_make" name="vehicle_make" placeholder="Enter Vehicle Make Number" required="required"  class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label"  for="vehicle_license">Vehicle license Number <span class="required">*</span>
                                </label>
                                <input type="text" id="vehicle_license" name="vehicle_license" placeholder="Enter Vehicle License Number" required="required"  class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label"  for="commission">Commission(%) <span class="required">*</span>
                                </label>
                                <input type="text" id="commission" name="commission" placeholder="Enter Driver's Commission" required="required"  class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="{{url()->previous()}}" class="btn btn-danger ml-3 mt-3">Cancel</a>
                                    <button id="send" type="submit" class="btn btn-success ml-3 mt-3">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src= {{ asset("js/theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js") }}></script>
    <script src={{ asset("js/theme/plugins/table/datatable/datatables.js") }}></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js")}}></script>
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/jszip.min.js")}}></script>
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/buttons.html5.min.js")}}></script>
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/buttons.print.min.js")}}></script>

    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src={{asset("js/theme/js/scrollspyNav.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/sweetalert2.min.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/custom-sweetalert.js")}}></script>
    <!-- END THEME GLOBAL STYLE -->
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
@endsection

@extends('theme.base')
@section('head-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/datatables.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/custom_dt_html5.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/dt-global_style.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/regular.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/fontawesome.css")}}>
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link href={{asset("css/theme/scrollspyNav.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/animate/animate.css")}} rel="stylesheet" type="text/css" />
    <script src={{asset("css/theme/plugins/sweetalerts/promise-polyfill.js")}}></script>
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/apex/apexcharts.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/dashboard/dash_1.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/dashboard/dash_2.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/flatpickr/custom-flatpickr.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/flatpickr/flatpickr.css" )}} rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            @if(Session::has('message'))
                <div class="alert alert-gradient mb-4" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>{{ Session::get('message') }}</strong>
                </div>
            @endif

            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="widget widget-activity-four">

                    <div class="widget-content">
                        <div class="widget-heading">
                            <h5 class="">Driver Report</h5>
                        </div>

                        <form method="GET" action="{{route('trip.driverReport.days')}}">
                            <div class="form-group mb-4">
                                <label class="control-label" for="from_date_driver">To Date<span class="required">*</span></label>
                                <input type="text" id="from_date_driver" name="from_date_driver" value="" placeholder="From" required="required" class="form-control" >

                            </div>

                            <div class="form-group mb-4">
                                <label class="control-label" for="to_date_driver">From Date <span class="required">*</span></label>
                                <input type="text" id="to_date_driver" name="to_date_driver" value="" placeholder="To" required="required" class="form-control" >

                            </div>

                            <div class="col-sm-3">
                                <button id="send" type="submit" class="btn btn-success ml-3 mt-3">Create</button>
                            </div>
                        </form>

                        {{--                        <div class="tm-action-btn">--}}
                        {{--                            <button class="btn"><span>View All</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></button>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="widget widget-activity-four">



                        <div class="widget-content">
                            <div class="widget-heading">
                                <h5 class="">Vehicle Report</h5>
                            </div>

                            <form method="GET" action="{{route('trip.vehicleReport.days')}}">
                                    <div class="form-group mb-4">
                                        <label class="control-label" for="from_date_vehicle">To Date<span class="required">*</span></label>
                                        <input type="text" id="from_date_vehicle" name="from_date_vehicle" value="" placeholder="From" required="required" class="form-control" >

                                    </div>

                                <div class="form-group mb-4">
                                    <label class="control-label" for="to_date_vehicle">From Date <span class="required">*</span></label>
                                    <input type="text" id="to_date_vehicle" name="to_date_vehicle" value="" placeholder="To" required="required" class="form-control" >

                                </div>

                                <div class="col-sm-3">
                                    <button id="send" type="submit" class="btn btn-success ml-3 mt-3">Create</button>
                                </div>
                            </form>

                            {{--                        <div class="tm-action-btn">--}}
                            {{--                            <button class="btn"><span>View All</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></button>--}}
                            {{--                        </div>--}}
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
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src={{asset("js/theme/plugins/apex/apexcharts.min.js")}}></script>
    <script src={{asset("js/theme/js/dashboard/dash_1.js")}}></script>
    <script src={{asset("js/theme/js/dashboard/dash_2.js")}}></script>
    <script src={{asset("js/theme/plugins/flatpickr/flatpickr.js")}}></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script>
        var f1 = flatpickr(document.getElementById('from_date_vehicle'), {
            dateFormat: "Y-m-d"
        });
        var f2 = flatpickr(document.getElementById('to_date_vehicle'), {
            dateFormat: "Y-m-d"
        });
        var f3 = flatpickr(document.getElementById('from_date_driver'), {
            dateFormat: "Y-m-d"
        });
        var f4 = flatpickr(document.getElementById('to_date_driver'), {
            dateFormat: "Y-m-d"
        });

    </script>
@endsection



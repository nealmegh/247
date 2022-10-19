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
    </style>

@endsection

@section('main-content')
    @if(Session::has('message'))
        <div class="alert alert-gradient mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
<div class="container">
    <div class="container">
            <div class="row layout-top-spacing">
                <div id="flActionButtons" class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h2><small>create</small> Car Type </h2>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form class="" method="post" action="{{route('cars.store')}}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="control-label">Name:</label>
                                    <input id="name" name="name" placeholder="Car Type" required="required" type="text" class="form-control" >
                                </div>
                                <div class="form-group mb-4">
                                    <label class="control-label">Number of Passengers <span class="required">*</span></label>
                                    <input type="number" id="size" name="size" placeholder="Maximum number of Passengers can Travel" data-validate-minmax="1,20" required="required" class="form-control" >

                                </div>
                                <div class="form-group mb-4">
                                    <label class="control-label" for="luggage">Number of Luggage<span class="required">*</span></label>
                                    <input type="number" id="luggage" name="luggage" placeholder="Maximum number of Luggage" required="required" class="form-control" >
                                </div>
                                <div class="form-group mb-4">
                                    <label class="control-label" for="fair">Fair plus<span class="required">*</span></label>
                                    <input type="number" id="fair" name="fair" placeholder="Fair to be Added" required="required" class="form-control" >
                                </div>
                                <div class="form-group mb-4">
                                    <label class="control-label" for="status">Active<span class="required">*</span></label> <br>
                                    <label class="switch s-icons s-outline s-outline-success mr-2">
                                        <input id="status" name="status" type="checkbox" value="1" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="control-label" for="description">Description <span class="required">*</span> </label>
                                    <textarea id="description" required="required" name="description" class="form-control"></textarea>
                                </div>

                                <a href="{{url()->previous()}}" class="btn btn-danger ml-3 mt-3">Cancel</a>
                                <button id="send" type="submit" class="btn btn-success ml-3 mt-3">Submit</button>
                            </form>
                        </div>
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
    <script>
        $(document).on("click", "#status", function(){
            if(document.getElementById('status').value === '1')
            {
                document.getElementById('status').value= '0';
            }
            else {
                document.getElementById('status').value='1';
            }

        });
    </script>

@endsection

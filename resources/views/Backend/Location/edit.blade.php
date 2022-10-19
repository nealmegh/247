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
                                <h2><small>edit</small> Locations </h2>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form class="form-horizontal form-label-left" novalidate method="POST" action="{{route('location.update', $location->id )}}">
                            @csrf
                            <div class="form-row mb-4">
                                <label class="control-label" for="name">Name <span class="required">*</span>
                                </label>
                                <input id="name" class="form-control" value="{{$location->name}}" name="name" placeholder="Name of the location" required="required" type="text">

                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label" for="display_name">Display Name <span class="required">*</span>
                                </label>
                                <input type="text" id="display_name" value="{{$location->display_name}}" name="display_name" placeholder="Display Name of the location" required="required" class="form-control">

                            </div>
                            @foreach($location->airports as $airport)
                                <div class="form-row mb-4">
                                    <div class="form-row col-12">
                                        <label class="control-label" for="{{'price'.$airport->id}}">{{$airport->display_name}} <span class="required">*</span>
                                        </label>
                                    </div>
                                    <div class="form-row">
                                        <input id="{{'price'.$airport->id}}" class="form-control col-md-5 mr-1" value="{{$airport->pivot->price}}"  name="{{'price'.$airport->id}}" placeholder="Price" required="required" type="text">
                                        <input id="{{'return_price'.$airport->id}}" class="form-control col-md-5 ml-1" value="{{$airport->pivot->return_price}}"  name="{{'return_price'.$airport->id}}" placeholder="Return Price" required="required" type="text">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($location->airports as $airport)
                                <div class="form-row mb-4">
                                    <div class="form-row col-12">
                                        <label class="control-label" for="{{'price'.$airport->id}}">{{$airport->display_name}} <span class="required">*</span>
                                        </label>
                                    </div>
                                    <div class="form-row">
                                        <input id="{{'price'.$airport->id}}" class="form-control col-md-5 mr-1" value="{{$airport->pivot->price}}"  name="{{'price'.$airport->id}}" placeholder="Price" required="required" type="text">
                                        <input id="{{'return_price'.$airport->id}}" class="form-control col-md-5 ml-1" value="{{$airport->pivot->return_price}}"  name="{{'return_price'.$airport->id}}" placeholder="Return Price" required="required" type="text">
                                    </div>
                                </div>
                            @endforeach
                            @foreach($airports as $airport)
                                @if(!$location->airports->contains($airport))
                                    <div class="form-row mb-4">
                                        <div class="form-row col-12">
                                            <label class="control-label" for="{{'price'.$airport->id}}">{{$airport->display_name}} <span class="required">*</span>
                                            </label>
                                        </div>
                                        <div class="form-row">
                                            <input id="{{'price'.$airport->id}}" class="form-control col-md-5 mr-1" value="0"  name="{{'price'.$airport->id}}" placeholder="Price" required="required" type="text">
                                            <input id="{{'return_price'.$airport->id}}" class="form-control col-md-5 ml-1" value="0"  name="{{'return_price'.$airport->id}}" placeholder="Return Price" required="required" type="text">
                                        </div>
                                    </div>
                                @endif
                            @endforeach


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

{{--<form class="form-horizontal form-label-left" novalidate method="post" action="{{route('location.update', $location->id )}}">--}}

{{--    @csrf--}}

{{--    <div class="item form-group">--}}
{{--        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>--}}
{{--        </label>--}}
{{--        <div class="col-md-6 col-sm-6 col-xs-12">--}}
{{--            <input value="{{$location->name}}" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Name of the Airport" required="required" type="text">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="item form-group">--}}
{{--        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="display_name">Display Name <span class="required">*</span>--}}
{{--        </label>--}}
{{--        <div class="col-md-6 col-sm-6 col-xs-12">--}}
{{--            <input value="{{$location->display_name}}" type="text" id="display_name" name="display_name" placeholder="Display Name of the Airport" required="required" class="form-control col-md-7 col-xs-12">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="ln_solid"></div>--}}
{{--    @foreach($location->airports as $airport)--}}
{{--        <div class="item form-group">--}}
{{--            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="{{'price'.$airport->id}}">{{$airport->name}} <span class="required">*</span>--}}
{{--            </label>--}}
{{--            <div class="col-md-3 col-sm-6 col-xs-12">--}}
{{--                <input value="{{$airport->pivot->price}}" id="{{'price'.$airport->id}}" class="form-control col-md-7 col-xs-12" name="{{'price'.$airport->id}}" placeholder="Price" required="required" type="number">--}}
{{--            </div>--}}
{{--            <div class="col-md-3 col-sm-6 col-xs-12">--}}
{{--                <input value="{{$airport->pivot->return_price}}" id="{{'return_price'.$airport->id}}" class="form-control col-md-7 col-xs-12" name="{{'return_price'.$airport->id}}" placeholder="Return Price" required="required" type="number">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--    @foreach($airports as $airport)--}}
{{--        @if(!$location->airports->contains($airport))--}}
{{--            <div class="item form-group">--}}
{{--                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="{{'price'.$airport->id}}">{{$airport->name}} <span class="required">*</span>--}}
{{--                </label>--}}
{{--                <div class="col-md-6 col-sm-6 col-xs-12">--}}
{{--                    <input value="0" id="{{'price'.$airport->id}}" class="form-control col-md-7 col-xs-12" name="{{'price'.$airport->id}}" placeholder="Price" required="required" type="number">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    @endforeach--}}
{{--    <div class="ln_solid"></div>--}}
{{--    <div class="form-group">--}}
{{--        <div class="col-md-6 col-md-offset-3">--}}
{{--            <button type="submit" class="btn btn-primary">Cancel</button>--}}
{{--            <button id="send" type="submit" class="btn btn-success">Submit</button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</form>--}}
{{----}}

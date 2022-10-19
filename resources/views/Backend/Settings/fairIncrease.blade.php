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
                            <h3>Raise Fair</h3>
                        </div>
                        <div class="create-button col-4">
                            {{--                            <a href="{{route('cars.create')}}" class="create-button-btn btn btn-success mb-6 mr-4 btn-lg"> Create</a>--}}
                        </div>
                    </div>
                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('setting.fair')}}">
                        @csrf
                        <div class="row mb-4 mt-3">
                            <div class="col-sm-4 col-12">
                                <div class=" nav flex-column nav-pills mb-sm-0 mb-3" id="rounded-vertical-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="custom-bipon nav-link mb-2 active mx-auto" id="rounded-vertical-pills-home-tab" data-toggle="pill" href="#rounded-vertical-pills-home" role="tab" aria-controls="rounded-vertical-pills-home" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                         <br>Fair</a>
{{--                                    <a class="custom-bipon nav-link mb-2 mx-auto" id="rounded-vertical-pills-profile-tab" data-toggle="pill" href="#rounded-vertical-pills-profile" role="tab" aria-controls="rounded-vertical-pills-profile" aria-selected="false">--}}
{{--                                        --}}{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>--}}
{{--                                        <br>Dest.</a>--}}
{{--                                    --}}{{--                                <a class="custom-bipon nav-link mb-2 mx-auto" id="rounded-vertical-pills-messages-tab" data-toggle="pill" href="#rounded-vertical-pills-messages" role="tab" aria-controls="rounded-vertical-pills-messages" aria-selected="false">--}}
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
                                        <div class="form-row col-md-6 mb-4">
                                            <label for="increase_type" class="">Increase Fair By</label>
                                                <select class="form-control" id="increase_type" name="increase_type">
                                                    <option value=0>Percentage</option>
                                                    <option value=1 selected>Value</option>
                                                </select>

                                        </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label" for="name">Increase All Fair BY<span class="required">*</span>
                                                </label>
                                                <input value="" id="name" class="form-control" data-validate-length-range="6" data-validate-words="2" name="fairRaise" placeholder="" required="required" type="number">
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
@endsection



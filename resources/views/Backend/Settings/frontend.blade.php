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
                            <h3>FrontEnd Settings</h3>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    Tariffs</a>
                                <a class="custom-bipon nav-link mb-2 mx-auto" id="rounded-vertical-pills-profile-tab" data-toggle="pill" href="#rounded-vertical-pills-profile" role="tab" aria-controls="rounded-vertical-pills-profile" aria-selected="false">
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    <br>Dest.</a>
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
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="place1">Place</label>
                                                <input type="text" class="form-control" id="place1" name="destination_name_1" placeholder="Place" value="{{($useSettings['destination_name_1'][0] != Null) ? $useSettings['destination_name_1'][0] :''}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="price1">Price</label>
                                                <input type="text" class="form-control" id="price1" name="destination_price_1" placeholder="Price" value="{{($useSettings['destination_price_1'][0] != Null) ? $useSettings['destination_price_1'][0] :''}}">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="place2">Place</label>
                                                <input type="text" class="form-control" id="place2" name="destination_name_2" placeholder="Place" value="{{($useSettings['destination_name_2'][0] != Null) ? $useSettings['destination_name_2'][0] :''}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="price2">Price</label>
                                                <input type="text" class="form-control" id="price2" name="destination_price_2" placeholder="Price" value="{{($useSettings['destination_price_2'][0] != Null) ? $useSettings['destination_price_2'][0] :''}}">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="place3">Place</label>
                                                <input type="text" class="form-control" id="place3" name="destination_name_3" placeholder="Place" value="{{($useSettings['destination_name_3'][0] != Null) ? $useSettings['destination_name_3'][0] :''}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="price3">Price</label>
                                                <input type="text" class="form-control" id="price3" name="destination_price_3" placeholder="Price" value="{{($useSettings['destination_price_3'][0] != Null) ? $useSettings['destination_price_3'][0] :''}}">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="place4">Place</label>
                                                <input type="text" class="form-control" id="place4" name="destination_name_4" placeholder="Place" value="{{($useSettings['destination_name_4'][0] != Null) ? $useSettings['destination_name_4'][0] :''}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="price1">Price</label>
                                                <input type="text" class="form-control" id="price4" name="destination_price_4" placeholder="Price" value="{{($useSettings['destination_price_4'][0] != Null) ? $useSettings['destination_price_4'][0] :''}}">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="place5">Place</label>
                                                <input type="text" class="form-control" id="place5" name="destination_name_5" placeholder="Place" value="{{($useSettings['destination_name_5'][0] != Null) ? $useSettings['destination_name_5'][0] :''}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="price5">Price</label>
                                                <input type="text" class="form-control" id="price5" name="destination_price_5" placeholder="Price" value="{{($useSettings['destination_price_5'][0] != Null) ? $useSettings['destination_price_5'][0] :''}}">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="place6">Place</label>
                                                <input type="text" class="form-control" id="place6" name="destination_name_6" placeholder="Place" value="{{($useSettings['destination_name_6'][0] != Null) ? $useSettings['destination_name_6'][0] :''}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="price6">Price</label>
                                                <input type="text" class="form-control" id="price6" name="destination_price_6" placeholder="Price" value="{{($useSettings['destination_price_6'][0] != Null) ? $useSettings['destination_price_6'][0] :''}}">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="place7">Place</label>
                                                <input type="text" class="form-control" id="place7" name="destination_name_7" placeholder="Place" value="{{($useSettings['destination_name_7'][0] != Null) ? $useSettings['destination_name_7'][0] :''}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="price7">Price</label>
                                                <input type="text" class="form-control" id="price7" name="destination_price_7" placeholder="Price" value="{{($useSettings['destination_price_7'][0] != Null) ? $useSettings['destination_price_7'][0] :''}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="rounded-vertical-pills-profile" role="tabpanel" aria-labelledby="rounded-vertical-pills-profile-tab">
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="t_place1">Place</label>
                                                <input type="text" class="form-control" id="t_place1" name="top_destination_name_1" placeholder="Place" value="{{($useSettings['top_destination_name_1'][0] != Null) ? $useSettings['top_destination_name_1'][0] :''}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="t_price1">Price</label>
                                                <input type="text" class="form-control" id="t_price1" name="top_destination_price_1" placeholder="Price" value="{{($useSettings['top_destination_price_1'][0] != Null) ? $useSettings['top_destination_price_1'][0] :''}}">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="t_place2">Place</label>
                                                <input type="text" class="form-control" id="t_place2" name="top_destination_name_2" placeholder="Place" value="{{($useSettings['top_destination_name_2'][0] != Null) ? $useSettings['top_destination_name_2'][0] :''}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="t_price2">Price</label>
                                                <input type="text" class="form-control" id="t_price2" name="top_destination_price_2" placeholder="Price" value="{{($useSettings['top_destination_price_2'][0] != Null) ? $useSettings['top_destination_price_2'][0] :''}}">
                                            </div>
                                        </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="t_place3">Place</label>
                                                <input type="text" class="form-control" id="t_place3" name="top_destination_name_3" placeholder="Place" value="{{($useSettings['top_destination_name_3'][0] != Null) ? $useSettings['top_destination_name_3'][0] :''}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="t_price3">Price</label>
                                                <input type="text" class="form-control" id="t_price3" name="top_destination_price_3" placeholder="Price" value="{{($useSettings['top_destination_price_3'][0] != Null) ? $useSettings['top_destination_price_3'][0] :''}}">
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
@endsection



@extends('theme.base')
@section('head-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/datatables.css")}}>--}}
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/custom_dt_html5.css")}}>--}}
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/dt-global_style.css")}}>--}}
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/regular.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/fontawesome.css")}}>
    <link href="{{asset('css/2Frontend/vendor/telephone/intlTelInput.css')}}" rel="stylesheet">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link href={{asset("css/theme/scrollspyNav.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/animate/animate.css")}} rel="stylesheet" type="text/css" />
    <script src={{asset("css/theme/plugins/sweetalerts/promise-polyfill.js")}}></script>
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/forms/switches.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/select2/select2.min.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/flatpickr/custom-flatpickr.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/flatpickr/flatpickr.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/tabs-accordian/custom-tabs.css" )}} rel="stylesheet" type="text/css" />
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
    <style>
        .form-control{

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

        <div class="row layout-top-spacing">
            @if(Session::has('message'))
                <div class="alert alert-gradient mb-4" role="alert">
                    <button  type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>{{ Session::get('message') }}</strong>
                </div>
            @endif
            <div class="col-xl-6 col-lg-12 col-sm-12  layout-spacing bipon-form">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h2><small>payment</small> Confirm </h2>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="widget-content widget-content-area rounded-pills-icon">

                            <ul class="nav nav-pills mb-4 mt-3  justify-content-center " id="rounded-pills-icon-tab" role="tablist">
                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2  text-center {{($booking->userTransaction?->trans_id =='Pay In Car'? 'active':'')}}" id="payInCar" data-toggle="pill" href="#rounded-pills-icon-home" role="tab" aria-controls="rounded-pills-icon-home" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        In Car</a>
                                </li>
                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2 text-center {{($booking->userTransaction?->trans_id =='Pay In Office'? 'active':'')}}" id="payInOffice" data-toggle="pill" href="#rounded-pills-icon-profile" role="tab" aria-controls="rounded-pills-icon-profile" aria-selected="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    In Office</a>
                                </li>
                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2 text-center {{($booking->userTransaction?->trans_id =='Third Party'? 'active':'')}}" id="thirdParty" data-toggle="pill" href="#rounded-pills-icon-contact" role="tab" aria-controls="rounded-pills-icon-contact" aria-selected="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    Third Party</a>
                                </li>


                            </ul>

                        </div>

{{--                        @if($booking->confirm == 1)--}}
{{--                            <div> <p> Payment Already Done.</p></div>--}}
{{--                        @else--}}
                            <form class="mx-auto" method="post" action="{{route('cashPayment')}}" style="">
                                @csrf
                                <input type="hidden"  name="id" value="{{$booking->id}}">
                                <input type="hidden" id="payType" name="type" value="">
                                <input type="hidden" id="paidBy" name="paidBy" value="notCustomer">
                                <div class="form-row mb-4">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" id="send_email" class="new-control-input" name="send_email" value="1" checked>
                                        <span class="new-control-indicator"></span>Send Booking Update Email to Customer
                                    </label>
                                </div>
{{--                                <div class="form-row mb-4">--}}
{{--                                    <label class="new-control new-checkbox checkbox-primary">--}}
{{--                                        <input type="checkbox" id="send_email1" class="new-control-input" name="send_email1" value="1" checked>--}}
{{--                                        <span class="new-control-indicator"></span>Send Booking Assignment Email to Driver--}}
{{--                                    </label>--}}
{{--                                </div>--}}
                                <div class="pl-xl-5">
                                    <a href="{{url()->previous()}}" class="btn btn-danger ml-3 mt-3">Cancel</a>
                                    <button id="send" type="button" class="btn btn-success ml-3 mt-3" disabled>Submit</button>
                                    {{--                                <button style="margin-top: 1px" name="type" value="Pay In Car" id="payInCar" class="nav-link mb-2 active text-center confirmBtn" type="submit"> {{'Pay In Car'}} </button>--}}

                                </div>

                            </form>
{{--                            <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('cashPayment') }}" onsubmit="return confirm('Do you want to select Payment method Pay In Office?');">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="id" value="{{$booking->id}}">--}}

{{--                                <button style="margin-top: 1px" name="type" value="Pay In Office" id="payInOffice" class="btn confirmBtn" type="submit"> {{'Pay In Office'}} </button>--}}
{{--                            </form>--}}
{{--                            <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('cashPayment') }}" onsubmit="return confirm('Do you want to select Payment method Third Party?');">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="id" value="{{$booking->id}}">--}}

{{--                                <button style="margin-top: 1px" name="type" value="Third Party" id="thirdParty" class="btn confirmBtn" type="submit"> {{'Third Party'}} </button>--}}
{{--                            </form>--}}
{{--                        @endif--}}
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
    {{--    <script src={{ asset("js/theme/plugins/table/datatable/datatables.js") }}></script>--}}
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    {{--    <script src={{asset("js/theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js")}}></script>--}}
    {{--    <script src={{asset("js/theme/plugins/table/datatable/button-ext/jszip.min.js")}}></script>--}}
    {{--    <script src={{asset("js/theme/plugins/table/datatable/button-ext/buttons.html5.min.js")}}></script>--}}
    {{--    <script src={{asset("js/theme/plugins/table/datatable/button-ext/buttons.print.min.js")}}></script>--}}
    <script src={{asset("js/theme/plugins/select2/select2.min.js")}}></script>
    <script src={{asset("js/theme/plugins/flatpickr/flatpickr.js")}}></script>
    {{--    <script src={{asset("js/theme/plugins/flatpickr/custom-flatpickr.js")}}></script>--}}
    <script src="{{asset('js/2Frontend/vendor/telephone/intlTelInput.min.js')}}"></script>
    {{--    <script src={{asset("js/theme/plugins/select2/custom-select2.js")}}></script>--}}


    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src={{asset("js/theme/js/scrollspyNav.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/sweetalert2.min.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/custom-sweetalert.js")}}></script>
    <script src={{asset("js/theme/plugins/highlight/highlight.pack.js")}}></script>
    <!-- END THEME GLOBAL STYLE -->
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script>
        $(document).on("click", "#payInCar", function(){
            document.getElementById('payType').value= 'Pay In Car';
            document.getElementById("send").disabled = false;
        });
        $(document).on("click", "#payInOffice", function(){
            document.getElementById('payType').value= 'Pay In Office';
            document.getElementById("send").disabled = false;
        });
        $(document).on("click", "#thirdParty", function(){
            document.getElementById('payType').value= 'Third Party';
            document.getElementById("send").disabled = false;
        });

    </script>
    <script>
        $(document).ready(function(){
        $('#send').on('click', function () {
            let $form = $(this).closest('form');
            // event.preventDefault();
        // function destroy_car(car_id) {
            const payType = document.getElementById('payType').value;
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success btn-rounded',
                cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'Are you sure you want to accept '+payType+'?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                padding: '2em',
                showLoaderOnConfirm: true,
            }).then(function(result) {
                if (result.value) {
                    swalWithBootstrapButtons(
                        {
                            title: 'Submitted',
                            text: 'The Pay type has been Saved.',
                            type: 'success'
                        }
                    ).then(function (result){
                       $form.submit();
                    })
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Payment Type Not Saved',
                        'error'
                    )
                }
            })

            // })
        })
    })
        $(document).on("click", "#send_email", function(){
            if(document.getElementById('send_email').value === '1')
            {
                document.getElementById('send_email').value= '0';
            }
            else {
                document.getElementById('send_email').value='1';
            }
        });

    </script>
@endsection



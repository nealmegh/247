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
{{--    <link href={{asset("css/theme/plugins/flatpickr/flatpickr.css" )}} rel="stylesheet" type="text/css" />--}}
    <link href={{asset("css/theme/users/account-setting.css" )}} rel="stylesheet" type="text/css" />
{{--    <link rel="stylesheet" type="text/css" href="plugins/dropify/dropify.min.css">--}}


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
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" class="section general-info" action="{{route('user.update', $user->id)}}" method="POST">
                                       @csrf
                                        <div class="info">
                                            <h6 class="">General Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="upload mt-4 pr-md-4">
                                                                <img src="{{ $user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">

{{--                                                                <input type="file" id="input-file-max-fs" class="dropify" data-default-file="assets/img/200x200.jpg" data-max-file-size="2M" />--}}
{{--                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>--}}
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Full Name</label>
                                                                            <input type="text" class="form-control mb-4" id="name" placeholder="Full Name" name="name" value="{{$user->name}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Email Address</label>
                                                                            <input type="email" class="form-control mb-4" id="email" placeholder="Email Address" name="email"  value="{{$user->email}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="phone">Phone</label>
                                                                            <input type="text" class="form-control mb-4" id="phone" placeholder="Write your phone number here" name="phone" value="{{$user->phone}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="{{url()->previous()}}" class="btn btn-danger ml-3 mt-3">Cancel</a>
                                                                <button id="send" type="submit" class="btn btn-success ml-3 mt-3">Submit</button>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="pass-info" class="section general-info" action="{{route('user.update.password', $user->id)}}" method="POST">
                                        @csrf
                                        <div class="info">
                                            <h5 class="">Password</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="address">Current Password</label>
                                                                <input type="password" class="form-control mb-4" id="current_password" placeholder="Password" name="current_password" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="password">New Password</label>
                                                                <input type="password" class="form-control mb-4" id="password" placeholder="New Password" name="password" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="confirm_password">Confirm Password</label>
                                                                <input type="password" class="form-control mb-4" id="confirm_password" placeholder="Confirm Password" name="confirm_password" >
                                                            </div>
                                                        </div>
                                                        <a href="{{url()->previous()}}" class="btn btn-danger ml-3 mt-3">Cancel</a>
                                                        <button id="send" type="submit" class="btn btn-success ml-3 mt-3">Submit</button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
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
    <script src={{asset("js/theme/plugins/blockui/jquery.blockUI.min.js")}}></script>
    <script src={{asset("js/theme/js/users/account-settings.js")}}></script>

    <!-- END THEME GLOBAL STYLE -->
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
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
    </script>
@endsection


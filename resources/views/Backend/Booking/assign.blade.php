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

            <div class="col-xl-6 col-lg-12 col-sm-12  layout-spacing bipon-form">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h2><small>assign</small> Driver </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area">
{{--                                            @if(Route::currentRouteName() == 'booking.reassign')--}}
{{--                                                <form class="" novalidate method="POST" action="{{ route('booking.driver.reassign', $booking->id) }}">--}}
{{--                                            @else--}}
                                                <form class="" novalidate method="POST" action="{{ route('booking.driver', $booking->id) }}">
{{--                                            @endif--}}
                                                    @csrf
                                                    <h4>For Original Journey</h4>

                                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                                    <label for="driver_id">Driver</label>
                                                    <select id="driver_id" class="form-control userDriver" name="driver_id">
                                                        <option value="" selected>Choose Driver</option>
                                                        @foreach($drivers as $driver)
                                                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
{{--                                                    {{dd($booking->userTransaction)}}--}}
                                                    @if($booking->userTransaction->trans_id == 'Stripe')
                                                        <span style="color: green; font-size: 1.5rem !important; margin-bottom: 5px!important;"> User Paid Online </span>
                                                        <input type="hidden" step="0.1" id="collectable_by_driver" name="collectable_by_driver" value="0">
                                                    @else

                                                        <div class="form-group mb-4">
                                                            <label class="control-label" for="collectable_by_driver">Fair Collect <span class="required">*</span></label>
                                                            @if($booking->userTransaction->trans_id == 'Pay In Car')
                                                                <input type="number" step="0.1" id="collectable_by_driver" name="collectable_by_driver" value="{{$earnings[0]}}" placeholder="Collectable Fair" data-validate-minmax="1,20" required="required" class="form-control" >
                                                            @else
                                                                <input type="number" step="0.1" id="collectable_by_driver" name="collectable_by_driver" value="0" placeholder="Collectable Fair" data-validate-minmax="1,20" required="required" class="form-control" >
                                                            @endif
                                                        </div>
                                                    @endif
                                                    @if($booking->return == 1)
                                                        <h4>For Return Journey</h4>

                                                        <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                                            <label for="return_driver_id">Driver</label>
                                                            <select id="return_driver_id" class="form-control userReturnDriver" name="return_driver_id">
                                                                <option value="" selected>Choose Driver</option>
                                                                @foreach($drivers as $driver)
                                                                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @if($booking->userTransaction->trans_id == 'Stripe')
                                                            <input type="hidden" step="0.1" id="return_collectable_by_driver" name="return_collectable_by_driver" value="0">

                                                        @else
                                                        <div class="form-group mb-4">
                                                            <label class="control-label" for="return_collectable_by_driver">Fair Collect <span class="required">*</span></label>
{{--                                                            <input type="number" step="0.1" id="return_collectable_by_driver" name="return_collectable_by_driver" value="{{$earnings[1]}}" placeholder="Collectable Fair" data-validate-minmax="1,20" required="required" class="form-control" >--}}
                                                            @if($booking->userTransaction->trans_id == 'Pay In Car')
                                                                <input type="number" step="0.1" id="return_collectable_by_driver" name="return_collectable_by_driver" value="{{$earnings[0]}}" placeholder="Collectable Fair" data-validate-minmax="1,20" required="required" class="form-control" >
                                                            @else
                                                                <input type="number" step="0.1" id="return_collectable_by_driver" name="return_collectable_by_driver" value="0" placeholder="Collectable Fair" data-validate-minmax="1,20" required="required" class="form-control" >
                                                            @endif
                                                        </div>
                                                        @endif
                                                    @endif

                                                    <div class="form-row mb-4">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" id="send_email_customer" class="new-control-input" name="send_email" value="1" checked>
                                                            <span class="new-control-indicator"></span>Send Booking Update Email to Customer
                                                        </label>
                                                    </div>
                                                    <div class="form-row mb-4">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" id="send_email1_driver" class="new-control-input" name="send_email1" value="1" checked>
                                                            <span class="new-control-indicator"></span>Send Booking Assignment Email to Driver
                                                        </label>
                                                    </div>
                                                <a href="{{url()->previous()}}" class="btn btn-danger ml-3 mt-3">Cancel</a>
                                                <button id="send" type="submit" class="btn btn-success ml-3 mt-3">Save</button>
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
        <!-- END THEME GLOBAL STYLE -->
        <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script>
        $(".userDriver").select2({
            // tags: true,
            placeholder: "Select Driver",
            allowClear: true,
        });
        $(".userReturnDriver").select2({
            // tags: true,
            placeholder: "Select Driver",
            allowClear: true
        });
    </script>
        <script>


            // $('.delete-car').on('click', function () {
            function destroy_car(car_id) {
                const carName = $('#'+car_id).attr("data-value");
                const swalWithBootstrapButtons = swal.mixin({
                    confirmButtonClass: 'btn btn-success btn-rounded',
                    cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons({
                    title: 'Are you sure you want to delete '+carName+' car type?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true,
                    padding: '2em',
                    showLoaderOnConfirm: true,
                    preConfirm: ()=>{
                        $.ajax({
                            url: '/admin/cars/delete/'+car_id,
                            method: 'POST',
                            data:{"_token": "{{ csrf_token() }}"},
                            success: function(resp)
                            {
                                console.log(resp)

                            }
                        })
                    }
                }).then(function(result) {
                    if (result.value) {
                        swalWithBootstrapButtons(
                            {
                                title: 'Deleted!',
                                text: 'The car type has been deleted.',
                                type: 'success'
                            }
                        ).then(function (result){
                            location.reload();
                        })
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons(
                            'Cancelled',
                            'The data is safe :)',
                            'error'
                        )
                    }
                })

                // })
            }
        </script>
    <script>
        $(document).on("click", "#send_email1", function(){
            if(document.getElementById('send_email1').value === '1')
            {
                document.getElementById('send_email1').value= '0';
            }
            else {
                document.getElementById('send_email1').value='1';
            }
        });
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

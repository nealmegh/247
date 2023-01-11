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
                                <h2><small>search</small> Invoice </h2>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form class="" novalidate method="GET" action="{{route('invoice.select')}}">

                            <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                <label for="driver_id">Driver</label>
                                <select id="driver_id" class="form-control userDriver" name="driver_id">
                                    <option value="" selected>Choose Driver</option>
                                    @foreach($drivers as $driver)
                                        <option value="{{$driver->id}}">{{$driver->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                <label for="start_date">Start Date</label>
                                <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                            </div>
                            <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                <label for="end_date">End Date</label>
                                <input type="text" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                            </div>

                            <a href="{{url()->previous()}}" class="btn btn-danger ml-3 mt-3">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success ml-3 mt-3">Search</button>

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
            allowClear: true
        });
        var f1 = flatpickr(document.getElementById('start_date'), {
            dateFormat: "Y-m-d"
        });
        var f2 = flatpickr(document.getElementById('end_date'), {
            dateFormat: "Y-m-d"
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
@endsection

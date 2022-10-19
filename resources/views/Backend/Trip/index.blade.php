@extends('theme.base')
@section('head-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/datatables.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/custom_dt_html5.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/dt-global_style.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/regular.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/fontawesome.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/custom_dt_custom.css")}}>

    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link href={{asset("css/theme/scrollspyNav.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/animate/animate.css")}} rel="stylesheet" type="text/css" />
    <script src={{asset("css/theme/plugins/sweetalerts/promise-polyfill.js")}}></script>
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset("css/theme/elements/alert.css" )}}">
    <link rel="stylesheet" type="text/css" href="{{asset("css/theme/tables/table-basic.css" )}}">
    <style>
        .btn-light { border-color: transparent; }
        .badge-success {
            color: #fff !important;
            background-color: #1abc9c !important;
        }
        .badge {
            font-weight: 600 !important;
            line-height: 1.4 !important;
            padding: 3px 6px !important;
            font-size: 12px !important;

            transition: all 0.3s ease-out !important;
            -webkit-transition: all 0.3s ease-out !important;
        }
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

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">

                    <div class="col 12 button-holder" style="display: flex">
                        <div class="col-8">
                            <h3>Trips</h3>
                        </div>
                        <div class="create-button col-4">
                            <a href="{{route('admin.reports')}}" class="create-button-btn btn btn-success mb-6 mr-4 btn-lg"> Report</a>
                        </div>
                    </div>
                    <table id="html5-extension" class="table table-hover table-striped dataTable">

                            <thead>
                            <tr>
{{--                                <th>Trip ID</th>--}}
{{--                                <th>Trip Ref ID</th>--}}
                                <th>Book Ref ID</th>
                                <th>Journey Date</th>
                                <th>Driver</th>
                                <th>Collectable Amount</th>
                                <th>Collection Amount</th>
{{--                                <th>Trip Status</th>--}}
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($trips as $trip)
                            <tr>
{{--                                <td>{{$trip->id}}</td>--}}
{{--                                <td>{{$trip->trip_ref_id}}</td>--}}
                                <td>{{$trip->trip_ref_id}}</td>
                                @if($trip->journey_type == 'origin')
                                <td>{{$trip->booking->journey_date}}</td>
                                @else
                                <td>{{$trip->booking->return_date}}</td>
                                @endif
{{--                                <td>{{$trip->journey_type}}</td>--}}
                                <td>{{$trip->driver->name}}</td>
                                <td>{{$trip->collectable_by_driver}}</td>
                                <td>{{$trip->collection_by_driver}}</td>
{{--                                <td>{{$trip->trip_status}}</td>--}}

                                <td class="text-center">
                                    {{--<a href="{{route('cars.show', $user->id)}}" data-toggle="modal"  class="btn btn-sm btn-success viewFunction">--}}
                                        {{--<i class="fa fa-eye"></i>--}}
                                    {{--</a> ||--}}
{{--                                    <a href="{{route('driver.edit', $user->id)}}" data-toggle="modal" class="btn btn-sm btn-warning editFunction" data-row-id="37">--}}
{{--                                        <i class="fa fa-pencil"></i>--}}
{{--                                    </a>--}}
{{--                                    ||--}}

{{--                                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('driver.delete', $user->id)}}" class="btn btn-sm btn-danger">--}}
{{--                                        <i class="fa fa-trash"></i>--}}
{{--                                    </a>--}}
                                         @if($trip->trip_status == 0)
{{--                                            <button type="button"--}}
{{--                                                    class="btn btn-label-danger btn-lg btn-upper openBtn"--}}
{{--                                                    data-toggle="modal"--}}
{{--                                                    data-id = {!! $trip->id !!}>--}}
{{--                                                {{ __('End Trip') }}--}}
{{--                                            </button>--}}
                                        <button type="button" class="btn btn-sm btn-danger openBtn" id="{!! $trip->id !!}" onClick="tripComplete(this.id)" data-value="{!! $trip->collectable_by_driver!!}" data-id ="{!! $trip->id !!}">{{ __('End Trip') }}</button>
                                         @else
{{--                                        <button type="button" class="btn btn-success">{{ __('Trip Ended') }}</button>--}}
                                                <span class="badge badge-success">{{__('Trip Ended') }}</span>
                                         @endif
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                    </table>
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
    <script>
        $('#html5-extension').DataTable( {
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn btn-sm' },
                    { extend: 'csv', className: 'btn btn-sm' },
                    { extend: 'excel', className: 'btn btn-sm' },
                    { extend: 'print', className: 'btn btn-sm' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "order": [[1, 'desc']],
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10,
        } );
    </script>
    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src={{asset("js/theme/js/scrollspyNav.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/sweetalert2.min.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/custom-sweetalert.js")}}></script>
    <!-- END THEME GLOBAL STYLE -->
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script>
        // $(document).ready(function(){
        //
        //     $('.openBtn').click(function(){
        //
        //         let tripId = $(this).data('id');
        //         document.myForm.action = '/admin/trips/update/'+tripId;
        //         console.log('admin/trips/update/'+tripId);
        //         $('#exampleModal').modal('show');
        //         // AJAX request
        //         $.ajax({
        //             url: '/admin/trips/earnings/'+tripId,
        //             type: 'get',
        //             data: {id: tripId},
        //             success: function(response){
        //                 $("#collection_by_driver").val(response);
        //                 console.log(response)
        //
        //             }
        //         });
        //     });
        // });
    </script>
    <script>


        // $('.delete-car').on('click', function () {
        function tripComplete(trip_id) {
            const tripName = trip_id;
            let collectable = $('#'+trip_id).attr("data-value");

            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success btn-rounded',
                cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
                buttonsStyling: false,
            })
            swalWithBootstrapButtons({
                title: 'Are you sure you want to Complete Trip Number '+tripName+'?',
                text: "You won't be able to revert this!",
                type: 'warning',
                input: 'number',
                inputValue: collectable,
                inputPlaceholder:
                    'I agree with the terms and conditions',
                showCancelButton: true,
                confirmButtonText: 'Yes, Complete Trip',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                padding: '2em',
                showLoaderOnConfirm: true,
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: '/admin/trips/update/'+trip_id,
                        method: 'POST',
                        data:{"_token": "{{ csrf_token() }}", "collection_by_driver": result.value},
                        success: function(resp)
                        {
                            swalWithBootstrapButtons(
                                {
                                    title: 'Completed!',
                                    text: 'The trip has been Ended.',
                                    type: 'success'
                                }
                            ).then(function (result){
                                location.reload();
                            })
                        }
                    })
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Trip is still running!!!',
                        'error'
                    )
                }
            })

        }
    </script>
@endsection



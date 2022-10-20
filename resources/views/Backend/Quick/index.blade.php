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
    </style>
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
    @can('Customer')
        <style>
            .main-content{
                margin-left: 5px !important;
            }
        </style>
    @endcan

@endsection

@section('main-content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text" id="modal_booking_number"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
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
                            <h3>Quick Bookings</h3>
                        </div>
                        <div class="create-button col-4">
                            <a href="{{(request()->user()->can('Customer'))?'/#book':route('booking.create')}}" class="create-button-btn btn btn-success mb-6 mr-4 btn-lg"> New Booking</a>
                        </div>
                    </div>
                    @cannot('Customer')
                    <table id="html5-extension" class="table table-hover table-striped dataTable">
                        <thead>
                        <tr>
{{--                            <th class="text-center">Reference No.</th>--}}
                            <th class="text-center">Booked By</th>
                            <th class="text-center">Customer Info</th>
                            <th class="text-center">Journey Info</th>
{{--                            <th class="text-center">Driver</th>--}}
{{--                            <th class="text-center">Payment</th>--}}
{{--                            <th class="text-center">Status</th>--}}
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($bookings as $booking)
                            <tr>
{{--                                <td class="text-center"><a class="badge outline-badge-success shadow-none showBooking" data-toggle="modal" data-value="{{$booking->id}}"  data-target="#exampleModal">{{$booking->ref_id}}</a></td>--}}
                                @if($booking->user != null)
                                    @php
                                    $book_by = \App\Models\User::where(['id' => $booking->book_by])->first();
                                        if($booking->book_by != 1)
                                        {
                                           $role = 'Customer';
                                        }
                                        elseif($booking->book_by == 1)
                                        {
                                           $role = 'Admin';
                                        }
                                        else
                                        {
                                          $role = 'Agent';
                                        }
                                    @endphp

                                    <td class="text-center"> {{$role}} <br>{{$book_by->name}} </td>
                                    <td class="text-center">{{$booking->user->name}}<br><a href="{{'mailto:'.$booking->user->email}}">{{$booking->user->email}}</a><br><a href="{{'tel:'.$booking->user->phone}}">{{$booking->user->phone}}</a></td>
                                @else
                                    <td class="text-center">{{'Data is Not Available'}} </td>
                                    <td class="text-center">{{'Customer Data is Not Available'}}</td>

                                @endif
                                @php
                                    if($booking->return == 1){
                                       $return_date = strtotime($booking->return_date);
                                    }
                                    $journey_date = $booking->journey_date;
                                    $today = Carbon\Carbon::now();
                                    $diff = false;
                                    if(strtotime($booking->journey_date) < strtotime('1 days'))
                                        {
                                            $diff = true;
                                        }
                                @endphp
                                @if($booking->journey_date != Null)
                                    @if(strtotime($booking->journey_date) < strtotime('3 days') && strtotime($booking->journey_date) > strtotime('1 days'))
                                    <td class="text-center" style="color: #e1ad01">{{$booking->journey_date->format('d-m-Y H:i')}} <br>
                                        {{($booking->return == 1)?date('d-m-Y H:i' , $return_date):''}}
                                    </td>
                                    @elseif (strtotime($booking->journey_date) < strtotime('1 days') && $booking->complete_status != 1)
                                        <td class="text-center" style="color: red">{{$booking->journey_date->format('d-m-Y H:i')}} <br>
                                            {{($booking->return == 1)?date('d-m-Y H:i' , $return_date):''}}
                                        </td>
                                    @else
                                        <td class="text-center" style="color: green">{{$booking->journey_date->format('d-m-Y H:i')}} <br>
                                            {{($booking->return == 1)?date('d-m-Y H:i' , $return_date):''}}
                                        </td>
                                    @endif

                                @else
                                    <td class="text-center">{{'Journey Data is Not Available'}}</td>
                                @endif
                                <td class="text-center">
                                    <a  href="{{route('booking.quick.bookings.final', $booking->id)}}" class="btn btn-dark" title="Edit Booking" >
                                        Finalize
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @endcannot
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
            "order": [[0, 'desc']],
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10,
        } );
    </script>
    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src={{asset("js/theme/js/scrollspyNav.js")}}></script>
    <!-- END THEME GLOBAL STYLE -->
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
@endsection

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

    <link rel="stylesheet" type="text/css" href="{{asset("css/theme/tables/table-basic.css" )}}">
    <link rel="stylesheet" type="text/css" href="{{asset("css/theme/widgets/modules-widgets.css" )}}">

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
        @media only screen and (max-width: 600px) {
            .btn-lg, .btn-group-lg > .btn {
                padding: 0.5rem 0.5rem !important;
                font-size: 0.9rem!important;

            }
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
{{--                    ################################################--}}







                    <div class="widget widget-account-invoice-three">

                        <div class="widget-heading">
                            <div class="wallet-usr-info">
                                <div class="usr-name">
                                        <span id="modal_booking_number"></span>
                                </div>
                                <div class="add">
                                    <span>Journey Details</span>
                                </div>
                            </div>
                            <div class="wallet-balance">
                                <p>Amount</p>
                                <h5 class="" id="bookingPrice"><span class="w-currency">£</span></h5>
                            </div>
                            <div class="wallet-balance" style="margin-top: 5px !important;">
                                <p>Date</p>
                                <h5 class="" id="journeyDate"></h5>
                            </div>
                        </div>

                        <div class="widget-amount">

                            <div class="w-a-info funds-received">
                                <span>From <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg></span>
                                <p id="bookingFrom"></p>
                            </div>

                            <div class="w-a-info funds-spent">
                                <span>To <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span>
                                <p id="bookingTo"></p>
                            </div>
                        </div>

                        <div class="widget-content">

                            <div class="invoice-list">
                                <div class="bills-stats" style="margin-bottom: 5px!important;">

                                    <span style="background-color: #0e2231!important; color: white"> Main Journey</span>
                                </div>
                                <div class="inv-detail">
                                    <div class="info-detail-1">
                                        <p>Booking ID</p>
                                        <p><span class="bill-amount" id="bookingRefId"></span></p>
                                    </div>
                                    <div class="info-detail-1">
                                        <p>Pick Up</p>
                                        <p><span class="bill-amount" id="bookingPickup"></span></p>
                                    </div>
                                    <div class="info-detail-1">
                                        <p>Drop Off</p>
                                        <p><span class="bill-amount" id="bookingDropOff"></span></p>
                                    </div>
                                    <div class="info-detail-1">
                                        <p>Pick Up Time</p>
                                        <p><span class="bill-amount" id="bookingTime"></span></p>
                                    </div>
                                    <div class="info-detail-1">
                                        <p>Flight Number</p>
                                        <p><span class="bill-amount" id="bookingFlightNumber"></span></p>
                                    </div>
                                    <div class="info-detail-1">
                                        <p>Flight Origin</p>
                                        <p><span class="bill-amount" id="bookingFlightOrigin">}</span></p>
                                    </div>
                                    <div id="return" style="">
                                        <div class="bills-stats" style="margin-bottom: 5px!important; margin-top: 5px!important;">

                                            <span style="background-color: #0e2231!important; color: white"> Return Journey</span>
                                        </div>
                                        <div class="info-detail-1">
                                            <p>Pick Up</p>
                                            <p><span class="bill-amount" id="bookingReturnPickup"></span></p>
                                        </div>
                                        <div class="info-detail-1">
                                            <p>Drop Off</p>
                                            <p><span class="bill-amount" id="bookingReturnDropOff"></span></p>
                                        </div>
                                        <div class="info-detail-1">
                                            <p>Pick Up Time</p>
                                            <p><span class="bill-amount" id="bookingReturnTime"></span></p>
                                        </div>
                                        <div class="info-detail-1">
                                            <p>Flight Number</p>
                                            <p><span class="bill-amount" id="bookingReturnFlight"></span></p>
                                        </div>
                                        <div class="info-detail-1">
                                            <p>Flight Origin</p>
                                            <p><span class="bill-amount" id="bookingReturnOrigin"></span></p>
                                        </div>
                                    </div>
                                    <div class="bills-stats" style="margin-bottom: 5px!important; margin-top: 5px!important;">

                                        <span style="background-color: #0e2231!important; color: white">Important</span>
                                    </div>
                                    <div class="info-detail-1">
                                        <p>Vehicle</p>
                                        <p><span class="bill-amount" id="carName"></span></p>
                                    </div>

                                    <div class="info-detail-1">
                                        <p>Adult / Child</p>
                                        <p><span class="bill-amount" id="bookingAdult"></span></p>
                                    </div>
                                    <div class="info-detail-1">
                                        <p>Luggage / Carry On</p>
                                        <p><span class="bill-amount" id="bookingLuggage"></span></p>
                                    </div>
                                    <div class="info-detail-1">
                                        <p>Additional Info</p>
                                        <p><span class="bill-amount" id="bookingInfo"></span></p>
                                    </div>
                                </div>
                        </div>

                    </div>

                    </div>


{{--                    <p class="modal-text" id="modal_booking_number"></p>--}}



















{{--                    ###############################################--}}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" data-dismiss="modal">Okay</button>
{{--                    <button type="button" class="btn btn-primary">Save</button>--}}
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
                            <h3>Bookings</h3>
                        </div>
                        <div class="create-button col-4">
                            <a href="{{(request()->user()->can('Customer'))?'/#book':route('booking.create')}}" class="create-button-btn btn btn-success mb-6 mr-4 btn-lg"> New Booking</a>
                        </div>
                    </div>
                    @cannot('Customer')
                    <table id="html5-extension" class="table table-hover table-striped dataTable">
                        <thead>
                        <tr>
                            <th class="text-center">Reference No.</th>
                            <th class="text-center">Booked By</th>
                            <th class="text-center">Customer Info</th>
                            <th class="text-center">Journey Info</th>
                            <th class="text-center">Driver</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td class="text-center"><a class="badge outline-badge-success shadow-none showBooking" data-toggle="modal" data-value="{{$booking->id}}"  data-target="#exampleModal">{{$booking->ref_id}}</a></td>
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
                                    @php
                                        $completion = 0;
                                        $job_status = 0;
                                        $count = -1;
                                        if(!$booking->trips->isEmpty())
                                            {
                                                $count = count($booking->trips);
                                                foreach ($booking->trips as $trip)
                                                    {
                                                        if($trip->trip_status == 1)
                                                            {
                                                                $completion ++;
                                                            }
                                                    }
                                            }
                                        if($completion == $count)
                                            {
                                                $job_status = 100;
                                            }
                                        elseif ($completion == $count/2)
                                            {
                                                $job_status = 50;
                                            }
                                    @endphp
                                    <td> {{$role}} <br>{{$book_by->name}} </td>
                                    <td>{{$booking->user->name}}<br><a href="{{'mailto:'.$booking->user->email}}">{{$booking->user->email}}</a><br><a href="{{'tel:'.$booking->user->phone}}">{{$booking->user->phone}}</a></td>
                                @else
                                    <td>{{'Data is Not Available'}} </td>
                                    <td>{{'Customer Data is Not Available'}}</td>
                                    <td>{{'Customer Data is Not Available'}}</td>
                                    <td>{{'Customer Data is Not Available'}}</td>
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
                                @if(strtotime($booking->journey_date) < strtotime('3 days') && strtotime($booking->journey_date) > strtotime('1 days'))
                                <td style="color: #e1ad01">{{$booking->journey_date->format('d-m-Y H:i')}} <br>
                                    {{($booking->return == 1)?date('d-m-Y H:i' , $return_date):''}}
                                </td>
                                @elseif (strtotime($booking->journey_date) < strtotime('1 days') && $booking->complete_status != 1)
                                    <td style="color: red">{{$booking->journey_date->format('d-m-Y H:i')}} <br>
                                        {{($booking->return == 1)?date('d-m-Y H:i' , $return_date):''}}
                                    </td>
                                @else
                                    <td style="color: green">{{$booking->journey_date->format('d-m-Y H:i')}} <br>
                                        {{($booking->return == 1)?date('d-m-Y H:i' , $return_date):''}}
                                    </td>
                                @endif
                                @if($booking->trips->isEmpty())
                                    <td class="text-center">
                                        <a href="{{route('booking.assign', $booking->id)}}" class="btn btn-sm btn-danger">
                                            Assign</a>
                                    </td>
                                @else
                                    <td class="text-center"> <span class="text-success" style="font-size: 16px !important; text-align: left !important;">Original: {{$booking->trips[0]->driver->name}}</span> <br>
                                        @if($booking->return == 1)
                                            @if(isset($booking->trips[1]))
                                                <span class="text-success" style="font-size: 16px !important; text-align: left !important;">Return: {{$booking->trips[1]->driver->name}}</span> <br>
                                            @else
                                                <span class="text-danger" style="font-size: 16px !important;"> Return: NEED TO ASSIGN RETURN DRIVER. </span>
                                            @endif
                                        @endif
                                        @if($booking->complete_status == null && $job_status != 100)
                                            <a href="{{route('booking.reassign', $booking->id)}}" class="btn btn-sm btn-dark " data-row-id="37">
                                                Re-Assign</a>
                                        @endif

                                    </td>

                                @endif
                                <td class="text-center">

                                    @if($booking->user_transaction_id == null)
                                        <span class="badge outline-badge-danger shadow-none">
                                            @if($booking->final_price == null)
                                                {{'£'.$booking->price}}
                                            @else
                                                {{'£'.$booking->final_price}}
                                            @endif
                                        </span>
                                        <br>
                                        <a href="{{route('booking.payment', $booking->id)}}" class="btn btn-sm btn-secondary" style="margin-top: 3px; background-color: purple; border-color: purple!important;">
                                                    Payment
                                                </a>
                                    @else
                                        @if($job_status == 0)
                                            <a href="{{route('booking.payment', $booking->id)}}">
                                                <span class="badge outline-badge-success shadow-none">
                                                    @if($booking->final_price == null)
                                                        {{'£'.$booking->price}}
                                                    @else
                                                        {{'£'.$booking->final_price}}
                                                    @endif
                                                    <br>
                                                        {{$booking->userTransaction->trans_id}}
                                                </span>
                                            </a>
                                        @else
                                            <span class="badge outline-badge-success shadow-none">
                                                @if($booking->final_price == null)
                                                    {{'£'.$booking->price}}
                                                @else
                                                    {{'£'.$booking->final_price}}
                                                @endif
                                                    <br>
                                                        {{$booking->userTransaction->trans_id}}
                                                </span>
                                        @endif
                                    @endif
{{--                                    </span>--}}
                                </td>

                                @if($booking->complete_status == Null)
                                    <td class="text-center">
                                        @if($job_status == 100)
{{--                                            <span class="badge outline-badge-danger shadow-none">{{'JOB COMPLETION:'.$job_status.'%'}}</span> --}}
{{--                                            <br>--}}
                                            <a href="{{route('booking.complete', $booking->id)}}" class="btn btn-success" >
                                                Complete Job</a>
                                        @else
{{--                                            <a href="#"  onClick="alert('Complete All the Trips first')" class="btn btn-danger " >--}}
{{--                                                Job Completion</a>--}}
                                            <span class="badge outline-badge-danger shadow-none">{{'JOB COMPLETION:'.$job_status.'%'}}</span>
                                        @endif
                                    </td>
                                @else
                                    <td class="text-center"><span class="badge badge-success">{{'Completed'}}</span></td>
                                @endif

                                <td>
                                    <a  href="{{route('booking.edit', $booking->id)}}" class="btn btn-primary" title="Edit Booking" >
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a id="{{$booking->id}}" class="btn btn-danger delete-booking" data-value="{{$booking->ref_id}}" onClick="destroy_booking(this.id)" >
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @endcannot
                    @can('Customer')
                        <table id="html5-extension" class="table table-hover dataTable">
                            <thead>
                            <tr>
                                <th class="text-center">Booking ID</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Booking Info</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Driver</th>
                                <th class="text-center">Download Invoice</th>

                            </tr>
                            </thead>


                            <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td class="text-center">{{$booking->ref_id}}</td>
                                    <td>{{date('d-m-Y', strtotime($booking->journey_date))}}</td>
                                    <td>{{'From: '.$booking->from()}}<br>
                                        {{'To: '.$booking->to()}}
                                    </td>
                                    {{--@endif--}}
                                    <td class="text-center">{{$booking->price}}</td>
                                    <td class="text-center">
                                        @if($booking->user_transaction_id == null)
                                            <a href="{{route('front.booking.confirm', $booking->id)}}" class="btn btn-sm btn-secondary " style="    background-color: #805dca !important;
    border-color: #805dca!important;">
                                                Make Payment
                                            </a>

                                        @else
                                            {{($booking->userTransaction->trans_id == 'Stripe')? 'Paid Online':'Confirmed By Vendor'}}
                                        @endif
                                    </td>
                                    @if($booking->trips == null)
                                        <td class="text-center">
                                            {{'Driver Yet to Assign'}}
                                        </td>
                                    @else

                                        <td class="text-center">
                                            @foreach($booking->trips as $bTrips)
                                            {{$bTrips->driver->name}}
                                            <br>
                                            @endforeach
                                        </td>
                                    @endif

                                    @if(Storage::disk()->exists('public/invoices/customer/invoice_'.$booking->ref_id.'.pdf'))
                                        <td class="text-center">
                                            <a class="btn btn-success delete-booking" target="_blank" href="{{Storage::url('public/invoices/customer/invoice_'.$booking->ref_id.'.pdf')}}"  >
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </td>
                                        <img src="/images/photos/account/{{Auth::user()->account_id}}.png" alt="">
                                    @else
                                        <td class="text-center">
                                            {{'Invoice is yet to create'}}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    @endcan
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    @cannot('Customer')
    <script src= {{ asset("js/theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js") }}></script>
    @endcannot
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
            "order": [[7, 'asc']],
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
        // $('.delete-car').on('click', function () {
        function destroy_booking(booking_id) {
            const bookingName = $('#'+booking_id).attr("data-value");
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success btn-rounded',
                cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'Are you sure you want to delete Booking Number' +bookingName+'?',
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
                        url: '/admin/bookings/delete/'+booking_id,
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
        $('.showBooking').on('click', function () {
           let id = $(this).attr("data-value");
            $.ajax
            ({
                url: '/admin/bookings/show/'+id,
                dataType: 'json',
                data: {"_token": "{{ csrf_token() }}"},
                type: 'post',
                success: function(response)
                {
                    console.log(response)
                    document.getElementById('modal_booking_number').innerText = response.booking.id;
                    document.getElementById('journeyDate').innerText = response.journeyDate;
                    document.getElementById('bookingPrice').innerText = response.price;
                    document.getElementById('bookingFrom').innerText = response.from;
                    document.getElementById('bookingTo').innerText = response.to;
                    document.getElementById('bookingInfo').innerText = response.booking.add_info;
                    document.getElementById('bookingLuggage').innerText = response.booking.luggage+' / '+response.booking.carryon;
                    document.getElementById('bookingAdult').innerText = response.booking.adult+' / '+response.booking.child;
                    document.getElementById('carName').innerText = response.carName;
                    document.getElementById('bookingRefId').innerText = response.booking.ref_id;
                    document.getElementById('bookingPickup').innerText = response.booking.pickup_address;
                    document.getElementById('bookingDropOff').innerText = response.booking.dropoff_address;
                    document.getElementById('bookingTime').innerText = response.booking.pickup_time;
                    document.getElementById('bookingFlightNumber').innerText = response.booking.flight_number;
                    document.getElementById('bookingFlightOrigin').innerText = response.booking.flight_origin;
                    if(response.booking.return == 0)
                    {
                        var x = document.getElementById("return");
                        x.style.display = "none";
                        console.log('no return')
                    }
                    else {
                        var y = document.getElementById("return");
                        y.style.display = "block";
                        document.getElementById('bookingReturnPickup').innerText = response.booking.return_pickup_address;
                        document.getElementById('bookingReturnDropOff').innerText = response.booking.return_dropoff_address;
                        document.getElementById('bookingReturnTime').innerText = response.booking.return_time;
                        document.getElementById('bookingReturnFlight').innerText = response.booking.return_flight_number;
                        document.getElementById('bookingReturnOrigin').innerText = response.booking.return_flight_origin;
                    }
                }
            });

        });
    </script>
@endsection

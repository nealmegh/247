@extends('2Frontend.layout2')

@section('content')
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset("css/theme/widgets/modules-widgets.css" )}}">
    <link href="{{asset("css/theme/elements/miscellaneous.css" )}}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{asset("css/theme/elements/custom-typography.css" )}}" rel="stylesheet" type="text/css" />
    <style>
        /* Variables */
        /** {*/
        /*    box-sizing: border-box;*/
        /*}*/

        body {
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
            display: flex;
            justify-content: center;
            align-content: center;
            /*height: 100vh;*/
            width: 100vw;
        }

        .stripe-form {
            margin-top: 25px !important;
            margin-bottom: 10px !important;
            width: 30vw;
            /*min-width: 500px;*/
            align-self: center;
            box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
            0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
            border-radius: 7px;
            padding: 40px;
        }

        .hidden {
            display: none;
        }

        #payment-message {
            color: rgb(105, 115, 134);
            font-size: 16px;
            line-height: 20px;
            padding-top: 12px;
            text-align: center;
        }

        #payment-element {
            margin-bottom: 24px;
        }

        /* Buttons and links */
        .stripe-button {
            background: #5469d4;
            font-family: Arial, sans-serif;
            color: #ffffff;
            border-radius: 4px;
            border: 0;
            padding: 12px 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: block;
            transition: all 0.2s ease;
            box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
            width: 100%;
        }
        button:hover {
            filter: contrast(115%);
        }
        button:disabled {
            opacity: 0.5;
            cursor: default;
        }

        /* spinner/processing state, errors */
        .spinner,
        .spinner:before,
        .spinner:after {
            border-radius: 50%;
        }
        .spinner {
            color: #ffffff;
            font-size: 22px;
            text-indent: -99999px;
            margin: 0px auto;
            position: relative;
            width: 20px;
            height: 20px;
            box-shadow: inset 0 0 0 2px;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }
        .spinner:before,
        .spinner:after {
            position: absolute;
            content: "";
        }
        .spinner:before {
            width: 10.4px;
            height: 20.4px;
            background: #5469d4;
            border-radius: 20.4px 0 0 20.4px;
            top: -0.2px;
            left: -0.2px;
            -webkit-transform-origin: 10.4px 10.2px;
            transform-origin: 10.4px 10.2px;
            -webkit-animation: loading 2s infinite ease 1.5s;
            animation: loading 2s infinite ease 1.5s;
        }
        .spinner:after {
            width: 10.4px;
            height: 10.2px;
            background: #5469d4;
            border-radius: 0 10.2px 10.2px 0;
            top: -0.1px;
            left: 10.2px;
            -webkit-transform-origin: 0px 10.2px;
            transform-origin: 0px 10.2px;
            -webkit-animation: loading 2s infinite ease;
            animation: loading 2s infinite ease;
        }

        @-webkit-keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @media only screen and (max-width: 600px) {
            .stripe-form {
                width: 75vw;
                min-width: initial;
            }
        }
    </style>
    <div id="content" class="main-content">
        <div class="container" style="margin-top: 160px;">

            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row layout-top-spacing">
                    <div id="jumbotronBasic" class="col-xl-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="jumbotron">
                                        <h2 class="display-4 mb-5  mt-4 text-center text-info" style="font-family: 'Quicksand'; margin-bottom: 10px!important;">Confirm Payment</h2>
                                        <div class="widget widget-account-invoice-three">

                                            <div class="widget-heading">
                                                <div class="wallet-usr-info">
                                                    <div class="usr-name">
                                                        <span><img src="{{ request()->user()->profile_photo_url }}" alt="avatar"> {{$booking->user->name}}</span>
                                                    </div>
                                                    <div class="add">
                                                        <span>Journey Details</span>
                                                    </div>
                                                </div>
                                                <div class="wallet-balance">
                                                    <p>Amount</p>
                                                    <h5 class=""><span class="w-currency">£</span>{{number_format((float)$booking->final_price, 2, '.', '')}}</h5>
                                                </div>
                                                <div class="wallet-balance" style="margin-top: 5px !important;">
                                                    <p>Date</p>
                                                    <h5 class="">{{date('d M Y', strtotime($booking->journey_date))}}</h5>
                                                </div>
                                            </div>

                                            <div class="widget-amount">

                                                <div class="w-a-info funds-received">
                                                    <span>From <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg></span>
                                                    <p>{{$booking->from()}}</p>
                                                </div>

                                                <div class="w-a-info funds-spent">
                                                    <span>To <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span>
                                                    <p>{{$booking->to()}}</p>
                                                </div>
                                            </div>

                                            <div class="widget-content">

{{--                                                <div class="bills-stats" >--}}
{{--                                                    --}}{{--                                    <p>Payment</p>--}}
{{--                                                    <span style="background-color: #0ba360!important;">Payment Processing</span>--}}
{{--                                                </div>--}}

                                                <div class="invoice-list">
                                                    <div class="bills-stats" style="margin-bottom: 5px!important;">

                                                        <span style="background-color: #0e2231!important; color: white"> Main Journey</span>
                                                    </div>
                                                    <div class="inv-detail">
                                                        <div class="info-detail-1">
                                                            <p>Booking ID</p>
                                                            <p><span class="bill-amount">{{$booking->ref_id}}</span></p>
                                                        </div>
                                                        <div class="info-detail-1">
                                                            <p>Pick Up</p>
                                                            <p><span class="bill-amount">{{$booking->pickup_address}}</span></p>
                                                        </div>
                                                        <div class="info-detail-1">
                                                            <p>Drop Off</p>
                                                            <p><span class="bill-amount">{{$booking->dropoff_address}}</span></p>
                                                        </div>
                                                        <div class="info-detail-1">
                                                            <p>Pick Up Time</p>
                                                            <p><span class="bill-amount">{{$booking->pickup_time}}</span></p>
                                                        </div>
                                                        <div class="info-detail-1">
                                                            <p>Flight Number</p>
                                                            <p><span class="bill-amount">{{$booking->flight_number}}</span></p>
                                                        </div>
                                                        <div class="info-detail-1">
                                                            <p>Flight Origin</p>
                                                            <p><span class="bill-amount">{{$booking->flight_origin}}</span></p>
                                                        </div>
                                                        @if($booking->return == 1)
                                                            <div class="bills-stats" style="margin-bottom: 5px!important; margin-top: 5px!important;">

                                                                <span style="background-color: #0e2231!important; color: white"> Return Journey</span>
                                                            </div>
                                                            <div class="info-detail-1">
                                                                <p>Pick Up</p>
                                                                <p><span class="bill-amount">{{$booking->return_pickup_address}}</span></p>
                                                            </div>
                                                            <div class="info-detail-1">
                                                                <p>Drop Off</p>
                                                                <p><span class="bill-amount">{{$booking->return_dropoff_address}}</span></p>
                                                            </div>
                                                            <div class="info-detail-1">
                                                                <p>Pick Up Time</p>
                                                                <p><span class="bill-amount">{{$booking->return_time}}</span></p>
                                                            </div>
                                                            <div class="info-detail-1">
                                                                <p>Flight Number</p>
                                                                <p><span class="bill-amount">{{$booking->return_flight_number}}</span></p>
                                                            </div>
                                                            <div class="info-detail-1">
                                                                <p>Flight Origin</p>
                                                                <p><span class="bill-amount">{{$booking->return_flight_origin}}</span></p>
                                                            </div>
                                                        @endif
                                                        <div class="bills-stats" style="margin-bottom: 5px!important; margin-top: 5px!important;">

                                                            <span style="background-color: #0e2231!important; color: white">Important</span>
                                                        </div>
                                                        <div class="info-detail-1">
                                                            <p>Vehicle</p>
                                                            <p><span class="bill-amount">{{$booking->car->name}}</span></p>
                                                        </div>

                                                        <div class="info-detail-1">
                                                            <p>Adult / Child</p>
                                                            <p><span class="bill-amount">{{$booking->adult}} / {{$booking->child}}</span></p>
                                                        </div>
                                                        <div class="info-detail-1">
                                                            <p>Luggage / Carry On</p>
                                                            <p><span class="bill-amount">{{$booking->luggage}} / {{$booking->carryon}}</span></p>
                                                        </div>
                                                        <div class="info-detail-1">
                                                            <p>Additional Info</p>
                                                            <p><span class="bill-amount">{{$booking->add_info}}</span></p>
                                                        </div>
                                                    </div>
{{--                                                    <span class="warning text-center mt-2" style="color: red; ">Please Contact Office if you can't find any payment Method</span>--}}
                                                    <div class="inv-action" style="margin-bottom: 10px!important;">
                                                        <h5 class="alert text-alert"  style="font-family: 'Quicksand'; color: #f95e5e!important;">Please Contact Office if you can't find any payment Method</h5>
                                                    </div>
                                                    <div class="inv-action">
                                                        <a href="{{route('customer.dashboard')}}" class="btn btn-outline-primary view-details">View Dashboard</a>
                                                        @if($booking->confirm != 1)
                                                        <a href="{{route('front.booking.payment', $booking->id)}}" class="btn btn-outline-primary pay-now">Pay Online</a>
                                                            @if($siteSettings[8]->value != "0" )
                                                                <form class="form-horizontal " novalidate method="POST" action="{{ route('cashPayment') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$booking->id}}">
{{--                                                                    <button style="margin-top: 1px" name="type" value="cash" id="bookingButton" class="btn confirmBtn" type="submit"> {{'Pay Cash'}} </button>--}}
                                                                    <a type="submit" class="btn btn-outline-primary pay-now" style="background: rosybrown!important; color: brown!important;">Pay Cash</a>
                                                                </form>
                                                            @endif
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                                            <input type="hidden" value="{{$booking->final_price}}" id="hiddenPrice">
                                                            <input type="hidden" value="{{$booking->ref_id}}" id="hiddenID">
                                                            <input type="hidden" value="{{$booking->from()}}" id="hiddenFrom">
                                                            <input type="hidden" value="{{$booking->to()}}" id="hiddenTo">
                                                            <input type="hidden" value="{{$booking->id}}" id="hiddenBId">

                                        {{--                    @if($booking->confirm != 1)--}}
                                        {{--                        <div class="col-md-12 col-sm-12">--}}
                                        {{--                            <span class="warning text-center mt-2" style="color: red; ">Please Contact Office if you can't find any payment Method</span>--}}
                                        {{--                        </div>--}}
                                        {{--                    @endif--}}



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
{{--    <script src="https://www.paypalobjects.com/api/checkout.js"></script>--}}
<script src={{asset("js/theme/plugins/sweetalerts/sweetalert2.min.js")}}></script>
<script src={{asset("js/theme/plugins/sweetalerts/custom-sweetalert.js")}}></script>

<script>
    $( document ).ready(function() {
        console.log( "ready!" );
        $('html, body').animate({
            scrollTop: $("#confirm").offset().top
        }, 2000);
    });
</script>
@append

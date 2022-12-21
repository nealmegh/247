@extends('2Frontend.layout2')

@section('content')
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
    <style>
        /* Variables */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
            display: flex;
            justify-content: center;
            align-content: center;
            height: 100vh;
            width: 100vw;
        }

        form {
            width: 30vw;
            min-width: 500px;
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
        button {
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
            form {
                width: 80vw;
                min-width: initial;
            }
        }
    </style>
    <section id="confirm" class="booking-form" style="margin-top: 160px;" >
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container confirm">
            <div class="row confirm">
                <div class="col-md-12 col-sm-12">
                    <div class="text-center" >
                        <h2>Please Confirm your payment</h2>
                    </div>
                    <div class="text-align-left " style="text-align: left !important; margin-top: 15px !important;">
                        <h3>Journey Details:</h3>
                        <h4>Booking ID: {{$booking->ref_id}}</h4>
                        <h4>Journey Date: {{date('d M Y', strtotime($booking->journey_date))}}</h4>
                        <h4>Journey From: {{$booking->from()}}</h4>
                        <h4>Journey To: {{$booking->to()}}</h4>
                        <h4>Amount to Pay: <strong>£{{$booking->final_price}}</strong></h4>
                    </div>

                    <input type="hidden" value="{{$booking->final_price}}" id="hiddenPrice">
                    <input type="hidden" value="{{$booking->ref_id}}" id="hiddenID">
                    <input type="hidden" value="{{$booking->from()}}" id="hiddenFrom">
                    <input type="hidden" value="{{$booking->to()}}" id="hiddenTo">
                    <input type="hidden" value="{{$booking->id}}" id="hiddenBId">

                        <h3 class="text-center" style="color: green"> Thank you for your payment !!!</h3>
                    <a type="button" class="text-center btn-primary" href="{{route('customer.dashboard')}}">Dashboard</a>

                    @if($booking->confirm != 1)
                        <div class="col-md-12 col-sm-12">
                            {{--{{dd($siteSettings[8]-)}}--}}

                            {{--<form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('paypalPayment') }}">--}}
                            {{--@csrf--}}
                            {{--<input type="hidden" name="amount" value="{{$booking->final_price}}">--}}
                            {{--<input type="hidden" name="booking_id" value="{{$booking->id}}">--}}
                            {{--<button style="margin-top: 1px" name="type" value="paypal" id="bookingButton2" class="btn confirmBtn" type="submit">{{'Pay By Paypal'}}</button>--}}
                            {{--</form>--}}
                            {{--                        <div id="paypal-button"></div>--}}


                            <span class="warning text-center mt-2" style="color: red; ">Please Contact Office if you can't find any payment Method</span>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    {{--    <script src="https://www.paypalobjects.com/api/checkout.js"></script>--}}
    <script src={{asset("js/theme/plugins/sweetalerts/sweetalert2.min.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/custom-sweetalert.js")}}></script>

@append

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
                        <div class="statbox widget box box-shadow" style="border: none!important; box-shadow: none!important;">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="jumbotron" style="background-color: white">
                                        <h2 class="display-4 mb-5  mt-4 text-center text-info" style="font-family: 'Quicksand'; margin-bottom: 10px!important;">Make Payment</h2>
                                        <h5 class="display-4 mb-5  mt-4 text-center text-info" style="font-family: 'Quicksand'; margin-bottom: 10px!important;">£{{number_format((float)$booking->final_price, 2, '.', '')}}</h5>

                                        <input type="hidden" value="{{$booking->final_price}}" id="hiddenPrice">
                                        <input type="hidden" value="{{$booking->ref_id}}" id="hiddenID">
                                        <input type="hidden" value="{{$booking->from()}}" id="hiddenFrom">
                                        <input type="hidden" value="{{$booking->to()}}" id="hiddenTo">
                                        <input type="hidden" value="{{$booking->id}}" id="hiddenBId">

                                        @if($booking->confirm != 1)
                                                <form class="stripe-form" id="payment-form" method="POST" action="{{ route('front.payment.confirm' , $booking->id) }}" style=" margin: auto;
  width: 100%;
  padding: 10px;">
                                                    @csrf
                                                    <input type="hidden" id="email" value="{{$booking->user->email}}" />
                                                    <div id="payment-element">
                                                        <!--Stripe.js injects the Payment Element-->
                                                    </div>
                                                    <button id="submit" class="stripe-button bg-gray-900 text-white px-4 py-2 rounded">
                                                        <div class="spinner hidden" id="spinner"></div>
                                                        <span id="button-text">Pay now</span>
                                                    </button>
                                                    <div id="payment-message" class="hidden"></div>

                                                </form>
                                        @endif
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
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        {{--const client_secret = {!!json_encode($client_secret)!!};--}}
        // This is your test publishable API key.
        // const stripe = Stripe("pk_test_umbmLGiWZ1lpRsbyK4nPjpq1");
        // var elements = stripe.elements();

        // This is your test publishable API key.
        const stripe = Stripe("pk_test_umbmLGiWZ1lpRsbyK4nPjpq1");


        let elements;

        initialize();
        checkStatus();

        document
            .querySelector("#payment-form")
            .addEventListener("submit", handleSubmit);

        // Fetches a payment intent and captures the client secret
        function initialize() {

            elements = stripe.elements({ clientSecret: '{{$intent->client_secret}}' });

            const paymentElementOptions = {
                layout: "tabs",
            };

            const paymentElement = elements.create("payment", paymentElementOptions);
            paymentElement.mount("#payment-element");
        }

        async function handleSubmit(e) {
            e.preventDefault();
            // setLoading(true);

            const { error } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: "{{route('front.payment.confirm', $booking->id)}}",
                    receipt_email: document.getElementById("email").value,
                },

            });

            // This point will only be reached if there is an immediate error when
            // confirming the payment. Otherwise, your customer will be redirected to
            // your `return_url`. For some payment methods like iDEAL, your customer will
            // be redirected to an intermediate site first to authorize the payment, then
            // redirected to the `return_url`.
            // if (error) {
            if (error.type === "card_error" || error.type === "validation_error") {
                showMessage(error.message);
            } else {
                showMessage("An unexpected error occured.");
            }
            // } else {
            //     // console.log(setupIntent)
            //     var form = document.getElementById('payment-form');
            //     var hiddenInput = document.createElement('input');
            //     hiddenInput.setAttribute('type', 'hidden');
            //     hiddenInput.setAttribute('name', 'paymentMethod');
            //     // hiddenInput.setAttribute('value', setupIntent.payment_method);
            //     form.appendChild(hiddenInput);
            //     // Submit the form
            //     form.submit();
            // }

            setLoading(false);
        }

        // Fetches the payment intent status after payment submission
        async function checkStatus() {
            const clientSecret = new URLSearchParams(window.location.search).get(
                "payment_intent_client_secret"
            );

            if (!clientSecret) {
                return;
            }

            const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

            switch (paymentIntent.status) {
                case "succeeded":
                    showMessage("Payment succeeded!");
                    break;
                case "processing":
                    showMessage("Your payment is processing.");
                    break;
                case "requires_payment_method":
                    showMessage("Your payment was not successful, please try again.");
                    break;
                default:
                    showMessage("Something went wrong.");
                    break;
            }
        }

        // ------- UI helpers -------

        function showMessage(messageText) {
            const messageContainer = document.querySelector("#payment-message");

            messageContainer.classList.remove("hidden");
            messageContainer.textContent = messageText;

            setTimeout(function () {
                messageContainer.classList.add("hidden");
                messageText.textContent = "";
            }, 4000);
        }

        // Show a spinner on payment submission
        function setLoading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("#submit").disabled = true;
                document.querySelector("#spinner").classList.remove("hidden");
                document.querySelector("#button-text").classList.add("hidden");
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#button-text").classList.remove("hidden");
            }
        }
    </script>
    <script>
        $( document ).ready(function() {
            console.log( "ready!" );
            $('html, body').animate({
                scrollTop: $("#confirm").offset().top
            }, 2000);
        });
    </script>
@append

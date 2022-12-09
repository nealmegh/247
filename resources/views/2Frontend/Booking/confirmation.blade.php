@extends('2Frontend.layout2')

@section('content')
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
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



                    @if($booking->confirm != 1)
                    <div class="col-md-12 col-sm-12">
                        {{--{{dd($siteSettings[8]-)}}--}}
                        @if($siteSettings[8]->value != "0" )
                        <form class="form-horizontal " novalidate method="POST" action="{{ route('cashPayment') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$booking->id}}">
                            <button style="margin-top: 1px" name="type" value="cash" id="bookingButton" class="btn confirmBtn" type="submit"> {{'Pay Cash'}} </button>
                        </form>
                        @endif
                        {{--<form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('paypalPayment') }}">--}}
                            {{--@csrf--}}
                            {{--<input type="hidden" name="amount" value="{{$booking->final_price}}">--}}
                            {{--<input type="hidden" name="booking_id" value="{{$booking->id}}">--}}
                            {{--<button style="margin-top: 1px" name="type" value="paypal" id="bookingButton2" class="btn confirmBtn" type="submit">{{'Pay By Paypal'}}</button>--}}
                        {{--</form>--}}
{{--                        <div id="paypal-button"></div>--}}
                        @if($siteSettings[19]->value != 0)
                            <div class="row " >
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-6">
                                    <div id="paypal-button-container"></div>
                                </div>

                            </div>
                        @endif
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
    <script src="https://www.paypal.com/sdk/js?client-id=Acs1O45WH2Du5S_DV8tIGvBpxohveeYybk7NEC0Mb0uhI95Fk9N9uyq2ixbRNy9_K4W_YBcGs1DlFyKr&currency=GBP&commit=true"></script>
<script>
    let amount = document.getElementById('hiddenPrice').value;
    let ref_id = document.getElementById('hiddenID').value;

    let j_t = document.getElementById('hiddenTo').value;
    let j_f = document.getElementById('hiddenTo').value;
    const bId = document.getElementById('hiddenBId').value;
    paypal.Buttons({
        style: {
            layout: 'vertical',
            color:  'silver',
            shape:  'rect',
            label:  'paypal'
        },
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({

                purchase_units: [{
                    reference_id: ref_id,
                    amount: {
                        value: amount // Can also reference a variable or function
                    },
                    // amount: {
                    //
                    //     currency_code: "GBP",
                    //     value: amount,
                    //     breakdown: {
                    //         item_total: {
                    //             currency_code: "GBP",
                    //             value: amount
                    //         }
                    //     }
                    // },
                    // items: [
                    //     {
                    //         name: "247 Airport Express Booking",
                    //         description: "The best item ever",
                    //         sku: ref_id,
                    //         unit_amount: {
                    //             currency_code: "GBP",
                    //             value: amount
                    //         },
                    //         quantity: "1"
                    //     },
                    // ]

                }],
                commit: true
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                $.ajax({
                    type: 'POST',
                    url: "/payment-status/"+bId,
                    data: {"_token": "{{ csrf_token() }}", "transaction_id": transaction.id},
                    success: function (results) {
                        if (results) {
                            swal({
                                title: 'Success!',
                                text: "Your Payment Went trough!",
                                type: 'success',
                                confirmButtonText: 'Okay',
                                padding: '2em',
                                showLoaderOnConfirm: true,
                            }).then(function (response){
                                window.location.href ='/customer/dashboard';
                            })
                        } else {
                            alert("Error!");
                        }
                    }
                });
                // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }
    }).render('#paypal-button-container');
</script>
{{--    <script>--}}
{{--        paypal.Button.render({--}}
{{--            env: 'production', // Or 'production'--}}
{{--            // Set up the payment:--}}
{{--            // 1. Add a payment callback--}}

{{--            payment: function(data, actions) {--}}
{{--                var id = {!! json_encode($booking->id) !!};--}}

{{--                // 2. Make a request to your server--}}
{{--                return actions.request.post('/api/create-payment', {--}}
{{--                        booking_id: id--}}
{{--                })--}}
{{--                    .then(function(res) {--}}
{{--                        // 3. Return res.id from the response--}}
{{--                        return res.id;--}}
{{--                    });--}}
{{--            },--}}
{{--            // Execute the payment:--}}
{{--            // 1. Add an onAuthorize callback--}}
{{--            onAuthorize: function(data, actions) {--}}
{{--                var id = {!! json_encode($booking->id) !!};--}}
{{--                // 2. Make a request to your server--}}
{{--                return actions.request.get('/api/execute-payment/?paymentID='+data.paymentID+'&payerID='+data.payerID, {--}}
{{--                    paymentID: data.paymentID,--}}
{{--                    payerID:   data.payerID,--}}

{{--                })--}}
{{--                    .then(function(res) {--}}
{{--                        if (res.error === 'INSTRUMENT_DECLINED') {--}}
{{--                            return actions.restart();--}}
{{--                        }--}}
{{--                        alert("Payment Successful.");--}}
{{--                        console.log(res.id);--}}
{{--                        window.location.href = "/payment-status?paymentId="+res.id+"&booking_id="+id+"&type=user";--}}
{{--                    });--}}
{{--            }--}}
{{--        }, '#paypal-button');--}}
{{--    </script>--}}
<script>
    $( document ).ready(function() {
        console.log( "ready!" );
        $('html, body').animate({
            scrollTop: $("#confirm").offset().top
        }, 2000);
    });
</script>
@append

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title> {{$siteSettings[9]->value}}</title>
    <meta name="csrf-token" content="uWN74NTsTx3LtBD28NBkLqF4OCJHUUK7sboxUvVE">
    <meta name="author" content="247 Airport Express">
    <meta name="keywords" content="taxi in cambridge, 247 airport transfer, cheapest airport transfer in cambridge, 247 airport taxi near me, cambridge to heathrow taxi, heathrow transfer"><meta name="description" content="Taxi in Cambridge is the most reliable and cheapest airport transfer service in Cambridge.  Book us online for best fare to any airport transfer taxi service from Cambridge.">
    <!-- Mobile Specific Metas
     TrustBox script -->
    <!-- FAVICON LINK -->
    <link rel="shortcut icon" type="image/x-icon" href="http://cambridgetaxihire.co.uk/images/2Frontend/favicon.png">
    <!-- BOOTSTRAP -->

    <style>

        .table>tbody>tr>td, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
            padding: 5px;
            line-height: 1;
            vertical-align: top;
            border-top: 0 solid transparent;
        }
        .table>tbody>tr>th{
            padding: 12px 3px;
            line-height: 1;
            vertical-align: top;
        }
        .table.bordered>tbody>tr>th{
            border-bottom: 2px solid #000;

        }
        .table>tbody>tr>th{
            border-top: 0 solid transparent;
        }
        .table.bordered{
            border: 2px solid #000;
            border-collapse: collapse;
        }
        .td-top-border{
            border-top: 2px solid #000 !important;
            display: block;
            margin-bottom: 8px;
        }
        .text-right{
            text-align:right;
        }
        body{
            font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;
        }
    </style>

</head>
<body>

<!-- Navigation -->


<!-- Page Content -->
<div class="container">
    <table style="margin:0 auto">
        <tr>
            <td><img src="{{ url('/images/2Frontend/logo.png') }}" alt="" style="margin:0 auto;"></td>
        </tr>
        <tr>
            <td>247 Airport Express, Samif Ltd <br>
                72 Watermead, Barhill, CB23 8TL</td>
        </tr>
        <tr>
            <td>Tel:  01223 247 247</td>
        </tr>
        <tr>
            <td>Email:	info247ae@gmail.com</td>
        </tr>
    </table>

    <table style="width: 100%;
">
        <tbody><tr>
            <td style="width: 50%;">

                <table style="width: 80%;border: 2px solid #000;padding: 5px;border-radius: 10px;">
                    <tbody><tr>
                        <td>{{$bill->invoices[0]->trip->driver->name}}</td>
                    </tr>
                    <tr>
                        <td>{{$bill->invoices[0]->trip->driver->vehicle_reg}}</td>
                    </tr>
                    <tr>
                        <td>{{$bill->invoices[0]->trip->driver->phone_number}}</td>
                    </tr>

                    </tbody
                    ></table>



            </td>
            <td>

                <table class="table">
                    <tbody><tr>
                        <td><h3>STATEMENT</h3></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Statement No.</td>
                        <td>{{$bill->id}}</td>
                    </tr>
                    <tr>
                        <td>Statement date</td>
                        <td>{{$bill->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Driver No.</td>
                        <td>{{$bill->invoices[0]->trip->driver->name}}</td>
                    </tr>
                    </tbody></table>



            </td>
        </tr>
        </tbody></table>


    <div class="row" style="margin-top:40px;">
        <div class="col-md-12 text-center">

            <div class="table-responsive">
                <table class="table bordered">
                    <tr>

                        <th>NO.</th>
                        <th>Invoice ID</th>
                        <th>Driver</th>
                        <th>Passenger</th>
                        <th>Trip Info</th>
                        <th>Paid Through</th>
                        <th>Commission</th>
                        <th>Amount</th>
                        <th>Payable</th>
                    </tr>
                    <?php $count = 1;
                    //                $driver_payable = 0;
                    //                $company_payable = 0;
                    $total_commission = 0;
                    $total_payable = 0;
                    $total_amount = 0;
                    ?>
                    @foreach($bill->invoices as $invoice)
                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$invoice->id}}</td>
                            <td>{{$invoice->trip->driver->name}}<br>
                                {{$invoice->trip->driver->phone_number}}
                            </td>
                            <td>{{$invoice->booking->user->name}}<br>{{$invoice->booking->user->phone}} </td>
                            <td>{{$invoice->booking_from}}<br>
                                {{$invoice->booking_to}}</td>
                            <td>{{$invoice->payment_type}}</td>
                            <td>@if($invoice->payment_type == 'Third Party')
                                    {{'0%'}}
                                @else
                                    {{$invoice->trip->driver->commission.'%'}}
                                @endif
                            </td>
                            @if($invoice->payment_type == 'Cash' || $invoice->payment_type == 'Pay In Car')
                                <td>-{{round($invoice->total_amount, 2)}}<span class="currency">£</span></td>
                            @else
                                <td>{{round($invoice->total_amount, 2)}}<span class="currency">£</span></td>
                            @endif
                            @if($invoice->payment_type == 'Pay In Car' || $invoice->payment_type == 'Cash')
                                <td>-{{round(($invoice->total_amount*$invoice->trip->driver->commission)/100, 2)}}<span class="currency">£</span></td>
                                @php $total_commission +=  ( $invoice->total_amount*$invoice->trip->driver->commission)/100;
                                $total_payable = $total_payable - ($invoice->total_amount*$invoice->trip->driver->commission)/100;
                                $total_amount = $total_amount+$invoice->total_amount;
                                $total_commission = round($total_commission, 2);
                                $total_payable = round($total_payable, 2);
                                $total_amount = round($total_amount, 2);

                                @endphp
                            @else
                                @if($invoice->payment_type == 'Third Party')
                                    <td>{{round($invoice->total_amount-0, 2)}}<span class="currency">£</span></td>
                                    <?php $total_commission = $total_commission + 0;
                                    $total_payable = $total_payable + ($invoice->total_amount);
                                    $total_amount = $total_amount+$invoice->total_amount;
                                    $total_commission = round($total_commission, 2);
                                    $total_payable = round($total_payable, 2);
                                    $total_amount = round($total_amount, 2);
                                    ?>
                                @else
                                    <td>{{round($invoice->total_amount-($invoice->total_amount*$invoice->trip->driver->commission)/100, 2)}}<span class="currency">£</span></td>
                                    <?php $total_commission = $total_commission +($invoice->total_amount*$invoice->trip->driver->commission)/100;
                                    $total_payable = $total_payable + ($invoice->total_amount - ($invoice->total_amount*$invoice->trip->driver->commission)/100);
                                    $total_amount = $total_amount+$invoice->total_amount;
                                    $total_commission = round($total_commission, 2);
                                    $total_payable = round($total_payable, 2);
                                    $total_amount = round($total_amount, 2);
                                    ?>
                                @endif
                            @endif
                        </tr>
                        <?php $count ++ ; ?>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><span class="td-top-border"></span>{{$total_amount}}</td>
                        <td class="text-right"><span class="td-top-border"></span>{{$total_payable}}</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>

    <div class="row" style="padding: 0;margin-top: 40px;">

        <table class="table">
            <tbody><tr>
                <td colspan="4"><strong>{{$bill->invoices[0]->trip->driver->commission}}% Acc Commission</strong></td>
            </tr>
            <tr>
                <td>Total Driver Statement</td>
                <td>&pound; {{$total_amount}}</td>
                <td>{{$bill->invoices[0]->trip->driver->commission}}% Acc Commission</td>
                <td>&pound; {{$total_commission}}</td>
            </tr>
            </tbody></table>



    </div>


    <table  style="width:70%">
        <tr>
            @if($total_payable > 0)
            <td>
                <p style="width:90%;display:block;float:right;text-align:center;border:2px solid #000;font-weight:bold;padding: 10px;font-size: 20px;">Company due to pay &pound; {{$total_payable}}</p>
            </td>
            @else
                <td>
                    <p style="width:90%;display:block;float:right;text-align:center;border:2px solid #000;font-weight:bold;padding: 10px;font-size: 20px;">Driver due to pay &pound; {{$total_payable}}</p>
                </td>
            @endif
        </tr>
        <tr>
            <td>
                <p style="width:90%;display:block;float:right;text-align:center;font-weight:bold;font-size: 20px;">Total Amount &pound;{{$total_payable}}</p>
            </td>
        </tr>
    </table>



    <!-- Bootstrap core JavaScript -->
{{--    <script src="vendor/jquery/jquery.slim.min.js"></script>--}}
{{--    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}


</div>

</body>
</html>

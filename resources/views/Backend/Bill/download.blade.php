<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$siteSettings[9]->value}}</title>

    <!-- Fonts -->
{{--    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">--}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset("css/theme/apps/invoice-preview.css" )}}" rel="stylesheet" type="text/css" />

</head>
<body>
                    <div class="invoice-container">
                        <div class="invoice-inbox">

                            <div id="ct" class="">

                                <div class="invoice-00001" id="invoice01" style="">
                                    <div class="content-section" id="invoice_ready" style="">

        <div class="inv--head-section inv--detail-section" style="padding-top: 36px !important;">

            <div class="row">

                <div class="col-sm-6 col-12 mr-auto">
                    <div class="d-flex">
                        <img class="company-logo" src="{{public_path("img/logo1.png")}}" alt="company" style="width: 15%;">
                        <h3 class="in-heading align-self-center">{{$siteSettings[9]->value}}</h3>
                    </div>
                </div>

                <div class="col-sm-6 text-sm-right">
                    <p class="inv-list-number"><span class="inv-title">Bill : </span> <span class="inv-number">{{$bill->id}}</span></p>
                </div>

                <div class="col-sm-6 align-self-center mt-3">
                    <p class="inv-street-addr">{{$siteSettings[6]->value}}</p>
                    <p class="inv-email-address">{{$siteSettings[4]->value}}</p>
                    <p class="inv-email-address">{{$siteSettings[5]->value}}</p>
                </div>
                <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                    <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">{{date('d M Y', strtotime($bill->created_at))}}</span></p>
                    <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">{{date('d M Y', strtotime($dueTime))}}</span></p>
                </div>

            </div>

        </div>

        <div class="inv--detail-section inv--customer-detail-section" style="">

            <div class="row">

                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                    <p class="inv-to">Invoice To</p>
                </div>

                {{--                                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 inv--payment-info">--}}
                {{--                                                            <h6 class=" inv-title">Payment Info:</h6>--}}
                {{--                                                        </div>--}}

                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                    <p class="inv-customer-name">{{$bill->invoices[0]->trip->driver->name}}</p>
                    <p class="inv-street-addr">{{$bill->invoices[0]->trip->driver->vehicle_reg}}</p>
                    {{--                                                            <p class="inv-email-address">redq@company.com</p>--}}
                    <p class="inv-email-address">{{$bill->invoices[0]->trip->driver->phone_number}}</p>
                </div>

                {{--                                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1">--}}
                {{--                                                            <div class="inv--payment-info">--}}
                {{--                                                                <p><span class=" inv-subtitle">Bank Name:</span> <span>Bank of America</span></p>--}}
                {{--                                                                <p><span class=" inv-subtitle">Account Number: </span> <span>1234567890</span></p>--}}
                {{--                                                                <p><span class=" inv-subtitle">SWIFT code:</span> <span>VS70134</span></p>--}}
                {{--                                                                <p><span class=" inv-subtitle">Country: </span> <span>United States</span></p>--}}

                {{--                                                            </div>--}}
                {{--                                                        </div>--}}

            </div>

        </div>

        <div class="inv--product-table-section" style="margin-left:  25px; width: 95% !important;">
            <div class="table-responsive">
                <table class="table">
                    <thead class="">
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Invoice ID</th>
                        <th class="text-right" scope="col">Trip Info</th>
                        <th class="text-right" scope="col">Paid Through</th>
                        <th class="text-right" scope="col">Commission</th>
                        <th class="text-right" scope="col">Amount</th>
                        <th class="text-right" scope="col">Payable</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
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
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="inv--total-amounts">

            <div class="row mt-4">
                <div class="col-sm-5 col-12 order-sm-0 order-1">
                </div>
                <div class="col-sm-7 col-12 order-sm-1 order-0">
                    <div class="text-sm-right">
                        <div class="row">
                            <div class="col-sm-8 col-7">
                                <p class="">JobTotal: </p>
                            </div>
                            <div class="col-sm-4 col-5">
                                <p class="">&pound; {{$total_amount}}</p>
                            </div>
                            <div class="col-sm-8 col-7">
                                <p class=" discount-rate">Driver Acc Commission <span class="discount-percentage"><strong>{{$bill->invoices[0]->trip->driver->commission}}%</strong></span> </p>
                            </div>
                            <div class="col-sm-4 col-5">
                                <p class="">&pound; {{$total_commission}}</p>
                            </div>
                            <div class="col-sm-8 col-7">
                                <p class=" discount-rate">{{(($total_payable > 0) ? 'Company Payable' : 'Driver Payable')}}</p>
                            </div>
                            <div class="col-sm-4 col-5">
                                <p class="">&pound; {{$total_payable}}</p>
                            </div>



                            <div class="col-sm-8 col-7 grand-total-title">
                                <h4 class="">Grand Total : </h4>
                            </div>
                            <div class="col-sm-4 col-5 grand-total-amount">
                                <h4 class="">&pound;{{$total_payable}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="inv--note">

            <div class="row mt-4">
                <div class="col-sm-12 col-12 order-sm-0 order-1">
                    <p>Note: Thank you for doing Business with us.</p>
                </div>
            </div>
        </div>
    </div>
                                </div>

                            </div>


                        </div>

                    </div>



</body>
</html>

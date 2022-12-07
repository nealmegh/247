<!doctype html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <title>Invoice V3</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
        }
        table{
            border-collapse: collapse;
        }
        #firstrow td,#firstrow td * {
            color: #ffffff;
        }

        #thirdrow td{
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }
        table td{
            padding: 10px 0;
        }
        #firstrow td, #secondrow td {
            padding: 5px 0;
        }
        body{
            font-family: Georgia, "Times New Roman", Times, serif;
        }

    </style>
</head>

<body>

<table style="width:100%">
    <tr style="background-color:#444444;">
        <td id="firstrow" style="border-bottom: 3px solid rgb(255, 77, 77);">
            <table style="width:100%">
                <tr>
                    <td>    Samif Ltd</td>
                    <td>01223 247 247</td>
                    <td>72 water mead, Cambridge, CB238TL</td>
                </tr>
                <tr>
                    <td rowspan="2"><h2 style="margin: 0">INVOICE</h2></td>
                    <td>info247ae@gmail.com</td>
                    <td>www.cambridgetaxihire.co.uk</td>
                </tr>

            </table>



        </td>
    </tr>
    <tr>
        <td id="secondrow">
            <table style="width: 95%;margin: 30px;">
                <tr>
                    <td>Bill to:</td>
                    <td>Bill number:</td>
                    <td>Bill Total</td>
                </tr>
                <tr>
                    <td>{{$bill->invoices[0]->booking->driver?->name}}</td>
                    <td># {{$bill->id}}</td>
                    <td><h2 style="margin: 0;">{{$bill->total_payable}} £</h2></td>
                </tr>
                <tr>
                    {{--<td>Client Adress spanning on two rows hopefully.</td>--}}
                    <td>Date of Issue:<br>{{date('d/m/Y')}}</td>
                    <td></td>
                </tr>
                <tr>
                    {{--<td>VAT ID: 12091803</td>--}}
                    {{--<td></td>--}}
                    <td>Due Date: {{date('d/m/Y')}}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td id="thirdrow">
            <table style="width: 95%;margin: 30px;border-top: 3px solid rgb(255, 77, 77);">

                <tr>
                    <td>NO.</td>
                    <td>Invoice ID</td>
                    <td>Driver</td>
                    <td>Passenger</td>
                    <td>Trip Info</td>
                    <td>Paid Through</td>
                    <td>Commission</td>
                    <td>Amount</td>
                    <td>Payable</td>
                </tr>
                <?php $count = 1;
//                $driver_payable = 0;
//                $company_payable = 0;
                $total_commission = 0;
                $total_payable = 0;
                ?>
                @foreach($bill->invoices as $invoice)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$invoice->id}}</td>
                        <td>{{$invoice->booking->driver?->name}}<br>
                            {{$invoice->booking->driver?->phone_number}}
                        </td>
                        <td>{{$invoice->booking->user?->name}}<br>{{$invoice->booking->user->phone}} </td>
                        <td>{{$invoice->booking_from}}<br>
                            {{$invoice->booking_to}}</td>
                        <td>{{$invoice->payment_type}}</td>
                        <td>@if($invoice->payment_type == 'Third Party')
                                {{'0%'}}
                            @else
                                {{$invoice->booking->driver?->commission.'%'}}
                            @endif
                        </td>
                        @if($invoice->payment_type == 'Cash')
                             <td class="text-right">-{{$invoice->total_amount}}<span class="currency">£</span></td>
                        @else
                            <td class="text-right">{{$invoice->total_amount}}<span class="currency">£</span></td>
                        @endif
                        @if($invoice->payment_type == 'Pay In Car')
                            <td class="text-right">-{{$invoice->total_amount-($invoice->total_amount*$invoice->booking->driver?->commission)/100}}<span class="currency">£</span></td>
                            <?php $total_commission = $total_commission + ($invoice->total_amount*$invoice->booking->driver?->commission)/100;
                            $total_payable = $total_payable - ($invoice->total_amount-$total_commission);

                            ?>
                        @else
                            @if($invoice->payment_type == 'Third Party')
                                <td class="text-right">{{$invoice->total_amount-0}}<span class="currency">£</span></td>
                                <?php $total_commission = $total_commission + 0;
                                $total_payable = $total_payable + ($invoice->total_amount - $total_commission);
                                ?>
                            @else
                                <td class="text-right">{{$invoice->total_amount-($invoice->total_amount*$invoice->booking->driver?->commission)/100}}<span class="currency">£</span></td>
                                <?php $total_commission = $total_commission +($invoice->total_amount*$invoice->booking->driver?->commission)/100;
                                $total_payable = $total_payable + ($invoice->total_amount - $total_commission);
                                ?>
                            @endif
                        @endif
                    </tr>
                    <?php $count ++ ; ?>
                @endforeach


            </table>
        </td>
    </tr>
    <tr>
        <td id="fourthrow">
            <table style="width: 95%;margin: 30px;">

                <tr>
                    <td>Invoice Summary & Notes</td>
                    {{--<td>Sub <span style="float:right">{{}}</span></td>--}}
                </tr>
                <tr>
                    {{--<td rowspan="4">Lorem Ipsum</td>--}}
                    {{--<td>VAT <span style="float:right">1111</span></td>--}}
                </tr>
                {{--<tr>--}}
                    {{--<td>TAX <span style="float:right">1111</span></td>--}}
                {{--</tr>--}}
                <tr>
                    <td>Commission <span style="float:right">{{$total_commission}}</span></td>
                </tr>
                <tr>
                    <td style="background: #444;padding: 10px;color: #fff;font-size: 18pt;border-bottom: 3px solid #ff4d4d;">
                        Total <span style="float:right">{{$total_payable}}</span></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td><p style="text-align: center;">Taxes will be calculated in £ regarding transport and other taxable services.</p></td>
    </tr>
</table>


</body></html>

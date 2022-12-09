<!DOCTYPE html>
<html lang="en">
<head>
    <title>247</title>
    <link href="https://fonts.cdnfonts.com/css/nunito" rel="stylesheet">
    <style type="text/css">
        /*body{*/
        /*    font-family: 'Roboto Condensed', sans-serif;*/
        /*}*/
        .m-0{
            margin: 0px;
        }
        .p-0{
            padding: 0px;
        }
        .pt-5{
            padding-top:5px;
        }
        .mt-10{
            margin-top:10px;
        }
        .text-center{
            text-align:center !important;
        }
        .w-100{
            width: 100%;
        }
        .w-50{
            width:50%;
        }
        .w-85{
            width:85%;
        }
        .w-15{
            width:15%;
        }
        .logo img{
            width:150px;
            height:45px;
            padding-top:5px;
        }
        .logo span{
            margin-left:8px;
            top:19px;
            position: absolute;
            font-weight: bold;
            font-size:25px;
        }
        .gray-color{
            color:#5D5D5D;
        }
        .text-bold{
            font-weight: bold;
        }
        .border{
            border:1px solid black;
        }
        .table2 tr,th,td{
            border-collapse:collapse;
            padding:7px 8px;
            border-left: 0px solid !important;
            border-right: 0px solid !important;
            border-top: 0px solid !important;
            border-bottom: 0px solid !important;
        }
        table tr,th,td{
            border: 1px solid #d2d2d2;
            border-collapse:collapse;
            padding:7px 8px;
            border-left: 0px solid !important;
            border-right: 0px solid !important;
        }
        .text-center{
            text-align: center;
        }
        table tr th{
            background: #F4F4F4;
            font-size:15px;
        }
        table tr td{
            font-size:13px;
        }
        table{
            border-collapse:collapse;
        }
        .box-text p{
            line-height:10px;
        }
        .float-left{
            float:left;
        }
        .total-part{
            font-size:16px;
            line-height:12px;
        }
        .total-right p{
            padding-right:20px;
        }
        .float-container{

        }
        .float-right{
            float: right;
            text-align: right;
        }
        body {
            font-family: 'Nunito';
        }
        .address{
            width: 100% !important;
            margin: 5px !important;
        }
        .pt-12{
            padding-top: 120px !important;
        }
        .footer {
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left logo mt-10">
        <div>
            <img class="w-50 float-left" src="{{asset("img/logo1.png")}}" alt="company">
            {{--        <h3 class="in-heading align-self-center">{{$siteSettings[9]->value}}</h3>--}}
            <h3 class="float-left" style="padding-left: 170px !important;">{{$siteSettings[9]->value}}</h3>
        </div>
        <div class="float-left" style="padding-top: 50px !important;">
            <p class="m-0 pt-5 w-100 ">{{$siteSettings[6]->value}}</p>
            <p class="m-0 pt-5 w-100">{{$siteSettings[4]->value}}</p>
            <p class="m-0 pt-5 w-100">{{$siteSettings[5]->value}}</p>
        </div>
    </div>
    <div class="w-50 float-right mt-10">
        <p class="m-0 pt-5 text-bold w-100">Booking Reference: <span class="" style="color: dodgerblue">{{$booking->ref_id}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Invoice Date: <span class="gray-color">{{date('d M Y', strtotime($invoices[0]->created_at))}}</span></p>
{{--        <p class="m-0 pt-5 text-bold w-100">Due Date: <span class="gray-color">{{date('d M Y', strtotime($dueTime))}}</span></p>--}}
    </div>

    <div style="clear: both;"></div>
</div>
<hr>
<div class="float-left w-100" style="padding-top: 20px !important;">
    <p class="m-0 pt-5 w-100">To</p>
    <p class="m-0 pt-5 w-100">Name: {{$invoices[0]->customer_name}}</p>
    <p class="m-0 pt-5 w-100">Email: {{$invoices[0]->customer_email}}</p>
    <p class="m-0 pt-5 w-100">Phone: {{$invoices[0]->customer_phone}}</p>
</div>


<div class="table-section bill-tbl w-100 mt-10 pt-12">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">S.No</th>
{{--            <th class="w-50">Invoice ID</th>--}}
            <th class="w-50" >Trip Info</th>
{{--            <th class="w-50">Paid Through</th>--}}
{{--            <th class="w-50">Commission</th>--}}
            <th class="w-50">Amount</th>
{{--            <th class="w-50">Payable</th>--}}
        </tr>
        <tr>
        <?php $count = 1;
        //                $driver_payable = 0;
        //                $company_payable = 0;
        $total_commission = 0;
        $total_payable = 0;
        $total_amount = 0;
        ?>
        @foreach($invoices as $invoice)
            <tr>
                <td class="text-center">{{$count}}</td>
{{--                <td class="text-center">{{$invoice->id}}</td>--}}
                <td >{{$invoice->booking_from}}<br>To<br>
                    {{$invoice->booking_to}}</td>
{{--                <td class="text-center">{{$invoice->payment_type}}</td>--}}
{{--                <td class="text-center">@if($invoice->payment_type == 'Third Party')--}}
{{--                        {{'0%'}}--}}
{{--                    @else--}}
{{--                        {{$invoice->trip->driver->commission.'%'}}--}}
{{--                    @endif--}}
{{--                </td>--}}
{{--                @if($invoice->payment_type == 'Cash' || $invoice->payment_type == 'Pay In Car')--}}
                    <td class="text-center"><span class="currency">£</span>{{round($invoice->total_amount, 2)}}</td>
{{--                @else--}}
{{--                    <td class="text-center"><span class="currency">£</span>{{round($invoice->total_amount, 2)}}</td>--}}
{{--                @endif--}}
{{--                @if($invoice->payment_type == 'Pay In Car' || $invoice->payment_type == 'Cash')--}}
{{--                    <td class="text-center"><span class="currency">£</span>-{{round(($invoice->total_amount*$invoice->trip->driver->commission)/100, 2)}}</td>--}}
{{--                    @php $total_commission +=  ( $invoice->total_amount*$invoice->trip->driver->commission)/100;--}}
{{--                                $total_payable = $total_payable - ($invoice->total_amount*$invoice->trip->driver->commission)/100;--}}
{{--                                $total_amount = $total_amount+$invoice->total_amount;--}}
{{--                                $total_commission = round($total_commission, 2);--}}
{{--                                $total_payable = round($total_payable, 2);--}}
{{--                                $total_amount = round($total_amount, 2);--}}

{{--                    @endphp--}}
{{--                @else--}}
{{--                    @if($invoice->payment_type == 'Third Party')--}}
{{--                        <td class="text-center"><span class="currency">£</span>{{round($invoice->total_amount-0, 2)}}</td>--}}
{{--                        <?php $total_commission = $total_commission + 0;--}}
{{--                        $total_payable = $total_payable + ($invoice->total_amount);--}}
{{--                        $total_amount = $total_amount+$invoice->total_amount;--}}
{{--                        $total_commission = round($total_commission, 2);--}}
{{--                        $total_payable = round($total_payable, 2);--}}
{{--                        $total_amount = round($total_amount, 2);--}}
{{--                        ?>--}}
{{--                    @else--}}
{{--                        <td class="text-center"><span class="currency">£</span>{{round($invoice->total_amount-($invoice->total_amount*$invoice->trip->driver->commission)/100, 2)}}</td>--}}
{{--                        <?php $total_commission = $total_commission +($invoice->total_amount*$invoice->trip->driver->commission)/100;--}}
{{--                        $total_payable = $total_payable + ($invoice->total_amount - ($invoice->total_amount*$invoice->trip->driver->commission)/100);--}}
{{--                        $total_amount = $total_amount+$invoice->total_amount;--}}
{{--                        $total_commission = round($total_commission, 2);--}}
{{--                        $total_payable = round($total_payable, 2);--}}
{{--                        $total_amount = round($total_amount, 2);--}}
{{--                        ?>--}}
{{--                    @endif--}}
{{--                @endif--}}
            </tr>
            <?php $count ++ ;
            $total_amount = $total_amount+$invoice->total_amount;
            ?>
            @endforeach
            </tr>
    </table>
    <table class="table2 w-100 mt-10">
        <tr>
            <td colspan="7" style="border: 0px!important;">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Sub Total:</p>
{{--                        <p>Driver Acc Commission <span class="discount-percentage"><strong>{{$bill->invoices[0]->trip->driver->commission}}%</strong>:</span> </p>--}}
{{--                        <p>{{(($total_payable > 0) ? 'Company Payable:' : 'Driver Payable:')}}</p>--}}
                        <p>Grand Total:</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>&pound; {{$total_amount}}</p>
{{--                        <p>&pound; {{$total_commission}}</p>--}}
{{--                        <p>&pound;{{$total_payable}}</p>--}}
                        <p>&pound; {{$total_amount}}</p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
</div>


<div class="w-100 float-left footer">
    <hr>
    <p>Note: Thank you for the opportunity to serve you.</p>
</div>

</body>
</html>

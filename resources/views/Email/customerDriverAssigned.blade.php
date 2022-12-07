<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title></title>
    <style>
        /* -------------------------------------
          INLINED WITH htmlemail.io/inline
      ------------------------------------- */
        /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
        @media only screen and (max-width: 620px) {
            table[class="body"] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important;
            }
            table[class="body"] p,
            table[class="body"] ul,
            table[class="body"] ol,
            table[class="body"] td,
            table[class="body"] span,
            table[class="body"] a {
                font-size: 16px !important;
            }
            table[class="body"] .wrapper,
            table[class="body"] .article {
                padding: 10px !important;
            }
            table[class="body"] .content {
                padding: 0 !important;
            }
            table[class="body"] .container {
                padding: 0 !important;
                width: 100% !important;
            }
            table[class="body"] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }
            table[class="body"] .btn table {
                width: 100% !important;
            }
            table[class="body"] .btn a {
                width: 100% !important;
            }
            table[class="body"] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important;
            }
        }
        table td {
            vertical-align: top;
        }

        /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
        @media all {
            .ExternalClass {
                width: 100%;
            }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }
            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }
            .btn-primary table td:hover {
                background-color: #34495e !important;
            }
            .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important;
            }
        }
    </style>
</head>
<body
        class=""
        style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
>
<table
        border="0"
        cellpadding="0"
        cellspacing="0"
        class="body"
        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;"
>
    <tr>
        <td
                style="font-family: sans-serif; font-size: 14px; vertical-align: top;"
        >
            &nbsp;
        </td>
        <td
                class="container"
                style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;"
        >
            <div
                    class="content"
                    style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;"
            >
                <!-- START CENTERED WHITE CONTAINER -->
                <span
                        class="preheader"
                        style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"
                ></span>
                <table
                        class="main"
                        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;"
                >
                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td
                                class="wrapper"
                                style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 10px 20px 0px 20px;"
                        >
                            <table
                                    border="0"
                                    cellpadding="0"
                                    cellspacing="0"
                                    style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;"
                            >
                                <tr>

                                    <td colspan="2"
                                            style="font-family: sans-serif; font-size: 30px; vertical-align: top;width:100%"
                                    >
                                        <p style="text-align: center;margin:0"><img alt="Logo" style="width:220px"  src="{{asset("img/logo1.png")}}"  /></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                            colspan="2"
                                            style="font-family: sans-serif; font-size: 14px; vertical-align: top;"
                                    >
                                        <p
                                                style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;margin-top: 15px;"
                                        >
                                            Dear {{$data['user']->name}}, You have been assigned with a driver for your trip with {{$siteSettings[9]->value}}. Please find the details below.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                            colspan="2"
                                            style="border-bottom: 1px solid #ccc"
                                    ></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table style="width:100%">
                                            <tr>
                                                <td style="width:30%;padding:15px 0;">
                                                    Booking Reference
                                                </td>
                                                <td style="width:70%;padding:15px 0;">
                                                    {{$data['booking']->ref_id}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                        colspan="2"
                                                        style="border-bottom:1px solid #ccc"
                                                ></td>
                                            </tr>
                                            <tr>
                                                <td
                                                        colspan="2"
                                                >
                                                    <table style="width:100%">
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Passenger</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['user']->name}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Passenger Phone</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['user']->phone}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td
                                                        colspan="2"
                                                        style="border-bottom:1px solid #ccc"
                                                ></td>
                                            </tr>
                                            <tr>
                                                <td
                                                    colspan="2"
                                                >
                                                    <table style="width:100%">
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Driver</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['driver']->name}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Vehicle Registration</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['driver']->vehicle_reg}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Vehicle Make</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['driver']->vehicle_make}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Vehicle License</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['driver']->vehicle_license}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td
                                                    colspan="2"
                                                    style="border-bottom:1px solid #ccc"
                                                ></td>
                                            </tr>

                                            @if($data['booking']->from_to == 'loc')

                                                <tr>
                                                    <td
                                                            colspan="2"
                                                    >
                                                        <table style="width:100%">
                                                            <tr>
                                                                <td style="width:30%;padding:5px 0;">Pickup</td>
                                                                @if($data['trip']->journey_type == 'origin')
                                                                    <td style="width:70%;padding:5px 0;">
                                                                        {{$data['booking']->pickup_address.' '}}  @if($data['booking']->from_to != 'other'){{'('.$data['booking']->location->display_name.')'}}@endif
                                                                    </td>
                                                                @else
                                                                    <td style="width:70%;padding:5px 0;">
                                                                        {{$data['booking']->return_pickup_address.' '}}  @if($data['booking']->from_to != 'other'){{'('.$data['booking']->airport->display_name.')'}}@endif
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                            <tr>
                                                                <td style="width:30%;padding:5px 0;">Destination</td>
                                                                @if($data['trip']->journey_type == 'origin')
                                                                    <td style="width:70%;padding:5px 0;">
                                                                        {{$data['booking']->dropoff_address.' '}} @if($data['booking']->from_to != 'other'){{'('.$data['booking']->airport->display_name.')'}}@endif
                                                                    </td>
                                                                @else
                                                                    <td style="width:70%;padding:5px 0;">
                                                                        {{$data['booking']->return_dropoff_address.' '}} @if($data['booking']->from_to != 'other'){{'('.$data['booking']->location->display_name.')'}}@endif
                                                                    </td>
                                                                @endif
                                                            </tr>
{{--                                                            <tr>--}}
{{--                                                                <td style="width:30%;padding:5px 0;">Return</td>--}}
{{--                                                                <td style="width:70%;padding:5px 0;">--}}
{{--                                                                    @if($data['booking']->return == 1)--}}
{{--                                                                        Yes--}}
{{--                                                                    @else--}}
{{--                                                                        No--}}
{{--                                                                    @endif--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            @if($data['booking']->return == 1)--}}
{{--                                                                <tr>--}}
{{--                                                                    <td style="width:30%;padding:5px 0;">Return Pickup</td>--}}
{{--                                                                    <td style="width:70%;padding:5px 0;">--}}
{{--                                                                        {{$data['booking']->return_pickup_address.' '}}   {{'('.$data['booking']->airport->display_name.')'}}--}}
{{--                                                                    </td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td style="width:30%;padding:5px 0;">Return Destination</td>--}}
{{--                                                                    <td style="width:70%;padding:5px 0;">--}}
{{--                                                                        {{$data['booking']->return_dropoff_address.' '}}   {{'('.$data['booking']->location->display_name.')'}}--}}
{{--                                                                    </td>--}}
{{--                                                                </tr>--}}

{{--                                                            @endif--}}
                                                        </table>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td
                                                            colspan="2"
                                                    >
                                                        <table style="width:100%">
                                                            <tr>
                                                                <td style="width:30%;padding:5px 0;">Pickup</td>
                                                                @if($data['trip']->journey_type == 'origin')
                                                                <td style="width:70%;padding:5px 0;">
                                                                    {{$data['booking']->pickup_address.' '}}  @if($data['booking']->from_to != 'other'){{'('.$data['booking']->airport->display_name.')'}}@endif
                                                                </td>
                                                                @else
                                                                    <td style="width:70%;padding:5px 0;">
                                                                        {{$data['booking']->return_pickup_address.' '}}  @if($data['booking']->from_to != 'other'){{'('.$data['booking']->location->display_name.')'}}@endif
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                            <tr>
                                                                <td style="width:30%;padding:5px 0;">Destination</td>
                                                                @if($data['trip']->journey_type == 'origin')
                                                                <td style="width:70%;padding:5px 0;">
                                                                    {{$data['booking']->dropoff_address.' '}} @if($data['booking']->from_to != 'other'){{'('.$data['booking']->location->display_name.')'}}@endif
                                                                </td>
                                                                @else
                                                                    <td style="width:70%;padding:5px 0;">
                                                                        {{$data['booking']->return_dropoff_address.' '}} @if($data['booking']->from_to != 'other'){{'('.$data['booking']->airport->display_name.')'}}@endif
                                                                    </td>
                                                                @endif
                                                            </tr>
{{--                                                            <tr>--}}
{{--                                                                <td style="width:30%;padding:5px 0;">Return</td>--}}
{{--                                                                <td style="width:70%;padding:5px 0;">--}}
{{--                                                                    @if($data['booking']->return == 1)--}}
{{--                                                                        Yes--}}
{{--                                                                    @else--}}
{{--                                                                        No--}}
{{--                                                                    @endif--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                            @if($data['booking']->return == 1)--}}
{{--                                                                <tr>--}}
{{--                                                                    <td style="width:30%;padding:5px 0;">Return Pickup</td>--}}
{{--                                                                    <td style="width:70%;padding:5px 0;">--}}
{{--                                                                        {{$data['booking']->return_pickup_address.' '}}   {{'('.$data['booking']->location->display_name.')'}}--}}
{{--                                                                    </td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td style="width:30%;padding:5px 0;">Return Destination</td>--}}
{{--                                                                    <td style="width:70%;padding:5px 0;">--}}
{{--                                                                        {{$data['booking']->return_dropoff_address.' '}}   {{'('.$data['booking']->airport->display_name.')'}}--}}
{{--                                                                    </td>--}}
{{--                                                                </tr>--}}

{{--                                                            @endif--}}
                                                        </table>
                                                    </td>
                                                </tr>

                                            @endif

                                            <tr>
                                                <td
                                                        colspan="2"
                                                        style="border-bottom:1px solid #ccc"
                                                ></td>
                                            </tr>
                                            <tr>
                                                <td
                                                        colspan="2"
                                                >
                                                    <table style="width:100%">
                                                        @if($data['trip']->journey_type == 'origin')
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Pick Up Date</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{date('d-m-Y',strtotime($data['booking']->journey_date))}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Pick Up Time</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['booking']->pickup_time}}
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($data['trip']->journey_type == 'return')
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Pick Up Date</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{date('d-m-Y',strtotime($data['booking']->return_date))}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Pick Up Time</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['booking']->return_time}}
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Vehicle</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                <p style="margin:0">{{$data['booking']->car->name}} {{$data['booking']->car->description}}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td
                                                        colspan="2"
                                                        style="border-bottom:1px solid #ccc"
                                                ></td>
                                            </tr>
                                            <tr>
                                                <td
                                                        colspan="2"
                                                >
                                                    <table style="width:100%">
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Number of Adult</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['booking']->adult}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Number of Child</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['booking']->child}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Number of Luggage</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['booking']->luggage}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Number of CarryOn</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['booking']->carryon}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                        colspan="2"
                                                        style="border-bottom:1px solid #ccc"
                                                ></td>
                                            </tr>
                                            <tr>
                                                <td
                                                        colspan="2"
                                                >
                                                    <table style="width:100%">
                                                        @if($data['trip']->journey_type == 'origin')
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Flight Number</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['booking']->flight_number}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Flight Origin</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['booking']->flight_origin}}
                                                            </td>
                                                        </tr>
                                                        @endif
                                                            @if($data['trip']->journey_type == 'return')
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Flight Number</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['booking']->return_flight_number}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:30%;padding:5px 0;">Flight Origin</td>
                                                            <td style="width:70%;padding:5px 0;">
                                                                {{$data['booking']->return_flight_origin}}
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </table>
                                                </td>

                                            </tr>
                                            @if($data['booking']->add_info != null)
                                            <tr>
                                                <td
                                                        colspan="2"
                                                        style="border-bottom:1px solid #ccc"
                                                ></td>
                                            </tr>

                                            <tr>
                                                <td style="width:30%;padding:15px 0;">
                                                    <p style="margin:0;font-weight: bold">Additional Info</p>
                                                </td>
                                                <td style="width:70%;padding:15px 0;">
                                                    <p style="margin:0;font-weight: bold">
                                                        {{$data['booking']->add_info}}
                                                    </p>
                                                </td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td
                                                        colspan="2"
                                                        style="border-bottom:1px solid #ccc"
                                                ></td>
                                            </tr>
                                            <tr>
                                                <td style="width:30%;padding:5px 0;">Total Amount Collectable</td>
                                                <td style="width:70%;padding:5px 0;"> £
                                                    {{$data['trip']->collectable_by_driver }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:30%;padding:5px 0;">Payment Method</td>
                                                @if($data['booking']->userTransaction == Null)
                                                    <td style="width:70%;padding:5px 0;">
                                                        {{'Not Yet Selected'}}
                                                    </td>
                                                @else
                                                    <td style="width:70%;padding:5px 0;">
                                                        {{$data['booking']->userTransaction->trans_id}}
                                                    </td>
                                                @endif
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>

                <!-- START FOOTER -->
                <div
                    class="footer"
                    style="clear: both; padding-bottom: 30px; padding-top: 50px; text-align: center; width: 100%;background:#3A3A3C"
                >
                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" >
                        <tr>
                            <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 0px; font-size: 12px; color: #ffffff; text-align: center;">
                                <span class="apple-link" style="color: #ffffff; font-size: 12px; text-align: center;">

 <i>“NO CIGARETTE, NO DRINK, NO FOOD (inc baby feeding) allowed in the car." <br>
     Extra charges: <br>
1. Free waiting up to 7 minutes from home or hotels, up to 30 mins after flight landing from airports included in the price. <br>
2. After free waiting driver will charge £5 Every 15 mins. If car is soiled by passenger in any way it will £80 soiling charges.</i>

</span>
                                <br>
                                <span
                                    class="apple-link"
                                    style="color: #ffffff; font-size: 15px; text-align: center;font-weight: bold"
                                >Office address</span
                                >
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="content-block"
                                style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 0px; font-size: 12px; color: #ffffff; text-align: center;"
                            >
                    <span class="apple-link" style="color: #ffffff; font-size: 12px; text-align: center;">
                     Demo Company as {{$siteSettings[9]->value}} License number ####. <br>
72 Watermead, Barhill, Cambridge, Cambridgeshire, CB23 8TL. Phone: 01223247247.<br>
 <i>2{{$siteSettings[9]->value}} act as an agent for self-employed Drivers.</i>

</span>
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="content-block powered-by"
                                style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 0px; font-size: 12px; color: #ffffff; text-align: center;"
                            >
                                Copyright by {{$siteSettings[9]->value}} | All rights reserved.
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END FOOTER -->

                <!-- END CENTERED WHITE CONTAINER -->
            </div>
        </td>
        <td
                style="font-family: sans-serif; font-size: 14px; vertical-align: top;"
        >
            &nbsp;
        </td>
    </tr>
</table>
</body>
</html>

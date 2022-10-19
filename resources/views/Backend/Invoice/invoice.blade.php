@extends('theme.base')
@section('head-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/datatables.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/custom_dt_html5.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/dt-global_style.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/regular.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/fontawesome.css")}}>
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link href={{asset("css/theme/scrollspyNav.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/animate/animate.css")}} rel="stylesheet" type="text/css" />
    <script src={{asset("css/theme/plugins/sweetalerts/promise-polyfill.js")}}></script>
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/apps/invoice-list.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/forms/theme-checkbox-radio.css" )}} rel="stylesheet" type="text/css" />

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
    </style>

@endsection

@section('main-content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            @if(Session::has('message'))
                <div class="alert alert-gradient mb-4" role="alert">
                    <button  type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>{{ Session::get('message') }}</strong>
                </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">


                    <div class="col 12 button-holder" style="display: flex">
                        <div class="col-8">
                            <h3>Invoice</h3>
                        </div>
                        <div class="create-button col-4">
                            <a id="form_submit" href="#" class="create-button-btn btn btn-success mb-6 mr-4 btn-lg"> Create Bill</a>
                        </div>
                    </div>

    @if($driverInvoices != null)
        <form class="form-horizontal form-label-left" name="payment" id="payment" novalidate method="POST" action="{{ route('invoice.store') }}">
            @csrf
            <table id="invoice-list" class="table table-hover" style="width:100%">
                <thead>
                <tr>
                    <th class="checkbox-column"> Select </th>
                    <th>Invoice ID</th>
                    <th>Booking ID</th>
                    <th>Passenger Details</th>
                    <th>Trip Info</th>
                    <th>Cash Type</th>
                    <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($driverInvoices as $invoice)
                <tr>
                    <td class="checkbox-column">
                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-success">
                        <input type="checkbox" class="new-control-input invoice_id" id="invoice_id" name="invoice_id[]" value="{{$invoice->id}}">
                            <span class="new-control-indicator"></span>
                            <span style="visibility:hidden">c</span>
                        </label>
                    </td>
                    <td>{{$invoice->id}}</td>
                    <td>{{$invoice->booking->id}}</td>
                    <td>{{$invoice->booking->user->name}} <br>
                        {{$invoice->booking->user->phone}}
                    </td>
                    <td>To:{{$invoice->booking_from}} <br>
                        From:{{$invoice->booking_to}}</td>
                    <td>{{$invoice->payment_type}}</td>
                    <td>{{$invoice->total_amount}}</td>
                @endforeach
                </tr>
                </tbody>
            </table>
        </form>
    @else
    <p> No Invoice for this driver </p>
    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src= {{ asset("js/theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js") }}></script>
    <script src={{ asset("js/theme/plugins/table/datatable/datatables.js") }}></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js")}}></script>
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/jszip.min.js")}}></script>
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/buttons.html5.min.js")}}></script>
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/buttons.print.min.js")}}></script>
    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src={{asset("js/theme/js/scrollspyNav.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/sweetalert2.min.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/custom-sweetalert.js")}}></script>
    <script src={{asset("js/theme/js/apps/invoice-list.js")}}></script>
    <!-- END THEME GLOBAL STYLE -->
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script>

        $('#form_submit').click(function () {
            if (!$('.invoice_id').is(':checked')) {
                swal({
                    title: 'At least check one of the Invoice',
                    padding: '2em'
                })
                return false;
            }
            else {
                var x = document.getElementsByName('payment');
                x[0].submit();
            }
        });
    </script>
@endsection


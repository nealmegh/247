@extends('theme.base')
@section('head-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/datatables.css")}}>--}}
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/custom_dt_html5.css")}}>--}}
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/dt-global_style.css")}}>--}}
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/regular.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/fontawesome.css")}}>
{{--    <link href="{{asset('css/2Frontend/vendor/telephone/intlTelInput.css')}}" rel="stylesheet">--}}
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link href={{asset("css/theme/scrollspyNav.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/animate/animate.css")}} rel="stylesheet" type="text/css" />
    <script src={{asset("css/theme/plugins/sweetalerts/promise-polyfill.js")}}></script>
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/forms/switches.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/select2/select2.min.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/flatpickr/custom-flatpickr.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/flatpickr/flatpickr.css" )}} rel="stylesheet" type="text/css" />


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
        .custom-bipon-container{
            max-width: 80% !important;
            margin-left: 5% !important;
        }
        @media (max-width: 50px) {
            .sidenav {
                display: none !important;
            }
        }
    </style>

@endsection

@section('main-content')
    @if(Session::has('message'))
        <div class="alert alert-gradient mb-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
    <div class="custom-bipon-container container " style="max-width: 80% !important;">
        <div class="container">
            <div class="row layout-top-spacing">
                <div id="flActionButtons" class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h2><small>edit</small> Bookings </h2>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form class="" method="post" action="{{route('booking.update', $booking->id )}}">
                                @csrf
                                <input type="hidden" id="updateReturnPrice" value="">
                                <input type="hidden" id="updatePriceInput" value="">
                                <input type="hidden" id="calMeet" value="0">
                                <input type="hidden" id="meet" name="meet" value="0">
                                <input type="hidden" id="calCar" value="0">
                                <input type="hidden" id="calReturn" value="0">
                                <input type="hidden" id="calTP" value="0">
                                <input type="hidden" id="calReturnType" value="0">

                                <div class="form-row " style="  margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6">
                                        <label for="selectFrom">From</label>
                                        @include('Backend.Booking.fromSelect')
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="selectTo">To</label>
                                        @include('Backend.Booking.toSelect')
                                    </div>
                                </div>

                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6">
                                        <label for="pickup_address">Pick Up Address <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="pickup_address" value="{{$booking->pickup_address}}" name="pickup_address" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dropoff_address">Drop Off Address</label>
                                        <input type="text" class="form-control" id="dropoff_address" value="{{$booking->dropoff_address}}" name="dropoff_address" placeholder="1234 Main St">
                                    </div>
                                </div>

                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6">
                                        <label for="journey_date">Journey Date <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="journey_date" value="{{date('d-m-Y',strtotime($booking->journey_date))}}" name="journey_date" placeholder="Journey Date" required="required">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pickup_time">Journey Time</label>
                                        <input type="text" class="form-control" id='pickup_time' value="{{date('H:i',strtotime($booking->journey_date))}}" name="pickup_time" placeholder="Pick Up Time">
                                    </div>
                                </div>
                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6">
                                        <label for="flight_number">Flight/Train No. <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="flight_number" name="flight_number" value="{{$booking->flight_number}}" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="flight_origin">Flight/Train Origin</label>
                                        <input type="text" class="form-control" id="flight_origin" value="{{$booking->flight_origin}}" name="flight_origin" placeholder="1234 Main St">
                                    </div>
                                </div>
                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6">
                                        <label for="car_type">Car Type</label>
                                        <select id="car_type" class="form-control" name="car_id">
                                            <option selected>Choose Car Type</option>
                                            @foreach($cars as $car)
                                                @if($booking->car->id == $car->id)
                                                    <option value="{{$car->id}}" selected>{{$car->name.' '.$car->description}}</option>
                                                @else
                                                    <option value="{{$car->id}}">{{$car->name.' '.$car->description}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="return">Round Trip</label>
                                        <select class="form-control" id="return" name="return" >
                                            @if($booking->return == 0)
                                                <option value=0 selected>No</option>
                                                <option value=1>Yes</option>
                                            @else
                                                <option value=0 >No</option>
                                                <option value=1 selected>Yes</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    @if($booking->return != 1)
                                            <div class="form-group col-md-6" id="rPA" style="display: none">
                                                <label for="return_pickup_address">Return Pick Up Address <span class="required">*</span></label>
                                                <input type="text" class="form-control" id="return_pickup_address" name="return_pickup_address" placeholder="1234 Main St" disabled>
                                            </div>
                                            <div class="form-group col-md-6" id="rDA" style="display: none">
                                                <label for="return_dropoff_address">Return Drop Off Address</label>
                                                <input type="text" class="form-control" id="return_dropoff_address" name="return_dropoff_address" placeholder="1234 Main St" disabled>
                                            </div>
                                    @else
                                            <div class="form-group col-md-6" id="rPA" style="">
                                                <label for="return_pickup_address">Return Pick Up Address <span class="required">*</span></label>
                                                <input type="text" class="form-control" value="{{$booking->return_pickup_address}}" id="return_pickup_address" name="return_pickup_address" placeholder="1234 Main St" >
                                            </div>
                                            <div class="form-group col-md-6" id="rDA" style="">
                                                <label for="return_dropoff_address">Return Drop Off Address</label>
                                                <input type="text" class="form-control" value="{{$booking->return_dropoff_address}}" id="return_dropoff_address" name="return_dropoff_address" placeholder="1234 Main St" >
                                            </div>
                                    @endif
                                </div>

                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    @if($booking->return != 1)
                                        <div class="form-group col-md-6" id="rDate" style="display: none">
                                            <label for="return_date">Return Date <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="return_date" name="return_date" placeholder="Return Date" required="required" disabled>
                                        </div>
                                        <div class="form-group col-md-6" id="rTime" style="display: none">
                                            <label for="return_time">Return Time <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="return_time" name="return_time" placeholder="Return Date" required="required" disabled>
                                        </div>
                                    @else
                                        <div class="form-group col-md-6" id="rDate" style="">
                                            <label for="return_date">Return Date <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="return_date" value="{{date('d-m-Y',strtotime($booking->return_date))}}" name="return_date" placeholder="Return Date" required="required">
                                        </div>
                                        <div class="form-group col-md-6" id="rTime" style="">
                                            <label for="return_time">Return Time <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="return_time" value="{{date('H:i',strtotime($booking->return_date))}}" name="return_time" placeholder="Return Date" required="required">
                                        </div>
                                    @endif

                                </div>
                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    @if($booking->return != 1)
                                        <div class="form-group col-md-6" id="rFlight" style="display: none">
                                            <label for="return_flight_number">Return Flight/Train No. <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="return_flight_number" name="return_flight_number" placeholder="Return Flight Number" disabled>
                                        </div>
                                        <div class="form-group col-md-6" id="rOrigin" style="display: none">
                                            <label for="return_flight_origin">Return Flight/Train Origin</label>
                                            <input type="text" class="form-control" id="return_flight_origin" name="return_flight_origin" placeholder="Return Flight Origin" disabled>
                                        </div>
                                    @else
                                        <div class="form-group col-md-6" id="rFlight" style="">
                                            <label for="return_flight_number">Return Flight/Train No. <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="return_flight_number" value="{{$booking->return_flight_number}}" name="return_flight_number" placeholder="Return Flight Number" >
                                        </div>
                                        <div class="form-group col-md-6" id="rOrigin" style="">
                                            <label for="return_flight_origin">Return Flight/Train Origin</label>
                                            <input type="text" class="form-control" id="return_flight_origin" value="{{$booking->return_flight_origin}}" name="return_flight_origin" placeholder="Return Flight Origin" >
                                        </div>
                                    @endif
                                </div>

                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6" style="" >
                                        <label class="control-label" for="meetF">Meet & Greet<span class="required">*</span></label> <br>
                                        <label class="switch s-icons s-outline s-outline-success mr-2">
                                            @if($booking->meet == 0)
                                                <input id="meetF" name="meetF" type="checkbox" value="0">
                                            @else
                                                <input id="meetF" name="meetF" type="checkbox" value="1" checked>
                                            @endif
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-row mb-4" style="margin-bottom: 0px !important;" id="oldCustomer">
                                    <label for="user_id">Customer</label>
                                    <select id="user_id" class="form-control UserCustomer" name="user_id">
                                        <option>Chooose One</option>
                                        @foreach($users as $user)
                                            @if($booking->user->id == $user->id)
                                                <option value="{{$user->id}}" selected>{{$user->name}} - {{$user->phone}}</option>
                                            @else
                                                <option value="{{$user->id}}" >{{$user->name}} - {{$user->phone}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-3">
                                        <label for="adult">Adult</label>
                                        <input type="number" class="form-control" name="adult" value="{{$booking->adult}}" id="adult">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="child">Child</label>
                                        <input type="number" class="form-control" name="child" value="{{$booking->child}}" id="child">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="luggage">Luggage</label>
                                        <input type="number" class="form-control" name="luggage" value="{{$booking->luggage}}" id="luggage">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="carryon">Carry On</label>
                                        <input type="number" class="form-control" name="carryon" value="{{$booking->carryon}}" id="carryon">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="addinfo">Additional Information</label>
                                    <textarea type="text" class="form-control" id="addinfo" name="addinfo" placeholder="Apartment, studio, or floor">{{$booking->add_info}}</textarea>

                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-3">
                                        <label for="discount_type">Discount Type</label>
                                        <select class="form-control" id="discount_type" name="discount_type" >
                                            @if($booking->discount_type == 0)
                                                <option value=0 selected>Fixed</option>
                                                <option value=1>Percentage</option>
                                            @else
                                                <option value=0 selected>Fixed</option>
                                                <option value=1 selected>Percentage</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="discount_value">Discount Value</label>
                                        <input type="number" class="form-control" id="discount_value" value="{{$booking->discount_value}}" name="discount_value" placeholder="Discount Value">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="extra_price">Extra Price</label>
                                        <input type="number" class="form-control" id="extra_price" value="{{$booking->extra_price}}" name="extra_price" placeholder="Enter Price for Custom Trip">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="custom_price">Final Price</label>
                                        <input type="number" class="form-control" id="custom_price" value="{{$booking->final_price}}" name="custom_price" placeholder="Enter Price for Custom Trip">
                                    </div>
                                </div>
{{--                                <div class="form-group mb-4">--}}
{{--                                    <div class="form-group col-md-12">--}}
{{--                                        <label for="custom_price">Custom Price</label>--}}
{{--                                        <input type="number" class="form-control" id="custom_price" value={{$booking->custom_price}} name="custom_price" placeholder="Enter Price for Custom Trip">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-row mb-4">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" id="send_email" class="new-control-input" name="send_email" value="1" checked>
                                        <span class="new-control-indicator"></span>Send Booking Update Email to Customer
                                    </label>
                                </div>


                                <a href="{{url()->previous()}}" class="btn btn-danger mt-3">Cancel</a>
                                <button id="send" type="submit" class="btn btn-success mt-3">Save</button>
                            </form>
                        </div>
                    </div>
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
    <script src={{asset("js/theme/plugins/select2/select2.min.js")}}></script>
    <script src={{asset("js/theme/plugins/flatpickr/flatpickr.js")}}></script>
    {{--    <script src={{asset("js/theme/plugins/flatpickr/custom-flatpickr.js")}}></script>--}}
{{--    <script src="{{asset('js/2Frontend/vendor/telephone/intlTelInput.min.js')}}"></script>--}}
    {{--    <script src={{asset("js/theme/plugins/select2/custom-select2.js")}}></script>--}}


    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src={{asset("js/theme/js/scrollspyNav.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/sweetalert2.min.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/custom-sweetalert.js")}}></script>
    <!-- END THEME GLOBAL STYLE -->
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script>
        $(".selectFrom").select2({
            tags: true,
            placeholder: "Select Pickup Point",
            allowClear: true
        });
        $(".selectTo").select2({
            tags: true,
            placeholder: "Select Drop Point",
            allowClear: true
        });
        $(".UserCustomer").select2({
            tags: true,
            placeholder: "Select Pickup Point",
            allowClear: true
        });

        var f1 = flatpickr(document.getElementById('journey_date'), {
            minDate: "today",
            dateFormat: "d-m-Y"
        });
        var f2 = flatpickr(document.getElementById('pickup_time'), {
            enableTime: true,
            noCalendar: true,
            time_24hr: true,
            disableMobile: true
        });
        var f3 = flatpickr(document.getElementById('return_date'), {
            minDate: "today",
            dateFormat: "d-m-Y"
        });
        var f4 = flatpickr(document.getElementById('return_time'), {
            enableTime: true,
            noCalendar: true,
            time_24hr: true,
            disableMobile: true
        });
        $(document).on("click", "#meetF", function(){
            if(document.getElementById('meetF').value === '1')
            {
                document.getElementById('meetF').value= '0';
                document.getElementById('meet').value= '0';
            }
            else {
                document.getElementById('meetF').value='1';
                document.getElementById('meet').value='1';
            }
        });
    </script>

    <script type="text/javascript">

        document.getElementById('return').onchange = function () {
            document.getElementById("return_date").disabled = (this.value === '0');
            document.getElementById("return_time").disabled = (this.value === '0');
            document.getElementById("return_flight_origin").disabled = (this.value === '0');
            document.getElementById("return_flight_number").disabled = (this.value === '0');
            document.getElementById("return_dropoff_address").disabled = (this.value === '0');
            document.getElementById("return_pickup_address").disabled = (this.value === '0');
            var x = document.getElementById("rDate");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            var y = document.getElementById("rTime");
            if (y.style.display === "none") {
                y.style.display = "block";
            } else {
                y.style.display = "none";
            }
            var a = document.getElementById("rOrigin");
            if (a.style.display === "none") {
                a.style.display = "block";
            } else {
                a.style.display = "none";
            }
            var b = document.getElementById("rFlight");
            if (b.style.display === "none") {
                b.style.display = "block";
            } else {
                b.style.display = "none";
            }
            var c = document.getElementById("rDA");
            if (c.style.display === "none") {
                c.style.display = "block";
            } else {
                c.style.display = "none";
            }
            var d = document.getElementById("rPA");
            if (d.style.display === "none") {
                d.style.display = "block";
            } else {
                d.style.display = "none";
            }

            var bip = document.getElementById("return");
            var calReturnJ = bip.options[bip.selectedIndex].value;

            if(calReturnJ == 1)
            {
                var returnPriceInput = document.getElementById("updateReturnPrice").value;
                document.getElementById("calReturn").value = returnPriceInput;
                document.getElementById("calReturnType").value = 1;
                var carPrice  = document.getElementById("calCar").value;
                carPrice = parseFloat(carPrice);
                carPrice = carPrice + carPrice ;
                document.getElementById("calCar").value = carPrice;
                var calReturn = document.getElementById('calReturn').value;
                calReturn = parseFloat(calReturn);
                var calMeet = document.getElementById('calMeet').value;
                calMeet = parseFloat(calMeet);
                var calCar = document.getElementById('calCar').value;
                calCar = parseFloat(calCar)
                var updatePriceInput = document.getElementById('updatePriceInput').value;
                updatePriceInput = parseFloat(updatePriceInput);


                var tp = calMeet + calReturn + updatePriceInput + calCar;
                document.getElementById('calTP').value = tp;
                document.getElementById("priceUpdate").innerHTML="Price "+tp;
            }
            else {

                document.getElementById("calReturn").value = 0;
                document.getElementById("calReturnType").value = 0;
                var carPrice  = document.getElementById("calCar").value
                carPrice = parseFloat(carPrice);
                carPrice = carPrice/2 ;
                document.getElementById("calCar").value = carPrice;
                var calReturn = document.getElementById('calReturn').value;
                calReturn = parseFloat(calReturn);
                var calMeet = document.getElementById('calMeet').value;
                calMeet = parseFloat(calMeet);
                var calCar = document.getElementById('calCar').value;
                calCar = parseFloat(calCar)
                var updatePriceInput = document.getElementById('updatePriceInput').value;
                updatePriceInput = parseFloat(updatePriceInput);


                var tp = calMeet + calReturn + updatePriceInput + calCar;
                document.getElementById('calTP').value = tp;
                document.getElementById("priceUpdate").innerHTML="Price "+tp;
            }

        }

        $('#selectFrom').on('change', function() {
            var e = document.getElementById("selectFrom");
            var selectValue = e.options[e.selectedIndex].value;
            var air = 'air';
            var check = selectValue.search(air);
            $("#hiddenFrom").val(function() {
                return selectValue;
            });
            if(check == 0)
            {
                // var select = document.getElementById("selectTo").empty();
                var select =

                    $('#selectTo')
                        .find('option')
                        .remove()
                        .end()
                        .append('<option value="">Choose a Drop-Off Point</option>');


                var locations = {!! json_encode($locations) !!};
                // console.log(airports[0].name);
                for(var i=0; i<locations.length; i++)
                {
                    var option = document.createElement("option");
                    option.text = locations[i].display_name;
                    option.value = locations[i].id;
                    var select = document.getElementById("selectTo");
                    select.appendChild(option);

                }

            }
            else {
                var select =

                    $('#selectTo')
                        .find('option')
                        .remove()
                        .end()
                        .append('<option value="">Choose a Drop-Off Point</option>')
                ;
                var airports = {!! json_encode($airports) !!};
                // console.log(airports[0].name);
                for(var i=0; i<airports.length; i++)
                {
                    var option = document.createElement("option");
                    option.text = airports[i].display_name;
                    option.value = airports[i].id;
                    var select = document.getElementById("selectTo");
                    select.appendChild(option);

                }
            }
        });
        $(document).on("click", "#send_email", function(){
            if(document.getElementById('send_email').value === '1')
            {
                document.getElementById('send_email').value= '0';
            }
            else {
                document.getElementById('send_email').value='1';
            }
        });
    </script>


@endsection


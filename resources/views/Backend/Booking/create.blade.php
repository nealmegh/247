@extends('theme.base')
@section('head-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/datatables.css")}}>--}}
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/custom_dt_html5.css")}}>--}}
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/dt-global_style.css")}}>--}}
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/regular.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/fontawesome.css")}}>
    <link href="{{asset('css/2Frontend/vendor/telephone/intlTelInput.css')}}" rel="stylesheet">
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
    <style>

        .iti__flag {background-image: url("/css/2Frontend/vendor/img/flags.png");}

        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .iti__flag {background-image: url("/css/2Frontend/vendor/img/flags@2x.png");}
        }
        .btn-filled-green:active {
            background-color: #00CCC0;
            border: 1px #000000 solid;

        }
        .btn-filled-green {
            background-color: #4CAF50; /* Green */
            border: 1px #000000 solid;

        }
        .iti {
            display: flex !important;
        }

    </style>
    <style>
        .customNav{
            display: flex !important;
            width: 15% !important;
            border-left:0px !important;
            z-index: 99 !important;
        }
        @media only screen and (max-width: 900px) {
            .customNav {
                display: flex !important;
                width: 40% !important;
                border-left: 0px !important;
                z-index: 99;
            }
        }
    </style>

@endsection

@section('main-content')
    @if(Session::has('message'))
        <div class="alert alert-gradient mb-4" role="alert">
            <button  type="button" class="close" data-dismiss="alert" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  data-dismiss="alert" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif

<div class="custom-bipon-container container " style="max-width: 80% !important;">

    <div class="container">
{{--        <div id="navSection" data-spy="affix" class="customNav" style=" display: flex !important; width: 15% !important; border-left:0px !important; z-index: 99 !important;">--}}
            <div id="navSection" data-spy="affix" class="customNav nav sidenav" >
            <div class="sidenav-content">
                <div id="priceUpdate" class="form-control" style="padding-bottom: 10px;font-weight: bold;">
                    Price 0.00
                </div>
                <button class="btn btn-primary"  id="button_2" value="val_2" name="but2" style="margin-right: 0;margin-top: 5px;">
                    Price Check
                </button>
            </div>
        </div>

            <div class="row layout-top-spacing">
                <div id="flActionButtons" class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h2><small>create</small> Bookings </h2>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form class="" method="post" action="{{route('booking.store')}}">
                                @csrf
                                <input type="hidden" id="updateReturnPrice" value="">
                                <input type="hidden" id="updatePriceInput" value="">
                                <input type="hidden" id="calMeet" value="0">
                                <input type="hidden" id="meet" name="meet" value="0">
                                <input type="hidden" id="calCar" value="0">
                                <input type="hidden" id="calReturn" value="0">
                                <input type="hidden" id="calTP" value="0">
                                <input type="hidden" id="calReturnType" value="0">

                                <div class="form-row " style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6">
                                        <label for="selectFrom">From</label>
                                        <select id="selectFrom" name="selectFrom" class="form-control selectFrom">
                                            <option>Choose a Pick-Up Point</option>
                                            <optgroup label="Airports">
                                                @foreach($airports as $airport)
                                                    <option value="{{'air'.$airport->id}}">{{$airport->display_name}}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Area">
                                                @foreach($locations as $location)
                                                    <option value="{{'loc'.$location->id}}">{{$location->display_name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="selectTo">To</label>
                                        <select id="selectTo" name="selectTo" class="form-control selectTo">
                                            <option selected>Choose a Drop-Off Point</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6">
                                        <label for="pickup_address">Pick Up Address <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="pickup_address" name="pickup_address" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dropoff_address">Drop Off Address</label>
                                        <input type="text" class="form-control" id="dropoff_address" name="dropoff_address" placeholder="1234 Main St">
                                    </div>
                                </div>

                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6">
                                        <label for="journey_date">Journey Date <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="journey_date" name="journey_date" placeholder="Journey Date" required="required">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pickup_time">Journey Time</label>
                                        <input type="text" class="form-control" id='pickup_time' name="pickup_time" placeholder="Pick Up Time">
                                    </div>
                                </div>
                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6">
                                        <label for="flight_number">Flight/Train No. <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="flight_number" name="flight_number" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="flight_origin">Flight/Train Origin</label>
                                        <input type="text" class="form-control" id="flight_origin" name="flight_origin" placeholder="1234 Main St">
                                    </div>
                                </div>
                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6">
                                            <label for="car_type">Car Type</label>
                                            <select id="car_type" class="form-control" name="car_id">
                                                <option selected>Choose Car Type</option>
                                                @foreach($cars as $car)
                                                    <option value="{{$car->id}}">{{$car->name.' '.$car->description}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="return">Round Trip</label>
                                        <select class="form-control" id="return" name="return" >
                                            <option value=0>No</option>
                                            <option value=1>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6" id="rPA" style="display: none">
                                        <label for="return_pickup_address">Return Pick Up Address <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="return_pickup_address" name="return_pickup_address" placeholder="1234 Main St" disabled>
                                    </div>
                                    <div class="form-group col-md-6" id="rDA" style="display: none">
                                        <label for="return_dropoff_address">Return Drop Off Address</label>
                                        <input type="text" class="form-control" id="return_dropoff_address" name="return_dropoff_address" placeholder="1234 Main St" disabled>
                                    </div>
                                </div>

                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6" id="rDate" style="display: none">
                                        <label for="return_date">Return Date <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="return_date" name="return_date" placeholder="Return Date" required="required" disabled>
                                    </div>
                                    <div class="form-group col-md-6" id="rTime" style="display: none">
                                        <label for="return_time">Return Time</label>
                                        <input type="text" class="form-control" id='return_time' name="return_time" placeholder="Return Pick Up Time" disabled>
                                    </div>
                                </div>
                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6" id="rFlight" style="display: none">
                                        <label for="return_flight_number">Return Flight/Train No. <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="return_flight_number" name="return_flight_number" placeholder="Return Flight Number" disabled>
                                    </div>
                                    <div class="form-group col-md-6" id="rOrigin" style="display: none">
                                        <label for="return_flight_origin">Return Flight/Train Origin</label>
                                        <input type="text" class="form-control" id="return_flight_origin" name="return_flight_origin" placeholder="Return Flight Origin" disabled>
                                    </div>
                                </div>

                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">
                                    <div class="form-group col-md-6" style="" >
                                        <label class="control-label" for="meetF">Meet & Greet<span class="required">*</span></label> <br>
                                        <label class="switch s-icons s-outline s-outline-success mr-2">
                                            <input id="meetF" name="meetF" type="checkbox" value="0">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="newCustomer">New Customer<span class="required">*</span></label> <br>
                                        <label class="switch s-icons s-outline s-outline-success mr-2">
                                            <input id="newCustomer" name="newCustomer" type="checkbox" value="0">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                            <div id="customerFormDiv" style="display: none">
                                <div class="form-row mb-4" style="margin-bottom: 0px !important;">

                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" disabled>

                                </div>
                                <div class="form-row mb-4" style="margin-bottom: 0px !important; margin-top: 10px;" >
                                    <div class="form-group col-md-6">
                                        <label for="email">Email <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Customer Email" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label> <br>
                                        <input type="tel" class="form-control" id="phone" name="phone_number" placeholder="Customer Phone Number" disabled>
                                    </div>
                                    <input type="hidden" id="countryCode" name="countryCode" value="">
                                </div>

                            </div>

                                <div class="form-row mb-4" style="margin-bottom: 0px !important;" id="oldCustomer">
                                    <label for="user_id">Customer</label>
                                    <select id="user_id" class="form-control UserCustomer" name="user_id">
                                        <option>Chooose One</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}} -+ {{$user->phone}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-3">
                                        <label for="adult">Adult</label>
                                        <input type="number" class="form-control" name="adult" id="adult">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="child">Child</label>
                                        <input type="number" class="form-control" name="child" id="child">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="luggage">Luggage</label>
                                        <input type="number" class="form-control" name="luggage" id="luggage">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="carryon">Carry On</label>
                                        <input type="number" class="form-control" name="carryon" id="carryon">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="addinfo">Additional Information</label>
                                    <textarea type="text" class="form-control" id="add_info" name="add_info" placeholder="Apartment, studio, or floor">

                                    </textarea>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-4">
                                        <label for="discount_type">Discount Type</label>
                                        <select class="form-control" id="discount_type" name="discount_type" >
                                            <option value=0>Fixed</option>
                                            <option value=1>Percentage</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="discount_value">Discount Value</label>
                                        <input type="number" class="form-control" id="discount_value" value=0 name="discount_value" placeholder="Discount Value">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="custom_price">Custom Price</label>
                                        <input type="number" class="form-control" id="custom_price" value=0 name="custom_price" placeholder="Enter Price for Custom Trip">
                                    </div>

                                </div>
                                <div class="form-row mb-4">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" id="send_email" class="new-control-input" name="send_email" value="1" checked>
                                        <span class="new-control-indicator"></span>Send Booking Confirmation Email to Customer
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
    <script src="{{asset('js/2Frontend/vendor/telephone/intlTelInput.min.js')}}"></script>
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
        $(document).on("click", "#newCustomer", function(){
            if(document.getElementById('newCustomer').value === '1')
            {
                document.getElementById('newCustomer').value= '0';

            }
            else {
                document.getElementById('newCustomer').value='1';
            }
            customerForm();
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

    <script type="text/javascript">

        function customerForm() {
            // Get the checkbox
            var checkBox = document.getElementById("newCustomer");
            // Get the output text
            var form = document.getElementById("customerFormDiv");
            var oldCustomer =  document.getElementById("oldCustomer");

            // If the checkbox is checked, display the output text
            if (checkBox.value === '1'){
                form.style.display = "block";
                oldCustomer.style.display = "none";
                document.getElementById("name").disabled = (this.value === '0');
                document.getElementById("email").disabled = (this.value === '0');
                document.getElementById("phone").disabled = (this.value === '0');
                document.getElementById("user_id").disabled = true;

            } else {
                form.style.display = "none";
                oldCustomer.style.display = "block";
                document.getElementById("user_id").disabled = false;
                document.getElementById("name").disabled = true;
                document.getElementById("email").disabled = true;
                document.getElementById("phone").disabled = true;
            }
        }

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

    </script>

    <script>
        var input = document.querySelector("#phone");
        var iti = intlTelInput(input,({
            initialCountry:"gb",
            autoHideDialCode:true,
            nationalMode: false,
            separateDialCode: true,
            utilsScript: "/js/2Frontend/vendor/telephone/utils.js"

        }));
        // var countryData = iti.intlTelInputGlobals.getCountryData();
        var number = iti.getNumber();
        var countryData = iti.getSelectedCountryData();

        var t = Object.values(countryData);

        document.getElementById("countryCode").value = t[2];

        input.addEventListener("countrychange", function() {
            var countryData = iti.getSelectedCountryData();

            var t = Object.values(countryData);


            document.getElementById("countryCode").value = t[2];
        });
    </script>
    <script>
        $("#button_2").click(function(e) {

            var selectF = document.getElementById("selectFrom");
            var selectFromValue = selectF.options[selectF.selectedIndex].value;
            var selectT = document.getElementById("selectTo");
            var selectToValue = selectT.options[selectT.selectedIndex].value;
            if(selectToValue == '' || selectToValue == 'Choose a Drop-Off Point')
            {
                e.preventDefault();
                return;
            }
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/admin/bookings/priceUpdate",
                dataType: "JSON",
                data: {
                    selectFrom: selectFromValue,
                    selectTo: selectToValue,// < note use of 'this' here
                    "_token": "{{ csrf_token() }}",
                },
                success: function(result) {
                    // var parsed_data = JSON.parse(result);
                    document.getElementById("priceUpdate").innerHTML="Price "+result.price;
                    document.getElementById('updateReturnPrice').value = result.returnPrice;
                    document.getElementById('updatePriceInput').value = result.price;
                },
                error: function(result) {
                    alert('Error');
                }
            });
        });
    </script>

    <script>
        $('#car_type').on('change', function() {
            var price = document.getElementById('updatePriceInput').value;
            var e = document.getElementById("car_type");
            var car_type = e.options[e.selectedIndex].value;
            var cars = {!! json_encode($cars) !!};

            var carPrice = parseFloat(0);

            for(var i=0; i<cars.length; i++)
            {
                if (car_type == cars[i].id) {
                    if(cars[i].fair == 500)
                    {
                        carPrice = parseFloat(price*.5);
                    }
                    else
                    {
                        carPrice = parseFloat(cars[i].fair);
                    }
                }

            }
            var retunType = document.getElementById("calReturnType").value;
            if(retunType == 1)
            {
                carPrice = carPrice*2;
            }
            document.getElementById('calCar').value = carPrice;

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
        });

        $('#meet').on('change', function() {
            var e = document.getElementById("meet");
            var meet = e.options[e.selectedIndex].value;

            var meetValue = {!! json_encode($siteSettings[0]->value) !!}
                meetValue = parseFloat(meetValue);

            if(meet == 1)
            {
                document.getElementById('calMeet').value = meetValue;
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
            else
            {
                document.getElementById('calMeet').value = 0;
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
        });
    </script>

@endsection


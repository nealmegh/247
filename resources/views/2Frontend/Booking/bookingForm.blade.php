@extends('2Frontend.layout2')

@section('content')
    <div id="book"></div>
    <section class="booking-form" style="margin-top: 120px;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 style="text-align: center;">Book your ride now!</h2>
        <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('front.booking.store').'#confirm' }}" novalidate>
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 col-sm-12">
                        <label for="car_type">Car Type</label>
                        {{--{{dd($cars)}}--}}
                        <select id="car_type" name="car_id">
                            @foreach($cars as $car)
                                {{--@if(old('car_id') == $car->id) selected @endif--}}
                                @if($car->fair == 0)
                                    <option value="{{$car->id}}" selected>{{$car->name.' '.$car->description}}</option>
                                @else
                                    <option value="{{$car->id}}">{{$car->name.' '.$car->description}}</option>
                                @endif
                            @endforeach
                        </select>
                        <style>
                        @media (min-width:768px){.desktop-show{display:block}.mobile-show{display:none}}
                        @media (max-width:768px){.desktop-show{display:none}.mobile-show{display:block}}
                        </style>
                        <p class="mobile-show" style="color:red"> PLEASE SELECT RIGHT VEHICLE FOR YOUR JOURNEY </p>
<i class="mobile-show">**It is customer's responsibility to select right vehicle, you may not entitled to get refund if you book a wrong vehicle**</i>
                    </div>

                    <div class="col-md-3">
                        <button style="margin-top:46px" type="button" class="btn btn-danger" data-toggle="modal" data-target="#carDetailsModal">
                            Vehicle Details
                        </button>
                    </div>
                </div>

                <p class="desktop-show" style="color:red"> PLEASE SELECT RIGHT VEHICLE FOR YOUR JOURNEY </p>
<i class="desktop-show">**It is customer's responsibility to select right vehicle, you may not entitled to get refund if you book a wrong vehicle**</i>


                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="carDetailsModal" tabindex="-1" role="dialog" aria-labelledby="carDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="carDetailsModalLabel">Vehicle Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <p style="color:red"> PLEASE SELECT RIGHT VEHICLE FOR YOUR JOURNEY </p>
<i>**It is customer's responsibility to select right vehicle, you may not entitled to get refund if you book a wrong vehicle**</i>

                                <p><strong>Saloon</strong> <br>
                                    Volkswagen Passat or similar Passenger up to 4 persons <br>
                                    Luggage 2pcs of 23kg and 8kg 2pcs<br>
                                    <strong>OR</strong> 30kg 1pc and 8kg 2pcs <br>
                                    <strong>OR</strong> 8kg 4pcs
                                </p>


                                <p><strong>Estate</strong> <br>
                                    Skoda Octavia estate or similar Passenger up to 4 persons<br>
                                    <strong>OR</strong> Luggage 23kg 3pcs and 8kg 3pcs<br>
                                    <strong>OR</strong> 30kg 2pcs and 8kg 2pcs <br>
                                </p>

                                <p><strong>Executive</strong> <br>
                                    Mercedes E class or similar Passenger up to 4 persons<br>
                                    <strong>OR</strong> Luggage 23kg 2pcs and 8kg 2pcs<br>
                                    <strong>OR</strong> 30kg 1pcs and 8kg 2pcs<br>
                                    <strong>OR</strong> 8kg 4pcs
                                </p>

                                <p><strong>Multi Seater</strong> <br>
                                    VW Transporter or similar Passenger up to 8 persons<br>
                                    <strong>OR</strong> Luggage 23kg 5pcs and 8kg 4pcs<br>
                                    <strong>OR</strong> 30kg 3pcs and 8kg 5pcs<br>
                                </p>
                                <p style="color:red"> If you need any assistance please call our office 01223247247 for more information.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @if($maintain == 'loc')
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="from">From</label>
                            <input id="from" class="inputField" type="text" name="from" value="{{$locationM->display_name}}" disabled>

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="to">To</label>
                            <input id="to" class="inputField" type="text" name="to" value="{{$airportN->display_name}}" disabled>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="from">From</label>
                            <input id="from" class="inputField" type="text" name="from" value="{{$airportN->display_name}}" disabled>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="to">To</label>
                            <input id="to" class="inputField" type="text" name="to" value="{{$locationM->display_name}}" disabled>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="journey-details-title">Journey Details</h4>
                        <div class="journey-details">
                            <div class="form-group-new">
                                <label for="pickup_address">Full Pickup Address (Post Code must be same with Selected Address) *</label>
                                <input id="pickup_address" class="inputField" type="text" name="pickup_address" placeholder="Specify Full Pickup Address" value="{{old('pickup_address')}}">
                            </div>
                            <div class="form-group-new">
                                <label for="dropoff_address">Full Drop off Address (Post Code must be same with Selected Address) *</label>
                                <input id="dropoff_address" class="inputField" type="text" name="dropoff_address" placeholder="Specify Full Drop off Address" value="{{old('dropoff_address')}}">
                            </div>
                            <div class="form-group-new">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="journey_date">Pick Up Date/Time *</label>
                                        <input id="journey_date" class="inputField date" type="text" name="journey_date" placeholder="Specify Pick Up Date" value="{{old('journey_date')}}">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="pickup_time">Journey Time *</label>
                                        <input type="text" id="pickup_time" class="form-control time" name="pickup_time" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-new">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="flight_number">Flight Number </label>
                                        <input id="flight_number" class="inputField" type="text" name="flight_number" placeholder="Eg: BA001" value="{{old('flight_number')}}" required="required">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="flight_origin">Flight/Train Origin </label>
                                        <input id="flight_origin" class="form-control col-md-7 col-xs-12" name="flight_origin" placeholder="Eg: Milan" required="required" type="text" value="{{old('flight_origin')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-new">
                                <label for="return">Return Ride</label>
                                <select id="return" name="return">
                                    <option value="1" >Yes</option>
                                    <option value="0" selected>No</option>
                                </select>
                            </div>
                            <div class="form-group-new" id="rPA" style="display: none">
                                <label for="return_pickup_address">Full Return Pickup Address (Post Code must be same with Selected Address) *</label>
                                <input id="return_pickup_address" class="inputField" type="text" name="return_pickup_address" placeholder="Specify Full Pickup Address" value="{{old('return_pickup_address')}}" disabled>
                            </div>
                            <div class="form-group-new" id="rDA" style="display: none">
                                <label for="return_dropoff_address">Full Return Drop off Address (Post Code must be same with Selected Address) *</label>
                                <input id="return_dropoff_address" class="inputField" type="text" name="return_dropoff_address" placeholder="Specify Full Drop off Address" value="{{old('return_dropoff_address')}}" disabled>
                            </div>
                            <div class="form-group-new">
                                <div class="row" id="rDate" style="display: none">
                                    <div class="col-md-6">
                                        <label for="return_date">Return Date/Time *</label>
                                        <input id="return_date" class="inputField date" type="text" name="return_date" placeholder="Specify Return Date" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label  for="return_time">Return Time *
                                        </label>
                                        {{--<div class='input-group date' id='return_time1'>--}}
                                        <input type='text' id="return_time" class="form-control time" name="return_time" disabled>
                                        {{--<span class="input-group-addon">--}}
                                        {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                        {{--</span>--}}
                                        {{--</div>--}}
                                    </div>

                                    <div class="col-md-6">
                                        <label for="return_flight_number">Flight Number </label>
                                        <input id="return_flight_number" class="inputField" type="text" name="return_flight_number" placeholder="Eg: BA001" value="{{old('return_flight_number')}}">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="return_flight_origin">Flight/Train Origin </label>
                                        <input id="return_flight_origin" class="form-control col-md-7 col-xs-12" name="return_flight_origin" placeholder="Eg: Milan" required="required" type="text" value="{{old('return_flight_origin')}}">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="passenger-details-title">Passenger Details</h4>
                        <div class="passenger-details">
                            <div class="field-group-new">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Adult *</label>
                                        <input class="" type="number" name="adult" min="1" max="10" value="{{old('adult')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Child *</label>
                                        <input class="" type="number" name="child" min="0" max="10" value="{{old('child')}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Luggage *</label>
                                        <input class="" type="number" name="luggage" min="0" max="5" value="{{old('luggage')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Carryon *</label>
                                        <input class="" type="number" name="carryon" min="0" max="5" value="{{old('carryon')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="field-group-new">
                                <label for="meet">Meet & Greet (£{{$siteSettings[0]->value}})</label>
                                <select id="meet" name="meet1" disabled="disabled" >
                                    <option value=1 selected>Yes</option>
                                    <option value=0 >No</option>
                                </select>
                                <input class=""  name="meet"  value='1' type="hidden">
                            </div>
                            <div class="field-group-new">
                                <label for="booking_details">Additional Instruction (if any)</label>
                                <textarea id="booking_details" class="inputField" name="add_info" placeholder="Ex: Come after 40 min flight lands"></textarea>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="form-inline payment-btn-group">
                            {{--<button class="btn payment-btn" type="button">Card</button>--}}
                            {{--<button class="btn payment-btn" type="button">{{'Total Fair £'.$price}}</button>--}}
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <input id="policy" type="checkbox" name="terms" value="1" style="width: auto;box-shadow: none; float: left;display: inline-block;
"><span style="
    display: inline-block;
    margin-top: 10px;
">Click to accept <a style="color: #0b97c4" target="_blank" href="{{route('terms')}}">terms & conditions</a>.</span> </br>
                        </div>
                        <input id="hiddenPrice" type="hidden" name="hiddenPrice" value="{{round($price+ floatval($siteSettings[0]->value), 2)}}">
                        <input id="hiddenReturnPrice" type="hidden" name="hiddenReturnPrice" value="{{round($returnPrice, 2)}}">
                        <input id="hiddenCarPrice" type="hidden" name="carPrice" value="0">
                        <input  type="hidden" name="location_id" value="{{$location}}">
                        <input  type="hidden" name="airport_id" value="{{$airport}}">
                        <input type="hidden" name="from_to" value="{{$maintain}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                        {{--@if(Auth::check())--}}

                        <div class="" id="" style="float: right;text-align:center;width:100%">
                            {{--<div class="boxed" style="border: 1px solid green ;">--}}
                            {{--{{'Book Now with Total Fair £'.round($price, 2)}}--}}
                            {{--</div>--}}
                            {{--<button style="margin-top: 1px" id="bookingButton" class="btn confirmBtn1" type="submit" disabled="disabled"> {{'Book Now with Total Fair £'.round($price, 2)}} </button>--}}
                            <h4 id="bookingButton">{{'Total Fair £'.round($price+floatval($siteSettings[0]->value), 2)}}</h4>
                            <input style="width:160px" id="bookButton" class="btn submit Btn shadow" type="submit" value="BOOK NOW" disabled>
                            {{--<button style="margin-top: 1px" name="type" value="paypal" id="bookingButton2" class="btn confirmBtn" type="submit" disabled="disabled">{{'Pay By Paypal'}}</button>--}}
                        </div>
                        {{--@else--}}
                        {{--<div class="col-md-12 col-sm-12">--}}
                        {{--<a href="/login" class="button">Login</a>--}}
                        {{--<a href="/register" class="button">Register</a>--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div>
                </div>




                {{--<div class="row">--}}
                {{--<div class="col-md-12 col-sm-12">--}}
                {{--</div>--}}
                {{--</div>--}}






            </div>
        </form>
    </section>
@endsection

@section('js')
    <script src="{{asset("js/moment.min.js")}}"></script>
    <script src="{{asset("js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js")}}"></script>

    <script>
        $( document ).ready(function() {
            console.log( "ready!" );
            $('html, body').animate({
                scrollTop: $("#book").offset().top
            }, 2000);
        });
    </script>
    <script>

        $('#policy').on('click', function() {
            console.log('hello');
            if(document.getElementById('bookButton').disabled){

                $("#bookButton").prop('disabled', false);

            }
            else {
                $("#bookButton").prop('disabled', true);

            }
        });
    </script>
    <script>

        $('#car_type').on('change', function() {

            var e = document.getElementById("car_type");
            var car_type = e.options[e.selectedIndex].value;
            var cars = {!! json_encode($cars) !!};
            var price = {!! json_encode($price) !!};
            var returnPrice = {!! json_encode($returnPrice) !!};
            returnPrice = parseFloat(returnPrice);
            var carPrice = parseFloat(0);
            var meetValue = {!! json_encode($siteSettings[0]->value) !!}
                meetValue = parseFloat(meetValue);

            var f = document.getElementById("return");
            var returnType = f.options[f.selectedIndex].value;
            var tp = parseFloat(0);
            var meetPrice = parseFloat(0);
            for(var i=0; i<cars.length; i++)
            {
                if (car_type == cars[i].id) {
                    if(cars[i].fair == 500)
                    {
                        carPrice = parseFloat(price*.5);
                        // carPrice = carPrice.toFixed(2);
                    }
                    else
                    {
                        carPrice = parseFloat(cars[i].fair);
                        // carPrice = carPrice.toFixed(2);
                    }
                }

            }
            if(returnType != 1)
            {
                returnPrice = 0;
            }
            else
            {
                carPrice = carPrice+carPrice;
            }
            var g = document.getElementById("meet");

            var meet = g.options[g.selectedIndex].value;

            if(meet == 1)
            {
                meetPrice = parseFloat(meetValue);
            }
            price = parseFloat(price);
            console.log(tp, price, returnPrice, carPrice, meetPrice)

            tp = price + returnPrice + carPrice + meetPrice;
            $("#hiddenPrice").val(function() {
                tp = parseFloat(tp);
                // tp = tp.toFixed(2);
                tp = Math.round(tp*100)/100;
                console.log('hi1'+tp);
                return tp;
            });
            $("#hiddenCarPrice").val(function() {
                // carPrice = carPrice.toFixed(2);
                carPrice = Math.round(carPrice*100)/100;
                console.log('hi2'+carPrice);
                return carPrice;
            });
            var button = document.getElementById('bookingButton');

            button.innerHTML = 'Book Now with Total Fair £'+  tp;

        });
        $('#meet').on('change', function() {

            var e = document.getElementById("meet");
            var meet = e.options[e.selectedIndex].value;
            var meetValue = {!! json_encode($siteSettings[0]->value) !!}
                meetValue = parseFloat(meetValue);

            if(meet == 1)
            {
                var hiddenPrice = document.getElementById('hiddenPrice');
                // console.log(hiddenPrice);
                var tp = parseFloat(hiddenPrice.value) + meetValue;
                $("#hiddenPrice").val(function() {
                    tp = tp.toFixed(2)
                    return tp;
                });
                var button = document.getElementById('bookingButton');

                button.innerHTML = 'Book Now with Total Fair £'+  tp;
            }
            else
            {
                var hiddenPrice = document.getElementById('hiddenPrice');
                // console.log(hiddenPrice);
                var tp = parseFloat(hiddenPrice.value) - meetValue;
                $("#hiddenPrice").val(function() {
                    tp = tp.toFixed(2)
                    return tp;
                });
                var button = document.getElementById('bookingButton');

                button.innerHTML = 'Book Now with Total Fair £'+  tp;
            }

        });
        $('#return').on('change', function() {

            document.getElementById("return_date").disabled = (this.value === '0');
            var x = document.getElementById("rDate");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            document.getElementById("return_dropoff_address").disabled = (this.value === '0');
            var xy = document.getElementById("rDA");
            if (xy.style.display === "none") {
                xy.style.display = "block";
            } else {
                xy.style.display = "none";
            }
            document.getElementById("return_pickup_address").disabled = (this.value === '0');
            var xz = document.getElementById("rPA");
            if (xz.style.display === "none") {
                xz.style.display = "block";
            } else {
                xz.style.display = "none";
            }
            document.getElementById("return_time").disabled = (this.value === '0');
            var e = document.getElementById("car_type");
            var car_type = e.options[e.selectedIndex].value;
            var cars = {!! json_encode($cars) !!};
            var price = {!! json_encode($price) !!};
            price = parseFloat(price);
            price = price.toFixed(2);
            // alert(price);
            var returnPrice = {!! json_encode($returnPrice) !!};
            returnPrice = parseFloat(returnPrice);
            returnPrice = returnPrice.toFixed(2);
            var meetValue = {!! json_encode($siteSettings[0]->value) !!};
            meetValue = parseFloat(meetValue);
            var carPrice = parseFloat(0);

            var f = document.getElementById("return");
            var returnType = f.options[f.selectedIndex].value;
            var tp = parseFloat(0);
            var meetPrice = parseFloat(0);
            for(var i=0; i<cars.length; i++)
            {
                if (car_type == cars[i].id) {
                    if(cars[i].fair == 500)
                    {
                        carPrice = parseFloat(price*.5);
                        carPrice = parseFloat(carPrice).toFixed(2);
                    }
                    else
                    {
                        carPrice = parseFloat(cars[i].fair);
                        carPrice = parseFloat(carPrice).toFixed(2);
                    }
                }

            }
            // alert(carPrice);
            if(returnType != 1)
            {
                returnPrice = 0;
            }
            else
            {
                carPrice = Number(carPrice)+Number(carPrice);
            }
            // alert(returnPrice);
            var g = document.getElementById("meet");

            var meet = g.options[g.selectedIndex].value;

            if(meet == 1)
            {

                meetPrice = parseFloat(meetValue);
            }
            // alert(meetPrice);
            console.log(price, carPrice, meetPrice, returnPrice, 'I am here');
            tp = Number(price) + Number(returnPrice) + Number(carPrice)  + Number(meetPrice);
            console.log('TP not working '+tp);
            tp = parseFloat(tp);
            $("#hiddenPrice").val(function() {
                tp = parseFloat(tp).toFixed(2);
                return tp;
            });
            $("#hiddenCarPrice").val(function() {
                carPrice = parseFloat(carPrice).toFixed(2);
                return carPrice;
            });

            var button = document.getElementById('bookingButton');

            button.innerHTML = 'Book Now with Total Fair £'+  tp;

        });

    </script>

{{--    <script>--}}
{{--        var settings = {!! json_encode($siteSettings[10]->value) !!};--}}
{{--        // var some_date_range = ['2020-12-25' , '2020-12-31'];--}}
{{--        var tryDate = settings.split(',');--}}
{{--        // alert( tryDate);--}}
{{--       var some_date_range = tryDate;--}}
{{--        // alert(settings);--}}

{{--        function formatDate(date) {--}}
{{--            var d = new Date(date),--}}
{{--                month = '' + (d.getMonth() + 1),--}}
{{--                day = '' + d.getDate(),--}}
{{--                year = d.getFullYear();--}}

{{--            if (month.length < 2)--}}
{{--                month = '0' + month;--}}
{{--            if (day.length < 2)--}}
{{--                day = '0' + day;--}}

{{--            return [year, month, day].join('-');--}}
{{--        }--}}
{{--        var nowDate = new Date();--}}
{{--        nowDate.setDate(nowDate.getDate() + 2);--}}
{{--        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate() , 0, 0, 0, 0);--}}

{{--        var todayString = today.toDateString();--}}
{{--        var minDate = formatDate(todayString);--}}
{{--        var selectedDate = $(function() {--}}
{{--            $('.date').daterangepicker({--}}
{{--                singleDatePicker: true,--}}
{{--                showDropdowns: true,--}}
{{--                minDate: minDate,--}}
{{--                isInvalidDate: function(date) {--}}
{{--                    for(var ii = 0; ii < some_date_range.length; ii++) {--}}
{{--                        if (date.format('YYYY-M-D') == some_date_range[ii]) {--}}

{{--                            return true;--}}
{{--                        }--}}
{{--                    }--}}
{{--                },--}}
{{--                locale: {--}}
{{--                    format: 'YYYY-MM-DD'--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}
{{--    <script>--}}
{{--        var nowDate = new Date();--}}
{{--        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);--}}
{{--        var now = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), nowDate.getHours(), nowDate.getMinutes());--}}
{{--        // console.log(now);--}}
{{--        $('.time').daterangepicker({--}}

{{--            timePicker: true,--}}
{{--            singleDatePicker: true,--}}
{{--            timePicker24Hour: false,--}}
{{--            timePickerIncrement: 5,--}}
{{--            timePickerSeconds: false,--}}
{{--            locale: {--}}
{{--                format: 'HH:mm'--}}
{{--            }--}}
{{--        }).on('show.daterangepicker', function (ev, picker) {--}}
{{--            picker.container.find(".calendar-table").hide();--}}
{{--        });--}}
{{--    </script>--}}
<script>
    var f1 = flatpickr(document.getElementById('journey_date'), {
        minDate: "today",
        dateFormat: "d-m-Y"
    });
    var f2 = flatpickr(document.getElementById('pickup_time'), {
        enableTime: true,
        noCalendar: true,
        time_24hr: true
    });
    var f3 = flatpickr(document.getElementById('return_date'), {
        minDate: "today",
        dateFormat: "d-m-Y"
    });
    var f4 = flatpickr(document.getElementById('return_time'), {
        enableTime: true,
        noCalendar: true,
        time_24hr: true
    });
</script>
@append

@extends('Backend.layout')
@section('css')
    {{--@include('Backend.Car.Associate.css');--}}
@append

@section('content')
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User <small>Edit</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('booking.update', $booking->id )}}">

                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="selectFrom" class="control-label col-md-3 col-sm-3 col-xs-12">From</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select id="selectFrom" name="selectFrom" class="select2_group form-control">
                                                <option value="placeholder" selected>Choose a Pick-Up Point</option>
                                                <optgroup label="Airports">

                                                    @foreach($airports as $airport)
                                                        @if($booking->from_to != 'loc' && $booking->airport->id == $airport->id)
                                                            <option value="{{'air'.$airport->id}}" selected>{{$airport->display_name}}</option>
                                                        @else
                                                            <option value="{{'air'.$airport->id}}">{{$airport->display_name}}</option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Area">
                                                    @foreach($locations as $location)
                                                        @if($booking->from_to == 'loc' && $booking->location->id == $location->id)
                                                            <option value="{{'loc'.$location->id}}" selected>{{$location->display_name}}</option>
                                                        @else
                                                            <option value="{{'loc'.$location->id}}">{{$location->display_name}}</option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="selectTo" class="control-label col-md-3 col-sm-3 col-xs-12">To</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select id="selectTo" name="selectTo" class="select2_group form-control">
                                                @if($booking->from_to == 'loc')
                                                    {{--<optgroup label="Airports">--}}

                                                        @foreach($airports as $airport)
                                                            @if( $booking->airport->id == $airport->id)
                                                                <option value="{{$airport->id}}" selected>{{$airport->display_name}}</option>
                                                            @else
                                                                <option value="{{$airport->id}}">{{$airport->display_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    {{--</optgroup>--}}
                                                @else
                                                    {{--<optgroup label="Area">--}}
                                                        @foreach($locations as $location)
                                                            @if($booking->location->id == $location->id)
                                                                <option value="{{$location->id}}" selected>{{$location->display_name}}</option>
                                                            @else
                                                                <option value="{{$location->id}}">{{$location->display_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    {{--</optgroup>--}}
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pickup_address">Pick Up Address <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="pickup_address" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pickup_address" value="{{$booking->pickup_address}}" placeholder="Put Pickup Address" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dropoff_address">Drop Off Address <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="dropoff_address" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="dropoff_address" value="{{$booking->dropoff_address}}" placeholder="Put Drop Off Address" required="required" type="text">
                                </div>
                            </div>
                            {{--#####################--}}
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="journey_date">Journey Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="journey_date" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="journey_date" value="{{date('Y-m-d',strtotime($booking->journey_date))}}" placeholder="Journey Date" required="required" type="date">

                                    {{--<div class='input-group date' id='journey_date'>--}}
                                    {{--<input type='text' name="journey_date" placeholder="Journey Date" required="required" class="form-control" />--}}
                                    {{--<span class="input-group-addon">--}}
                                    {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                    {{--</span>--}}

                                    {{--</div>--}}


                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pickup_time">Journey Time <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{--<input id="journey_date" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="journey_date" placeholder="Journey Date" required="required" type="date">--}}


                                    {{--try--}}
                                    <div class='input-group date' id='pickup_time'>
                                        <input type='text' class="form-control" name="pickup_time" value="{{$booking->pickup_time}}" />
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    </div>
                                    {{--Try--}}

                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="flight_number">Flight/Train Number <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="flight_number" class="form-control col-md-7 col-xs-12" name="flight_number" value="{{$booking->flight_number}}" placeholder="Flight/Train Name" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="flight_origin">Flight Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="flight_origin" class="form-control col-md-7 col-xs-12" name="flight_origin" value="{{$booking->flight_origin}}" placeholder="Flight/Train Number" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="return" class="control-label col-md-3 col-sm-3 col-xs-12">Return Journey</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="return" name="return" class="form-control">
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
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="return_date">Return Journey Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="return_date" class="form-control col-md-7 col-xs-12" name="return_date" value="{{date('Y-m-d',strtotime($booking->return_date))}}" placeholder="Return Journey Date" required="required" type="date">
                                    {{--<div class='input-group date' id='return_date'>--}}
                                    {{--<input type='text'name="return_date" placeholder="Journey Date" required="required" class="form-control" />--}}
                                    {{--<span class="input-group-addon">--}}
                                    {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                    {{--</span>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="return_time">Return Time <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{--<input id="journey_date" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="journey_date" placeholder="Journey Date" required="required" type="date">--}}


                                    {{--try--}}
                                    <div class='input-group date' id='return_time'>
                                        <input type='text' class="form-control" name="return_time" value="{{$booking->return_time}}" />
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    </div>
                                    {{--Try--}}

                                </div>
                            </div>
                            <div class="item form-group" id="rFlight" style="">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="return_flight_number">Flight/Train Number <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="return_flight_number" class="form-control col-md-7 col-xs-12" name="return_flight_number" placeholder="Flight/Train Name" required="required" type="text" value="{{$booking->return_flight_number}}">
                                </div>
                            </div>
                            <div class="item form-group" id="rOrigin" style="">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="return_flight_origin">Flight Origin<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="return_flight_origin" class="form-control col-md-7 col-xs-12" name="return_flight_origin" placeholder="Flight/Train Number" required="required" type="text" value="{{$booking->return_flight_origin}}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label for="car_type" class="control-label col-md-3 col-sm-3 col-xs-12">Car Type</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="car_type" class="form-control" name="car_id">
                                        @foreach($cars as $car)
                                            @if($booking->car->id == $car->id)
                                                <option value="{{$car->id}}" selected>{{$car->name.' '.$car->description}}</option>
                                            @else
                                                <option value="{{$car->id}}">{{$car->name.' '.$car->description}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="user_id" class="control-label col-md-3 col-sm-3 col-xs-12">Customer</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="user_id" class="form-control" name="user_id">
                                        <option>Chooose One</option>
                                        @foreach($users as $user)
                                            @if($booking->user->id == $user->id)
                                                <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                            @else
                                                <option value="{{$user->id}}" >{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="meet" class="control-label col-md-3 col-sm-3 col-xs-12">Meet & Greet (£10)</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="meet" name="meet" class="form-control">
                                        @if($booking->meet == 0)
                                            <option value=0 selected>No</option>
                                            <option value=1>Yes</option>
                                        @else
                                            <option value=0 >No</option>
                                            <option value=1 selected>Yes</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="adult" class="control-label col-md-3 col-sm-3 col-xs-12">Adult & Child</label>
                                <div class="col-md-3 col-sm-3 col-xs-12 ">
                                    <input type="number" class="form-control has-feedback-left" id="adult" name="adult" value="{{$booking->adult}}" placeholder="Adult">

                                    {{--<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>--}}
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 ">
                                    <input type="number" class="form-control has-feedback-left" id="child" name="child" value="{{$booking->child}}" placeholder="Child">

                                    {{--<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>--}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="luggage" class="control-label col-md-3 col-sm-3 col-xs-12">Luggage & Carry On</label>
                                <div class="col-md-3 col-sm-3 col-xs-12 ">
                                    <input type="number" class="form-control has-feedback-left" id="luggage" name="luggage" value="{{$booking->luggage}}" placeholder="Luggage">

                                    {{--<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>--}}
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 ">
                                    <input type="number" class="form-control has-feedback-left" id="carryon" name="carryon" value="{{$booking->carryon}}" placeholder="Carry On">

                                    {{--<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>--}}
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="add_info" class="control-label col-md-3 col-sm-3 col-xs-12">Additional Info <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{--<input id="add_info" class="form-control col-md-7 col-xs-12" name="add_info" placeholder="Flight/Train Name" required="required" type="textarea">--}}
                                    <textarea id="booking_details" class="form-control col-md-7 col-xs-12" name="add_info" placeholder="Type Here">{{$booking->add_info}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="discount_type" class="control-label col-md-3 col-sm-3 col-xs-12">Discount Type</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
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
                            </div>
                            <div class="form-group">
                                <label for="discount_value" class="control-label col-md-3 col-sm-3 col-xs-12">Discount Value</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" class="form-control" id="discount_value" name="discount_value" value="{{$booking->discount_value}}" placeholder="Discount Value">
                                </div>
                            </div>

                            {{--<div class="item form-group">--}}
                            {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="dropoff_address">Drop Off Address <span class="required">*</span>--}}
                            {{--</label>--}}
                            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                            {{--<input id="dropoff_address" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="dropoff_address" placeholder="Put Drop Off Address" required="required" type="text">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                            {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="dropoff_address">Drop Off Address <span class="required">*</span>--}}
                            {{--</label>--}}
                            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                            {{--<input id="dropoff_address" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="dropoff_address" placeholder="Put Drop Off Address" required="required" type="text">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                            {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>--}}
                            {{--</label>--}}
                            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                            {{--<input type="email" id="email" name="email" placeholder="Email Address" required="required" class="form-control col-md-7 col-xs-12">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                            {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone<span class="required">*</span>--}}
                            {{--</label>--}}
                            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                            {{--<input type="text" id="phone" name="phone_number" placeholder="Enter Your Phone Number" required="required"  class="form-control col-md-7 col-xs-12">--}}
                            {{--</div>--}}
                            {{--</div>--}}


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    @include('Backend.Car.Associate.js');
    <script type="text/javascript">

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
                        .append('<option value="">Choose a Drop-Off Point</option>')
                ;


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
        // var dateToday = new Date();
        // $('#journey_date').datetimepicker({
        //     useCurrent: false,
        //     minDate: dateToday,
        //     format: 'DD.MM.YYYY',
        // });
        //
        // $('#return_date').datetimepicker({
        //     useCurrent: false,
        //     format: 'DD.MM.YYYY',
        // });
        //
        //
        // $("#journey_date").on("dp.change", function(e) {
        //     $('#return_date').data("DateTimePicker").minDate(e.date);
        // });
        //
        // $("#return_date").on("dp.change", function(e) {
        //     $('#journey_date').data("DateTimePicker").maxDate(e.date);
        // });
        $('#pickup_time').datetimepicker({
            format: 'hh:mm A'
        });
        $('#return_time').datetimepicker({
            format: 'hh:mm A'
        });

    </script>
@append
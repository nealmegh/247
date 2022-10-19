@extends('Backend.layout')
@section('css')
    @include('Backend.Car.Associate.css');
@append

@section('content')
    <div class="">
        <div class="page-title">


            <div class="title_right">
{{--{{dd($errors->first())}}--}}
                {{--@if($errors->any())--}}
                    {{--<h4>{{$errors->first()}}</h4>--}}
                {{--@endif--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        {{--<h2>Select <small>Driver</small></h2>--}}
                        {{--<ul class="nav navbar-right panel_toolbox">--}}

                            {{--<li><a title="Create a Booking" href="{{route('booking.create')}}" class="btn btn-app">--}}
                                    {{--<i class="fa fa-user"></i> <span>Create </span>--}}
                                {{--</a>--}}
                                {{--<a class="close-link"><i class="fa fa-close"></i></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        <form class="form-horizontal form-label-left" novalidate method="GET" action="{{route('invoice.select')}}">

                            {{--@csrf--}}

                            <div class="form-group">
                                <label for="driver_id" class="control-label col-md-3 col-sm-3 col-xs-12">Select Driver</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="driver_id" class="form-control" name="driver_id">
                                        <option value="" disabled selected>Choose Driver</option>
                                        @foreach($drivers as $driver)
                                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Start Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="start_date" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="start_date" placeholder="Start Date" required="required" type="date">

                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end_date">End Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="end_date" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="end_date" placeholder="End Date" required="required" type="date">

                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

@section('js')
    {{--@include('Backend.Car.Associate.js');--}}
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$('#datatable1').DataTable( {--}}
                {{--"aaSorting": [[ 0, "desc" ]]--}}
            {{--} );--}}
        {{--} );--}}
    {{--</script>--}}
@append
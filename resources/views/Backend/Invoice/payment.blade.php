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
                        <h2>Payment <small>Process</small></h2>

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

                            <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('cashPayment') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{$booking->id}}">
                                <button style="margin-top: 1px" name="type" value="cash" id="bookingButton" class="btn confirmBtn" type="submit"> {{'Pay Cash'}} </button>
                            </form>
                            <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('paypalPayment') }}">
                                @csrf
                                @if($booking->final_price != null)
                                    <input type="hidden" name="amount" value="{{$booking->final_price}}">
                                @else
                                    <input type="hidden" name="amount" value="{{$booking->price}}">
                                @endif
                                <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                <button style="margin-top: 1px" name="type" value="paypal" id="bookingButton2" class="btn confirmBtn" type="submit">{{'Pay By Paypal'}}</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    @include('Backend.Car.Associate.js');
@append
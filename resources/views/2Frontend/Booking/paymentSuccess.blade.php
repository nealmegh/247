@extends('Frontend.Profile.profile')
@section('css')
    @include('Backend.Car.Associate.css');
@append

@section('content')
    <div class="">
        <div class="page-title">


            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <h1>Your Booking has been successfully done. Please check your email for further updates.
                  <br> Call us on +441223 247 247 for any assistance.</h1>
            </div>

        </div>
    </div>


@endsection

@section('js')
    @include('Backend.Car.Associate.js');
@append
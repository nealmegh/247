@extends('Backend.layout')
@section('css')
    @include('Backend.Car.Associate.css');
@append

@section('content')
    <style>
        th{
            text-align: center !important;
        }
    </style>
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Car Type <small>Show</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped text-center table-bordered">
                            <thead>
                            <tr>
                                <th>Attributes</th>
                                <th>Values</th>

                            </tr>
                            </thead>


                            <tbody>

                                <tr>
                                    <td>Name</td>
                                    <td>{{$car->name}}</td>

                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>{{$car->size}}</td>

                                </tr>
                                <tr>
                                    <td>Luggage Capacity</td>
                                    <td>{{$car->luggage}}</td>

                                </tr>
                                <tr>
                                    <td>Fair</td>
                                    <td>{{$car->fair}}</td>

                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{$car->description}}</td>

                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>@if($car->status == 0){{'Inactive'}}@else{{'Active'}}@endif</td>

                                </tr>


                            </tbody>
                        </table>

                    </div></div></div></div></div>
@endsection

@section('js')
    @include('Backend.Car.Associate.js');
@append
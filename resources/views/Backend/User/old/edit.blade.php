@extends('Backend.layout')
@section('css')
    {{--@include('Backend.Car.Associate.css');--}}
    <style>
        .iti__flag {background-image: url("/css/2Frontend/vendor/img/flags.png");}

        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .iti__flag {background-image: url("/css/2Frontend/vendor/img/flags@2x.png");}
        }
    </style>
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

                        <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('user.update', $user->id )}}">

                            @csrf

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$user->name}}" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Name of the User" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$user->email}}" type="email" id="email" name="email" placeholder="Email Address" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$user->phone}}" type="tel" id="phone" name="phone" placeholder="Enter Your Phone Number" required="required"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Role</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="role">
                                        <option value="" disabled selected>Choose option</option>
                                        @foreach($roles as $role)
                                            @if($userRole->id == $role->id)
                                                <option value="{{$role->id}}" selected>{{$role->name}} </option>
                                            @else
                                                <option value="{{$role->id}}">{{$role->name}} </option>
                                            @endif

                                        @endforeach
                                    </select>
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
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    @include('Backend.Car.Associate.js');
    <script src="{{asset('js/2Frontend/vendor/telephone/intlTelInput.min.js')}}"></script>

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
@append

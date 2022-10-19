<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{$siteSettings[9]->value}}</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href={{ asset("css/theme/plugins.css") }} rel="stylesheet" type="text/css" />
    <link href={{ asset("css/theme/authentication/form-2.css") }} rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href={{ asset("css/theme/forms/theme-checkbox-radio.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("css/theme/forms/switches.css") }}>
</head>

{{--            <form method="POST" action="/forgot-password">--}}
{{--                @csrf--}}

{{--                <div class="form-group">--}}
{{--                    <x-jet-label value="Email" />--}}
{{--                    <x-jet-input type="email" name="email" :value="old('email')" required autofocus />--}}
{{--                </div>--}}

{{--                <div class="d-flex justify-content-end mt-4">--}}
{{--                    <x-jet-button>--}}
{{--                        {{ __('Email Password Reset Link') }}--}}
{{--                    </x-jet-button>--}}
{{--                </div>--}}
{{--            </form>--}}
<body class="form no-image-content">


<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1 class="">Password Recovery</h1>
                    <p class="signup-link recovery">Enter your email and instructions will sent to you!</p>
                    <form class="text-left"  method="POST" action="/forgot-password">
                        @csrf
                        <div class="form">

                            <div id="email-field" class="field-wrapper input">
                                <div class="d-flex justify-content-between">
                                    <label for="email">EMAIL</label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                <input id="email" name="email" type="text" class="form-control" value="" placeholder="Email">
                            </div>

                            <div class="d-sm-flex justify-content-between">

                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Reset</button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src= {{ asset("js/theme/js/libs/jquery-3.1.1.min.js") }}></script>
<script src= {{ asset("js/app.js") }}></script>
<script src= {{ asset("js/theme/js/app.js") }}></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src={{ asset("js/theme/js/authentication/form-2.js") }}></script>
<script>
    $('#policy').on('click', function() {
        console.log('hello');
        if(document.getElementById('register_save').disabled){

            $("#register_save").prop('disabled', false);

        }
        else {
            $("#register_save").prop('disabled', true);

        }
    });
</script>

</body>
</html>

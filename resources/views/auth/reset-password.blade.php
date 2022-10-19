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

<body class="form no-image-content">


<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h1 class="">Reset Password </h1>


{{--            <form method="POST" action="/reset-password">--}}
{{--                @csrf--}}



{{--                <div class="form-group">--}}
{{--                    <x-jet-label value="{{ __('Email') }}" />--}}

{{--                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"--}}
{{--                                 :value="old('email', $request->email)" required autofocus />--}}
{{--                    <x-jet-input-error for="email"></x-jet-input-error>--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <x-jet-label value="{{ __('Password') }}" />--}}

{{--                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"--}}
{{--                                 name="password" required autocomplete="new-password" />--}}
{{--                    <x-jet-input-error for="password"></x-jet-input-error>--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <x-jet-label value="{{ __('Confirm Password') }}" />--}}

{{--                    <x-jet-input class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password"--}}
{{--                                 name="password_confirmation" required autocomplete="new-password" />--}}
{{--                    <x-jet-input-error for="password_confirmation"></x-jet-input-error>--}}
{{--                </div>--}}

{{--                <div class="mb-0">--}}
{{--                    <div class="d-flex justify-content-end">--}}
{{--                        <x-jet-button>--}}
{{--                            {{ __('Reset Password') }}--}}
{{--                        </x-jet-button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
                    <form class="text-left"  method="POST" action="/reset-password">
                        @csrf
                        <div class="form">
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div id="email-field" class="field-wrapper input">
                                <div class="d-flex justify-content-between">
                                    <label for="email">EMAIL</label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                <input id="email"type="email" name="email"  value="{{old('email', $request->email)}}" required autofocus class="form-control"placeholder="Email">
                            </div>
                            <div id="email-password" class="field-wrapper input">
                                <div class="d-flex justify-content-between">
                                    <label for="password">Password</label>
                                </div>
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>--}}
                                <input id="password"type="password" name="password"  value="" required autofocus class="form-control" placeholder="Password">
                            </div>
                            <div id="email-field" class="field-wrapper input">
                                <div class="d-flex justify-content-between">
                                    <label for="password_confirmation">Password Confirmation</label>
                                </div>
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>--}}
                                <input id="password_confirmation"type="password" name="password_confirmation"  value="" required autofocus class="form-control" placeholder="Password COnfirmation">
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

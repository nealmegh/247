
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$siteSettings[9]->value}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href={{ asset("css/theme/loader.css") }} rel="stylesheet" type="text/css" />
    <script src={{ asset("js/theme/js/loader.js") }}></script>
    <link href={{ asset("css/theme/plugins.css") }} rel="stylesheet" type="text/css" />
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href={{ asset("css/theme/plugins/apex/apexcharts.css") }} rel="stylesheet" type="text/css">
    {{-- <link href={{ asset("css/theme/plugins/perfect-scrollbar/perfect-scrollbar.css") }} rel="stylesheet" type="text/css"> --}}
    {{-- <link href={{ asset("css/theme/plugins/highlight/styles/monokai-sublime.css") }} rel="stylesheet" type="text/css"> --}}
    <link href={{ asset("css/theme/dashboard/dash_1.css") }} rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset("css/theme/elements/alert.css" )}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        body {
            font-family: 'Nunito';
            background: #f7fafc;
        }
    </style>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- FAVICON LINK -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/2Frontend/favicon.png')}}">
{{--<link rel="icon" href="{{asset("images/favicon_32x32.png")}}" type="image/ico" />--}}

<title> Home | {{$siteSettings[9]->value}}</title>
{{--Intel Input--}}
<link href="{{asset('css/2Frontend/vendor/telephone/intlTelInput.css')}}" rel="stylesheet">
<!-- Bootstrap -->
<link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{asset("css/font-awesome.min.css")}}" rel="stylesheet">
<!-- NProgress -->
<link href=" {{asset("css/nprogress.css")}} " rel="stylesheet">
<!-- iCheck -->
<link href=" {{asset("css/green.css")}} " rel="stylesheet">

<!-- bootstrap-progressbar -->
<link href=" {{asset("css/bootstrap-progressbar-3.3.4.min.css")}} " rel="stylesheet">
<!-- JQVMap -->
<link href=" {{asset("css/jqvmap.min.css")}}" rel="stylesheet"/>
<!-- bootstrap-daterangepicker -->
<link href=" {{asset("css/daterangepicker.css")}} " rel="stylesheet">

<!-- Custom Theme Style -->
<link href=" {{asset("css/custom.min.css")}} " rel="stylesheet">


{{-- Select 2--}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}


{{--Tinymce--}}
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#terms'
    });
</script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}


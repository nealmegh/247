@extends('theme.base')
@section('head-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/regular.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/fontawesome.css")}}>
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link href={{asset("css/theme/scrollspyNav.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/animate/animate.css")}} rel="stylesheet" type="text/css" />
    <script src={{asset("css/theme/plugins/sweetalerts/promise-polyfill.js")}}></script>
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/tabs-accordian/custom-tabs.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/forms/switches.css" )}} rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href={{asset("css/theme/plugins/editors/markdown/simplemde.min.css" )}}>
    <link href={{asset("css/theme/plugins/flatpickr/custom-flatpickr.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/flatpickr/flatpickr.css" )}} rel="stylesheet" type="text/css" />
    <style>
        .create-button{
            position: relative;
            width: fit-content;
        }
        .button-holder{
            padding-top: 1.5%;
            padding-bottom: 30px;
            margin-bottom: 2px;

        }
        .create-button-btn{
            position: absolute;
            right: 0% !important;
        }
        .custom-bipon.active{
            box-shadow: 0px 5px 15px 0px rgb(0 0 0 / 30%) !important;
            background-color: #009688!important;
            border-color: transparent!important;
            border-radius: 0.625rem !important;
            /* background-color: #ffffff; */
            /* border: solid 1px #e4e2e2; */
            /* padding: 11px 23px; */
            text-align: center!important;
            width: 100px!important;
            padding: 20px!important;
        }
        .custom-bipon{
            border-radius: 0.625rem !important;
            background-color: #ffffff!important;
            border: solid 1px #e4e2e2!important;
            text-align: center!important;
            width: 100px!important;
            padding: 20px!important;
        }
    </style>

@endsection

@section('main-content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            @if(Session::has('message'))
                <div class="alert alert-gradient mb-4" role="alert">
                    <button  type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>{{ Session::get('message') }}</strong>
                </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">


                    <div class="col 12 button-holder" style="display: flex">
                        <div class="col-8">
                            <h3>Settings</h3>
                        </div>
                        <div class="create-button col-4">
{{--                            <a href="{{route('cars.create')}}" class="create-button-btn btn btn-success mb-6 mr-4 btn-lg"> Create</a>--}}
                        </div>
                    </div>
                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('setting.update')}}">
                        @csrf
                    <div class="row mb-4 mt-3">
                        <div class="col-sm-4 col-12">
                            <div class=" nav flex-column nav-pills mb-sm-0 mb-3" id="rounded-vertical-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="custom-bipon nav-link mb-2 active mx-auto" id="rounded-vertical-pills-home-tab" data-toggle="pill" href="#rounded-vertical-pills-home" role="tab" aria-controls="rounded-vertical-pills-home" aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    Home</a>
                                <a class="custom-bipon nav-link mb-2 mx-auto" id="rounded-vertical-pills-profile-tab" data-toggle="pill" href="#rounded-vertical-pills-profile" role="tab" aria-controls="rounded-vertical-pills-profile" aria-selected="false">
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    Contact</a>
                                <a class="custom-bipon nav-link mb-2 mx-auto" id="rounded-vertical-pills-messages-tab" data-toggle="pill" href="#rounded-vertical-pills-messages" role="tab" aria-controls="rounded-vertical-pills-messages" aria-selected="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                      Paypal</a>
                                <a class="custom-bipon nav-link mb-2 mx-auto" id="rounded-vertical-pills-terms-tab" data-toggle="pill" href="#rounded-vertical-pills-terms" role="tab" aria-controls="rounded-vertical-pills-terms" aria-selected="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                                     Terms</a>
                            </div>
                        </div>

                        <div class="col-sm-8 col-12">
                            <div class="tab-content" id="rounded-vertical-pills-tabContent">
                                    <div class="tab-pane fade show active" id="rounded-vertical-pills-home" role="tabpanel" aria-labelledby="rounded-vertical-pills-home-tab">
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="site_name">Site Name</label>
                                            <input type="text" id="site_name" name="site_name" placeholder="Company Name" value="{{($useSettings['site_name'][0] != Null) ? $useSettings['site_name'][0] :''}}"  class="form-control" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="holiday_dates">Disable Dates</label>
                                            <input id="holiday_dates" class="form-control date"  type="text" value="{{($useSettings['holiday_dates'][0] != Null) ? $useSettings['holiday_dates'][0] :''}}" name="holiday_dates" placeholder="Specify Dates">

                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="surcharge_time">Surcharge Starts</label>
                                            <input id="surcharge_time" class="form-control date"  type="text"  value="{{($useSettings['surcharge_time'][0] != Null) ? $useSettings['surcharge_time'][0] :''}}"  name="surcharge_time" placeholder="Specify Time">


                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="surcharge_stays">Surcharge Stays</label>
                                            <input id="surcharge_stays" class="form-control date"  type="text"  value="{{($useSettings['surcharge_stays'][0] != Null) ? $useSettings['surcharge_stays'][0] :''}}"  name="surcharge_stays" placeholder="Specify Hour">
                                            {{--                                            value="{{($useSettings['surcharge_time'][0] != Null) ? $useSettings['surcharge_time'][0] :''}}"--}}

                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="surcharge_amount">Surcharge Amount</label>
                                            <input id="surcharge_amount" class="form-control date"  type="text"  value="{{($useSettings['surcharge_amount'][0] != Null) ? $useSettings['surcharge_amount'][0] :''}}"  name="surcharge_amount" placeholder="Specify Amount">
                                            {{--                                            value="{{($useSettings['surcharge_time'][0] != Null) ? $useSettings['surcharge_time'][0] :''}}"--}}

                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="email">Email</label>
                                            <input type="text" id="email" name="email" placeholder="Company Email" value="{{($useSettings['email'][0] != Null) ? $useSettings['email'][0] :''}}"  class="form-control" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="facebook">Facebook</label>
                                            <input type="text" id="facebook" name="facebook" placeholder="Facebook Profile Address" value="{{($useSettings['facebook'][0] != Null) ? $useSettings['facebook'][0] :''}}"  class="form-control" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="twitter">Twitter</label>
                                            <input type="text" id="twitter" name="twitter" placeholder="Twitter Profile Address" value="{{($useSettings['twitter'][0] != Null) ? $useSettings['twitter'][0] :''}}"  class="form-control" >
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="rounded-vertical-pills-profile" role="tabpanel" aria-labelledby="rounded-vertical-pills-profile-tab">
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="contact-email">Contact Email</label>
                                            <input type="text" id="contact-email" name="contact-email" placeholder="Contact Email" value="{{($useSettings['contact-email'][0] != Null) ? $useSettings['contact-email'][0] :''}}"  class="form-control" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="phone">Phone Number</label>
                                            <input type="text" id="phone" name="phone" placeholder="Company Phone" value="{{($useSettings['phone'][0] != Null) ? $useSettings['phone'][0] :''}}"  class="form-control" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="address">Company Address</label>
                                            <input type="text" id="address" name="address" placeholder="Company Address" value="{{($useSettings['address'][0] != Null) ? $useSettings['address'][0] :''}}"  class="form-control" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="address2">2nd Address</label>
                                            <input type="text" id="address2" name="address2" placeholder="Continue Address" value="{{($useSettings['address2'][0] != Null) ? $useSettings['address2'][0] :''}}"  class="form-control" >
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="rounded-vertical-pills-messages" role="tabpanel" aria-labelledby="rounded-vertical-pills-messages-tab">
                                        <div class="form-group mb-4" style="display: flex">
                                            <div class="col-md-3" >
                                            <label class="control-label" for="meet">Meet & Greet</label><br>
                                            <label class="switch s-icons s-outline s-outline-success mr-2">
                                                @if($useSettings['meet&greet'][0] == 1)
                                                    <input id="meet" name="meet" type="checkbox" value="1" checked>
                                                @else
                                                    <input id="meet" name="meet" type="checkbox" value="0">
                                                @endif
                                                <span class="slider round"></span>
                                            </label>
                                            </div>

                                            <input type="hidden" id="hmeet" name="meet&greet" value="{{$useSettings['meet&greet'][0]}}">
                                            <input type="hidden" id="hcash" name="Cash" value="{{$useSettings['Cash'][0]}}">
                                            <input type="hidden" id="hpaypal" name="paypal" value="{{$useSettings['paypal'][0]}}">
                                            <input type="hidden" id="hpaypal_mode" name="paypal_mode" value="{{$useSettings['paypal_mode'][0]}}">

                                            <div class="col-md-3">
                                            <label class="control-label" for="cash">Cash Payment</label> <br>
                                            <label class="switch s-icons s-outline s-outline-success mr-2">
                                                @if($useSettings['Cash'][0] == 1)
                                                    <input id="cash" name="rcash" type="checkbox" value="1" checked>
                                                @else
                                                    <input id="cash" name="rcash" type="checkbox" value="0">
                                                @endif

                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                            <div class="col-md-2">
                                                <label class="control-label" for="paypal">Paypal</label><br>
                                                <label class="switch s-icons s-outline s-outline-success mr-2">
                                                    @if($useSettings['paypal'][0] == 1)
                                                        <input id="paypal" name="rpaypal" type="checkbox" value="1" checked>
                                                    @else
                                                        <input id="paypal" name="rpaypal" type="checkbox" value="0">
                                                    @endif

                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label" for="paypal_mode">Paypal Mode</label><br>
                                                <label class="switch s-icons s-outline s-outline-success mr-2">
                                                    @if($useSettings['paypal_mode'][0] == 1)
                                                        <input id="paypal_mode" name="rpaypal_mode" type="checkbox" value="1" checked>
                                                    @else
                                                        <input id="paypal_mode" name="rpaypal_mode" type="checkbox" value="0">
                                                    @endif

                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="paypal_client_id">Paypal Client ID</label>
                                            <input type="text" id="paypal_client_id" name="paypal_client_id" placeholder="" value="{{($useSettings['paypal_client_id'][0] != Null) ? $useSettings['paypal_client_id'][0] :''}}"  class="form-control" >
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="control-label" for="paypal_secret_id">Paypal Secret ID</label>
                                            <input type="text" id="paypal_secret_id" name="paypal_secret_id" placeholder="" value="{{($useSettings['paypal_secret_id'][0] != Null) ? $useSettings['paypal_secret_id'][0] :''}}"  class="form-control" >
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="rounded-vertical-pills-terms" role="tabpanel" aria-labelledby="rounded-vertical-pills-terms-tab">
                                        <div class="widget-header">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                    <h4> Terms </h4>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group mb-4">
                                                <textarea id="terms" name="terms">
                                                    {{$useSettings['terms'][1]}}
                                                </textarea>
                                            </div>
                                </div>


                            </div>
                        </div>

                    </div>
                        <div style="padding-left: 40%">
                            <a href="{{url()->previous()}}" class="btn btn-danger ml-3 mt-3">Cancel</a>
                            <button id="send" type="submit" class="btn btn-success ml-3 mt-3">Submit</button>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('js-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src= {{ asset("js/theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js") }}></script>
    <script src= {{ asset("js/theme/plugins/editors/markdown/simplemde.min.js") }}></script>
    <script src= {{ asset("js/theme/plugins/editors/markdown/custom-markdown.js") }}></script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src={{asset("js/theme/js/scrollspyNav.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/sweetalert2.min.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/custom-sweetalert.js")}}></script>
    <script src={{asset("js/theme/plugins/highlight/highlight.pack.js")}}></script>
    <script src={{asset("js/theme/plugins/flatpickr/flatpickr.js")}}></script>
    <!-- END THEME GLOBAL STYLE -->
    <script>


        // $('.delete-car').on('click', function () {
        function destroy_car(car_id) {
            const carName = $('#'+car_id).attr("data-value");
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success btn-rounded',
                cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'Are you sure you want to delete '+carName+' car type?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                padding: '2em',
                showLoaderOnConfirm: true,
                preConfirm: ()=>{
                    $.ajax({
                        url: '/admin/cars/delete/'+car_id,
                        method: 'POST',
                        data:{"_token": "{{ csrf_token() }}"},
                        success: function(resp)
                        {
                            console.log(resp)

                        }
                    })
                }
            }).then(function(result) {
                if (result.value) {
                    swalWithBootstrapButtons(
                        {
                            title: 'Deleted!',
                            text: 'The car type has been deleted.',
                            type: 'success'
                        }
                    ).then(function (result){
                        location.reload();
                    })
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'The data is safe :)',
                        'error'
                    )
                }
            })

            // })
        }
    </script>
    <script>
        $(document).on("click", "#cash", function(){
            if(document.getElementById('cash').value === '1')
            {
                document.getElementById('hcash').value = '0';
                document.getElementById('cash').value= '0';
            }
            else {
                document.getElementById('hcash').value = '1';
                document.getElementById('cash').value='1';
            }

        });
        $(document).on("click", "#meet", function(){
            if(document.getElementById('meet').value == 1)
            {
                document.getElementById('hmeet').value = '0';
                document.getElementById('meet').value= '0';
            }
            else {
                document.getElementById('hmeet').value = '1';
                document.getElementById('meet').value='1';
            }

        });
        $(document).on("click", "#paypal", function(){
            if(document.getElementById('paypal').value === '1')
            {
                document.getElementById('hpaypal').value = '0';
                document.getElementById('paypal').value= '0';
            }
            else {
                document.getElementById('hpaypal').value = '1';
                document.getElementById('paypal').value='1';
            }

        });
        $(document).on("click", "#paypal_mode", function(){
            if(document.getElementById('paypal_mode').value === '1')
            {
                document.getElementById('hpaypal_mode').value = '0';
                document.getElementById('paypal_mode').value= '0';
            }
            else {
                document.getElementById('hpaypal_mode').value = '1';
                document.getElementById('paypal_mode').value='1';
            }

        });
    </script>
    <script>
        new SimpleMDE({
            element: document.getElementById("terms"),
            spellChecker: true,
        });
        var f1 = flatpickr(document.getElementById('holiday_dates'), {
            mode: "multiple",
            dateFormat: "d-m-Y",
            defaultDate: {!! $useSettings['holiday_dates'][0] !!}
        });
        var f2 = flatpickr(document.getElementById('surcharge_time'), {
            mode: "multiple",
            enableTime: true,
            noCalendar: true,
            time_24hr: true,
            dateFormat: "H.i",
            // dateFormat: "d-m-Y",
            {{--defaultDate: {!! $useSettings['holiday_dates'][0] !!}--}}
        });
        var f3 = flatpickr(document.getElementById('surcharge_stays'), {
            mode: "multiple",
            enableTime: true,
            noCalendar: true,
            time_24hr: true,
            dateFormat: "H.i",
            // dateFormat: "d-m-Y",
            {{--defaultDate: {!! $useSettings['holiday_dates'][0] !!}--}}
        });
    </script>
@endsection



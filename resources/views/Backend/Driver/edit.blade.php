@extends('theme.base')
@section('head-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/datatables.css")}}>--}}
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/custom_dt_html5.css")}}>--}}
    {{--    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/table/datatable/dt-global_style.css")}}>--}}
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/regular.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("css/theme/plugins/font-icons/fontawesome/css/fontawesome.css")}}>
    <!-- END PAGE LEVEL CUSTOM STYLES -->
    <link href={{asset("css/theme/scrollspyNav.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/animate/animate.css")}} rel="stylesheet" type="text/css" />
    <script src={{asset("css/theme/plugins/sweetalerts/promise-polyfill.js")}}></script>
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert2.min.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/sweetalerts/sweetalert.css")}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/components/custom-sweetalert.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/forms/switches.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/flatpickr/custom-flatpickr.css" )}} rel="stylesheet" type="text/css" />
    <link href={{asset("css/theme/plugins/flatpickr/flatpickr.css" )}} rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />
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
        @media (min-width: 900px){
            .bipon-form{
                margin-left: 25%;
            }
        }
    </style>

@endsection

@section('main-content')
    <div class="layout-px-spacing">
        @if(Session::has('message'))
            <div class="alert alert-gradient mb-4" role="alert">
                <button  type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  data-dismiss="alert" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif

        <div class="row layout-top-spacing">
            <div class="col-xl-6 col-lg-12 col-sm-12  layout-spacing bipon-form">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h2><small>edit</small> Driver </h2>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form class="form-horizontal form-label-left" method="post" action="{{route('driver.update', $driver->id )}}">
                            @csrf
                            <div class="form-row mb-4">
                                <label class="control-label" for="first_name">First Name <span class="required">*</span>
                                </label>
                                <input id="first_name" value="{{$driver->first_name}}" class="form-control" data-validate-length-range="6" data-validate-words="2" name="first_name" placeholder="Enter Forename" required="required" type="text">
                            </div>

                            <div class="form-row mb-4">
                                <label class="control-label" for="last_name">Last Name <span class="required">*</span>
                                </label>
                                <input id="last_name" value="{{$driver->last_name}}" class="form-control" data-validate-length-range="6" data-validate-words="2" name="last_name" placeholder="Enter Surname" required="required" type="text">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label" for="email">Email <span class="required">*</span>
                                </label>
                                <input value="{{$driver->email}}" type="email" id="email" name="email" placeholder="Email Address" required="required" class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label" for="phone">Phone<span class="required">*</span>
                                </label>
                                <input value="{{$driver->phone_number}}" type="text" id="phone" name="phone_number" placeholder="Enter Your Phone Number" required="required"  class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label" for="dlva_eccc">DVLA ECCC<span class="required">*</span>
                                </label>
                                <input value="{{$driver->dlva_eccc}}" type="text" id="dlva_eccc" name="dlva_eccc" required="required"  class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label" for="private_hire_license">Private Hire License Number <span class="required">*</span>
                                </label>
                                <input type="text" value="{{$driver->private_hire_license}}" id="private_hire_license" name="private_hire_license" placeholder="Enter Private Hire License Number" required="required"  class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label for="private_hire_license_date">Expiry of Private Hire License Number <span class="required">*</span></label>
                                <input type="text" class="form-control" value="{{$driver->private_hire_license_date}}" id="private_hire_license_date" {{old('private_hire_license_date')}} name="private_hire_license_date" placeholder="Expire Date" required="required">
                            </div>
                            <div class="form-row mb-4">
                                <label for="private_hire_license_image">Private Hire License Number File <span class="required">*</span></label>
                            </div>
                            <input type="file" id="private_hire_license_image" name="private_hire_license_image" required="required">
                            <div class="form-row mb-4">
                                <label for="driving_license">Driving License Number <span class="required">*</span></label>
                                <input type="text" class="form-control" value="{{$driver->driving_license}}" id="driving_license" {{old('driving_license')}} name="driving_license" placeholder="License Number" required="required">
                            </div>
                            <div class="form-row mb-4">
                                <label for="driving_license_date">Expiry of Driver's License Number <span class="required">*</span></label>
                                <input type="text" class="form-control" value="{{$driver->driving_license_date}}" id="driving_license_date" {{old('driving_license_date')}} name="driving_license_date" placeholder="Expire Date" required="required">
                            </div>
                            <div class="form-row mb-4">
                                <label for="driving_license_image">Driving License Number File <span class="required">*</span></label>
                            </div>
                            <input type="file" id="driving_license_image" name="driving_license_image" required="required">
                            <div class="form-row mb-4">
                                <label for="bank_statement_image">Bank Statement <span class="required">*</span></label>
                            </div>
                            <input type="file" id="bank_statement_image"  name="bank_statement_image" required="required">
{{--                            adasdada--}}
                            <div class="form-row mb-4">
                                <label for="insurance_date">Expiry of Insurance <span class="required">*</span></label>
                                <input type="text" class="form-control" value="{{$driver->insurance_date}}" id="insurance_date" {{old('insurance_date')}} name="insurance_date" placeholder="Expire Date" required="required">
                            </div>
                            <div class="form-row mb-4">
                                <label for="insurance_image">Insurance File <span class="required">*</span></label>
                            </div>
                            <input type="file" id="insurance_image" name="insurance_image" required="required">
                            <div class="form-row mb-4">
                                <label for="logbook_image">LogBook <span class="required">*</span></label>
                            </div>
                            <input type="file" id="logbook_image"  name="logbook_image" required="required">
                            <div class="form-row mb-4">
                                <label for="coc_image">Certificate of Compliance <span class="required">*</span></label>
                            </div>
                            <input type="file" id="coc_image"  name="coc_image" required="required">
{{--                            ssssssssssss--}}
                            <div class="form-row mb-4">
                                <label class="control-label" for="vehicle_reg">Vehicle Reg<span class="required">*</span>
                                </label>
                                <input value="{{$driver->vehicle_reg}}" type="text" id="vehicle_reg" name="vehicle_reg" placeholder="Enter Vehicle Registration Number" required="required"  class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label" for="vehicle_make">Vehicle Make <span class="required">*</span>
                                </label>
                                <input type="text" value="{{$driver->vehicle_make}}" id="vehicle_make" name="vehicle_make" placeholder="Enter Vehicle Make Number" required="required"  class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label class="control-label" for="vehicle_license">Vehicle license Number <span class="required">*</span>
                                </label>
                                <input type="text" value="{{$driver->vehicle_license}}" id="vehicle_license" name="vehicle_license" placeholder="Enter Vehicle License Number" required="required"  class="form-control">
                            </div>
                            <div class="form-row mb-4">
                                <label for="private_hire_vehicle_license_date">Expiry of Private Hire Vehicle License Number <span class="required">*</span></label>
                                <input type="text" class="form-control" value="{{$driver->private_hire_vehicle_license_date}}" id="private_hire_vehicle_license_date" {{old('private_hire_vehicle_license_date')}} name="private_hire_vehicle_license_date" placeholder="Expire Date" required="required">
                            </div>
                            <div class="form-row mb-4">
                                <label for="private_hire_vehicle_license_image">Private Hire Vehicle License Number File <span class="required">*</span></label>
                            </div>
                            <input type="file" id="private_hire_vehicle_license_image" name="private_hire_vehicle_license_image" required="required">
                            <div class="form-row mb-4">
                                <label class="control-label" for="commission">Commission(%)<span class="required">*</span>
                                </label>
                                <input value="{{$driver->commission}}" type="text" id="commission" name="commission" placeholder="Enter Driver's Commission" required="required"  class="form-control">
                            </div>
                            <input type="hidden" name="user_id" value="{{($driver->user) != null? $driver->user->id : 'NA'}}">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="{{url()->previous()}}" class="btn btn-danger ml-3 mt-3">Cancel</a>
                                    <button id="send" type="submit" class="btn btn-success ml-3 mt-3">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js-customization')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src= {{ asset("js/theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js") }}></script>
    <script src={{ asset("js/theme/plugins/table/datatable/datatables.js") }}></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js")}}></script>
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/jszip.min.js")}}></script>
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/buttons.html5.min.js")}}></script>
    <script src={{asset("js/theme/plugins/table/datatable/button-ext/buttons.print.min.js")}}></script>

    <!-- BEGIN THEME GLOBAL STYLE -->
    <script src={{asset("js/theme/js/scrollspyNav.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/sweetalert2.min.js")}}></script>
    <script src={{asset("js/theme/plugins/sweetalerts/custom-sweetalert.js")}}></script>
    <script src={{asset("js/theme/plugins/flatpickr/flatpickr.js")}}></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-rename/dist/filepond-plugin-file-rename.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <!-- END THEME GLOBAL STYLE -->
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->

    <script>
        var f1 = flatpickr(document.getElementById('private_hire_license_date'), {
            minDate: "today",
            dateFormat: "d-m-Y"
        });
        var f2 = flatpickr(document.getElementById('driving_license_date'), {
            minDate: "today",
            dateFormat: "d-m-Y"
        });
        var f3 = flatpickr(document.getElementById('insurance_date'), {
            minDate: "today",
            dateFormat: "d-m-Y"
        });
        var f4 = flatpickr(document.getElementById('private_hire_vehicle_license_date'), {
            minDate: "today",
            dateFormat: "d-m-Y"
        });
    </script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginFileRename);
        FilePond.registerPlugin(FilePondPluginFileValidateSize);
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        FilePond.registerPlugin(FilePondPluginImageValidateSize);
        FilePond.registerPlugin(FilePondPluginImageResize);
        FilePond.registerPlugin(FilePondPluginImageTransform);
        // Get a reference to the file input element
        const inputElement1 = document.querySelector('#private_hire_license_image');
        // FilePond.setOptions({
        //     fileRenameFunction: (file) => {
        //         return `my_new_name${file.extension}`;
        //     },
        // });
        // Create a FilePond instance
        const pond1 = FilePond.create(inputElement1, {
            // fileRenameFunction: (file) => {
            //     return `my_new_name${file.extension}`;
            // },
            // allowFileRename: true,
            maxFileSize: '200KB',
            acceptedFileTypes: ['image/*', 'application/pdf'],
            imageValidateSizeMinWidth: 300,
            imageValidateSizeMinHeight: 200,
            imageResizeTargetWidth: 500,
            imageResizeTargetHeight:400,
            imageResizeUpscale: false,
            server: {
                url:'/admin/drivers/upload',
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            }
        });
        const inputElementDL = document.querySelector('#driving_license_image');

        // Create a FilePond instance
        const pondDL = FilePond.create(inputElementDL, {
            maxFileSize: '200KB',
            acceptedFileTypes: ['image/*', 'application/pdf'],
            imageValidateSizeMinWidth: 300,
            imageValidateSizeMinHeight: 200,
            imageResizeTargetWidth: 500,
            imageResizeTargetHeight:400,
            imageResizeUpscale: false,
            server: {
                url:'/admin/drivers/upload',
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            }
        });
        const inputElementBS = document.querySelector('#bank_statement_image');

        // Create a FilePond instance
        const pondBS = FilePond.create(inputElementBS, {
            maxFileSize: '200KB',
            acceptedFileTypes: ['image/*', 'application/pdf'],
            imageValidateSizeMinWidth: 300,
            imageValidateSizeMinHeight: 200,
            imageResizeTargetWidth: 500,
            imageResizeTargetHeight:400,
            imageResizeUpscale: false,
            server: {
                url:'/admin/drivers/upload',
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            }
        });
        const inputElementII = document.querySelector('#insurance_image');

        // Create a FilePond instance
        const pondII = FilePond.create(inputElementII, {
            maxFileSize: '200KB',
            acceptedFileTypes: ['image/*', 'application/pdf'],
            imageValidateSizeMinWidth: 300,
            imageValidateSizeMinHeight: 200,
            imageResizeTargetWidth: 500,
            imageResizeTargetHeight:400,
            imageResizeUpscale: false,
            server: {
                url:'/admin/drivers/upload',
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            }
        });
        const inputElementCC = document.querySelector('#coc_image');

        // Create a FilePond instance
        const pondCC = FilePond.create(inputElementCC, {
            maxFileSize: '200KB',
            acceptedFileTypes: ['image/*', 'application/pdf'],
            imageValidateSizeMinWidth: 300,
            imageValidateSizeMinHeight: 200,
            imageResizeTargetWidth: 500,
            imageResizeTargetHeight:400,
            imageResizeUpscale: false,
            server: {
                url:'/admin/drivers/upload',
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            }
        });
        const inputElementLB = document.querySelector('#logbook_image');

        // Create a FilePond instance
        const pondLB = FilePond.create(inputElementLB, {
            maxFileSize: '200KB',
            acceptedFileTypes: ['image/*', 'application/pdf'],
            imageValidateSizeMinWidth: 300,
            imageValidateSizeMinHeight: 200,
            imageResizeTargetWidth: 500,
            imageResizeTargetHeight:400,
            imageResizeUpscale: false,
            server: {
                url:'/admin/drivers/upload',
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            }
        });
        const inputElementVL = document.querySelector('#private_hire_vehicle_license_image');

        // Create a FilePond instance
        const pondVL = FilePond.create(inputElementVL, {
            maxFileSize: '200KB',
            acceptedFileTypes: ['image/*', 'application/pdf'],
            imageValidateSizeMinWidth: 300,
            imageValidateSizeMinHeight: 200,
            imageResizeTargetWidth: 500,
            imageResizeTargetHeight:400,
            imageResizeUpscale: false,
            server: {
                url:'/admin/drivers/upload',
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            }
        });
    </script>

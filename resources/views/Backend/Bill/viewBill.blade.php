@extends('theme.base')
@section('head-customization')
    <link href={{asset("css/theme/apps/invoice-preview.css" )}} rel="stylesheet" type="text/css" />

@endsection

@section('main-content')

    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="doc-container">

                <div class="row">

                    <div class="col-xl-9">

                        <div class="invoice-container">
                            <div class="invoice-inbox">

                                <div id="ct" class="">

                                    <div class="invoice-00001" id="invoice01" style="max-width: 794px !important; margin-left: 16px;">
                                        @include('Backend.Bill.invoiceContent')
                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>

                    <div class="col-xl-3">

                        <div class="invoice-actions-btn">

                            <div class="invoice-action-btn">

                                <div class="row">
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <a href="{{route('bill.email', $bill->id)}}" class="btn btn-primary btn-send">Send Email</a>
                                    </div>
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Print</a>
                                    </div>
                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                        <a href="{{route('bill.generate', $bill->id)}}" class="btn btn-success btn-download" >Download</a>
                                    </div>
{{--                                    <div class="col-xl-12 col-md-3 col-sm-6">--}}
{{--                                        <a href="javascript:void(0);" id="h2c_edit" class="btn btn-dark btn-edit">Edit</a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>

                        </div>

                    </div>


                </div>


            </div>

        </div>
    </div>



@endsection

@section('js-customization')
    <script src={{asset("js/theme/js/apps/invoice-preview.js")}}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
function savePdf(){
    var element = document.getElementById('invoice_ready');
    var opt = {
        margin:       1,
        filename:     'myfile.pdf',
        image:        { type: 'jpeg', quality: 1 },
        html2canvas:  { scale: 1 },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };
    html2pdf().set(opt).from(element).toCanvas().save();

}

    </script>
@endsection

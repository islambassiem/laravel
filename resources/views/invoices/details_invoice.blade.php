@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    عرض تفاصيل الفاتورة
@endsection


@section('content')

    <!-- row -->
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    {{-- @can('اضافة فاتورة') --}}
                        <a href="invoices/create" class="modal-effect btn btn-sm btn-primary" style="color:white"><i
                            class="fas fa-plus"></i>&nbsp; اضافة فاتورة</a>
                    {{-- @endcan --}}

                    {{-- @can('تصدير EXCEL') --}}
                        <a class="modal-effect btn btn-sm btn-primary" href="{{ url('export_invoices') }}"
                            style="color:white"><i class="fas fa-file-download"></i>&nbsp;تصدير اكسيل</a>
                    {{-- @endcan --}}

                </div>

<div class="card-body">
    <div class="table-responsive">
        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
            <thead>
                <tr>
                    <th class="border-bottom-0">#</th>
                    <th class="border-bottom-0">رقم الفاتورة</th>
                    {{-- <th class="border-bottom-0"> تاريخ الاستحقاق</th> --}}
                    <th class="border-bottom-0">المنتج</th>
                    <th class="border-bottom-0">القسم</th>
                    <th class="border-bottom-0">الحالة</th>
                    <th class="border-bottom-0">كود الحالة</th>
                    <th class="border-bottom-0">تاريخ الدفع</th>
                    <th class="border-bottom-0">ملاحظات</th>
                    <th class="border-bottom-0">المستخدم</th>
                    <th class="border-bottom-0">المرفق</th>
                </tr>
            </thead>
            <tbody>
                @php $c = 0; @endphp
                @foreach ($details as $detail)
                    @php $c++; @endphp
                    <tr>
                        <td>{{ $c }}</td>
                        <td>{{ $detail->invoice_number }}</td>
                        {{-- <td>{{ $detail->invoice->invoice_Date }}<td> --}}
                        <td>{{ $detail->product }}</td>
                        <td>{{ $detail->Section }}</td>
                        <td>{{ $detail->Status }}</td>
                        <td>{{ $detail->Value_Status }}</td>
                        <td>{{ $detail->Payment_Date }}</td>
                        <td>{{ $detail->note}}</td>
                        <td>{{ $detail->user }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>
</div>
<!--/div-->
</div>
@endsection


@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
@endsection

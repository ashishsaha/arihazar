@extends('layouts.app')
@section('title','বাজেট কন্ট্রোল রেজিস্টার')
@section('style')
    <style>

        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
            vertical-align: middle;
            border-bottom-width: 2px;
            text-align: center;
        }

        .table-bordered thead td, .table-bordered thead th {
            vertical-align: middle;
        }

        .table thead th {
            border-bottom: 1px solid #000000 !important;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #000000 !important;
        }

        .table-bordered td, .table-bordered th {
            padding: 3px !important;
            font-size: 15px !important;
        }

        .table-bordered-modal td, .table-bordered-modal th {
            border: 1px solid #dee2e6 !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-outline card-default">
                <div class="card-header">
                    <h3 class="card-title">ডেটা ফিল্টারিং</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('report.budget_register') }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="upangsho">উপাংশ <span class="text-danger">*</span></label>
                                    <select required name="upangsho" class="form-control select2" id="upangsho">
                                        <option value="">উপাংশ নির্ধারণ</option>
                                        @foreach($sections as $section)
                                            <option {{ request('upangsho') == $section->upangsho_id ? 'selected' : '' }} value="{{ $section->upangsho_id }}">{{ $section->upangsho_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="income_expenditure">আয়/ব্যয় খাত <span class="text-danger">*</span></label>
                                    <select required name="income_expenditure" class="form-control select2" id="income_expenditure">
                                        <option value="">আয়/ব্যয় নির্ধারণ</option>
                                        <option {{ request('income_expenditure') == 1 ? 'selected' : '' }} value="1">আয়</option>
                                        <option {{ request('income_expenditure') == 2 ? 'selected' : '' }} value="2">ব্যয়</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sector_type">খাত টাইপ <span class="text-danger">*</span></label>
                                    <select required name="sector_type" class="form-control select2" id="sector_type">
                                        <option value="">খাত টাইপ নির্ধারণ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sub_sector_type">উপ খাত টাইপ <span class="text-danger">*</span></label>
                                    <select required name="sub_sector_type" class="form-control select2" id="sub_sector_type">
                                        <option value="">উপ খাত টাইপ নির্ধারণ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sector">খাত <span class="text-danger">*</span></label>
                                    <select name="sector" class="form-control select2" id="sector">
                                        <option value="">খাত নির্ধারণ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="financial_year">অর্থ বছর <span class="text-danger">*</span></label>
                                    <select  class="form-control select2" id="financial_year" name="financial_year" required>
                                        <option value="">অর্থ বছর নির্ধারণ</option>
                                        @for($i=2023;$i <= date('Y');$i++)
                                            <option {{ request('financial_year') ==  ($i.'-'.substr(($i + 1),-2)) ? 'selected' : '' }}  value="{{ $i }}-{{ substr(($i + 1),-2) }}">{{ enNumberToBn($i) }}-{{ enNumberToBn($i + 1) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <input type="submit" name="search"
                                           class="btn btn-success bg-gradient-success form-control" value="সার্চ">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
    @if(count($registers) > 0)
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-default">
                    <div class="card-header">
                        <a href="#" onclick="getprint('printArea')"
                           class="btn btn-success bg-gradient-success btn-sm"><i
                                class="fa fa-print"></i></a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive-sm" id="printArea">
                            <div class="row print-heading">
                                <div class="col-12">
                                    <h1 class="text-center m-0" style="font-size: 20px !important;font-weight: bold">
                                        <img class="logo-size-custom" src="{{ asset('img/logo.png') }}" alt="">
                                        {{ config('app.full_name') }}
                                    </h1>
                                    <h3 class="text-center m-0 mb-2" style="font-size: 19px !important;">বাজেট কন্ট্রোল রেজিস্টার</h3>
                                    <h3 class="text-center m-0 mb-2" style="font-size: 15px !important;">
                                        সময়কালঃ {{ enNumberToBn(\Carbon\Carbon::parse(request('start_date'))->format('d/m/Y')) }}
                                        - {{ enNumberToBn(\Carbon\Carbon::parse(request('end_date'))->format('d/m/Y')) }}</h3>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ক্রঃ নং</th>
                                        <th class="text-center">তারিখ</th>
                                        <th class="text-center">বিবরণ</th>
                                        <th class="text-center">বাজেটে বরাদ্ধক্রত টাকা</th>
                                        <th class="text-center">বিলের পরিমাণ</th>
                                        <th class="text-center">মোট বিল</th>
                                        <th class="text-center">অবশিষ্ট বরাদ্ধক্রত টাকা</th>
                                        <th class="text-center">মন্তব্য</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $totalAmount = 0;
                                        $budget = $budget->budget_amo;
                                    @endphp
                                    @foreach($registers as $register)
                                        <tr>
                                            <td class="text-center">{{ enNumberToBn($loop->iteration) }}</td>
                                            <td>{{ enNumberToBn(\Carbon\Carbon::parse($register->date)->format('d-m-Y')) }}</td>
                                            <td>{{ $register->khat_des }}</td>
                                            <td class="text-right">{{ enNumberToBn(number_format($budget,2)) }}</td>
                                            <td class="text-right">{{ enNumberToBn(number_format($register->amount,2)) }}</td>
                                            @php
                                                $totalAmount += $register->amount;
                                                $budget -= $register->amount;
                                            @endphp
                                            <td class="text-right">{{ bnNumberToEn(number_format($totalAmount,2)) }}</td>
                                            <td class="text-right">{{ bnNumberToEn(number_format($budget,2)) }}</td>
                                            <td>{{ $register->note }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="row" style="float: left;width: 100%;padding-top: 108px;">
                                    <table width="100%">
                                        <tr>

                                            <td width="25%" style="text-align:center">  হিসাব রক্ষক <br/> {{ config('app.name') }} </td>
                                            <td width="25%"  style="text-align:center">  হিসাব রক্ষণ কর্মকর্তা  <br/> {{ config('app.name') }} </td>
                                            <td width="25%"  style="text-align:center"> প্রধান নির্বাহী কর্মকর্তা / পৌর নির্বাহী কর্মকর্তা  <br/> {{ config('app.name') }} </td>
                                            <td width="25%"  style="text-align:center"> মেয়র <br/>  {{ config('app.name') }} </td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    @else
        @if(request('start_date') != '')
            <div class="alert alert-warning text-center"><h4>কোনো তথ্য পাওয়া যায়নি !</h4></div>
        @endif
    @endif
@endsection
@section('script')
    <script>
        $(function (){
            $('#upangsho').change(function () {
                $("#income_expenditure").trigger('change');
            })
            var sectorTypeSelected = '{{ request('sector_type') }}'
            $("#income_expenditure").change(function () {
                let incomeExpenditureId = $(this).val();
                let upangshoId = $('#upangsho').val();
                $('#sector_type').html('<option value="">খাত টাইপ নির্ধারণ</option>');
                $('#financial_year').trigger('change');
                if (incomeExpenditureId != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('get_upangsho_wise_sector_types') }}",
                        data: {incomeExpenditureId: incomeExpenditureId, upangshoId: upangshoId}
                    }).done(function (data) {
                        $.each(data, function (index, item) {
                            if (sectorTypeSelected == item.tax_id)
                                $('#sector_type').append('<option value="' + item.tax_id + '" selected>' + item.tax_name + '</option>');
                            else
                                $('#sector_type').append('<option value="' + item.tax_id + '">' + item.tax_name + '</option>');
                        });
                        $('#sector_type').trigger('change');
                    });
                }
            })
            $('#income_expenditure').trigger('change');

            var subSectorSelected = '{{ request('sub_sector_type') }}'
            $("#sector_type").change(function (){
                let sectorId = $(this).val();
                $('#sub_sector_type').html('<option value="">উপ খাত টাইপ নির্ধারণ</option>');
                if(sectorId != ''){
                    $.ajax({
                        method: "GET",
                        url: "{{ route('get_sub_sector_types') }}",
                        data: { sectorId: sectorId }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (subSectorSelected == item.tax_id) {
                                if(subSectorSelected != ''){
                                    $('#sub_sector_type').append('<option value="'+item.tax_id+'" selected>'+item.tax_name2+'</option>');
                                }else{
                                    $('#sub_sector_type').append('<option value="'+item.tax_id+'">'+item.tax_name2+'</option>');
                                }
                            }else{
                                $('#sub_sector_type').append('<option value="'+item.tax_id+'">'+item.tax_name2+'</option>');
                            }
                        });
                        $('#sub_sector_type').trigger('change');
                    });
                }
            })
            $('#sector_type').trigger('change');

            var sectorSelected = '{{ request('sector') }}'
            $("#sub_sector_type").change(function (){
                let subSectorTypeId = $(this).val();
                $('#sector').html('<option value="">খাত নির্ধারণ</option>');
                if(subSectorTypeId != ''){
                    $.ajax({
                        method: "GET",
                        url: "{{ route('get_sectors') }}",
                        data: { subSectorTypeId: subSectorTypeId }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (sectorSelected == item.khat_id) {
                                if(sectorSelected != ''){
                                    $('#sector').append('<option value="'+item.khat_id+'" selected>'+item.serilas +item.khat_name+'</option>');
                                }else{
                                    $('#sector').append('<option value="'+item.khat_id+'">'+item.serilas +item.khat_name+'</option>');
                                }
                            }else{
                                $('#sector').append('<option value="'+item.khat_id+'">'+item.serilas +item.khat_name+'</option>');
                            }
                        });
                    });
                }
            })
            $('#sub_sector_type').trigger('change');
        })
        var APP_URL = '{!! url()->full()  !!}';
        function getprint(print) {
            $('.print-heading').css('display', 'block');
            $('.extra_column').remove();
            $('body').html($('#' + print).html());
            window.print();
            window.location.replace(APP_URL)
        }
    </script>
@endsection

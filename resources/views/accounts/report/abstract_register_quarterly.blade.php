@extends('layouts.app')
@section('title','(ত্রৈমাসিক) এ্যাবস্ট্রাক্ট রেজিস্টার')
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
                <form action="{{ route('report.abstract_register_quarterly') }}">
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
    @if(count($mainHeads) > 0)
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
                                    <h3 class="text-center m-0 mb-2" style="font-size: 19px !important;">ত্রৈমাসিক ও বার্ষিক হিসাব</h3>
                                    <h3 class="text-center m-0 mb-2" style="font-size: 15px !important;">
                                        সময়কালঃ {{ enNumberToBn(request('financial_year')) }}</h3>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        @foreach($headText as $ht)
                                            <th>{{ $ht }}</th>
                                        @endforeach
                                        </tr>
                                    <tr>
                                        @php
                                            $i=1;
                                         @endphp
                                        @foreach($monthHeadNumber as $nb)

                                        @if($nb!='')
                                        <th rowspan="" style="vertical-align:middle">{{ enNumberToBn($i++) }}</th>
                                        @else
                                         <th rowspan="2" style="vertical-align:middle">{{ enNumberToBn($i++) }}</th>
                                         @endif
                                        @endforeach
                                        </tr>
                                    <tr>
                                        @foreach($monthHeadNumber as $nb)
                                        @if($nb!='')
                                            <th rowspan="" style="vertical-align:middle">{{ $nb }}</th>
                                        @endif
                                        @endforeach
                                        @php
                                            $ktsl = 1;
                                         @endphp
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $bdgttotal = 0;
                                    @endphp
                                    @foreach($monthHeadText as $kk => $mht)
                                      @php
                                          $total[$kk] = 0;
                                      @endphp
                                    @endforeach
                                    @foreach($mainHeads as $mainhds)

                                    <tr>
                                        <td>{{ enNumberToBn($ktsl++) }} | {{ $mainhds->tax_name }}</td>
                                        <td colspan="20"></td>
                                    </tr>
                                    @php
                                        $khats = \App\Models\Khat::where('tax_type_id', $mainhds->tax_id)->get();
                                    @endphp
                                    @foreach($khats as $k=>$kt)

                                    <tr><td style="vertical-align: middle;" width="150"><b>{{ $banlgaLetter[$k] }}</b> {{ $kt->khat_name }}</td>
                                        @php
                                            $bdgt = \App\Models\Budget::where('khat_id', $kt->khat_id)->where('year', $year)->first();
                                        @endphp
                                        @if(!empty($bdgt))
                                        <td class="text-right">{{ enNumberToBn(number_format($bdgt->budget_amo,2)) }}</td>
                                            @php $bdgttotal += $bdgt->budget_amo; @endphp
                                            @else
                                            <td>budget not define</td>
                                            @endif
                                        @foreach($monthHeadText as $kk => $mht)
                                          @php $incomexpens = 0; @endphp

                                        @foreach($mht as $mh)
                                         @php
                                          $incomexpens += \App\Models\Incoexpense::where('year', $year)->where('khat_id', $kt->khat_id)
                                            ->where('receive_datwe', 'like', '%-'.$mh.'-%')
                                            ->sum('amount');
                                         @endphp
                                        @endforeach
                                        <td class="text-right">{{ enNumberToBn(number_format($incomexpens,2)) }}</td>
                                        @php
                                            $total[$kk] += (float)$incomexpens;
                                         @endphp
                                            @endforeach
                                        </tr>
                                    @endforeach

                                    @endforeach
                                       <tr>
                                           <td>মোট প্রাপ্তি</td>
                                           <td></td>
                                            @foreach($monthHeadText as $kk => $mht)
                                            <td class="text-right">{{ $total[$kk] }}</td>
                                           @endforeach


                                       </tr>
                                    </tbody>
                                </table>

                                <div class="row" style="float: left;width: 100%;padding-top: 108px;">
                                    <table width="100%">
                                        <tr>
                                            <td width="25%" style="text-align:center">  হিসাব রক্ষক <br/> {{ config('app.name') }} </td>
                                            <td width="25%"  style="text-align:center"> হিসাব রক্ষণ কর্মকর্তা  <br/> {{ config('app.name') }} </td>
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

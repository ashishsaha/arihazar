@extends('layouts.app')
@section('title','হিসাব রক্ষক এর ক্যাশ বই(দৈনিক)')
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
                <form action="{{ route('report.daily_abstract_register') }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="income_expenditure">আয়/ব্যয় খাত <span class="text-danger">*</span></label>
                                    <select required name="income_expenditure" class="form-control select2" id="income_expenditure">
                                        <option value="">আয়/ব্যয় নির্ধারণ</option>
                                        <option {{ request('income_expenditure') == 1 ? 'selected' : '' }} value="1">আয়</option>
                                        <option {{ request('income_expenditure') == 2 ? 'selected' : '' }} value="2">ব্যয়</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="start_date">শুরুর তারিখ <span class="text-danger">*</span></label>
                                    <input required type="text" id="start_date" autocomplete="off"
                                           name="start_date" class="form-control date-picker"
                                           placeholder="শুরুর তারিখ লিখুন" value="{{ request()->get('start_date')  }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="end_date">শেষের তারিখ <span class="text-danger">*</span></label>
                                    <input required type="text" id="end_date" autocomplete="off"
                                           name="end_date" class="form-control date-picker"
                                           placeholder="শেষের তারিখ লিখুন" value="{{ request()->get('end_date')  }}">
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
                                    <h3 class="text-center m-0 mb-2" style="font-size: 19px !important;">হিসাব রক্ষক এর ক্যাশ বই(দৈনিক)</h3>
                                    <h3 class="text-center m-0 mb-2" style="font-size: 19px !important;">ফরম নং-৮৩ রূল -১৮৭ ও ২২৯</h3>
                                    <h3 class="text-center m-0 mb-2" style="font-size: 15px !important;">
                                        সময়কালঃ {{ enNumberToBn(\Carbon\Carbon::parse(request('start_date'))->format('d/m/Y')) }}
                                        - {{ enNumberToBn(\Carbon\Carbon::parse(request('end_date'))->format('d/m/Y')) }}</h3>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th rowspan="2" style="vertical-align: middle;">তারিখ</th>
                                        @foreach($mainHeads as $mh)
                                            @if($mh->subormain!=1)
                                                <th style="vertical-align: middle;" colspan="{{ colspan($mh->tax_id) }}">{{ $mh->tax_name }}</th>
                                            @else
                                                <th style="vertical-align: middle;" colspan="{{ colspan($mh->tax_id) }}" rowspan="2">{{ $mh->tax_name }}</th>
                                            @endif
                                        @endforeach
                                        <th></th>
                                    </tr>
                                    <tr>
                                        @foreach($mainHeads as $mh)
                                            @if($mh->subormain!=1)
                                                @php
                                                    $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                                @endphp
                                                @foreach($khats as $kt)
                                                    <th style="vertical-align: middle;">{{ $kt->khat_name }}</th>
                                                @endforeach
                                            @endif
                                        @endforeach
                                        <th style="vertical-align: middle;">মোট</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $grandtotal = 0;
                                    @endphp
                                    @foreach($expDates as $ed)
                                        @php
                                            $daytotal = 0;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ enNumberToBn(\Carbon\Carbon::parse($ed->date)->format('d-m-Y')) }}</td>
                                            @foreach($mainHeads as $mh)
                                                {!! dailyAbstractRegisterGetRows1($ed->incoexpenses_id, $mh->tax_id, $ed->date) !!}
                                                @php
                                                    $daytotal += dailyAbstractRegisterGetRowTotal1($ed->incoexpenses_id, $mh->tax_id, $ed->date);
                                                    $grandtotal += dailyAbstractRegisterGetRowTotal1($ed->incoexpenses_id, $mh->tax_id, $ed->date);

                                                @endphp
                                            @endforeach
                                            <td class="text-right">{{ enNumberToBn(number_format($daytotal,2)) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr><td>মোট</td>
                                        @foreach($mainHeads as $mh)
                                            @php
                                                $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                            @endphp
                                            @foreach($khats as $kt)
                                                <td class="text-right">{{ enNumberToBn(number_format(dailyAbstractRegisterGetTotal1($kt->khat_id, request('start_date')),2)) }}</td>
                                            @endforeach
                                        @endforeach
                                        <td class="text-right"><strong>{{ enNumberToBn(number_format($grandtotal,2)) }}</strong></td>
                                    </tr>

                                    @if($preids!='')
                                        @php
                                            $expdates0 = \App\Models\Incoexpense::whereIn('khattype_id', $preids)->where('status', 1)
                                                            ->whereBetween('date', [\Carbon\Carbon::parse(request('start_date'))->format('Y-m-d'), \Carbon\Carbon::parse(request('end_date'))->format('Y-m-d')])
                                                            ->orderBy('date')->get();
                                            $mainHeads0 = \App\Models\TaxType::whereIn('tax_id', $preids)->get();
                                            $grandtotal0 = 0;

                                        @endphp
                                        @foreach($expdates0 as $ed0)
                                            @foreach($mainHeads0 as $mh0)
                                                @php
                                                    $grandtotal0 += dailyAbstractRegisterGetRowTotal1($ed0->incoexpenses_id, $mh0->tax_id, $ed0->date);
                                                @endphp
                                            @endforeach
                                        @endforeach
                                        @php
                                            $cnt = 0;
                                        @endphp
                                        <tr><td>সর্বমোট</td>
                                            @foreach($mainHeads as $mh)
                                                @php
                                                    $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                                @endphp
                                                @foreach($khats as $kt)
                                                    @php
                                                        $cnt++;
                                                    @endphp
                                                @endforeach
                                            @endforeach
                                            @php
                                                $tot = $grandtotal0 + $grandtotal;
                                            @endphp
                                            <td class="text-right" colspan="{{ $cnt }}">
                                                {{ bnNumberToEn(number_format($grandtotal0)) }} + {{ enNumberToBn(number_format($grandtotal)) }} =</td>
                                            <td class="text-right"><strong>{{ enNumberToBn(number_format($tot,2)) }}</strong></td></tr>
                                    @endif
                                    @php
                                        $grandtotalpre = 0;
                                    @endphp
                                    @foreach($mainHeads as $mh)
                                        @php
                                            $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                        @endphp
                                        @foreach($khats as $kt)
                                            @php
                                                $grandtotalpre += (float)dailyAbstractRegisterGetPrevTotal($kt->khat_id, $month);
                                            @endphp
                                        @endforeach
                                    @endforeach
                                    @php
                                        $grandtotalfinal = 0;
                                    @endphp
                                    @foreach($mainHeads as $mh)
                                        @php
                                            $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                        @endphp
                                        @foreach($khats as $kt)
                                            @php
                                                $grandtotalfinal += dailyAbstractRegisterGetGrandTotal($kt->khat_id, $month);
                                            @endphp
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th rowspan="2" style="vertical-align: middle;">তারিখ</th>
                                        @foreach($mainHeads as $mh)
                                            @if($mh->subormain!=1)
                                                <th style="vertical-align: middle;" colspan="{{ colspan($mh->tax_id) }}">{{ $mh->tax_name }}</th>
                                            @else
                                                <th style="vertical-align: middle;" colspan="{{ colspan($mh->tax_id) }}" rowspan="2">{{ $mh->tax_name }}</th>
                                            @endif
                                        @endforeach
                                        <th></th>
                                    </tr>
                                    <tr>
                                        @foreach($mainHeads as $mh)
                                            @if($mh->subormain!=1)
                                                @php
                                                    $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                                @endphp
                                                @foreach($khats as $kt)
                                                    <th style="vertical-align: middle;">{{ $kt->khat_name }}</th>
                                                @endforeach
                                            @endif
                                        @endforeach
                                        <th style="vertical-align: middle;">মোট</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $grandtotal = 0;
                                    @endphp
                                    @foreach($expDates as $ed)
                                        @php
                                            $daytotal = 0;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ enNumberToBn(\Carbon\Carbon::parse($ed->date)->format('d-m-Y')) }}</td>
                                            @foreach($mainHeads as $mh)
                                                {!! dailyAbstractRegisterGetRows1($ed->incoexpenses_id, $mh->tax_id, $ed->date) !!}
                                                @php
                                                    $daytotal += dailyAbstractRegisterGetRowTotal1($ed->incoexpenses_id, $mh->tax_id, $ed->date);
                                                    $grandtotal += dailyAbstractRegisterGetRowTotal1($ed->incoexpenses_id, $mh->tax_id, $ed->date);

                                                @endphp
                                            @endforeach
                                            <td class="text-right">{{ enNumberToBn(number_format($daytotal,2)) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr><td>মোট</td>
                                        @foreach($mainHeads as $mh)
                                            @php
                                                $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                            @endphp
                                            @foreach($khats as $kt)
                                                <td class="text-right">{{ enNumberToBn(number_format(dailyAbstractRegisterGetTotal1($kt->khat_id, request('start_date')),2)) }}</td>
                                            @endforeach
                                        @endforeach
                                        <td class="text-right"><strong>{{ enNumberToBn(number_format($grandtotal,2)) }}</strong></td>
                                    </tr>
                                    @php
                                        $preids = $ids2;
                                    @endphp

                                    @if($preids != '')
                                        @php
                                            $expdates0 = \App\Models\Incoexpense::whereIn('khattype_id', $preids)->where('status', 1)
                                                            ->whereBetween('date', [\Carbon\Carbon::parse(request('start_date'))->format('Y-m-d'), \Carbon\Carbon::parse(request('end_date'))->format('Y-m-d')])
                                                            ->orderBy('date')->get();
                                            $mainHeads0 = \App\Models\TaxType::whereIn('tax_id', $preids)->get();
                                            $grandtotal0 = 0;

                                        @endphp
                                        @foreach($expdates0 as $ed0)
                                            @foreach($mainHeads0 as $mh0)
                                                @php
                                                    $grandtotal0 += dailyAbstractRegisterGetRowTotal1($ed0->incoexpenses_id, $mh0->tax_id, $ed0->date);
                                                @endphp
                                            @endforeach
                                        @endforeach
                                        @php
                                            $cnt = 0;
                                        @endphp
                                        <tr><td>সর্বমোট</td>
                                            @foreach($mainHeads as $mh)
                                                @php
                                                    $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                                @endphp
                                                @foreach($khats as $kt)
                                                    @php
                                                        $cnt++;
                                                    @endphp
                                                @endforeach
                                            @endforeach
                                            @php
                                                $tot = $grandtotal0 + $grandtotal;
                                            @endphp
                                            <td class="text-right" colspan="{{ $cnt }}">
                                                {{ bnNumberToEn(number_format($grandtotal0)) }} + {{ enNumberToBn(number_format($grandtotal)) }} =</td>
                                            <td class="text-right"><strong>{{ enNumberToBn(number_format($tot,2)) }}</strong></td></tr>
                                    @endif
                                    @php
                                        $grandtotalpre = 0;
                                    @endphp
                                    @foreach($mainHeads as $mh)
                                        @php
                                            $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                        @endphp
                                        @foreach($khats as $kt)
                                            @php
                                                $grandtotalpre += (float)dailyAbstractRegisterGetPrevTotal($kt->khat_id, $month);
                                            @endphp
                                        @endforeach
                                    @endforeach
                                    @php
                                        $grandtotalfinal = 0;
                                    @endphp
                                    @foreach($mainHeads as $mh)
                                        @php
                                            $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                        @endphp
                                        @foreach($khats as $kt)
                                            @php
                                                $grandtotalfinal += dailyAbstractRegisterGetGrandTotal($kt->khat_id, $month);
                                            @endphp
                                        @endforeach
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

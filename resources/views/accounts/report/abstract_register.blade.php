@extends('layouts.app')
@section('title','এ্যাবস্ট্রাক্ট রেজিস্টার')
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
                <form action="{{ route('report.accounts_abstract_register') }}">
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
                                    <label for="month_of_sale">মাস <span class="text-danger">*</span></label>
                                    <input readonly required type="text" id="month_of_sale" autocomplete="off"
                                           name="month_of_sale" class="form-control month-picker"
                                           placeholder="মাসের লিখুন" value="{{ request()->get('month_of_sale')  }}">
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
    @if(count($mainHeads2) > 0 || count($mainHeads2) > 0)
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
                                    <h3 class="text-center m-0 mb-2" style="font-size: 19px !important;">এ্যাবস্ট্রাক্ট রেজিস্টার</h3>
                                    <h3 class="text-center m-0 mb-2" style="font-size: 15px !important;">
                                        সময়কালঃ {{ enNumberToBn(request('month_of_sale')) }}</h3>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th rowspan="2" style="vertical-align: middle;">তারিখ</th>
                                        @foreach($mainHeads1 as $mh)

                                            @if($mh->subormain!=1)
                                                <th style="vertical-align: middle;" colspan="{{ colspan($mh->tax_id) }}">{{ $mh->tax_name }}</th>
                                            @else
                                                <th style="vertical-align: middle;" colspan="{{ colspan($mh->tax_id) }}" rowspan="2">{{ $mh->tax_name }}</th>
                                            @endif
                                        @endforeach
                                        <th></th>
                                    </tr>
                                    <tr>
                                        @foreach($mainHeads1 as $mh)
                                            @if($mh->subormain!=1)
                                                {!! getheads($mh->tax_id) !!}
                                            @endif
                                        @endforeach
                                        <th style="vertical-align: middle;">মোট</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $grandtotal = 0;;
                                    @endphp
                                    @foreach($expDates1 as $ed)
                                        @php
                                            $daytotal = 0;;
                                        @endphp
                                        <tr>
                                            <td>{{ enNumberToBn(date('d/m/Y', strtotime($ed->date))) }}</td>
                                            @foreach($mainHeads1 as $mh)
                                                {!! mainGetrows($mh->tax_id, $ed->date) !!}
                                                @php
                                                    $daytotal += abstractRegisterGetRowTotal($mh->tax_id, $ed->date);
                                                    $grandtotal += abstractRegisterGetRowTotal($mh->tax_id, $ed->date);
                                                @endphp
                                            @endforeach
                                            <td class="text-right">{{ enNumberToBn(number_format($daytotal, 2)) }}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td>মোট</td>
                                        @foreach($mainHeads1 as $mh)
                                            @php
                                                $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                            @endphp
                                            @foreach($khats as $kt)
                                                <td class="text-right">{{ bnNumberToEn(number_format(abstractRegisterGetTotal($kt->khat_id, $month),2)) }}</td>
                                            @endforeach
                                        @endforeach
                                        <td class="text-right"><strong>{{ enNumberToBn(number_format($grandtotal,2)) }}</strong></td>
                                    </tr>

                                    <tr>
                                        <td>গত মাসের জের</td>
                                        @php
                                            $grandtotalpre = 0;
                                        @endphp
                                        @foreach($mainHeads1 as $mh)
                                            @php
                                                $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get()
                                            @endphp
                                            @foreach($khats as $kt)

                                                <td class="text-right">{{ bnNumberToEn(number_format(mainGetPrevTotal($kt->khat_id, $month),2)) }}</td>
                                                @php
                                                    $grandtotalpre += (float)mainGetPrevTotal($kt->khat_id, $month);
                                                @endphp
                                            @endforeach
                                        @endforeach
                                        <td class="text-right"><strong>{{ enNumberToBn(number_format($grandtotalpre,2)) }}</strong></td>
                                    </tr>

                                    <tr><td>সর্ব মোট</td>
                                        @php
                                            $grandtotalfinal = 0;
                                        @endphp
                                        @foreach($mainHeads1 as $mh)
                                            @php
                                                $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get()
                                            @endphp
                                            @foreach($khats as $kt)
                                                <td class="text-right">{{ enNumberToBn(number_format(mainGetGrandTotal($kt->khat_id, $month),2)) }}</td>
                                                @php
                                                    $grandtotalfinal += mainGetGrandTotal($kt->khat_id, $month);
                                                @endphp
                                            @endforeach
                                        @endforeach

                                        <td class="text-right"><strong>{{ enNumberToBn(number_format($grandtotalfinal,2)) }}</strong></td></tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th rowspan="2" style="vertical-align: middle;">তারিখ</th>
                                        @foreach($mainHeads2 as $mh)

                                            @if($mh->subormain!=1)
                                                <th style="vertical-align: middle;" colspan="{{ colspan($mh->tax_id) }}">{{ $mh->tax_name }}</th>
                                            @else
                                                 <th style="vertical-align: middle;" colspan="{{ colspan($mh->tax_id) }}" rowspan="2">{{ $mh->tax_name }}</th>
                                            @endif
                                        @endforeach
                                        </tr>
                                    <tr>
                                        @foreach($mainHeads2 as $mh)
                                         @if($mh->subormain!=1)
                                            {!! getheads($mh->tax_id) !!}
                                            @endif
                                        @endforeach
                                        <th style="vertical-align: middle;">মোট</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $grandtotal = 0;;
                                    @endphp
                                    @foreach($expDates2 as $ed)
                                    @php
                                        $daytotal = 0;;
                                    @endphp
                                    <tr>
                                        <td>{{ enNumberToBn(date('d/m/Y', strtotime($ed->date))) }}</td>
                                        @foreach($mainHeads2 as $mh)
                                        {!! mainGetrows($mh->tax_id, $ed->date) !!}
                                        @php
                                            $daytotal += abstractRegisterGetRowTotal($mh->tax_id, $ed->date);
                                            $grandtotal += abstractRegisterGetRowTotal($mh->tax_id, $ed->date);
                                        @endphp
                                        @endforeach
                                        <td class="text-right">{{ enNumberToBn(number_format($daytotal, 2)) }}</td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td>মোট</td>
                                        @foreach($mainHeads2 as $mh)
                                        @php
                                            $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get();
                                         @endphp
                                            @foreach($khats as $kt)
                                                <td class="text-right">{{ bnNumberToEn(number_format(abstractRegisterGetTotal($kt->khat_id, $month),2)) }}</td>
                                            @endforeach
                                         @endforeach
                                        <td class="text-right"><strong>{{ enNumberToBn(number_format($grandtotal,2)) }}</strong></td>
                                    </tr>

                                    <tr>
                                        <td>গত মাসের জের</td>
                                        @php
                                            $grandtotalpre = 0;
                                        @endphp
                                        @foreach($mainHeads2 as $mh)
                                        @php
                                            $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get()
                                        @endphp
                                        @foreach($khats as $kt)

                                        <td class="text-right">{{ bnNumberToEn(number_format(mainGetPrevTotal($kt->khat_id, $month),2)) }}</td>
                                        @php
                                            $grandtotalpre += (float)mainGetPrevTotal($kt->khat_id, $month);
                                        @endphp
                                        @endforeach
                                        @endforeach
                                        <td class="text-right"><strong>{{ enNumberToBn(number_format($grandtotalpre,2)) }}</strong></td>
                                    </tr>

                                    <tr><td>সর্ব মোট</td>
                                        @php
                                            $grandtotalfinal = 0;
                                        @endphp
                                        @foreach($mainHeads2 as $mh)
                                        @php
                                            $khats = \App\Models\Khat::where('tax_type_id', $mh->tax_id)->get()
                                        @endphp
                                            @foreach($khats as $kt)
                                                    <td class="text-right">{{ enNumberToBn(number_format(mainGetGrandTotal($kt->khat_id, $month),2)) }}</td>
                                            @php
                                                $grandtotalfinal += mainGetGrandTotal($kt->khat_id, $month);
                                            @endphp
                                            @endforeach
                                        @endforeach

                                        <td class="text-right"><strong>{{ enNumberToBn(number_format($grandtotalfinal,2)) }}</strong></td></tr>
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

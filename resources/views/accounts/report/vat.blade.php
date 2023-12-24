@extends('layouts.app')
@section('title','ভ্যাট রিপোর্ট')
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
                <form action="{{ route('report.vat') }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date">শুরুর তারিখ <span class="text-danger">*</span></label>
                                    <input required type="text" id="start_date" autocomplete="off"
                                           name="start_date" class="form-control date-picker"
                                           placeholder="শুরুর তারিখ লিখুন" value="{{ request()->get('start_date')  }}">
                                </div>
                            </div>
                            <div class="col-md-4">
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
    @if(count($vats) > 0)
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
                                    <h3 class="text-center m-0 mb-2" style="font-size: 19px !important;">ভ্যাট বিবরণ</h3>
                                    <h3 class="text-center m-0 mb-2" style="font-size: 15px !important;">
                                        সময়কালঃ {{ enNumberToBn(\Carbon\Carbon::parse(request('start_date'))->format('d/m/Y')) }}
                                        - {{ enNumberToBn(\Carbon\Carbon::parse(request('end_date'))->format('d/m/Y')) }}</h3>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ক্রঃনং</th>
                                        <th>তারিখ</th>
                                        <th>খাত</th>
                                        <th>বিবরণ</th>
                                        <th>টাকা</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($vats as $vat)
                                        <tr>
                                            <td >{{ enNumberToBn($loop->iteration) }}</td>
                                            <td class="text-center">{{ enNumberToBn(\Carbon\Carbon::parse($vat->receive_datwe)->format('d-m-Y')) }}</td>
                                            <td class="text-left">{{ $vat->khat_name }}</td>
                                            <td class="text-left">{{ $vat->khat_des }}</td>
                                            <td class="text-right">{{ enNumberToBn(number_format($vat->amount,2)) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="4"  class="text-right"><strong>সর্বমোট</strong></th>
                                        <th  class="text-right"><strong>{{ enNumberToBn(number_format($vats->sum('amount'),2)) }}</strong></th>
                                    </tr>
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

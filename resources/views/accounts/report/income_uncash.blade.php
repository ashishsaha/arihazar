@extends('layouts.app')
@section('title','আয় আন ক্যাশ ব্যবস্থাপন')
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
    @if(count($incomes) > 0)
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
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>উপাংশ </th>
                                        <th>খাত টাইপ</th>
                                        <th>খাত</th>
                                        <th>আর্থ বছর</th>
                                        <th>ব্যাংক</th>
                                        <th>ব্রাঞ্চ</th>
                                        <th>অ্যাকাউন্ট নং</th>
                                        <th>টাকা</th>
                                        <th class="extra_column">প্রক্রিয়া</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="gradeX">
                                        <td colspan="9" class="text-center"><h4><strong>আয় আন ক্যাশ<strong></h4></td>
                                    </tr>
                                    @foreach($incomes as $income)
                                        <tr class="gradeX">
                                            <td>{{ $income->upangsho_name}}</td>
                                            <td>{{ $income->tax_name}}</td>
                                            <td>
                                                <span id="khatname{{$income->incoexpenses_id}}">{{ $income->serilas}} {{ $income->khat_name}}</span>
                                            </td>
                                            <td><span id="year{{$income->incoexpenses_id}}">{{ enNumberToBn($income->year) }}</span></td>
                                            <td>{{ $income->bank_name}}</td>
                                            <td>{{ $income->branch_name}}</td>
                                            <td>{{ enNumberToBn($income->acc_no) }}</td>
                                            <td class="text-right">{{ enNumberToBn(number_format(floatval($income->amount),2)) }}</td>
                                            <td class="extra_column">
                                                <button class="btn btn-success bg-gradient-success btn-xs btn-cash-confirm" data-id="{{ $income->incoexpenses_id }}">Cash</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center"><h4>কোনো তথ্য পাওয়া যায়নি !</h4></div>
    @endif
@endsection
@section('script')
    <script>
        $(function () {
            $('body').on('click', '.btn-cash-confirm', function () {
                var incomeExpenseId = $(this).data('id');
                Swal.fire({
                    title: 'আপনি কি নিশ্চিত?',
                    text: "আপনি এটিকে ফিরিয়ে আনতে পারবেন না!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText:'হ্যাঁ,নিশ্চিত করুন!',
                    cancelButtonText: 'বাতিল',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "Post",
                            url: "{{ route('cashbook_expense.uncash_confirm') }}",
                            data: { incomeExpenseId: incomeExpenseId }
                        }).done(function( response ) {
                            if (response.success) {
                                Swal.fire(
                                    'অনুমোদিত!',
                                    response.message,
                                    'success'
                                ).then((result) => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                });
                            }
                        });

                    }
                })

            });
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

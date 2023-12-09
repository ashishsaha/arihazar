@extends('layouts.app')

@section('title')
    Purchase Receipt
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Order No</th>
                            <th>Supplier</th>
                            <th>Total</th>
{{--                            <th>Paid</th>--}}
{{--                            <th>Due</th>--}}
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- DataTables -->
{{--    <script src="{{ asset('themes/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ asset('themes/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>--}}
    <!-- bootstrap datepicker -->
    <script src="{{ asset('themes/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        $(function () {
            var selectedOrderId;

            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('stock_distribution_purchase_receipt_datatable') }}',
                columns: [
                    {data: 'date', name: 'date'},
                    {data: 'order_no', name: 'order_no'},
                    {data: 'supplier', name: 'supplier.name'},
                    {data: 'total', name: 'total'},
                    // {data: 'paid', name: 'paid'},
                    // {data: 'due', name: 'due'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                order: [[ 0, "desc" ]],
            });
        });
    </script>
@endsection

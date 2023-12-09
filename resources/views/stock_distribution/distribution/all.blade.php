@extends('layouts.app')


@section('title')
    Product Distribution
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('stock_distribution_product_distribution') }}">Add Distribution</a>

                    <hr>
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Employee</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Remarks</th>
                            <th>Requisition No.</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $(function () {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('stock_distribution_distribution_datatable') }}',
                columns: [
                    {data: 'date', name: 'date'},
                    {data: 'employee', name: 'employee.name'},
                    {data: 'category', name: 'category.name'},
                    {data: 'subcategory', name: 'subcategory.name'},
                    {data: 'product', name: 'product.name'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'note', name: 'note'},
                    {data: 'requisition_no', name: 'requisition_no'},

                ],
            });
        });
    </script>
@endsection

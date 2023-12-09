@extends('layouts.app')


@section('title')
    Inventory
@endsection

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Last Price</th>
                            <th>Avg Price</th>
                            <th>Total</th>
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

    <script>
        $(function () {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('stock_distribution_purchase_inventory_datatable') }}',
                columns: [
                    {data: 'category', name: 'product.category.name'},
                    {data: 'subcategory', name: 'product.subcategory.name'},
                    {data: 'product', name: 'product.name'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'last_unit_price', name: 'last_unit_price'},
                    {data: 'avg_unit_price', name: 'avg_unit_price'},
                    {data: 'total', name: 'total'},
                    {data: 'action', name: 'action'},
                ],
            });
        });
    </script>
@endsection

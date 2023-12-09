@extends('layouts.app')
@section('title')
    Product
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('stock_distribution_product_add') }}">Add Product</a>
                    <hr>
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><img height="40px" src="{{ asset($product->image ? $product->image : 'img/no_image.png')  }}" alt=""></td>
                                <td>
                                    {{ $product->category->name }}
                                    @if ($product->subCategory)
                                        > {{ $product->subCategory->name }}
                                    @endif


                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->unit->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    @if ($product->status == 1)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('stock_distribution_product_edit', ['product' => $product->id]) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('#table').DataTable();
        })
    </script>
@endsection

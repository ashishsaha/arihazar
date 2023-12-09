@extends('layouts.app')

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('title')
    Product Distribution Add
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">Distribution Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('stock_distribution_product_distribution') }}">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('employee') ? 'has-error' :'' }}">
                                    <label>Employee</label>
                                    <select id="employee" class="form-control" style="width: 100%;" name="employee">

                                        <option value="">Select Employee</option>

                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ old('employee') == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                                        @endforeach

                                    </select>

                                    @error('employee')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('date') ? 'has-error' :'' }}">
                                    <label>Date</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="date" name="date" value="{{ empty(old('date')) ? ($errors->has('date') ? '' : date('Y-m-d')) : old('date') }}" autocomplete="off">
                                    </div>
                                    <!-- /.input group -->

                                    @error('date')
                                    <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Product</th>
                                        <th>Remain QTY</th>
                                        <th width="8%">Quantity</th>
                                        <th width="15%">Remark</th>
                                        <th width="15%">Requisition No</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody id="product-container">
                                @if (old('category') != null && sizeof(old('category')) > 0)
                                    @foreach(old('category') as $item)
                                        <tr class="product-item">
                                            <td>
                                                <div class="form-group row {{ $errors->has('category.'.$loop->index) ? 'has-error' :'' }}">
                                                    <select class="form-control category" style="width: 100%;" name="category[]" required>
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ old('category.'.$loop->parent->index) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group row {{ $errors->has('subcategory.'.$loop->index) ? 'has-error' :'' }}">
                                                    <select class="form-control subcategory" style="width: 100%;" data-selected-subcategory="{{ old('subcategory.'.$loop->index) }}" name="subcategory[]" required>
                                                        <option value="">Select Sub Category</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group row {{ $errors->has('product.'.$loop->index) ? 'has-error' :'' }}">
                                                    <select class="form-control product" style="width: 100%;" data-selected-product="{{ old('product.'.$loop->index) }}" name="product[]" required>
                                                        <option value="">Select Product</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="remain_qty"></td>
                                            <td >
                                                <div class="form-group row {{ $errors->has('quantity.'.$loop->index) ? 'has-error' :'' }}">
                                                    <input type="number" step="any" class="form-control quantity" name="quantity[]" value="{{ old('quantity.'.$loop->index) }}">
                                                </div>
                                            </td>

                                            <td >
                                                <div class="form-group row {{ $errors->has('remarks.'.$loop->index) ? 'has-error' :'' }}">
                                                    <input type="text" class="form-control" name="remarks[]" value="{{ old('remarks.'.$loop->index) }}">
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group row {{ $errors->has('requisition_no.'.$loop->index) ? 'has-error' :'' }}">
                                                    <input type="text" class="form-control" name="requisition_no[]" value="{{ old('requisition_no.'.$loop->index) }}">
                                                </div>
                                            </td>

                                            <td  class="text-center">
                                                <a role="button" class="btn btn-danger btn-sm btn-remove">X</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="product-item">
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control category" style="width: 100%;" name="category[]" required>
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td >
                                            <div class="form-group">
                                                <select class="form-control subcategory" style="width: 100%;" name="subcategory[]" required>
                                                    <option value="">Select Sub Category</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td >
                                            <div class="form-group">
                                                <select class="form-control product" style="width: 100%;" name="product[]" required>
                                                    <option value="">Select Product</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="remain_qty"></td>
                                        <td >
                                            <div class="form-group">
                                                <input type="number" step="any" class="form-control quantity" name="quantity[]">
                                            </div>
                                        </td>
                                        <td >
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="remarks[]">
                                            </div>
                                        </td>
                                        <td >
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="requisition_no[]">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a role="button" class="btn btn-danger btn-sm btn-remove">X</a>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <a role="button" class="btn btn-info btn-sm" id="btn-add-product">Add Product</a>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <tr>
                                    <th colspan="8">
                                        <button type="submit" class="btn btn-primary pull-right">Save</button>

                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
        </div>
    </div>

    <template id="template-product">
        <tr class="product-item">
            <td>
                <div class="form-group">
                    <select class="form-control category" style="width: 100%;" name="category[]" required>
                        <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                    </select>
                </div>
            </td>
            <td >
                <div class="form-group">
                    <select class="form-control subcategory" style="width: 100%;" name="subcategory[]" required>
                        <option value="">Select Sub Category</option>
                    </select>
                </div>
            </td>
            <td >
                <div class="form-group">
                    <select class="form-control product" style="width: 100%;" name="product[]" required>
                        <option value="">Select Product</option>
                    </select>
                </div>
            </td>
            <td class="remain_qty"></td>
            <td >
                <div class="form-group">
                    <input type="number" step="any" class="form-control quantity" name="quantity[]">
                </div>
            </td>
            <td >
                <div class="form-group">
                    <input type="text" class="form-control" name="remarks[]">
                </div>
            </td>
            <td >
                <div class="form-group">
                    <input type="text" class="form-control" name="requisition_no[]">
                </div>
            </td>
            <td  class="text-center">
                <a role="button" class="btn btn-danger btn-sm btn-remove">X</a>
            </td>
        </tr>
    </template>
@endsection

@section('script')
    <!-- Select2 -->
    <script src="{{ asset('themes/backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('themes/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.product').select2();
            $('.category').select2();
            $('.subcategory').select2();
            $('#employee').select2();


            // select Category


            $('body').on('change','.category', function () {
                var categoryID = $(this).val();
                var itemCategory = $(this);
                itemCategory.closest('tr').find('.subcategory').html('<option value="">Select Sub Category</option>');
                var selected = itemCategory.closest('tr').find('.subcategory').attr("data-selected-subcategory");

                if (categoryID != '') {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('stock_distribution_get_sub_category') }}",
                        data: { categoryId: categoryID }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (selected == item.id)
                                itemCategory.closest('tr').find('.subcategory').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                            else
                                itemCategory.closest('tr').find('.subcategory').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                        itemCategory.closest('tr').find('.subcategory').trigger('change');
                    });
                }

            });
            $('.category').trigger('change');

            // select Sub Category
            $('body').on('change','.subcategory', function () {
                var subcategoryID = $(this).val();
                var itemSubCategory = $(this);
                itemSubCategory.closest('tr').find('.product').html('<option value="">Select Product</option>');
                var selected = itemSubCategory.closest('tr').find('.product').attr("data-selected-product");

                if (subcategoryID != '') {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('stock_distribution_get_inventory_product') }}",
                        data: { subcategoryID: subcategoryID }
                    }).done(function( data ) {

                        $.each(data, function( index, item ) {
                            if (selected == item.product_id)
                                itemSubCategory.closest('tr').find('.product').append('<option value="'+item.product_id+'" selected>'+item.product.name+'</option>');
                            else
                                itemSubCategory.closest('tr').find('.product').append('<option value="'+item.product_id+'">'+item.product.name+'</option>');
                        });

                    });
                }

            });

            // select Sub Category
            $('body').on('change','.product', function () {
                var productID = $(this).val();
                var productItem = $(this);

                productItem.closest('tr').find('.remain_qty').html('');

                if (productID != '') {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('stock_distribution_get_inventory_product_qty') }}",
                        data: { productID: productID }
                    }).done(function( data ) {

                        productItem.closest('tr').find('.remain_qty').html(data.quantity);

                    });
                }

            });

            $('.product').trigger('change');

            //Date picker
            $('#date').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            $('#btn-add-product').click(function () {
                var html = $('#template-product').html();
                var item = $(html);

                $('#product-container').append(item);

                initProduct();

                if ($('.product-item').length >= 1 ) {
                    $('.btn-remove').show();
                }
            });

            $('body').on('click', '.btn-remove', function () {
                $(this).closest('.product-item').remove();

                if ($('.product-item').length <= 1 ) {
                    $('.btn-remove').hide();
                }
            });


            if ($('.product-item').length <= 1 ) {
                $('.btn-remove').hide();
            } else {
                $('.btn-remove').show();
            }
            initProduct();
        });



        function initProduct() {
            $('.product').select2();
            $('.category').select2();
            $('.subcategory').select2();
        }

        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });

    </script>
@endsection

@extends('layouts.app')

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('title')
    Purchases
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">Purchases Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('stock_distribution_purchases') }}">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('supplier') ? 'has-error' :'' }}">
                                    <label>Supplier</label>

                                    <select class="form-control select2 supplier" style="width: 100%;" name="supplier" data-placeholder="Select Supplier">
                                        <option value="">Select Supplier</option>

                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}" {{ old('supplier') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('supplier')
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
                                        <th width="8%">Quantity</th>
                                        <th width="10%">Unit Price</th>
                                        <th width="10%">Total Cost</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody id="product-container">
                                @if (old('category') != null && sizeof(old('category')) > 0)
                                    @foreach(old('category') as $item)
                                        <tr class="product-item">
                                            <td>
                                                <div class="form-group {{ $errors->has('category.'.$loop->index) ? 'has-error' :'' }}">
                                                    <select class="form-control category" style="width: 100%;" name="category[]" required>
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ old('category.'.$loop->parent->index) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group {{ $errors->has('subcategory.'.$loop->index) ? 'has-error' :'' }}">
                                                    <select class="form-control subcategory" style="width: 100%;" data-selected-subcategory="{{ old('subcategory.'.$loop->index) }}" name="subcategory[]" required>
                                                        <option value="">Select Sub Category</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group {{ $errors->has('product.'.$loop->index) ? 'has-error' :'' }}">
                                                    <select class="form-control product" style="width: 100%;" data-selected-product="{{ old('product.'.$loop->index) }}" name="product[]" required>
                                                        <option value="">Select Product</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td >
                                                <div class="form-group {{ $errors->has('quantity.'.$loop->index) ? 'has-error' :'' }}">
                                                    <input type="number" step="any" class="form-control quantity" name="quantity[]" value="{{ old('quantity.'.$loop->index) }}">
                                                </div>
                                            </td>

                                            <td >
                                                <div class="form-group {{ $errors->has('unit_price.'.$loop->index) ? 'has-error' :'' }}">
                                                    <input type="text" class="form-control unit_price" name="unit_price[]" value="{{ old('unit_price.'.$loop->index) }}">
                                                </div>
                                            </td>

                                            <td  class="total-cost">৳0.00</td>
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
                                        <td >
                                            <div class="form-group">
                                                <input type="number" step="any" class="form-control quantity" name="quantity[]">
                                            </div>
                                        </td>
                                        <td >
                                            <div class="form-group">
                                                <input type="text" class="form-control unit_price" name="unit_price[]">
                                            </div>
                                        </td>

                                        <td  class="total-cost">৳0.00</td>
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
                                        <th colspan="4" class="text-right">Total Amount</th>
                                        <th id="total-amount">৳0.00</th>
                                        <td></td>
                                    </tr>
                                <tr>
                                    <th colspan="6">
                                        <button type="submit" class="btn btn-primary pull-right">Save</button>

                                    </th>
                                </tr>
                                </tfoot>
                            </table>
{{--                           <div class="col-md-6 col-md-offset-6" style="padding-right: 0px;">--}}
{{--                               <table class="table table-bordered">--}}
{{--                                   <tr>--}}
{{--                                       <th colspan="4" class="text-right">Product Sub Total</th>--}}
{{--                                       <th id="product-sub-total">৳0.00</th>--}}
{{--                                   </tr>--}}

{{--                                   <tr>--}}
{{--                                       <th colspan="4" class="text-right">VAT (%)</th>--}}
{{--                                       <td>--}}
{{--                                           <div class="form-group {{ $errors->has('vat') ? 'has-error' :'' }}">--}}
{{--                                               <input type="text" class="form-control" name="vat" id="vat" value="{{ empty(old('vat')) ? ($errors->has('vat') ? '' : '0') : old('vat') }}">--}}
{{--                                               <span id="vat_total">৳0.00</span>--}}
{{--                                           </div>--}}
{{--                                       </td>--}}
{{--                                   </tr>--}}

{{--                                   <tr>--}}
{{--                                       <th colspan="4" class="text-right"> Discount (%)</th>--}}
{{--                                       <td>--}}
{{--                                           <div class="form-group {{ $errors->has('discount') ? 'has-error' :'' }}">--}}
{{--                                               <input type="text" class="form-control" name="discount" id="discount" value="{{ empty(old('discount')) ? ($errors->has('discount') ? '' : '0') : old('discount') }}">--}}
{{--                                               --}}{{--                                        <span id="discount_total">৳0.00</span>--}}
{{--                                           </div>--}}
{{--                                       </td>--}}
{{--                                   </tr>--}}

{{--                                   <tr>--}}
{{--                                       <th colspan="4" class="text-right">Total</th>--}}
{{--                                       <th id="final-amount">৳ 0.00</th>--}}
{{--                                   </tr>--}}
{{--                                   <tr>--}}
{{--                                       <th colspan="4" class="text-right">Paid</th>--}}
{{--                                       <td>--}}
{{--                                           <div class="form-group {{ $errors->has('paid') ? 'has-error' :'' }}">--}}
{{--                                               <input type="text" class="form-control" name="paid" id="paid" value="{{ empty(old('paid')) ? ($errors->has('paid') ? '' : '0') : old('paid') }}">--}}
{{--                                           </div>--}}
{{--                                       </td>--}}
{{--                                   </tr>--}}
{{--                                   <tr>--}}
{{--                                       <th colspan="4" class="text-right">Due</th>--}}
{{--                                       <th id="due">৳0.00</th>--}}
{{--                                   </tr>--}}
{{--                                   <tr>--}}
{{--                                       <th colspan="5" class="text-right">--}}

{{--                                           <button type="submit" class="btn btn-primary pull-right">Save</button>--}}
{{--                                       </th>--}}

{{--                                   </tr>--}}

{{--                               </table>--}}

{{--                                   <input type="hidden" name="total" id="total">--}}
{{--                                   <input type="hidden" name="due_total" id="due_total">--}}

{{--                           </div>--}}
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
            <td >
                <div class="form-group">
                    <input type="number" step="any" class="form-control quantity" name="quantity[]">
                </div>
            </td>

            <td >
                <div class="form-group">
                    <input type="text" class="form-control unit_price" name="unit_price[]">
                </div>
            </td>
            <td  class="total-cost">৳0.00</td>
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
            $('.supplier').select2();


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
                        url: "{{ route('stock_distribution_get_product') }}",
                        data: { subcategoryID: subcategoryID }
                    }).done(function( data ) {

                        $.each(data, function( index, item ) {
                            if (selected == item.id)
                                itemSubCategory.closest('tr').find('.product').append('<option value="'+item.id+'" selected>'+item.name+'</option>');

                            else
                                itemSubCategory.closest('tr').find('.product').append('<option value="'+item.id+'">'+item.name+'</option>');

                        });

                    });
                }

            });

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
                calculate();

                if ($('.product-item').length <= 1 ) {
                    $('.btn-remove').hide();
                }
            });

            $('body').on('keyup', '.quantity, .unit_price', function () {
                calculate();
            });

            if ($('.product-item').length <= 1 ) {
                $('.btn-remove').hide();
            } else {
                $('.btn-remove').show();
            }
            initProduct();
            calculate();
        });

        function calculate() {
            var total = 0;
            $('.product-item').each(function(i, obj) {
                var quantity = $('.quantity:eq('+i+')').val();
                var unit_price = $('.unit_price:eq('+i+')').val();

                if (quantity == '' || quantity < 0 || !$.isNumeric(quantity))
                    quantity = 0;

                if (unit_price == '' || unit_price < 0 || !$.isNumeric(unit_price))
                    unit_price = 0;

                $('.total-cost:eq('+i+')').html('৳' + (quantity * unit_price).toFixed(2) );
                total += quantity * unit_price;
            });

            $('#total-amount').html('৳' + total.toFixed(2));
        }

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

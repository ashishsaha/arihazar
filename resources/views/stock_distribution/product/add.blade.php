@extends('layouts.app')
@section('title')
    Purchase Product Add
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title">Product Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('stock_distribution_product_add') }}">
                    @csrf

                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label class="col-sm-2 col-form-label">Name <span class="text-red">*</span></label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Name"
                                       name="name" value="{{ old('name') }}">

                                @error('name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('unit') ? 'has-error' :'' }}">
                            <label class="col-sm-2 col-form-label">Unit <span class="text-red">*</span></label>

                            <div class="col-sm-10">
                                <select class="form-control select2" name="unit">
                                    <option value="">Select Unit</option>

                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}" {{ old('unit') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                    @endforeach
                                </select>

                                @error('unit')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('category') ? 'has-error' :'' }}">
                            <label class="col-sm-2 col-form-label">Category <span class="text-red">*</span></label>

                            <div class="col-sm-10">
                                <select class="form-control select2" name="category" id="category">
                                    <option value="">Select Category</option>

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @error('category')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row {{ $errors->has('sub_category') ? 'has-error' :'' }}">
                            <label class="col-sm-2 col-form-label">Sub Category <span class="text-red">*</span></label>

                            <div class="col-sm-10">
                                <select class="form-control select2" name="sub_category" id="sub_category">
                                    <option value="">Select Sub Category</option>
                                </select>

                                @error('sub_category')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>



                        <div class="form-group row {{ $errors->has('description') ? 'has-error' :'' }}">
                            <label class="col-sm-2 col-form-label">Description</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Enter Description"
                                       name="description" value="{{ old('description') }}">

                                @error('description')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('image') ? 'has-error' :'' }}">
                            <label class="col-sm-2 col-form-label">Image</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image">

                                @error('image')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label class="col-sm-2 col-form-label">Status <span class="text-red">*</span></label>

                            <div class="col-sm-10">

                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
                                        Active
                                    </label>
                                </div>

                                <div class="radio" style="display: inline">
                                    <label>
                                        <input type="radio" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                                        Inactive
                                    </label>
                                </div>

                                @error('status')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
 <script>
        $(function () {
            var subCategorySelected = '{{ old('sub_category') }}';

            $('#category').change(function () {
                var categoryId = $(this).val();

                $('#sub_category').html('<option value="">Select Sub Category</option>');
                $('#sub_sub_category').html('<option value="">Select Sub Category</option>');

                if (categoryId != '') {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('stock_distribution_get_sub_category') }}",
                        data: { categoryId: categoryId }
                    }).done(function( data ) {
                        $.each(data, function( index, item ) {
                            if (subCategorySelected == item.id)
                                $('#sub_category').append('<option value="'+item.id+'" selected>'+item.name+'</option>');
                            else
                                $('#sub_category').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });

                        $('#sub_category').trigger('change');
                    });
                }

                $('#sub_category').trigger('change');
            });


            $('#category').trigger('change');

            //Initialize Select2 Elements
            $('.select2').select2();

        });
    </script>
@endsection

@extends('layouts.app')
@section('title','উপ খাত যুক্ত করুন')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">উপ খাতের তথ্য</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" action="{{ route('collection_sub_type.add') }}" class="form-horizontal" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row {{ $errors->has('type') ? 'has-error' :'' }}">
                            <label for="type" class="col-sm-2 col-form-label">খাত বাছাই করুন <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control select2" id="type" name="type">
                                    <option value="">খাত বাছাই করুন</option>
                                    @foreach($types as $type)
                                    <option {{ old('type') == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label for="name" class="col-sm-2 col-form-label">উপ খাতের নাম <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="খাতের নাম">
                                @error('name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('fees') ? 'has-error' :'' }}">
                            <label for="fees" class="col-sm-2 col-form-label">ফি</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('fees') }}" name="fees" class="form-control" id="fees" placeholder="ফি">
                                @error('fees')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('status') ? 'has-error' :'' }}">
                            <label class="col-sm-2 col-form-label">অবস্থা <span class="text-danger">*</span></label>

                            <div class="col-sm-10">

                                <div class="icheck-success d-inline">
                                    <input checked type="radio" id="active" name="status" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
                                    <label for="active">
                                        সক্রিয়
                                    </label>
                                </div>

                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="inactive" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                                    <label for="inactive">
                                        নিষ্ক্রিয়
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
                        <button type="submit" class="btn btn-success bg-gradient-success">সংরক্ষণ</button>
                        <a href="{{ route('collection_sub_type.all') }}" class="btn btn-default float-right">বাতিল</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection

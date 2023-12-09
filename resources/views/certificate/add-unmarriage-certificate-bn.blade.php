{{--@extends('layouts.app')--}}

{{--@section('title','অবিবাহিত সনদ পত্র')--}}
{{--@section('style')--}}
{{--    <style>--}}
{{--        fieldset--}}
{{--        {--}}
{{--            border: 1px solid #ddd !important;--}}
{{--            margin: 0;--}}
{{--            xmin-width: 0;--}}
{{--            padding: 10px;--}}
{{--            position: relative;--}}
{{--            border-radius:4px;--}}
{{--            background-color:#f5f5f5;--}}
{{--            padding-left:10px!important;--}}
{{--        }--}}

{{--        legend--}}
{{--        {--}}
{{--            font-size:14px;--}}
{{--            font-weight:bold;--}}
{{--            margin-bottom: 0px;--}}
{{--            width: 35%;--}}
{{--            border: 1px solid #ddd;--}}
{{--            border-radius: 4px;--}}
{{--            padding: 5px 5px 5px 10px;--}}
{{--            background-color: #ffffff;--}}
{{--        }--}}
{{--    </style>--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        <!-- left column -->--}}
{{--        <div class="col-md-12">--}}
{{--            <!-- jquery validation -->--}}
{{--            <div class="card card-default">--}}
{{--                <div class="card-header">--}}
{{--                    <h3 class="card-title">অবিবাহিত সনদ পত্র  যুক্ত করুন </h3>--}}
{{--                </div>--}}
{{--                <!-- /.card-header -->--}}
{{--                <!-- form start -->--}}
{{--                <form enctype="multipart/form-data" action="{{ route('add.unmarriage.certificate.bn') }}" class="form-horizontal" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="form-group row {{ $errors->has('name') ? 'has-error' :'' }}">--}}
{{--                            <label for="name" class="col-sm-2 col-form-label">নাম <span class="text-danger">*</span></label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="নাম লিখুন" required>--}}
{{--                                @error('name')--}}
{{--                                <span class="help-block">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row {{ $errors->has('father_husband') ? 'has-error' :'' }}">--}}
{{--                            <label for="father_husband" class="col-sm-2 col-form-label">পিতা / স্বামীর  নাম :  <span class="text-danger">*</span></label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <input type="text" value="{{ old('father_husband') }}" name="father_husband" class="form-control" id="father_husband" placeholder="পিতা/স্বামীর  নাম  লিখুন">--}}
{{--                                @error('father_husband')--}}
{{--                                <span class="help-block">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row {{ $errors->has('mother') ? 'has-error' :'' }}">--}}
{{--                            <label for="mother" class="col-sm-2 col-form-label">মাতার   নাম :  <span class="text-danger">*</span></label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <input type="text" value="{{ old('mother') }}" name="mother" class="form-control" id="mother" placeholder="মাতার   নাম  লিখুন">--}}
{{--                                @error('mother')--}}
{{--                                <span class="help-block">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row">--}}
{{--                            <div class="form-group" style="padding: 10px;width:100%">--}}
{{--                                <div class="row" style="width:100%">--}}
{{--                                    <label for="inputSuccess" class="control-label col-lg-12" ><strong  style="color:black">  ঠিকানা :  </strong></label>--}}
{{--                                    <div class="row" style="width:100%;padding:15px">--}}
{{--                                        <!-- <textarea class="form-control"  placeholder=" ঠিকানা   লিখুন " rows="5"  name="address"></textarea>-->--}}
{{--                                        <fieldset class="col-md-4">--}}
{{--                                            <legend class="text-center">মহল্লা</legend>--}}

{{--                                            <div class="card card-default">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <input type="text" class="form-control" placeholder="মহল্লার    নাম  লিখুন " id="" name="area_name" require>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </fieldset>--}}

{{--                                        <fieldset class="col-md-4">--}}
{{--                                            <legend  class="text-center">সড়ক</legend>--}}

{{--                                            <div class="card card-default">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <input type="text" class="form-control" placeholder=" সড়কের    নাম  লিখখুন " id="" name="road_name" require>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </fieldset>--}}

{{--                                        <fieldset class="col-md-4">--}}
{{--                                            <legend  class="text-center"> ওয়ার্ড নং </legend>--}}

{{--                                            <div class="card card-default">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <input type="text" class="form-control" placeholder="  ওয়ার্ড নং    লিখুন " id="" name="word_no" require>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </fieldset>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row" style="width:100%;padding:15px">--}}
{{--                            <!-- <textarea class="form-control"  placeholder=" ঠিকানা   লিখুন " rows="5"  name="address"></textarea>-->--}}
{{--                            <fieldset class="col-md-4">--}}
{{--                                <legend  class="text-center">ডাকঘর</legend>--}}

{{--                                <div class="card card-default">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <input type="text" class="form-control" placeholder=" ডাকঘর   নাম  লিখুন " id="" name="post_office" require>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </fieldset>--}}

{{--                            <fieldset class="col-md-4">--}}
{{--                                <legend  class="text-center">থানা</legend>--}}
{{--                                <div class="card card-default">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <input type="text" class="form-control" placeholder=" থানার  নাম  লিখুন " value="কোতয়ালী" name="thana" require>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </fieldset>--}}

{{--                            <fieldset class="col-md-4">--}}
{{--                                <legend  class="text-center"> উপজেলা </legend>--}}

{{--                                <div class="card card-default">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <input type="text" class="form-control" placeholder=" উপজেলা লিখুন " value="ফরিদপুর সদর " name="upazila" require>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </fieldset>--}}
{{--                        </div>--}}


{{--                        <div class="form-group" style="padding: 10px;width:100%;padding:15px">--}}
{{--                            <div class="row">--}}
{{--                                <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> প্রত্যয়ন :  </strong></label>--}}
{{--                                <div class="col-lg-12">--}}
{{--                                    <textarea class="form-control" placeholder="প্রত্যয়ন   লিখুন " rows="5" maxlength="500" required name="certificate_details">আমার পরিচিত।তিনি ফরিদপুর পৌরসভার একজন স্থায়ী বাসিন্দা এবং জন্মসূত্রে বাংলাদেশের নাগরিক।আমার জানামতে তিনি কোন  বিবাহে আবদ্ধ হন নাই।</textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.card-body -->--}}
{{--                    <div class="card-footer">--}}
{{--                        <button type="submit" class="btn btn-success bg-gradient-success">দাখিল করুন</button>--}}
{{--                        <a href="{{ route('collection.all') }}" class="btn btn-default float-right">বাতিল</a>--}}
{{--                    </div>--}}
{{--                    <!-- /.card-footer -->--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <!-- /.card -->--}}
{{--        </div>--}}
{{--        <!--/.col (left) -->--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@section('script')--}}
{{--    <script>--}}
{{--        function active_text_area(id)--}}
{{--        {--}}
{{--            var checkBox = document.getElementById("checkboxPrimary"+id);--}}

{{--            if(checkBox.checked){--}}
{{--                document.getElementById("address"+id).disabled = false;--}}
{{--            }--}}
{{--            else {--}}
{{--                document.getElementById("address"+id).disabled = true;--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--@endsection--}}

@extends('layouts.app')
@section('style')
    <style>
        fieldset
        {
            border: 1px solid #ddd !important;
            margin: 0;
            xmin-width: 0;
            padding: 10px;
            position: relative;
            border-radius:4px;
            background-color:#f5f5f5;
            padding-left:10px!important;
        }

        legend
        {
            font-size:14px;
            font-weight:bold;
            margin-bottom: 0px;
            width: 35%;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px 5px 5px 10px;
            background-color: #ffffff;
        }
    </style>
@endsection
@section('content')
    <div class="content-header" style="background-color: #008b8b">
        <div class="container-fluid">
            <div class="row mb-2 pt-3">
                <div class="col-sm-12">
                    <h4 class="m-0"  style="color:white"><i class="fa fa-file"></i> &nbsp; অবিবাহিত সনদ পত্র  যুক্ত করুন </h4>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-12">
                        <section class="card">

                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> সফল !</h5>
                                    {{session('message')}}.
                                </div>
                            @endif
                            <div class="card-body">
                                <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="{{route('add.unmarriage.certificate.bn')}}">
                                    {{csrf_field()}}
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row" >
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" নাম লিখুন " id="" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> পিতা / স্বামীর  নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" পিতা/স্বামীর  নাম  লিখুন " id="" name="father_husband" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মাতার   নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="মাতার   নাম  লিখুন " id="" name="mother" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group" style="padding: 10px;width:100%">
                                            <div class="row" style="width:100%">
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black">  ঠিকানা :  </strong></label>
                                                <div class="row" style="width:100%;padding:15px">
                                                    <!-- <textarea class="form-control"  placeholder=" ঠিকানা   লিখুন " rows="5"  name="address"></textarea>-->
                                                    <fieldset class="col-md-4">
                                                        <legend class="text-center">মহল্লা</legend>

                                                        <div class="card card-default">
                                                            <div class="card-body">
                                                                <input type="text" class="form-control" placeholder="মহল্লার    নাম  লিখুন " id="" name="area_name" require>
                                                            </div>
                                                        </div>

                                                    </fieldset>

                                                    <fieldset class="col-md-4">
                                                        <legend  class="text-center">সড়ক</legend>

                                                        <div class="card card-default">
                                                            <div class="card-body">
                                                                <input type="text" class="form-control" placeholder=" সড়কের    নাম  লিখখুন " id="" name="road_name" require>
                                                            </div>
                                                        </div>

                                                    </fieldset>

                                                    <fieldset class="col-md-4">
                                                        <legend  class="text-center"> ওয়ার্ড নং </legend>

                                                        <div class="card card-default">
                                                            <div class="card-body">
                                                                <input type="text" class="form-control" placeholder="  ওয়ার্ড নং    লিখুন " id="" name="word_no" require>
                                                            </div>
                                                        </div>

                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="width:100%;padding:15px">
                                        <!-- <textarea class="form-control"  placeholder=" ঠিকানা   লিখুন " rows="5"  name="address"></textarea>-->
                                        <fieldset class="col-md-4">
                                            <legend  class="text-center">ডাকঘর</legend>

                                            <div class="card card-default">
                                                <div class="card-body">
                                                    <input type="text" class="form-control" placeholder=" ডাকঘর   নাম  লিখুন " id="" name="post_office" require>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="col-md-4">
                                            <legend  class="text-center">থানা</legend>
                                            <div class="card card-default">
                                                <div class="card-body">
                                                    <input type="text" class="form-control" placeholder=" থানার  নাম  লিখুন " value="আড়াইহাজার" name="thana" require>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="col-md-4">
                                            <legend  class="text-center"> উপজেলা </legend>

                                            <div class="card card-default">
                                                <div class="card-body">
                                                    <input type="text" class="form-control" placeholder=" উপজেলা লিখুন " value="আড়াইহাজার" name="upazila" required>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>
                            </div>
                    </div>
                </div>

                <div class="form-group" style="padding: 10px;width:100%;padding:15px">
                    <div class="row">
                        <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> প্রত্যয়ন :  </strong></label>
                        <div class="col-lg-12">
                            <textarea class="form-control" placeholder="প্রত্যয়ন   লিখুন " rows="5" maxlength="500" required name="certificate_details">আমার পরিচিত।তিনি আড়াইহাজার পৌরসভার একজন স্থায়ী বাসিন্দা এবং জন্মসূত্রে বাংলাদেশের নাগরিক।আমার জানামতে তিনি কোন  বিবাহে আবদ্ধ হন নাই।</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="padding: 10px;width: 100%">
                    <div class="row">

                        <div class="offset-6 col-md-4 text-right">
                            <button type="submit" class="btn btn-info pull-right">দাখিল করুন</button>
                        </div>

                    </div>
                </div>



                </form>

            </div>
    </section>

@endsection
@section('script')
    <script>
        function active_text_area(id)
        {
            var checkBox = document.getElementById("checkboxPrimary"+id);

            if(checkBox.checked){
                document.getElementById("address"+id).disabled = false;
            }
            else {
                document.getElementById("address"+id).disabled = true;
            }
        }
    </script>
@endsection


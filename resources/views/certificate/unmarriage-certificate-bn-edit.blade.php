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
                                <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="{{route('unmarriage.certificate_bn.edit',$certificate->id)}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="serial_no" value="{{$certificate->serial_no}}">
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row" >
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" নাম লিখুন " id="" name="name" value="{{$certificate->name}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> পিতা / স্বামীর  নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" পিতা/স্বামীর  নাম  লিখুন " value="{{$certificate->father_husband}}" name="father_husband" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মাতার   নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="মাতার   নাম  লিখুন " id="" name="mother" value="{{$certificate->mother}}" required>
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
                                                                <input type="text" class="form-control" placeholder="মহল্লার    নাম  লিখুন " id="" name="area_name" value="{{$certificate->area_name}}">
                                                            </div>
                                                        </div>

                                                    </fieldset>

                                                    <fieldset class="col-md-4">
                                                        <legend  class="text-center">সড়ক</legend>

                                                        <div class="card card-default">
                                                            <div class="card-body">
                                                                <input type="text" class="form-control" placeholder=" সড়কের    নাম  লিখখুন " id="" name="road_name" value="{{$certificate->road_name}}">
                                                            </div>
                                                        </div>

                                                    </fieldset>

                                                    <fieldset class="col-md-4">
                                                        <legend  class="text-center"> ওয়ার্ড নং </legend>

                                                        <div class="card card-default">
                                                            <div class="card-body">
                                                                <input type="text" class="form-control" placeholder="  ওয়ার্ড নং    লিখুন " id="" name="word_no" value="{{$certificate->word_no}}" >
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
                                                    <input type="text" class="form-control" placeholder=" ডাকঘর   নাম  লিখুন " id="" name="post_office" value="{{$certificate->post_office}}" >
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="col-md-4">
                                            <legend  class="text-center">থানা</legend>
                                            <div class="card card-default">
                                                <div class="card-body">
                                                    <input type="text" class="form-control" placeholder=" থানার  নাম  লিখুন "  name="thana" value="{{$certificate->thana}}">
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="col-md-4">
                                            <legend  class="text-center"> উপজেলা </legend>

                                            <div class="card card-default">
                                                <div class="card-body">
                                                    <input type="text" class="form-control" placeholder=" উপজেলা লিখুন "   name="upazila" value="{{$certificate->upazila}}">
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
                            <textarea class="form-control" placeholder="প্রত্যয়ন   লিখুন " rows="5" maxlength="500" required name="certificate_details">{{$certificate->certificate_details}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="padding: 10px;width: 100%">
                    <div class="row">

                        <div class="offset-6 col-md-5 text-right">
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

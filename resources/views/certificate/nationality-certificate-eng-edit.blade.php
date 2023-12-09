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
                    <h4 class="m-0"  style="color:white"><i class="fa fa-file"></i> &nbsp;Add Nationality Certificate </h4>
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
                            <div class="panel-body">
                                <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="{{route('nationality.certificate_eng.edit',$certificate->id)}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="serial_no" value="{{$certificate->serial_no}}">
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row" >
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Name :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" Enter Name " id="" name="name" value="{{$certificate->name}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Father / Husband Name :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" Enter Father/Husband Name " value="{{$certificate->father_husband}}" name="father_husband" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Mother Name :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="Enter Mother Name " id="" name="mother" value="{{$certificate->mother}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group" style="padding: 10px;width:100%">
                                            <div class="row" style="width:100%">
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white">  Address :  </strong></label>
                                                <div class="row" style="width:100%;padding:15px">
                                                    <!-- <textarea class="form-control"  placeholder=" ঠিকানা   লিখুন " rows="5"  name="address"></textarea>-->
                                                    <fieldset class="col-md-4">
                                                        <legend class="text-center">Mahallah</legend>

                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <input type="text" class="form-control" placeholder="Enter Mahallah " id="" name="area_name" value="{{$certificate->area_name}}">
                                                            </div>
                                                        </div>

                                                    </fieldset>

                                                    <fieldset class="col-md-4">
                                                        <legend  class="text-center">Road</legend>

                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <input type="text" class="form-control" placeholder="Enter Road Name " id="" name="road_name" value="{{$certificate->road_name}}">
                                                            </div>
                                                        </div>

                                                    </fieldset>

                                                    <fieldset class="col-md-4">
                                                        <legend  class="text-center">Word No</legend>

                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <input type="text" class="form-control" placeholder=" Enter Word Name " id="" name="word_no" value="{{$certificate->word_no}}" >
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
                                            <legend  class="text-center">Post Office</legend>

                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <input type="text" class="form-control" placeholder=" Enter Post office Name" id="" name="post_office" value="{{$certificate->post_office}}" >
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="col-md-4">
                                            <legend  class="text-center">Police Station</legend>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <input type="text" class="form-control" placeholder="Enter Police Station Name "  name="thana" value="{{$certificate->thana}}">
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="col-md-4">
                                            <legend  class="text-center"> Upazila  </legend>

                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <input type="text" class="form-control" placeholder=" Enter Upazila Name"   name="upazila" value="{{$certificate->upazila}}">
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>
                            </div>
                    </div>
                </div>

                <div class="form-group" style="padding: 10px;width:100%">
                    <div class="row">
                        <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white">    Add Councilor  : </strong></label>
                        <div class="col-lg-12">
                            <select class="form-control" name="counselor_id" required>
                                <option value = ""> Select Councilor </option>
                                @foreach($counselors as $item)
                                    <?php
                                    $counselor_name = explode("=",$item->name);


                                    ?>
                                    <option value="{{$item->id}}" {{$item->id==$certificate->counselor_id?'selected':''}}><?php echo $counselor_name[1];?>-{{$item->word_no}}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                </div>

                <div class="form-group" style="padding: 10px;width:100%;padding:15px">
                    <div class="row">
                        <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> prottoyon Text :  :  </strong></label>
                        <div class="col-lg-12">
                            <textarea class="form-control" placeholder="প্রত্যয়ন   লিখুন " rows="5" maxlength="500" required name="certificate_details">{{$certificate->certificate_details}}</textarea
                        </div>
                    </div>
                </div>

                <div class="form-group" style="padding: 10px">
                    <div class="row">

                        <div class="offset-2 col-md-10 text-right">
                            <button type="submit" class="btn btn-info pull-right">Confirm Certificate</button>
                        </div>

                    </div>
                </div>



                </form>

            </div>
    </section>
    </div>
    </div>
    </div>
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

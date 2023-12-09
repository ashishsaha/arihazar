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
                    <h4 class="m-0"  style="color:white"><i class="fa fa-file"></i> &nbsp; Add Nationality Certificate</h4>
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
                                <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="{{route('add.nationality.certificate_eng')}}">
                                    {{csrf_field()}}
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row" >
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Name :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="Enter Applicant Name " id="" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Father / Husband Name :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" Enter Father or Husband Name " id="" name="father_husband" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Mother Name :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="Enter Mother Name " id="" name="mother" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group" style="padding: 10px;width:100%">
                                            <div class="row" style="width:100%">
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black">  Address :  </strong></label>
                                                <div class="row" style="width:100%;padding:15px">
                                                    <!-- <textarea class="form-control"  placeholder=" ঠিকানা   লিখুন " rows="5"  name="address"></textarea>-->
                                                    <fieldset class="col-md-4">
                                                        <legend class="text-center">Mahallah</legend>

                                                        <div class="card card-default">
                                                            <div class="card-body">
                                                                <input type="text" class="form-control" placeholder="Enter Mahallah Name " id="" name="area_name">
                                                            </div>
                                                        </div>

                                                    </fieldset>

                                                    <fieldset class="col-md-4">
                                                        <legend  class="text-center">Road </legend>

                                                        <div class="card card-default">
                                                            <div class="card-body">
                                                                <input type="text" class="form-control" placeholder=" Enter Road Name " id="" name="road_name">
                                                            </div>
                                                        </div>

                                                    </fieldset>

                                                    <fieldset class="col-md-4">
                                                        <legend  class="text-center"> Word No </legend>

                                                        <div class="card card-default">
                                                            <div class="card-body">
                                                                <input type="text" class="form-control" placeholder="Enter Word Number" id="" name="word_no">
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

                                            <div class="card card-default">
                                                <div class="card-body">
                                                    <input type="text" class="form-control" placeholder=" Enter Post Office  " id="" name="post_office">
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="col-md-4">
                                            <legend  class="text-center">Police Station</legend>
                                            <div class="card card-default">
                                                <div class="card-body">
                                                    <input type="text" class="form-control" placeholder=" Enter Police Station " value="Kotwali" name="thana">
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="col-md-4">
                                            <legend  class="text-center"> Upazila </legend>

                                            <div class="card card-default">
                                                <div class="card-body">
                                                    <input type="text" class="form-control" placeholder=" Upazila Name " value="Araihazar Upazila" name="upazila">
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>
                            </div>
                    </div>
                </div>
                <div class="form-group" style="padding: 10px;width:100%">
                    <div class="row">
                        <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black">  Add Councilor  :  </strong></label>
                        <div class="col-lg-12">
                            <select class="form-control" name="counselor_id" required>
                                <option value = "">Select Councilor </option>
                                @foreach($counselors as $counselor)
                                    <?php
                                    $counselor_name = explode("=",$counselor->name);


                                    ?>
                                    <option value="{{$counselor->id}}"><?php echo  $counselor_name[1];?>-{{$counselor->word_no}}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                </div>
                <div class="form-group" style="padding: 10px;width:100%;padding:15px">
                    <div class="row">
                        <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Prottoyon Text :  </strong></label>
                        <div class="col-lg-12">
                            <textarea class="form-control" placeholder="প্রত্যয়ন   লিখুন " rows="5" maxlength="500" required name="certificate_details">I know.He/She is a parmanent resident of Araihazar Municipality and is a native of Bangladesh by birth.To my knowledge, his/her character is good and he/she is not involved in any anti-social work. </textarea
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

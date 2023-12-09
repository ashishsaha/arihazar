@extends('layouts.app')

@section('content')
    <div class="content-header" style="background-color: #008b8b">
        <div class="container-fluid">
            <div class="row mb-2 pt-3">
                <div class="col-sm-12">
                    <h4 class="m-0"  style="color:white"><i class="fa fa-file"></i> &nbsp; চারিত্রিক সনদ পত্র যুক্ত করুন </h4>
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
                                <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="{{route('character.certificate.edit',$certificate->id)}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="serial_no" value="{{$certificate->serial_no}}">
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row" >
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" নাম লিখুন " id="" name="name" value="{{$certificate->name}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> পিতা / স্বামীর  নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" পিতা/স্বামীর  নাম  লিখুন " id="" name="father_husband" value="{{$certificate->father_husband}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> মাতার   নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="মাতার   নাম  লিখুন " id="" name="mother" value="{{$certificate->mother}}"  required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white">  ঠিকানা :  </strong></label>
                                            <div class="col-lg-12">
                                                <textarea class="form-control"  placeholder=" ঠিকানা   লিখুন " rows="5"  name="address">{{$certificate->address}}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> প্রত্যয়ন :  </strong></label>
                                            <div class="col-lg-12">
                                                <textarea class="form-control" placeholder="প্রত্যয়ন   লিখুন " rows="5" maxlength="500" required name="certificate_details">{{$certificate->certificate_details}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">

                                            <div class="offset-2 col-md-10 text-right">
                                                <button type="submit" class="btn btn-info pull-right">দাখিল করুন</button>
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

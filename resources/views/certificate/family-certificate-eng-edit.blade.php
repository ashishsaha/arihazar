@extends('layouts.app')

@section('content')
    <div class="content-header" style="background-color: #008b8b;border-bottom: solid 1px #629494;">
        <div class="container-fluid">
            <div class="row mb-2 pt-3">
                <div class="col-sm-12">
                    <h4 class="m-0"  style="color:white"><i class="fa fa-file"></i> &nbsp; Edit Family Certificate</h4>
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
                        <section class="card" style="padding: 20px">

                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Success !</h5>
                                    {{session('message')}}.
                                </div>
                            @endif
                            <div class="card-body">
                                <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="{{route('family.certificate.eng.edit',$certificate->id)}}">
                                    {{csrf_field()}}
                                    <label class="float-right"><strong class="float-right"><a href="javascript:void(0);" class="add_button_family"><i class="fa fa-plus-circle" style="color: white;position: relative;right: 30px"></i></a></strong></label>
                                    <div id="family">
                                        @php($i=1)

                                        @foreach($certificate_details as $details)

                                           @if($i==1)
                                               <input type="hidden" name="serial_no" value="{{$certificate->serial_no}}">
                                              <div class="my-family">
                                            <div class="form-group" style="padding: 10px">
                                                <div class="row" >
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Name :  *</strong></label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" placeholder="Enter Name " id="" name="name[]"  value="{{$details->name}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" style="padding: 10px">
                                                <div class="row">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Father's Name :</strong></label>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" placeholder="Enter Father Name " id="" name="father_name[]" value="{{$details->father_name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" style="padding: 10px">
                                                <div class="row">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Relation :  *</strong></label>
                                                    <div class="col-lg-12">
                                                        <select class="form-control" name="relation[]" required>
                                                            <option value="">Select Relation</option>

                                                            <option value="1" {{$details->relation==1?'selected':''}}>Husband</option>
                                                            <option value="2" {{$details->relation==2?'selected':''}}> Wife</option>
                                                            <option value="3" {{$details->relation==3?'selected':''}}>Son</option>
                                                            <option value="4" {{$details->relation==4?'selected':''}}>Daughter </option>
                                                            <option value="6" {{$details->relation==6?'selected':''}}>Father</option>
                                                            <option value="7" {{$details->relation==7?'selected':''}}>Mother</option>
                                                            <option value="8" {{$details->relation==8?'selected':''}}>Brother</option>
                                                            <option value="9" {{$details->relation==9?'selected':''}}>Sister</option>
                                                            <option value="10" {{$details->relation==10?'selected':''}}>Father-In-Law</option>
                                                            <option value="11" {{$details->relation==11?'selected':''}}>Mother-In-Law</option>
                                                            <option value="12" {{$details->relation==12?'selected':''}}>Cousin</option>
                                                            <option value="13" {{$details->relation==13?'selected':''}}>Relative</option>
                                                            <option value="5" {{$details->relation==5?'selected':''}}>Self </option>


                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" style="padding: 10px">
                                                <div class="row">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Date Of Birth:  *</strong></label>
                                                    <div class="col-lg-12">
                                                        <input type="date" class="form-control" name="birthday[]" value="{{$details->birthday}}" required placeholder="Date Of Birth">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group" style="padding: 10px">
                                                <div class="row">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Present Address :  </strong>

                                                    </label>
                                                    <div class="col-lg-12">
                                                        <textarea class="form-control"  placeholder="Enter Present Address " rows="5" id="address1" required name="present_address[]">{{$details->present_address}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" style="padding: 10px">
                                                <div class="row">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Parmanent Address:  </strong>

                                                    </label>
                                                    <div class="col-lg-12">
                                                        <textarea class="form-control" placeholder="Enter Parmanent Address" rows="5" id="address2" required name="parmanent_address[]" >{{$details->parmanent_address}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @else
                                                <div class="my-family"><strong class="float-right"><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle" style="color: white"></i></a></strong> <div class="form-group" style="padding: 10px">
                                                        <div class="row" >
                                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Name :  *</strong></label>
                                                            <div class="col-lg-12">
                                                                <input type="text" class="form-control" placeholder=" Enter Name " id="" name="name[]" value="{{$details->name}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="padding: 10px">
                                                        <div class="row">
                                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Father's Name : </strong></label>
                                                            <div class="col-lg-12">
                                                                <input type="text" class="form-control" placeholder=" Enter Father's Name " id="" name="father_name[]" value="{{$details->father_name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="padding: 10px">
                                                        <div class="row">
                                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Select Relatioin:  *</strong></label>
                                                            <div class="col-lg-12">
                                                                <select class="form-control" name="relation[]" required>
                                                                    <option value="1" {{$details->relation==1?'selected':''}}>Husband</option>
                                                                    <option value="2" {{$details->relation==2?'selected':''}}> Wife</option>
                                                                    <option value="3" {{$details->relation==3?'selected':''}}>Son</option>
                                                                    <option value="4" {{$details->relation==4?'selected':''}}>Daughter </option>
                                                                    <option value="6" {{$details->relation==6?'selected':''}}>Father</option>
                                                                    <option value="7" {{$details->relation==7?'selected':''}}>Mother</option>
                                                                    <option value="8" {{$details->relation==8?'selected':''}}>Brother</option>
                                                                    <option value="9" {{$details->relation==9?'selected':''}}>Sister</option>
                                                                    <option value="10" {{$details->relation==10?'selected':''}}>Father-In-Law</option>
                                                                    <option value="11" {{$details->relation==11?'selected':''}}>Mother-In-Law</option>
                                                                    <option value="12" {{$details->relation==12?'selected':''}}>Cousin</option>
                                                                    <option value="13" {{$details->relation==13?'selected':''}}>Relative</option>
                                                                    <option value="5" {{$details->relation==5?'selected':''}}>Self </option>


                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="padding: 10px">
                                                        <div class="row">
                                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Date of Birth:  *</strong></label>
                                                            <div class="col-lg-12">
                                                                <input type="date" class="form-control" name="birthday[]" value="{{$details->birthday}}" required placeholder="Enter Date of Birth ">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="padding: 10px">
                                                        <div class="row">
                                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Present Address :  </strong>

                                                            </label>
                                                            <div class="col-lg-12">
                                                                <textarea class="form-control"  placeholder="Enter Present Address " rows="5" id="address1" required name="present_address[]">{{$details->present_address}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="padding: 10px">
                                                        <div class="row">
                                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white">Parmanent Address :  </strong>

                                                            </label>
                                                            <div class="col-lg-12">
                                                                <textarea class="form-control" placeholder="Enter Parmanent Address " rows="5" id="address2" required name="parmanent_address[]">{{$details->parmanent_address}}</textarea>
                                                            </div>
                                                        </div></div>

                                            @endif
                                          @php($i+=1)
                                        @endforeach

                                    </div>
                                    </div>




                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">

                                            <div class="offset-2 col-md-10 text-right">
                                                <button type="submit" class="btn btn-info pull-right">Save </button>
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
        $(document).ready(function(){
            //Input fields increment limitation
            var addButton = $('.add_button_family'); //Add button selector
            var wrapper = $('#family'); //Input field wrapper
            var fieldHTML = '<div class="my-family"><strong class="float-right"><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle" style="color: white"></i></a></strong> <div class="form-group" style="padding: 10px">'+
                '<div class="row" >'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Name  :  *</strong></label>'+
                ' <div class="col-lg-12">'+
                '<input type="text" class="form-control" placeholder=" Enter Name " id="" name="name[]" required>'+
                ' </div>'+
                ' </div>'+
                '  </div>'+
                '   <div class="form-group" style="padding: 10px">'+
                ' <div class="row">'+
                '       <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Father\'s Name :  </strong></label>'+
                ' <div class="col-lg-12">'+
                ' <input type="text" class="form-control" placeholder="Enter  Father Name" id="" name="father_name[]">'+
                '  </div>'+
                ' </div>'+
                '  </div>'+
                '  <div class="form-group" style="padding: 10px">'+
                '  <div class="row">'+
                '  <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Relation:  *</strong></label>'+
                ' <div class="col-lg-12">'+
                '  <select class="form-control" name="relation[]" required>'+
                ' <option value="">Select Relation</option>'+
                ' <option value="1">Husband</option>'+
                '   <option value="2"> Wife</option>'+
                '   <option value="3">Son</option>'+
                '   <option value="4">Daughter </option>'+
                '   <option value="6">Father</option>'+
                '   <option value="7">Mother</option>'+
                '   <option value="8">Brother</option>'+
                '   <option value="9">Sister</option>'+
                '   <option value="10">Father-In-Law</option>'+
                '   <option value="11">Mother-In-Law</option>'+
                '   <option value="12">Cousin</option>'+
                '   <option value="13">Relative</option>'+
                '   <option value="5">SELF </option>'+

                '  </select>'+
                '   </div>'+
                '   </div>'+
                '  </div>'+
                '  <div class="form-group" style="padding: 10px">'+
                '  <div class="row">'+
                ' <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Date of Birth:  *</strong></label>'+
                '  <div class="col-lg-12">'+
                '  <input type="date" class="form-control" name="birthday[]" required placeholder="Enter Date of Birth ">'+
                '  </div>'+
                ' </div>'+
                '  </div>'+

                '   <div class="form-group" style="padding: 10px">'+
                ' <div class="row">'+
                ' <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Present Address :  </strong>'+

                '  </label>'+
                ' <div class="col-lg-12">'+
                '  <textarea class="form-control"  placeholder="Enter Present Address " rows="5" id="address1" required name="present_address[]"></textarea>'+
                ' </div>'+
                '  </div>'+
                ' </div>'+
                '   <div class="form-group" style="padding: 10px">'+
                ' <div class="row">'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> Parmanent Address :  </strong>'+

                '</label>'+
                '  <div class="col-lg-12">'+
                ' <textarea class="form-control" placeholder="Parmanent Address " rows="5" id="address2" required name="parmanent_address[]" ></textarea>'+
                '</div>'+
                '</div></div>';

            //Once add button is clicked
            $(addButton).click(function(){

                $(wrapper).append(fieldHTML); //Add field html

            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                //alert(  $(this).parent('div') );
                $(this).parents('.my-family').remove(); //Remove field html

            });
        });

    </script>
@endsection

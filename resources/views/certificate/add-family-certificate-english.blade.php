@extends('layouts.app')

@section('content')
    <div class="content-header" style="background-color: #008b8b;border-bottom: solid 1px #629494;">
        <div class="container-fluid">
            <div class="row mb-2 pt-3">
                <div class="col-sm-12">
                    <h4 class="m-0"  style="color:white"><i class="fa fa-file"></i> &nbsp; Add Warish Certificate</h4>
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
                            <div class="panel-body">
                                <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="{{route('add.family_certificate.english')}}">
                                    {{csrf_field()}}
                                    <label class="float-right"><strong class="float-right"><a href="javascript:void(0);" class="add_button_family"><i class="fa fa-plus-circle" style="color:black;position: relative;right: 30px"></i></a></strong></label>
                                    <div id="family">
                                       <div class="my-family">
                                           <div class="form-group" style="padding: 10px">
                                               <div class="row" >
                                                   <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Name :  *</strong></label>
                                                   <div class="col-lg-12">
                                                       <input type="text" class="form-control" placeholder=" Enter Name " id="" name="name[]" required>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="form-group" style="padding: 10px">
                                               <div class="row">
                                                   <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Father's Name :  *</strong></label>
                                                   <div class="col-lg-12">
                                                       <input type="text" class="form-control" placeholder="Enter Father Name " id="" name="father_name[]" required>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="form-group" style="padding: 10px">
                                               <div class="row">
                                                   <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Relation :  *</strong></label>
                                                   <div class="col-lg-12">
                                                       <select class="form-control" name="relation[]" required>
                                                           <option value="">Select Relation</option>

                                                           <option value="1">Husband</option>
                                                           <option value="2"> Wife</option>
                                                           <option value="3">Son</option>
                                                           <option value="4">Daughter</option>
                                                           <option value="5">Self</option>
                                                           <option value="6">Father</option>
                                                           <option value="7">Mother</option>
                                                           <option value="8">Brother</option>
                                                           <option value="9">Sister</option>
                                                           <option value="10">Father-In-Law</option>
                                                           <option value="11">Mother-In-Law</option>
                                                           <option value="12">Cousin</option>
                                                           <option value="13">Relative</option>


                                                       </select>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="form-group" style="padding: 10px">
                                               <div class="row">
                                                   <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Date Of Birth:  *</strong></label>
                                                   <div class="col-lg-12">
                                                       <input type="date" class="form-control" name="birthday[]" required placeholder="Date Of Birth">
                                                   </div>
                                               </div>
                                           </div>

                                           <div class="form-group" style="padding: 10px">
                                               <div class="row">
                                                   <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Present Address :  </strong>

                                                   </label>
                                                   <div class="col-lg-12">
                                                       <textarea class="form-control"  placeholder="Enter Present Address " rows="5" id="address1" required name="present_address[]"></textarea>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="form-group" style="padding: 10px">
                                               <div class="row">
                                                   <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Parmanent Address:  </strong>

                                                   </label>
                                                   <div class="col-lg-12">
                                                       <textarea class="form-control" placeholder="Enter Parmanent Address" rows="5" id="address2" required name="parmanent_address[]" ></textarea>
                                                   </div>
                                               </div>
                                           </div>
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
            var fieldHTML = '<div class="my-family"><strong class="float-right"><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle" style="color: black"></i></a></strong> <div class="form-group" style="padding: 10px">'+
               '<div class="row" >'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Name :  *</strong></label>'+
                ' <div class="col-lg-12">'+
            '<input type="text" class="form-control" placeholder=" Enter Name " id="" name="name[]" required>'+
            ' </div>'+
            ' </div>'+
            '  </div>'+
            '   <div class="form-group" style="padding: 10px">'+
            ' <div class="row">'+
            '       <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Father Name :  *</strong></label>'+
            ' <div class="col-lg-12">'+
            ' <input type="text" class="form-control" placeholder="Enter  Father Name" name="father_name[]" required>'+
            '  </div>'+
            ' </div>'+
            '  </div>'+
            '  <div class="form-group" style="padding: 10px">'+
            '  <div class="row">'+
            '  <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Relation:  *</strong></label>'+
            ' <div class="col-lg-12">'+
            '  <select class="form-control" name="relation[]" required>'+
            ' <option value="">Select Relation</option>'+
                '<option value="1">Husband</option>'+
            '<option value="2"> Wife</option>'+
            '   <option value="3">Son</option>'+
            '   <option value="4">Daughter </option>'+
            '   <option value="5">Self </option>'+

            '  </select>'+
            '   </div>'+
            '   </div>'+
            '  </div>'+
            '  <div class="form-group" style="padding: 10px">'+
            '  <div class="row">'+
            ' <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Date of Birth:  *</strong></label>'+
            '  <div class="col-lg-12">'+
            '  <input type="date" class="form-control" name="birthday[]" required placeholder="জন্ম তারিখ লিখুন ">'+
            '  </div>'+
            ' </div>'+
            '  </div>'+

            '   <div class="form-group" style="padding: 10px">'+
            ' <div class="row">'+
            ' <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> Present Address :  </strong>'+

            '  </label>'+
            ' <div class="col-lg-12">'+
            '  <textarea class="form-control"  placeholder="Enter Present Address " rows="5" id="address1" required name="present_address[]"></textarea>'+
            ' </div>'+
            '  </div>'+
            ' </div>'+
            '   <div class="form-group" style="padding: 10px">'+
            ' <div class="row">'+
            '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black">Parmanent Address :  </strong>'+

            '</label>'+
            '  <div class="col-lg-12">'+
            ' <textarea class="form-control" placeholder="Enter Parmanent Address " rows="5" id="address2" required name="parmanent_address[]" ></textarea>'+
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

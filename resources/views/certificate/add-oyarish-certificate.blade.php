@extends('layouts.app')

@section('content')
    <div class="content-header" style="background-color: #008b8b;border-bottom: solid 1px #629494;">
        <div class="container-fluid">
            <div class="row mb-2 pt-3">
                <div class="col-sm-12">
                    <h4 class="m-0"  style="color:white"><i class="fa fa-file"></i> &nbsp; ওয়ারিশ সনদ যুক্ত করুন</h4>
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
                                    <h5><i class="icon fas fa-check"></i> সফল !</h5>
                                    {{session('message')}}.
                                </div>
                            @endif
                            <div class="card-body">
                                <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="{{route('add.oyarish.certificate')}}">
                                    {{csrf_field()}}
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row" >
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" নাম লিখুন " id="" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> পিতা / স্বামীর  নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" পিতা/স্বামীর  নাম  লিখুন " id="" name="father_husband" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white"> মাতার   নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="মাতার   নাম  লিখুন " id="" name="mother" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white">   ঠিকানা :  </strong>
                                            </label>
                                            <div class="col-lg-12">
                                                <textarea class="form-control" placeholder="  ঠিকানা   লিখুন " rows="5" id="address2" name="address"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white">   কাউন্সিলর :  </strong>
                                            </label>
                                            <div class="col-lg-12">
                                                <select class="form-control" name="counselor_id">
                                                    <option value = ""> সিলেক্ট করুন </option>
                                                    @foreach($counselors as $counselor)
                                                        <?php
                                                        $counselor_name = explode("=",$counselor->name);


                                                        ?>
                                                        <option value="{{$counselor->id}}"><?php echo $counselor_name[0];?>-{{$counselor->word_no}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white">   ওয়ার্ড নং :  </strong>
                                            </label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" name="word_no" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white">   মহল্লা :  </strong>
                                            </label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" name="moholla" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <div class="col-md-4" id="test">
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white" class="fa-pull-left"> স্ত্রী :  </strong><strong class="float-right"><a href="javascript:void(0);" class="add_button"><i class="fa fa-plus-circle" style="color: white"></i></a></strong></label>

                                                <div class="row" style="padding-bottom:20px">

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" name="wife_name_array[]" placeholder="স্ত্রীর নাম লিখুন ">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-4" id="son">
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white" class="fa-pull-left"> পুত্র : <span style="margin-left: 50px;">&nbsp;&nbsp; মৃত &nbsp; <input type="checkbox" class="death"  name="son_aliv_status[]" value="0"></span> </strong><strong class="float-right"><a href="javascript:void(0);" class="add_button_son"><i class="fa fa-plus-circle" style="color: white"></i></a></strong></label>

                                                <div class="row" style="padding-bottom:20px">

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" name="son_name_array[]" placeholder="পুত্রের নাম লিখুন ">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-4" id="daughter">
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:white" class="fa-pull-left"> কন্যা : <span style="margin-left: 50px;">&nbsp;&nbsp; মৃত &nbsp; <input type="checkbox" class="death2"  name="daughter_aliv_status[]" value="0"></span> </strong><strong class="float-right"><a href="javascript:void(0);" class="add_button_daughter"><i class="fa fa-plus-circle" style="color: white"></i></a></strong></label>

                                                <div class="row" style="padding-bottom:20px">

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" name="daughter_name_array[]" placeholder="কন্যার নাম লিখুন ">
                                                    </div>
                                                </div>


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

        $(document).ready(function(){
            //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('#test'); //Input field wrapper
            var fieldHTML = '<div class="wife"><label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px"><strong  style="color:white" class="fa-pull-left"> স্ত্রী :  </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle" style="color: white"></i></a></strong></label>'+

                '<div class="row" style="padding-bottom:20px">'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="wife_name_array[]" placeholder="স্ত্রীর নাম লিখুন ">'+
                '</div>'+
                '</div>'+


                '</p>';


            //Once add button is clicked
            $(addButton).click(function(){

                $(wrapper).append(fieldHTML); //Add field html

            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                //alert(  $(this).parent('div') );
                $(this).parents('.wife').remove(); //Remove field html

            });
        });
        ///////////////////son////////////////////////
        $(document).ready(function(){
            //Input fields increment limitation
            var addButton_son = $('.add_button_son'); //Add button selector
            var wrapper_son = $('#son'); //Input field wrapper
            var fieldHTML_son = '<div class="son"><label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px"><strong  style="color:white" class="fa-pull-left"> পুত্র : <span style="margin-left: 50px;"> মৃত &nbsp; <input type="checkbox"  name="son_aliv_status[]" value="0"></span> </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button_son"><i class="fa fa-minus-circle" style="color: white"></i></a></strong></label>'+

                '<div class="row" style="padding-bottom:20px">'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="son_name_array[]" placeholder="পুত্রের নাম লিখুন ">'+
                '</div>'+
                '</div>'+
                '</p>';


            //Once add button is clicked
            $(addButton_son).click(function(){

                $(wrapper_son).append(fieldHTML_son); //Add field html

            });

            //Once remove button is clicked
            $(wrapper_son).on('click', '.remove_button_son', function(e){
                e.preventDefault();
                //alert(  $(this).parent('div') );
                $(this).parents('.son').remove(); //Remove field html

            });
        });
        ///////////////////son////////////////////////
        $(document).ready(function(){
            //Input fields increment limitation
            var addButton_daughter = $('.add_button_daughter'); //Add button selector
            var wrapper_daughter = $('#daughter'); //Input field wrapper
            var fieldHTML_daughter = '<div class="daughter"><label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px"><strong  style="color:white" class="fa-pull-left"> কন্যা : <span style="margin-left: 50px;">মৃত &nbsp; <input type="checkbox" class="death2"  name="daughter_aliv_status[]" value="0"></span> </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button_daughter"><i class="fa fa-minus-circle" style="color: white"></i></a></strong></label>'+

                '<div class="row" style="padding-bottom:20px">'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="daughter_name_array[]" placeholder="কন্যার নাম লিখুন ">'+
                '</div>'+
                '</div>'+
                '</p>';


            //Once add button is clicked
            $(addButton_daughter).click(function(){

                $(wrapper_daughter).append(fieldHTML_daughter); //Add field html

            });

            //Once remove button is clicked
            $(wrapper_daughter).on('click', '.remove_button_daughter', function(e){
                e.preventDefault();
                //alert(  $(this).parent('div') );
                $(this).parents('.daughter').remove(); //Remove field html

            });

        });
    </script>
@endsection

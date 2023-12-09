@extends('layouts.app')

@section('content')
    <div class="content-header" style="background-color: #008b8b;border-bottom: solid 1px #629494;">
        <div class="container-fluid">
            <div class="row mb-2 pt-3">
                <div class="col-sm-12">
                    <h4 class="m-0"  style="color:white"><i class="fa fa-file"></i> &nbsp; পারিবারিক সনদ যুক্ত করুন (বাংলা)</h4>
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
                                <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm"  method="post"  id="commentForm" action="{{route('family.certificate.edit',$certificate[0]->id)}}">
                                    {{csrf_field()}}

                                    <input type="hidden" name="serial_no" value="{{$certificate[0]->serial_no}}">

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row" >
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> ধরণ :  *</strong></label>
                                            <div class="col-lg-12">
                                                <select class="form-control" name="type" id="type">
                                                    <option value="1" {{ $certificate[0]->type == 1 ? 'selected' : '' }}>পুরুষ সনদ</option>
                                                    <option value="2" {{ $certificate[0]->type == 2 ? 'selected' : '' }}>মহিলা সনদ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row" >
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" নাম লিখুন " id="" name="name" required value="{{$certificate[0]->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> পিতা / স্বামীর  নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" পিতা/স্বামীর  নাম  লিখুন " id="" name="father_husband" value="{{$certificate[0]->father_husband}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মাতার   নাম :  *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="মাতার   নাম  লিখুন " id="" name="mother" value="{{$certificate[0]->mother}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black">   ঠিকানা :  </strong>
                                            </label>
                                            <div class="col-lg-12">
                                                <textarea class="form-control" placeholder="  ঠিকানা   লিখুন " rows="5" id="address2" name="address">
                                                    {{$certificate[0]->address}}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">

                                            <div class="col-md-4" id="test">
                                                @php($wife=1)

                                               @foreach($certificate_details as $details)

                                                   @if($details->status ==1)
                                                       @if($wife==1)
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black" class="fa-pull-left"> <span class="gender">স্ত্রী</span> :  </strong><strong class="float-right"><a href="javascript:void(0);" class="add_button"><i class="fa fa-plus-circle" style="color: black"></i></a></strong></label>

                                                    <div class="row" style="padding-bottom:20px">

                                                        <div class="col-lg-12">
                                                            <input type="text" class="form-control" name="wife_name_array[]" value="{{$details->name}}" placeholder="নাম লিখুন ">
                                                        </div>
                                                    </div>
                                                    <div class="row" style="padding-bottom:20px">
                                                        <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>

                                                        <div class="col-lg-12">
                                                            <input type="text" class="form-control"  name="wife_nationalid_array[]" value="{{$details->national_id}}" placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">
                                                        </div>
                                                    </div>
                                                    <div class="row" style="padding-bottom:20px">
                                                        <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>

                                                        <div class="col-lg-12">
                                                            <input type="date" class="form-control" name="wife_dateofbirth_array[]" value="{{$details->birthday}}" placeholder="জন্ম তারিখ লিখুন ">
                                                        </div>
                                                    </div>
                                                    <div class="row" style="padding-bottom:20px">
                                                        <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্তব্য :  </strong></label>

                                                        <div class="col-lg-12">
                                                            <input type="text" class="form-control" name="wife_comment_array[]"  value="{{$details->comment}}"  placeholder="মন্ত্যব লিখুন ">
                                                        </div>
                                                    </div>
                                                       @else
                                                            <div class="wife">
                                                                <label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px">
                                                                    <strong  style="color:black" class="fa-pull-left"> <span class="gender">স্ত্রী</span> :  </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle" style="color: black"></i></a></strong></label>

                                                                <div class="row" style="padding-bottom:20px">

                                                                    <div class="col-lg-12">
                                                                        <input type="text" class="form-control" name="wife_name_array[]"  value="{{$details->name}}"  placeholder="নাম লিখুন ">
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding-bottom:20px">
                                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>

                                                                    <div class="col-lg-12">
                                                                        <input type="text" class="form-control" name="wife_nationalid_array[]"  value="{{$details->national_id}}"  placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding-bottom:20px">
                                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>

                                                                    <div class="col-lg-12">
                                                                        <input type="date" class="form-control" name="wife_dateofbirth_array[]"  value="{{$details->birthday}}"  placeholder="জন্ম তারিখ লিখুন ">
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding-bottom:20px">
                                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্তব্য :  </strong></label>

                                                                    <div class="col-lg-12">
                                                                        <input type="text" class="form-control" name="wife_comment_array[]"  value="{{$details->comment}}" placeholder="মন্তব্য লিখুন ">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        @endif

                                                      <?php $wife+=1 ?>

                                                    @endif

                                                   @endforeach

                                            </div>
                                            <div class="col-md-4" id="son">



                                                @php($son=1)
                                                @foreach($certificate_details as $details)

                                                    @if($details->status ==2)
                                                        @if($son==1)
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black" class="fa-pull-left"> পুত্র :  </strong><strong class="float-right"><a href="javascript:void(0);" class="add_button_son"><i class="fa fa-plus-circle" style="color: black"></i></a></strong></label>

                                                <div class="row" style="padding-bottom:20px">

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" name="son_name_array[]" value="{{$details->name}}" placeholder="পুত্রের নাম লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" name="son_nationalid_array[]" value="{{$details->national_id}}" placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="date" class="form-control" name="son_dateofbirth_array[]" value="{{$details->birthday}}" placeholder="জন্ম তারিখ লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্তব্য :  </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" name="son_comment_array[]" value="{{$details->comment}}" placeholder="মন্ত্যব লিখুন ">
                                                    </div>
                                                </div>
                                                 @else

                                                            <div class="son"><label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px"><strong  style="color:black" class="fa-pull-left"> পুত্র :  </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button_son"><i class="fa fa-minus-circle" style="color: black"></i></a></strong></label>

                                                                <div class="row" style="padding-bottom:20px">

                                                                    <div class="col-lg-12">
                                                                        <input type="text" class="form-control" name="son_name_array[]" value="{{$details->name}}" placeholder="পুত্রের নাম লিখুন ">
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding-bottom:20px">
                                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>

                                                                    <div class="col-lg-12">
                                                                         <input type="text" class="form-control" name="son_nationalid_array[]" value="{{$details->national_id}}" placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding-bottom:20px">
                                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>

                                                                    <div class="col-lg-12">
                                                                        <input type="date" class="form-control" name="son_dateofbirth_array[]" value="{{$details->birthday}}" placeholder="জন্ম তারিখ লিখুন ">
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding-bottom:20px">
                                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্ত্যব :  </strong></label>

                                                                    <div class="col-lg-12">
                                                                        <input type="text" class="form-control" name="son_comment_array[]"  value="{{$details->comment}}" placeholder="মন্ত্যব লিখুন ">
                                                                    </div>
                                                                </div>
                                                                </div>


                                                 @endif
                                                        <?php $son+=1 ?>

                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-md-4" id="daughter">
                                                @php($daughter=1)
                                                @foreach($certificate_details as $details)

                                                    @if($details->status ==3)
                                                        @if($daughter==1)
                                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black" class="fa-pull-left"> কন্যা :  </strong><strong class="float-right"><a href="javascript:void(0);" class="add_button_daughter"><i class="fa fa-plus-circle" style="color: black"></i></a></strong></label>

                                                            <div class="row" style="padding-bottom:20px">

                                                                <div class="col-lg-12">
                                                                    <input type="text" class="form-control" name="daughter_name_array[]" value="{{$details->name}}" placeholder="কন্যার নাম লিখুন ">
                                                                </div>
                                                            </div>
                                                            <div class="row" style="padding-bottom:20px">
                                                                <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>

                                                                <div class="col-lg-12">
                                                                    <input type="text" class="form-control" name="daughter_nationalid_array[]" value="{{$details->national_id}}" placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">
                                                                </div>
                                                            </div>
                                                            <div class="row" style="padding-bottom:20px">
                                                                <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>

                                                                <div class="col-lg-12">
                                                                    <input type="date" class="form-control" name="daughter_dateofbirth_array[]" value="{{$details->birthday}}" placeholder="জন্ম তারিখ লিখুন ">
                                                                </div>
                                                            </div>
                                                            <div class="row" style="padding-bottom:20px">
                                                                <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্তব্য :  </strong></label>

                                                                <div class="col-lg-12">
                                                                    <input type="text" class="form-control" name="daughter_comment_array[]" value="{{$details->comment}}" placeholder="মন্ত্যব লিখুন ">
                                                                </div>
                                                            </div>
                                                        @else

                                                            <div class="daughter"><label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px"><strong  style="color:black" class="fa-pull-left"> কন্যা :  </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button_son"><i class="fa fa-minus-circle" style="color: black"></i></a></strong></label>

                                                                <div class="row" style="padding-bottom:20px">

                                                                    <div class="col-lg-12">
                                                                          <input type="text" class="form-control" name="daughter_name_array[]" value="{{$details->name}}" placeholder="কন্যার নাম লিখুন ">
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding-bottom:20px">
                                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>

                                                                    <div class="col-lg-12">
                                                                        <input type="text" class="form-control" name="daughter_nationalid_array[]" value="{{$details->birthday}}" placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding-bottom:20px">
                                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>

                                                                    <div class="col-lg-12">
                                                                        <input type="date" class="form-control" name="daughter_dateofbirth_array[]" value="{{$details->birthday}}" placeholder="জন্ম তারিখ লিখুন ">
                                                                    </div>
                                                                </div>
                                                                <div class="row" style="padding-bottom:20px">
                                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্ত্যব :  </strong></label>

                                                                    <div class="col-lg-12">
                                                                        <input type="text" class="form-control" name="daughter_comment_array[]"  value="{{$details->comment}}" placeholder="মন্ত্যব লিখুন ">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        @endif
                                                        <?php $daughter+=1 ?>

                                                    @endif
                                                @endforeach
                                            </div>



                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> প্রত্যয়ন :  </strong></label>
                                            <div class="col-lg-12">
                                                <textarea class="form-control" placeholder="প্রত্যয়ন   লিখুন " rows="5" maxlength="500"  name="certificate_details">{{$certificate[0]->certificate_details}}</textarea>
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
            var fieldHTML = '<div class="wife"><label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px"><strong  style="color:black" class="fa-pull-left"> <span class="gender">স্ত্রী</span> :  </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle" style="color: black"></i></a></strong></label>'+

                '<div class="row" style="padding-bottom:20px">'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="wife_name_array[]" placeholder="নাম লিখুন ">'+
                '</div>'+
                '</div>'+
                '<div class="row" style="padding-bottom:20px">'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="wife_nationalid_array[]" placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">'+
                '</div>'+
                '</div>'+
                '<div class="row" style="padding-bottom:20px">'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>'+

                '<div class="col-lg-12">'+
                '<input type="date" class="form-control" name="wife_dateofbirth_array[]" placeholder="জন্ম তারিখ লিখুন ">'+
                '</div>'+
                '</div>'+
                '<div class="row" style="padding-bottom:20px">'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্তব্য :  </strong></label>'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="wife_comment_array[]" placeholder="মন্তব্য লিখুন ">'+
                '</div>'+
                '</div></div>';


            //Once add button is clicked
            $(addButton).click(function(){

                $(wrapper).append(fieldHTML); //Add field html
                $('#type').trigger('change');

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
            var fieldHTML_son = '<div class="son"><label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px"><strong  style="color:black" class="fa-pull-left"> পুত্র :  </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button_son"><i class="fa fa-minus-circle" style="color: black"></i></a></strong></label>'+

                '<div class="row" style="padding-bottom:20px">'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="son_name_array[]" placeholder="পুত্রের নাম লিখুন ">'+
                '</div>'+
                '</div>'+
                '<div class="row" style="padding-bottom:20px">'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="son_nationalid_array[]" placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">'+
                '</div>'+
                '</div>'+
                '<div class="row" style="padding-bottom:20px">'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>'+

                '<div class="col-lg-12">'+
                '<input type="date" class="form-control" name="son_dateofbirth_array[]" placeholder="জন্ম তারিখ লিখুন ">'+
                '</div>'+
                '</div>'+
                '<div class="row" style="padding-bottom:20px">'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্ত্যব :  </strong></label>'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="son_comment_array[]"  placeholder="মন্ত্যব লিখুন ">'+
                '</div>'+
                '</div></div>';


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
            var fieldHTML_daughter = '<div class="daughter"><label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px"><strong  style="color:black" class="fa-pull-left"> কন্যা :  </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button_daughter"><i class="fa fa-minus-circle" style="color: black"></i></a></strong></label>'+

                '<div class="row" style="padding-bottom:20px">'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="daughter_name_array[]" placeholder="কন্যার নাম লিখুন ">'+
                '</div>'+
                '</div>'+
                '<div class="row" style="padding-bottom:20px">'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="daughter_nationalid_array[]" placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">'+
                '</div>'+
                '</div>'+
                '<div class="row" style="padding-bottom:20px">'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>'+

                '<div class="col-lg-12">'+
                '<input type="date" class="form-control" name="daughter_dateofbirth_array[]" placeholder="জন্ম তারিখ লিখুন ">'+
                '</div>'+
                '</div>'+
                '<div class="row" style="padding-bottom:20px">'+
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্ত্যব :  </strong></label>'+

                '<div class="col-lg-12">'+
                '<input type="text" class="form-control" name="daughter_comment_array[]" placeholder="মন্ত্যব লিখুন ">'+
                '</div>'+
                '</div></div>';


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

            $('#type').change(function () {
                console.log('dsf');
                if ($(this).val() == '1') {
                    $('.gender').html('স্ত্রী');
                } else {
                    $('.gender').html('স্বামী');
                }
            });

            $('#type').trigger('change');
        });
    </script>
@endsection

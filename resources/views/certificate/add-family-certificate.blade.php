@extends('layouts.app')
{{-- @section('title', 'ওয়ারিশ সনদ যুক্ত করুন (বাংলা)') --}}
@section('content')
    <div class="content-header" style="background-color: #008b8b;border-bottom: solid 1px #629494;">
        <div class="container-fluid">
            <div class="row mb-2 pt-3">
                <div class="col-sm-12">
                    <h4 class="m-0" style="color:white"><i class="fa fa-file"></i> &nbsp; ওয়ারিশ সনদ যুক্ত করুন (বাংলা)</h4>
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
                                    {{ session('message') }}.
                                </div>
                            @endif
                            <div class="panel-body">
                                <form role="form" class="cmxform form-horizontal tasi-form" id="MenuForm" method="post"
                                    id="commentForm" action="{{ route('add.family_certificate') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                    style="color:black"> ধরণ : *</strong></label>
                                            <div class="col-lg-12">
                                                <select class="form-control" name="type" id="type">
                                                    <option value="1">পুরুষ সনদ</option>
                                                    <option value="2">মহিলা সনদ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                    style="color:black"> নাম : *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder=" নাম লিখুন "
                                                    id="" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                    style="color:black"> পিতা / স্বামীর নাম : *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control"
                                                    placeholder=" পিতা/স্বামীর  নাম  লিখুন " id=""
                                                    name="father_husband" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                    style="color:black"> মাতার নাম : *</strong></label>
                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" placeholder="মাতার   নাম  লিখুন "
                                                    id="" name="mother" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group" style="padding: 10px">
                                        <div class="col-md-6" id="test">
                                            <div style="padding-bottom:20px">
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                        style="color:black"> জন্ম তারিখ : </strong></label>

                                                <div class="col-lg-12">
                                                    <input type="date" class="form-control" name="birth_date"
                                                        placeholder="জন্ম তারিখ লিখুন ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="test">
                                            <div style="padding-bottom:20px">
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                        style="color:black"> মৃত্যু তারিখ : </strong></label>

                                                <div class="col-lg-12">
                                                    <input type="date" class="form-control" name="death_date"
                                                        placeholder="মৃত্যু তারিখ লিখুন ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                    style="color:black"> মৃত্যু নিঃ নং :
                                                </strong></label>

                                            <div class="col-lg-12">
                                                <input type="text" class="form-control" name="certificate_id"
                                                    placeholder="মৃত্যু নিঃ নং লিখুন ">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                    style="color:black">স্থায়ী ঠিকানা : </strong>
                                            </label>
                                            <div class="col-lg-12">
                                                <textarea class="form-control" placeholder="স্থায়ী  ঠিকানা   লিখুন " rows="3" id="address2" name="address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                    style="color:black">বর্তমান ঠিকানা : </strong>
                                            </label>
                                            <div class="col-lg-12">
                                                <textarea class="form-control" placeholder="বর্তমান  ঠিকানা   লিখুন " rows="3" id="address3"
                                                    name="current_address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <div class="col-md-4" id="test">
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                        style="color:black" class="fa-pull-left"> <span
                                                            class="gender">স্ত্রী</span> : </strong><strong
                                                        class="float-right"><a href="javascript:void(0);"
                                                            class="add_button"><i class="fa fa-plus-circle"
                                                                style="color: black"></i></a></strong></label>

                                                <div class="row" style="padding-bottom:20px">

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control"
                                                            name="wife_name_array[]" placeholder="নাম লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                            style="color:black"> এন.আই.ডি/জন্ম নিঃ নং : </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control"
                                                            name="wife_nationalid_array[]"
                                                            placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                            style="color:black"> জন্ম তারিখ : </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="date" class="form-control"
                                                            name="wife_dateofbirth_array[]"
                                                            placeholder="জন্ম তারিখ লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                            style="color:black"> মন্তব্য : </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control"
                                                            name="wife_comment_array[]" placeholder="মন্ত্যব লিখুন ">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4" id="son">
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                        style="color:black" class="fa-pull-left"> পুত্র : </strong><strong
                                                        class="float-right"><a href="javascript:void(0);"
                                                            class="add_button_son"><i class="fa fa-plus-circle"
                                                                style="color: black"></i></a></strong></label>

                                                <div class="row" style="padding-bottom:20px">

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control"
                                                            name="son_name_array[]" placeholder="পুত্রের নাম লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                            style="color:black"> এন.আই.ডি/জন্ম নিঃ নং : </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control"
                                                            name="son_nationalid_array[]"
                                                            placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                            style="color:black"> জন্ম তারিখ : </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="date" class="form-control"
                                                            name="son_dateofbirth_array[]"
                                                            placeholder="জন্ম তারিখ লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                            style="color:black"> মন্তব্য : </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control"
                                                            name="son_comment_array[]" placeholder="মন্ত্যব লিখুন ">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4" id="daughter">
                                                <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                        style="color:black" class="fa-pull-left"> কন্যা : </strong><strong
                                                        class="float-right"><a href="javascript:void(0);"
                                                            class="add_button_daughter"><i class="fa fa-plus-circle"
                                                                style="color: black"></i></a></strong></label>

                                                <div class="row" style="padding-bottom:20px">

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control"
                                                            name="daughter_name_array[]" placeholder="কন্যার নাম লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                            style="color:black"> এন.আই.ডি/জন্ম নিঃ নং : </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control"
                                                            name="daughter_nationalid_array[]"
                                                            placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                            style="color:black"> জন্ম তারিখ : </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="date" class="form-control"
                                                            name="daughter_dateofbirth_array[]"
                                                            placeholder="জন্ম তারিখ লিখুন ">
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-bottom:20px">
                                                    <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                            style="color:black"> মন্তব্য : </strong></label>

                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control"
                                                            name="daughter_comment_array[]" placeholder="মন্ত্যব লিখুন ">
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group" style="padding: 10px">
                                        <div class="row">
                                            <label for="inputSuccess" class="control-label col-lg-12"><strong
                                                    style="color:black"> প্রত্যয়ন : </strong></label>
                                            <div class="col-lg-12">
                                                <textarea class="form-control" placeholder="প্রত্যয়ন   লিখুন " rows="5" maxlength="500"
                                                    name="certificate_details"></textarea>
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
        $(document).ready(function() {
            //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('#test'); //Input field wrapper
            var fieldHTML =
                '<div class="wife"><label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px"><strong  style="color:black" class="fa-pull-left"> <span class="gender">স্ত্রী</span> :  </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle" style="color: black"></i></a></strong></label>' +

                '<div class="row" style="padding-bottom:20px">' +

                '<div class="col-lg-12">' +
                '<input type="text" class="form-control" name="wife_name_array[]" placeholder="নাম লিখুন ">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="padding-bottom:20px">' +
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>' +

                '<div class="col-lg-12">' +
                '<input type="text" class="form-control" name="wife_nationalid_array[]" placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="padding-bottom:20px">' +
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>' +

                '<div class="col-lg-12">' +
                '<input type="date" class="form-control" name="wife_dateofbirth_array[]" placeholder="জন্ম তারিখ লিখুন ">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="padding-bottom:20px">' +
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্তব্য :  </strong></label>' +

                '<div class="col-lg-12">' +
                '<input type="text" class="form-control" name="wife_comment_array[]" placeholder="মন্তব্য লিখুন ">' +
                '</div>' +
                '</div></p>';


            //Once add button is clicked
            $(addButton).click(function() {

                $(wrapper).append(fieldHTML); //Add field html
                $('#type').trigger('change');

            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                //alert(  $(this).parent('div') );
                $(this).parents('.wife').remove(); //Remove field html

            });
        });
        ///////////////////son////////////////////////
        $(document).ready(function() {
            //Input fields increment limitation
            var addButton_son = $('.add_button_son'); //Add button selector
            var wrapper_son = $('#son'); //Input field wrapper
            var fieldHTML_son =
                '<div class="son"><label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px"><strong  style="color:black" class="fa-pull-left"> পুত্র :  </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button_son"><i class="fa fa-minus-circle" style="color: black"></i></a></strong></label>' +

                '<div class="row" style="padding-bottom:20px">' +

                '<div class="col-lg-12">' +
                '<input type="text" class="form-control" name="son_name_array[]" placeholder="পুত্রের নাম লিখুন ">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="padding-bottom:20px">' +
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>' +

                '<div class="col-lg-12">' +
                '<input type="text" class="form-control" name="son_nationalid_array[]" placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="padding-bottom:20px">' +
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>' +

                '<div class="col-lg-12">' +
                '<input type="date" class="form-control" name="son_dateofbirth_array[]" placeholder="জন্ম তারিখ লিখুন ">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="padding-bottom:20px">' +
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্ত্যব :  </strong></label>' +

                '<div class="col-lg-12">' +
                '<input type="text" class="form-control" name="son_comment_array[]"  placeholder="মন্ত্যব লিখুন ">' +
                '</div>' +
                '</div></p>';


            //Once add button is clicked
            $(addButton_son).click(function() {

                $(wrapper_son).append(fieldHTML_son); //Add field html

            });

            //Once remove button is clicked
            $(wrapper_son).on('click', '.remove_button_son', function(e) {
                e.preventDefault();
                //alert(  $(this).parent('div') );
                $(this).parents('.son').remove(); //Remove field html

            });
        });
        ///////////////////son////////////////////////
        $(document).ready(function() {
            //Input fields increment limitation
            var addButton_daughter = $('.add_button_daughter'); //Add button selector
            var wrapper_daughter = $('#daughter'); //Input field wrapper
            var fieldHTML_daughter =
                '<div class="daughter"><label for="inputSuccess" class="control-label col-lg-12" style="padding-bottom:10px"><strong  style="color:black" class="fa-pull-left"> কন্যা :  </strong><strong class="float-right"><a href="javascript:void(0);" class="remove_button_daughter"><i class="fa fa-minus-circle" style="color: black"></i></a></strong></label>' +

                '<div class="row" style="padding-bottom:20px">' +

                '<div class="col-lg-12">' +
                '<input type="text" class="form-control" name="daughter_name_array[]" placeholder="কন্যার নাম লিখুন ">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="padding-bottom:20px">' +
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> এন.আই.ডি/জন্ম নিঃ নং :  </strong></label>' +

                '<div class="col-lg-12">' +
                '<input type="text" class="form-control" name="daughter_nationalid_array[]" placeholder="এন.আই.ডি/জন্ম নিঃ নং লিখুন ">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="padding-bottom:20px">' +
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> জন্ম তারিখ :  </strong></label>' +

                '<div class="col-lg-12">' +
                '<input type="date" class="form-control" name="daughter_dateofbirth_array[]" placeholder="জন্ম তারিখ লিখুন ">' +
                '</div>' +
                '</div>' +
                '<div class="row" style="padding-bottom:20px">' +
                '<label for="inputSuccess" class="control-label col-lg-12"><strong  style="color:black"> মন্ত্যব :  </strong></label>' +

                '<div class="col-lg-12">' +
                '<input type="text" class="form-control" name="daughter_comment_array[]" placeholder="মন্ত্যব লিখুন ">' +
                '</div>' +
                '</div></p>';


            //Once add button is clicked
            $(addButton_daughter).click(function() {

                $(wrapper_daughter).append(fieldHTML_daughter); //Add field html

            });

            //Once remove button is clicked
            $(wrapper_daughter).on('click', '.remove_button_daughter', function(e) {
                e.preventDefault();
                //alert(  $(this).parent('div') );
                $(this).parents('.daughter').remove(); //Remove field html

            });

            $('#type').change(function() {
                console.log('dsf');
                if ($(this).val() == '1') {
                    $('.gender').html('স্ত্রী');
                } else {
                    $('.gender').html('স্বামী');
                }
            });
        });
    </script>
@endsection

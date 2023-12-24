@extends('layouts.app')

@section('style')
    <style>

        #printable{


            margin: 0px auto;
            height: 1300px;


        }

        .print_area{

            width: 100%;
            height: 1150px;
            background: url("{{asset('/')}}public/bimage.png") no-repeat;
            margin: 0px auto;
            padding: 60px;

            background-size: cover;



        }
        .print_area .header-area{

            margin: 10px auto;
            width: 100%;


        }
        .print_area .header-area .left-header{
            width: 50%;
            float: left;
            padding: 10px;
        }
        .print_area .header-area .right-header{
            width: 50%;
            float:left;
            padding: 10px 10px;
            text-align: right;
        }
        .print_area  .heading{
            width: 90%;
            margin: 10px auto;
        }

        .print_area .cover-img {
            position: absolute;
            top: 125px;
            left: 350px;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            opacity: 0.3 !important;
            width: 300px;
            height: 300px;
            background: url("{{asset('/')}}public/logo.png") no-repeat center/90%;
        }

        .print_area .print-footer
        {
            width: 100%;
            position: relative;
            height: 400px;
            top: 345px;



        }
        .print_area .print-footer .footer-content1{
            position: relative;
            width: 40%;
            /* right: 30px; */
            bottom: 20px;
            float: left;


        }
        .print_area .print-footer .footer-content2{
            position: relative;
            width: 40%;
            /*left: 30px;*/
            bottom: 20px;
            float: right;

        }




        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
            }
            body{
                font-size:18px;
            }
            .print_area{

                width: 100%;
                height: 1450px;
                background: url("{{asset('/')}}public/bimage.png") no-repeat;
                margin: 0px auto;

                background-size: 100% 100%;



            }
            .print_area .header-area .right-header{
                position: relative;
                right: 30px;
                font-size:18px;
            }
            .print_area .cover-img {
                position: absolute;
                top: 300px;
                left: 450px;
                transform: translate(-50%, -50%);
                -webkit-transform: translate(-50%, -50%);
                opacity: 0.3 !important;
                width: 700px;
                height: 700px;

                background: url("{{asset('/')}}public/logo.png") no-repeat contain;
            }


            .print_area .header-area .left-header{
                position: relative;
                left: 30px;
                font-size:18px;
            }
            .print_area #pottoyon_text{ padding-left: 40px;padding-right:40px;font-size:18px !important;color:#000 !important; text-align: justify;font-weight:bold;line-height:1.7;}
            .heading .certificate-title{margin-right: 30px;font-weight:bold;font-size:22px;padding-top:5px;padding-bottom:5px;}
            .print_area .print-footer{margin-top:150px;}
        }
    </style>

@endsection
@section('content')
    <?php
    $bn = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
    $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
    ?>

    <section class="content" style="background-color:white">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">

                    <div class="panel-body" style="background: #fff; color:#000">
                        <a href="{{route('remarriage.certificate_bn.edit',['id'=>$certificate->id])}}"><button class="btn btn-default float-right" style="margin: 20px">Edit</button></a>
                        <button class="btn btn-default float-right" style="margin: 20px" onclick="getprint('printable')">Print</button><br><br>



                        <div id="printable" class="col-md-10 offset-1">
                            <div class="print_area">
                                <div class="header-area" >
                                    <div class="left-header" style="font-size: 18px;">ক্রমিক নং :- <sapn style="border-bottom: dotted 1px black">{{ str_replace($en, $bn, $certificate->serial_no)}}</sapn> </div>

                                    <div class="right-header" style="font-size: 18px;">তারিখ :- <sapn style="border-bottom: dotted 1px black">{{ str_replace($en, $bn,  date("d-m-Y",strtotime($certificate->created_at))) }}</sapn></div>
                                </div>
                                <br style="clear: both">
                                <div class="heading text-center">
                                    <h1>আড়াইহাজার পৌরসভা,নারায়নগঞ্জ</h1>
                                    <img src="{{asset('/')}}public/logo.png" style="display:block;width: 120px;margin: 50px auto">
                                    <div class="certificate-title" style="border:solid 3px black;text-align: center;">
                                        অবিবাহিত সনদ পত্র
                                    </div>
                                </div>


                                <div class="col-md-12" id="pottoyon_text" style="line-height:1.7" >
                                    <br>

                                    এই মর্মে প্রত্যয়ন পত্র প্রদান করা যাচ্ছে যে, {{$certificate->name}}, পিতা/স্বামী : {{$certificate->father_husband}}, মাতা : {{$certificate->mother}},

                                    @if(!empty($certificate->area_name))
                                        মহল্লা:  {{$certificate->area_name}},
                                    @endif
                                    @if(!empty($certificate->road_name))
                                        সড়ক:  {{$certificate->road_name}},
                                    @endif
                                    @if(!empty($certificate->word_no))

                                        ওয়ার্ড নং: {{$certificate->word_no}},
                                    @endif

                                    @if(!empty($certificate->post_office))
                                        ডাকঘর:  {{$certificate->post_office}},
                                    @endif
                                    @if(!empty($certificate->thana))
                                        থানা:  {{$certificate->thana}},
                                    @endif
                                    @if(!empty($certificate->upazila))
                                        উপজেলা:{{$certificate->upazila}},
                                    @endif
                                    জেলা:নারায়নগঞ্জ।


                                    {{$certificate->certificate_details}}।

                                    <br><br>
                                    <span style="margin-left:30px ">আমি তাহার সার্বিক মঙ্গল কামনা করি ।</span>

                                    <span class="cover-img"></span>



                                </div>

                                <div class="print-footer">

                                    <div class="footer-content2" style="text-align: center;padding-top: 10px">
                                        <!--<img src="{{asset('/')}}public/mayor.png" width="150"><br>-->
                                        <!--<strong> অমিতাভ বোস </strong><br>-->
                                        <strong>মেয়র </strong><br>
                                        <strong>আড়াইহাজার পৌরসভা , নারায়নগঞ্জ</strong>
                                    </div>
                                </div>



                            </div>


                        </div>




                    </div>

                </section>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script>
        var APP_URL = {!! json_encode(url('/')) !!};
        function getprint(id){

            $('body').html($('#'+id).html());
            window.print();
            window.location.replace(APP_URL+"/show-all-nationality-certificate")
        }

    </script>
@endsection

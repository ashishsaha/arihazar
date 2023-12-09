@extends('layouts.app')

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

                        <a href="{{route('family.certificate.edit',['id'=>$certificate->id])}}" target="_blank"><button class="btn btn-default float-right" style="margin: 20px">Edit</button></a>
                        <button class="btn btn-default float-right" style="margin: 20px" onclick="getprint('printable')">Print</button><br><br>



                        <div id="printable">
                                <div class="row">
                                    <div class="offset-2 col-md-2">
                                        <img src="{{asset('img/logo.png')}}public/logo.png" style="margin:20px auto; display:block" width="100px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-8 text-center">
                                                <h1>আড়াইহাজার পৌরসভা</h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 text-center">
                                                <h4>স্থাপিত : ২০১২</h4>
                                                <h4>নারায়নগঞ্জ, বাংলাদেশ ।</h4>
                                            </div>
                                            <div class="col-md-4 text-right float-right">
                                                <strong>
                                                    <table style="font-size: 12px">
                                                        <tr>
                                                            <td  style="text-align: left"> ফোন : </td>
                                                            <td style="text-align: left">০১১১-১১১১১</td>
                                                        </tr>
                                                        <tr>
                                                            <td>  </td>
                                                            <td style="text-align: left">০১১১-১১১১১</td>
                                                        </tr>
                                                        <tr>
                                                            <td  style="text-align: left"> ফ্যাক্স :</td>
                                                            <td style="text-align: left">০১১১-১১১১১</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: left"> মোবাইল : </td>
                                                            <td style="text-align:left">০১১১-১১১১১</td>
                                                        </tr>
                                                    </table>
                                                </strong>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <span style="">e-mail: araihazar@yahoo.com, website: www.araihazar.com</span>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border-top: 2px solid black;">
                                <div class="row">
                                    <div class="col-md-2">ক্রমিক নং :- <sapn style="border-bottom: dotted 1px black">{{ str_replace($en, $bn, $certificate->serial_no)}}</sapn> </div>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">তারিখ :- <sapn style="border-bottom: dotted 1px black">{{ str_replace($en, $bn,  date("d-m-Y",strtotime($certificate->created_at))) }}</sapn></div>
                                </div>
                            <div class="w-100" style="height: 50px"></div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 text-center">
                                    <h4 style="border-bottom: solid 1px black;display: inline-block">-: ওয়ারিশ সনদ  পত্র   :-</h4>
                                </div>
                                <div class="col-md-4"></div>
                            </div>


                            <div class="col-md-12" style="font-size:16px;line-height: 30px;text-align: justify">
                                <br>
                                <span style="margin-right:30px"></span>
                                এই মর্মে প্রত্যয়ন পত্র প্রদান করা যাচ্ছে যে, {{$certificate->name}}, পিতা/স্বামীঃ {{$certificate->father_husband}}, মাতাঃ {{$certificate->mother}},

                                     ঠিকানাঃ {{$certificate->address}}।<?php if(!empty($wife)){ ?> আমার জানামতে তার নিম্নোক্ত {{ str_replace($en, $bn, $wife)}} {{ $certificate->type == 1 ? 'স্ত্রী' : 'স্বামী' }}, {{ str_replace($en, $bn, $son)}} পুত্র, {{ str_replace($en, $bn, $daughter)}} কন্যা  বিদ্যমান ।<?php } ?>

                                <br>
                                <br>
                                <?php if(!empty($wife)){ ?>
                                @php($sl=1)
                                <table width="100%" border="1">
                                    <thead>
                                    <tr><td style="text-align: center">ক্রমিক নং</td><td style="text-align: center">নাম</td><td style="text-align: center">এন.আই.ডি/জন্ম নিঃ নং </td><td style="text-align: center">জন্ম তারিখ </td><td style="text-align: center">সম্পর্ক</td><td style="text-align: center">মন্তব্য</td></tr>
                                    </thead>
                                    <tbody>
                                    @foreach($certificate_details as $details)
                                        <tr>
                                            <td style="text-align: center">{{ str_replace($en, $bn, str_pad($sl++, 2, '0', STR_PAD_LEFT))}}</td>
                                            <td style="text-align: center"> {{$details->name}}</td>
                                            <td style="text-align: center">{{$details->national_id}}</td>
                                            <td style="text-align: center">{{str_replace($en, $bn,$details->birthday)}}</td>
                                            <td style="text-align: center">{{$details->status==1? ( $certificate->type == 1 ? 'স্ত্রী' : 'স্বামী'):($details->status==2?'পুত্র':'কন্যা ')}}</td>
                                            <td style="text-align: center">{{is_null($details->comment)?'--':$details->comment}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table>


                                    <?php } ?>

                                <br><br>

                                <span style="margin-left:30px ">
                                    @if(!(is_null($certificate->certificate_details)))
                                    {{$certificate->certificate_details}} ।
                                        @endif


                                আমি তাহার সার্বিক মঙ্গল কামনা করি ।</span>



                            </div>

                            <div class="col-12">
                                <div class="offset-8 col-md-3 text-center">
                                    <!--<img src="{{asset('/')}}public/mayor.png" width="150"><br>-->
                                    <!--    <strong> অমিতাভ বোস </strong><br>-->
                                    <strong>মেয়র </strong><br>
                                    <strong>আড়াইহাজার পৌরসভা । </strong>
                                </div>
                            </div>



                        </div>




                    </div>
                    <div class="w-100" style="height: 100px"></div>
                </section>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script>
        var APP_URL = {!! json_encode(url('/certificate')) !!};
        function getprint(id){

            $('body').html($('#'+id).html());
            window.print();
            window.location.replace(APP_URL+"/show-all-family-certificate")
        }

    </script>
@endsection

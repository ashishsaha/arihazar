@extends('layouts.app')

@section('content')
<?php
$en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
?>

    <section class="content" style="background-color:white">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">

                    <div class="panel-body" style="background: #fff; color:#000">

                        <a href="{{route('family.certificate.eng.edit',['id'=>$certificate->id])}}" target="_blank"><button class="btn btn-default float-right" style="margin: 20px">Edit</button></a>
                        <button class="btn btn-default float-right" style="margin: 20px" onclick="getprint('printable')">Print</button><br><br>



                        <div id="printable">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{asset('/')}}public/logo.png" style="margin:20px auto; display:block" width="100px">
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-8 text-center">
                                            <h1 style="text-transform: uppercase">Araihazar Pourashava</h1>
                                            <h3>(Araihazar Municipality)</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 text-center">
                                            <h4>Estd : 1869</h4>
                                            <h4> Araihazar, Bangladesh.</h4>
                                        </div>
                                        <div class="col-md-4 text-right float-right">
                                            <strong>
                                                <table style="font-size: 12px">
                                                    <tr>
                                                        <td  style="text-align: left"> Phone : </td>
                                                        <td style="text-align: left"></td>
                                                    </tr>
                                                    <tr>
                                                        <td> Office : </td>
                                                        <td style="text-align: left">(0631) 64871,63024</td>
                                                    </tr>
                                                    <tr>
                                                        <td  style="text-align: left"> Fax :</td>
                                                        <td style="text-align: left">65300</td>
                                                    </tr>

                                                </table>
                                            </strong>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <span style="">e-mail: mayoraraihazar@yahoo.com, website: www.araihazarmunicipality.com</span>
                                    </div>
                                </div>
                            </div>
                            <hr style="border-top: 2px solid black;">
                            <div class="row">
                                <div class="col-md-2">Ref : <sapn style="border-bottom: dotted 1px black">{{ str_replace($en, $en, $certificate->serial_no)}}</sapn> </div>
                                <div class="col-md-8"></div>
                                <div class="col-md-2">Date : <sapn style="border-bottom: dotted 1px black">{{ str_replace($en, $en,  date("d-m-Y",strtotime($certificate->created_at))) }}</sapn></div>
                            </div>
                            <div class="w-100" style="height: 50px"></div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 text-center">
                                    <h4 style="font-weight:bolder;border-bottom: solid 1px black;display: inline-block">Family Certificate</h4>
                                </div>
                                <div class="col-md-4"></div>
                            </div>


                            <div class="col-md-12" style="font-size:16px;line-height: 30px;text-align: justify">
                                <br>
                                <span style="margin-right:30px"></span>
                                This is to certify that the family of <span style="font-weight: bold;text-transform: uppercase">{{$certificate->name}}</span>
                                Consists of the following members.
                                <br>
                                <br>

                                @php($sl=1)
                                <table width="100%" border="1">
                                    <thead>
                                    <tr><td style="text-align: center">SL.NO</td><td style="text-align: center">NAME</td><td style="text-align: center">RELATION</td><td style="text-align: center">DATE OF BIRTH</td><td style="text-align: center">PRESENT ADDRESS</td><td style="text-align: center">PARMANENT ADDRESS</td></tr>
                                    </thead>
                                    <tbody>
                                    @foreach($certificate_details as $details)

                                        <tr>
                                            <td style="text-align: center">{{ str_replace($en, $en, str_pad($sl++, 2, '0', STR_PAD_LEFT))}}</td>
                                            <td style="text-align: center"> {{$details->name}}
                                            @if ($details->father_name != '' && ($details->relation!=12 || $details->relation!=13))
                                                <br>
                                                @if($details->relation==1 || $details->relation==3 || $details->relation==5 || $details->relation==6 || $details->relation==8 || $details->relation==10)
                                                    <span style="text-transform:uppercase">S/O,{{$details->father_name}}</span>
                                                @elseif($details->relation==2 || $details->relation==4 || $details->relation==7 || $details->relation==9 || $details->relation==11)
                                                    <span style="text-transform: uppercase">D/O,{{$details->father_name}}</span>
                                                @endif
                                            @endif
                                            </td>
                                            <td style="text-align: center">
                                                @if($details->relation==1)
                                                    <span>HUSBAND</span>
                                                 @elseif($details->relation==2)
                                                    <span>WIFE</span>
                                                @elseif($details->relation==3)
                                                    <span>SON</span>
                                                @elseif($details->relation==4)
                                                    <span>DAUGHTER</span>
                                                @elseif($details->relation==5)
                                                    <span>SELF</span>
                                                @elseif($details->relation==6)
                                                    <span>FATHER</span>
                                                @elseif($details->relation==7)
                                                    <span>MOTHER</span>
                                                @elseif($details->relation==8)
                                                    <span>BROTHER</span>
                                                @elseif($details->relation==9)
                                                    <span>SISTER</span>
                                                @elseif($details->relation==10)
                                                    <span>FATHER-IN-LAW</span>
                                                @elseif($details->relation==11)
                                                    <span>MOTHER-IN-LAW</span>
                                                @elseif($details->relation==12)
                                                    <span>COUSIN</span>
                                                @elseif($details->relation==13)
                                                    <span>RELATIVE</span>
                                                @endif

                                            </td>
                                            <td style="text-align: center">{{date('d/m/Y',strtotime($details->birthday))}}</td>
                                            <td style="text-align: center">{{$details->present_address}}</td>
                                            <td style="text-align: center">{{$details->parmanent_address}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>




                                <br><br>
                                <span style="margin-left:30px ">They are Bangladeshi by birth & well known to me.Their moral characters are good and have a good relation with each other.</span><br>
                                <span style="margin-left:30px ">I wish them bright & happy life.</span>




                            </div>

                            <div class="col-12">
                                <div class="offset-8 col-md-2 text-center">
                                    <!--<img src="{{asset('/')}}public/mayor.png" width="150"><br>-->
                                    <!--<strong> Amitabh Bos</strong><br>-->
                                    <strong>Mayor </strong><br>
                                    <strong>Araihazar Pourasahva</strong>
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
        var APP_URL = {!! json_encode(url('/')) !!};
        function getprint(id){

            $('body').html($('#'+id).html());
            window.print();
            window.location.replace(APP_URL+"/show-all-family-certificate-english")
        }

    </script>
@endsection

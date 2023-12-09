@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color: white"><i class="icon ion-stats-bars"></i> ড্যাশবোর্ড</h1>
                </div><!-- /.col -->
               <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$certificate_total}}</h3>

                            <p>প্রত্যয়ন পত্র</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document-text"></i>
                        </div>
                        <a href="{{route('show.certificate')}}" class="small-box-footer">সকল প্রত্যয়ন পত্র  <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$fmly_certificate_bn_total}}</h3>

                            <p>পারিবারিক সনদ(বাংলা)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people"></i>
                        </div>
                        <a href="{{route('show.family_certificate')}}" class="small-box-footer">সকল পারিবারিক সনদ <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$fmly_certificate_en_total}}</h3>

                            <p>Family Certificate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people"></i>
                        </div>
                        <a href="{{route('show.family_certificate.english')}}" class="small-box-footer">All Family Certificate <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$chr_certificate_total}}</h3>

                            <p>চারিত্রিক সনদ পত্র </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ribbon-b"></i>
                        </div>
                        <a href="{{route('show.character.certificate')}}" class="small-box-footer">সকল চারিত্রিক সনদ পত্র <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-secondary">
                        <div class="inner">
                            <h3>{{$nationality_certificate_total}}</h3>

                            <p>নাগরিত্ব  সনদ পত্র </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-compose-outline"></i>
                        </div>
                        <a href="{{route('show.nationality.certificate')}}" class="small-box-footer">সকল নাগরিত্ব সনদ পত্র <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                 <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-primary">
                        <div class="inner">
                            <h3>{{$nationality_certificate_eng_total}}</h3>

                            <p>Nationality Certificate </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-compose-outline"></i>
                        </div>
                        <a href="{{route('show.nationality.certificate_eng')}}" class="small-box-footer">All Nationality Certificate<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-lightblue">
                        <div class="inner">
                            <h3>{{$unmarriage_certificateBn_total}}</h3>

                            <p>অবিবাহিত সনদ পত্র </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="{{url('show-all-unmarriage-certificate-bn/')}}" class="small-box-footer">সকল অবিবাহিত সনদ পত্র <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$unmarriage_certificateEn_total}}</h3>

                            <p>Unmarried Certificate  </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="{{url('show-all-unmarriage-certificate-en/')}}" class="small-box-footer">All Unmarried Certificate  <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$remarriageCertificateBn_total}}</h3>

                            <p>পুনর্বিবাহ সনদ পত্র  </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-heart-outline"></i>
                        </div>
                        <a href="{{url('show-all-remarriage-certificate-bn/')}}" class="small-box-footer">সকল পুনর্বিবাহ সনদ পত্র   <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3>{{$remarriageCertificateEn_total}}</h3>

                            <p>Remarriage Certificate </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-heart-outline"></i>
                        </div>
                        <a href="{{url('show-all-remarriage-certificate-en/')}}" class="small-box-footer">All Remarriage Certificate  <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-orange">
                        <div class="inner">
                            <h3>{{$incomeCertificateEn_total}}</h3>

                            <p>আয় বিষয়ক প্রত্যয়ন পত্র  </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{url('show-all-income-certificate-bn/')}}" class="small-box-footer">সকল আয় বিষয়ক প্রত্যয়ন পত্র   <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <?php
                if(Auth::guard('admin')->user()->email == 'alalkarim81@gmail.com')
                {

                ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-red">
                        <div class="inner">
                            <h3>{{$oyarishCertificate_total}}</h3>

                            <p>ওয়ারিশ সনদ  পত্র  </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{url('show-all-oyarish-certificate')}}" class="small-box-footer">সকল ওয়ারিশ সনদ  পত্র   <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } ?>


                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$landless_certificate_total}}</h3>

                            <p> ভূমিহীন সনদ পত্র</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document-text"></i>
                        </div>
                        <a href="{{route('landlessCertificate')}}" class="small-box-footer">সকল ভূমিহীন সনদ পত্র  <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endsection

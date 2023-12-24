@extends('layouts.app')

@section('title')
    ড্যাশবোর্ড
@endsection
@section('style')
    <style>
        .small-box.bg-gradient-success {
            cursor: pointer;
        }
        a.card-body.card-link-income-expense {
            font-size: 13px;
            border: 2px solid #28a745;
            transition: background-color 0.3s;
            font-weight: 600;
        }
        a.card-body.card-link-income-expense:hover {
            background: #28a745;
            color: white;
            border: 2px solid #28a745;

        }
    </style>
@endsection

@section('content')
    @if(auth()->user()->role == \App\Enumeration\Role::$ACCOUNTS)
        <div class="row">

            @foreach($upangshos as $upangsho)
                <div class="col-sm-3 col-6">
                    <div class="card card-default text-center">
                        <a class="card-body card-link-income-expense"
                           href="{{ route('multi_income_expense_add',['id'=>$upangsho->upangsho_id,'inOut'=>1]) }}">{{ $upangsho->upangsho_name }}
                            - আয়</a>
                    </div>
                    <div class="card card-default text-center">
                        <a class="card-body card-link-income-expense"
                           href="{{ route('multi_income_expense_add',['id'=>$upangsho->upangsho_id,'inOut'=>2]) }}">{{ $upangsho->upangsho_name }}
                            - বায়</a>
                    </div>
                </div>
            @endforeach

        </div>
    @elseif(auth()->user()->role == \App\Enumeration\Role::$SWEEPER_BILL)
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">

                <div onclick="changePage('{{ route('area') }}')" class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{ $totalArea }}</h3>

                        <p>এলাকা সংখ্যা</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-o"></i>
                    </div>
                    <a href="{{ route('area') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div onclick="changePage('{{ route('team') }}')" class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{ $totalTeam }}</h3>

                        <p>দল সংখ্যা</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-o"></i>
                    </div>
                    <a href="{{ route('team') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div onclick="changePage('{{ route('type') }}')" class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{ $totalType }}</h3>

                        <p>ধরন সংখ্যা</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-o"></i>
                    </div>
                    <a href="{{ route('type') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div onclick="changePage('{{ route('cleaner') }}')" class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{ $totalCleaner }}</h3>

                        <p>পরিচ্ছন্ন কর্মী সংখ্যা</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{ route('cleaner') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == \App\Enumeration\Role::$TRADE_LICENSE)
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">

                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{ enNumberToBn(totalTradeLincenseApplication()) }}</h3>

                        <p>মোট আবেদনের সংখ্যা</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="small-box bg-gradient-info">
                    <div class="inner">
                        <h3>{{ enNumberToBn(totalTradeLincenseProcessingApplication()) }}</h3>

                        <p>বিবেচনাধীন আবেদনের সংখ্যা</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="small-box bg-gradient-info">
                    <div class="inner">
                        <h3>{{ enNumberToBn(totalTradeLicenseCount()) }}</h3>

                        <p>লাইসেন্সধারীর সংখ্যা</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="small-box bg-gradient-primary">
                    <div class="inner">
                        <h3>{{ enNumberToBn(totalTradeLicenseRenewCount()) }}</h3>

                        <p>নবায়নকৃত লাইসেন্স সংখ্যা</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-o"></i>
                    </div>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == \App\Enumeration\Role::$COLLECTION)
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-gradient-success elevation-1"><span
                            style="font-size: 43px;color: #fff;font-weight: bold">৳</span></span>
                    <div class="info-box-content">
                        <span class="info-box-text">আজকের ফিস আদায়</span>
                        <span class="info-box-number">{{ en_to_bn($collections->sum('fees')) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-gradient-success elevation-1"><span
                            style="font-size: 43px;color: #fff;font-weight: bold">৳</span></span>
                    <div class="info-box-content">
                        <span class="info-box-text">আজকের ভ্যাট আদায়</span>
                        <span class="info-box-number">{{ en_to_bn($collections->sum('vat')) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-gradient-success elevation-1"><span
                            style="font-size: 43px;color: #fff;font-weight: bold">৳</span></span>
                    <div class="info-box-content">
                        <span class="info-box-text">আজকের সাব টোটাল</span>
                        <span class="info-box-number">{{ en_to_bn($collections->sum('sub_total')) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-gradient-success elevation-1"><span
                            style="font-size: 43px;color: #fff;font-weight: bold">৳</span></span>
                    <div class="info-box-content">
                        <span class="info-box-text">আজকের ডিসকাউন্ট</span>
                        <span class="info-box-number">{{ en_to_bn($collections->sum('discount')) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-gradient-success elevation-1"><span
                            style="font-size: 43px;color: #fff;font-weight: bold">৳</span></span>
                    <div class="info-box-content">
                        <span class="info-box-text">আজকের গ্রান্ড টোটাল</span>
                        <span class="info-box-number">{{ en_to_bn($collections->sum('grand_total')) }}</span>
                    </div>
                </div>
            </div>
        </div>
    @elseif(auth()->user()->role == \App\Enumeration\Role::$CERTIFICATE)
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

                        <p>ওয়ারিশ সনদ(বাংলা)</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="{{route('show.family_certificate')}}" class="small-box-footer">সকল ওয়ারিশ সনদ <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$fmly_certificate_en_total}}</h3>

                        <p>Warish Certificate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <a href="{{route('show.family_certificate.english')}}" class="small-box-footer">All Warish Certificate <i class="fas fa-arrow-circle-right"></i></a>
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
                <div class="small-box bg-gradient-purple">
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
                    <a href="{{route('show.unmarriage-bn.certificate')}}" class="small-box-footer">সকল অবিবাহিত সনদ পত্র <i class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="{{route('show.unmarriage-en.certificate')}}" class="small-box-footer">All Unmarried Certificate  <i class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="{{route('show.remarriage-bn.certificate')}}" class="small-box-footer">সকল পুনর্বিবাহ সনদ পত্র   <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-fuchsia">
                    <div class="inner">
                        <h3>{{$remarriageCertificateEn_total}}</h3>

                        <p>Remarriage Certificate </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-heart-outline"></i>
                    </div>
                    <a href="{{route('show.remarriage-en.certificate')}}" class="small-box-footer">All Remarriage Certificate  <i class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="{{route('show.income-bn.certificate')}}" class="small-box-footer">সকল আয় বিষয়ক প্রত্যয়ন পত্র   <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
{{--            <div class="col-lg-3 col-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-gradient-indigo">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>{{$oyarishCertificate_total}}</h3>--}}

{{--                        <p>ওয়ারিশ সনদ  পত্র  </p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="fa fa-users"></i>--}}
{{--                    </div>--}}
{{--                    <a href="{{route('show.oyarish.certificate')}}" class="small-box-footer">সকল ওয়ারিশ সনদ  পত্র   <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-indigo">
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
    @endif
@endsection
@section('script')
    <script>
        function changePage($link) {
            console.log($link);
            window.location.href = $link;
        }
    </script>
@endsection

@extends('layouts.app')

@section('style')
    <style>
        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
            color: #fff;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
            cursor: default;
            color: #fff !important;
            border: 1px solid white;
            background: #c3303000;
            box-shadow: none;
        }
        table.dataTable thead th, table.dataTable thead td {
            padding: 10px 18px;
            border-bottom: 1px solid #0e902c;
        }
    </style>
@endsection
@section('content')
    <section class="content" style="background-color: #008b8b">
        <div class="row">
            <div class="col-md-12" style="background-color: #008b8b">
                <div class="card" style="background-color: #008b8b">
                    <div class="card-header">
                        <h3 class="card-title" style="color:white">ওয়ারিশ সনদ সমূহের তালিকা (ইংলিশ)</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="myTable" class="table  table-bordered dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr>
                                        <th style="color:white">
                                            ক্রমিক নাম্বার  </th>
                                        <th style="color:white">নাম</th>
                                        <th style="color:white">পরিবর্তন করুন</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $bn = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
                                    $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');


                                    ?>
                                    @php($sl=1)
                                    @foreach($all_certificate as $certificate)


                                        <tr role="row" class="<?php echo $sl%2==0?'even':'odd'; ?>">
                                            <td class="sorting_1">{{ str_replace($en, $en, $certificate->serial_no)}}</td>
                                            <td>{{$certificate->name}}</td>

                                            <td>
                                                <a  href="{{route('family.certificate.eng.print',['id'=>$certificate->id])}}" target="_blank"><button class="btn btn-default  btn-sm"><i class="fa fa-print"></i></button></a>

                                                <a href="{{route('family.certificate.eng.edit',['id'=>$certificate->id])}}" target="_blank"><button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a>
                                            </td>

                                        </tr>
                                        @php($sl++)
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        </div>

    </section>

@endsection



@section('script')
    <script>

        $(function () {

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection

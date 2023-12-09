<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Favicon-->
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon" />

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('themes/backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <style>

        @page {
            size: 38mm 25mm;
        }
        .p{
            text-align: center !important;
            margin-top: 5px;
            margin-left:1px;   
            padding-bottom: 10px !important;
            font-size: 10px;
           
        }
        p{
            font-size: 8px;
            margin: 0 !important;
            padding: 0 !important;
        }
        /* .p{
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        transform: rotate(-90deg);
    } */
    </style>
</head>
<body>
<div class="p">
    <p style="margin-bottom: 2px !important;font-size:10px;text-align:center">{{ $product->name }}</p>
    {!! DNS1D::getBarcodeSVG($product->serial_no, 'C93',1.2,40); !!}
    <p style="text-align:center">{{ $product->prod->description }}</p>
    <p style="font-size:10px;text-align:center !important;display-inline:block ">Price: {{  number_format($product->selling_price,2) }} VAT included</p>

</div>

<script>



     window.print();

    window.onafterprint = function(){ window.close()};
</script>
</body>
</html>

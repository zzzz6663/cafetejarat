<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/manager/dist/css/tabler.rtl.min.css" rel="stylesheet"/>
    <link href="/manager/dist/css/tabler-flags.rtl.min.css" rel="stylesheet"/>
    <link href="/manager/dist/css/tabler-payments.rtl.min.css" rel="stylesheet"/>
    <link href="/manager/dist/css/tabler-vendors.rtl.min.css" rel="stylesheet"/>
    <link href="/manager/dist/css/demo.rtl.min.css" rel="stylesheet"/>
    <link href="/manager/dist/css/demo.rtl.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/home/css/iziModal.min.css">
    <link rel="stylesheet" href="/home/css/lightbox.min.css">
    <link rel="stylesheet" href="/home/css/persian-datepicker.css">
    {{-- <link rel="stylesheet" href="/home/css/videopopup.css"> --}}
    <link rel="stylesheet" href="/home/css/plyr.css">
    <link rel="stylesheet" href="/css/app1.css">
    <script type="text/javascript" src="/home/js/jquery-2.2.0.min.js"></script>

</head>
<body class="antialiased theme-dark"

<div class="wrapper">

    @include('admin.section.sidebar')
    <div class="page-wrapper">
        @include('admin.section.navbar')

        <div class="s">
            @yield('content')

        </div>
        @include('admin.section.footer')
    </div>
</div>
<script src="/manager/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="/manager/dist/js/tabler.min.js"></script>
<script src="/home/js/fun.js"></script>
<script type="text/javascript" src="/home/js/iziModal.min.js"></script>
<script type="text/javascript" src="/home/js/lightbox.min.js"></script>
<script type="text/javascript" src="/home/js/persian-date.min.js"></script>.
<script type="text/javascript" src="/home/js/persian-datepicker.min.js"></script>.
<script type="text/javascript" src="/home/js/plyr.js"></script>.
<script type="text/javascript" src="/home/js/tinymce/tinymce.min.js"></script>.
{{-- <script type="text/javascript" src="/home/js/videopopup.js"></script> --}}
<script type="text/javascript" src="/home/js/home1.js"></script>
{{--<script src="/home/js/libd.js"></script>--}}

<script src="{{asset('/js/app.js')}}"></script>

</body>
@include('sweet::alert')
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/home/css/style.css">
    <link rel="stylesheet" href="/home/css/plyr.css">
    {{-- <link rel="stylesheet" href="/home/css/responsive.css"> --}}
    <link rel="stylesheet" href="/home/css/iziToast.min.css">
    <link rel="stylesheet" href="/home/css/iziModal.min.css">
    <link rel="stylesheet" href="/home/css/croppie.css">
    {{-- <link rel="stylesheet" href="/home/css/persianDatepicker-default.css"> --}}
    <link rel="stylesheet" href="/css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="دهکده کارآفرینی
           ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{@csrf_token()}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="/home/js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="/home/js/persianDatepicker.min.js"></script>

</head>
<body>
{{-- @includeWhen( empty($side),'home.section.side_menu') --}}
<div id="main">
    <div class="container300">
        @includeWhen( empty($header),'home.section.header_home')
        @yield('main_body')
        @includeWhen( empty($footer),'home.section.footer_home')
    </div>
</div>
<script type="text/javascript" src="/home/js/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="/home/js/nouislider.js"></script>
<script type="text/javascript" src="/home/js/plyr.js"></script>
<script type="text/javascript" src="/home/js/lightslider.min.js"></script>
<script type="text/javascript" src="/home/js/theia-sticky-sidebar.js"></script>
<script type="text/javascript" src="/home/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.number.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drop-2.2.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drop.live-2.2.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drag-2.2.js"></script>
<script type="text/javascript" src="/home/js/jquery.event.drag.live-2.2.js"></script>
<script type="text/javascript" src="/home/js/jQuery.countdownTimer.js"></script>
<script type="text/javascript" src="/home/js/jQuery.countdownTimer-fa.js"></script>
<script type="text/javascript" src="/home/js/select2.full.min.js"></script>
<script type="text/javascript" src="/home/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/home/js/iziToast.min.js"></script>
<script type="text/javascript" src="/home/js/iziModal.min.js"></script>
<script type="text/javascript" src="/home/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/home/js/croppie.js"></script>
<script type="text/javascript" src="/home/js/template.js"></script>
<script type="text/javascript" src="/home/js/fun.js"></script>
<script type="text/javascript" src="/home/js/home.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
</body>
@include('sweet::alert')
</html>

<!DOCTYPE html>
<html>

<!-- Mirrored from kutethemes.com/demo/kuteshop/html/index3.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 02 Jul 2015 16:53:01 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta http-equiv="content-language" content="vi" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="" />
    <meta name='revisit-after' content='1 days' />
    <link href="{{$static_ft}}/images/LOGO Cty.jpg" rel="icon" />
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/lib/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/lib/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/lib/owl.carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/css/open-sans.css" />
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/css/slider.css" />
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="{{$static_ft}}/css/option3.css" />
    <script type="text/javascript" src="{{$static_ft}}/js/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->
</head>
<body class="{{$page_class}} option3">
<!-- HEADER -->
<div id="header" class="header">
    {{include file = 'templates/frontend/header.tpl'}}
    {{$menu}}
</div>
    {{$content}}
    {{include file = 'templates/frontend/footer.tpl'}}
     <a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
    <script type="text/javascript" src="{{$static_ft}}/lib/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{$static_ft}}/lib/owl.carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{$static_ft}}/lib/fancyBox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="{{$static_ft}}/js/theme-script.js"></script>
    <script type="text/javascript" src="{{$static_ft}}/lib/jquery.elevatezoom.js"></script>
{{if $controller == "home"}}
	<script type="text/javascript" src="{{$static_ft}}/lib/select2/js/select2.min.js"></script>
	<script type="text/javascript" src="{{$static_ft}}/js/jquery.actual.min.js"></script>
	<script type="text/javascript" src="{{$static_ft}}/js/wowslider.js"></script>
	<script type="text/javascript" src="{{$static_ft}}/js/script.js"></script>
{{/if}}


</body>
</html>
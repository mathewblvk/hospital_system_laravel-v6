
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Hospital system</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('css2/images/icons/favicon.ico')}}" rel="stylesheet"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css2/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css2/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css2/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css2/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css2/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css2/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css2/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css2/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css2/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css2/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body style="background-image: url('{{asset('css2/images/icons/hospital.jpg')}}');background-position: center; background-repeat: no-repeat; background-size: cover; opacity: 9;">

@yield('content')

<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('css2/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('css2/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('css2/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('css2/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('css2/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('css2/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('css2/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('css2/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('css2/css/main.css')}}js/main.js"></script>

</body>
</html>

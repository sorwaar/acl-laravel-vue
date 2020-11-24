<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="keywords" content="laravel, laravel and vue js, laravel acl, laravel vue js acl, laravel and vue js access control list">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.png')}}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/master.min.css')}}">
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/vue-multiselect/vue-multiselect.min.css') }}">

    @yield('custom_css')
    <script type="text/javascript">
        var base_url = "{{ url('/').'/' }}";
        var current_url = "{{ url()->current() }}";
        var current_user_name = "{{ Auth::user()->name }}";

        now = new Date();
        randomNum = '';
        randomNum += Math.round(Math.random() * 9);
        randomNum += Math.round(Math.random() * 9);
        randomNum += now.getTime();

        var dd = function (data) {
            console.log(data);
        }
    </script>
</head>

<body id="body_start" class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns" onLoad="active_menu()">

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>PPGTM | @yield('page_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- slick css -->
    <link href="{{ asset('assets') }}/libs/slick-slider/slick/slick.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/libs/slick-slider/slick/slick-theme.css" rel="stylesheet" type="text/css" />

    <!-- jvectormap -->
    <link href="{{ asset('assets') }}/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" />


    @stack('header_comp')
</head>

<body data-topbar="colored">

    <!-- Begin page -->
    <div id="layout-wrapper">

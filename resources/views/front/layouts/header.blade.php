<!DOCTYPE html>
<html dir="rtl" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ar-EG" lang="ar-EG">
<head>
    <meta charset="utf-8">
    <title> @yield('title')  </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- font -->
    <link rel="stylesheet" href="{{asset('assets/front/fonts/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/fonts/font-icons.css')}}">
{{--    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/front/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/images/logo/favicon.png')}}">
    @toastifyCss
    @yield('css')
</head>
<body>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>@yield('title')</title><!--begin::Primary Meta Tags-->
<meta name="title" content="AdminLTE v4 | Dashboard">
<meta name="author" content="ColorlibHQ">
<meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
<meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard">

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
<!-- Ionicons -->
{{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
<!-- Tempusdominus Bootstrap 4 -->
{{-- <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> --}}
<!-- iCheck -->
{{-- <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
<!-- JQVMap -->
{{-- <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}"> --}}
<!-- overlayScrollbars -->
{{-- <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
<!-- Daterange picker -->
{{-- <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}"> --}}
<!-- summernote -->
{{-- <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}"> --}}

<!-- PANGGIL CSS SESUAI KEBUTUHAN HALAMAN -->
@stack('css')

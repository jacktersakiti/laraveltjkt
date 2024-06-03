<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Header -->
    @include('backend.layout.head')
    <!-- End Header -->
</head>

<!-- Credit -->
@include('backend.layout.jack')
<!-- End Credit -->

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed layout-footer-fixed">
    <!-- Wrapper -->
    <div class="wrapper">
        {{-- <!-- Preloader -->
        @include('backend.layout.preloader')
        <!-- End Preloader --> --}}

        <!-- Navbar -->
        @include('backend.layout.navbar')
        <!-- End Navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            @include('backend.layout.brand')
            <!-- End Brand Logo -->

            <!-- Sidebar -->
            @include('backend.layout.sidebar')
            <!-- End Sidebar -->
        </aside>

        <!-- Content-Wrapper -->
        <div class="content-wrapper">

            @yield('content')

        </div>
        <!-- End Content-Wrapper -->

        <!-- Footer -->
        @include('backend.layout.footer')
        <!-- End Footer -->
    </body>
</html>

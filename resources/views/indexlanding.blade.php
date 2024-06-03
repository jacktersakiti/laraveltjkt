<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.landing.head')
</head>

<body>
    <!-- ======= Header ======= -->
    @include('frontend.landing.header')

    <!-- ======= Hero Section ======= -->
    @include('frontend.landing.hero')

    <main id="main">
        <!-- ======= fasilitator Section ======= -->
        @include('frontend.landing.fasilitator')

        <!-- ======= Schedule Section ======= -->
        @include('frontend.landing.schedule')

        <!-- ======= ruang Section ======= -->
        @include('frontend.landing.ruang')

        <!-- ======= courses Section ======= -->
        @include('frontend.landing.courses')

        <!-- ======= Gallery Section ======= -->
        @include('frontend.landing.gallery')

        <!-- ======= Supporters Section ======= -->
        @include('frontend.landing.supporters')

        <!-- =======  F.A.Q Section ======= -->
        @include('frontend.landing.faq')

        <!-- ======= Subscribe Section ======= -->
        @include('frontend.landing.subscribe')

        <!-- ======= Buy Ticket Section ======= -->
        @include('frontend.landing.buy')

        <!-- ======= Contact Section ======= -->
        @include('frontend.landing.contact')

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('frontend.landing.footer')
</body>

</html>

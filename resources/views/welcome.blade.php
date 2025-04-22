<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DOST Multimedia Collection</title>

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="{{ asset('theCompany/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theCompany/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('theCompany/assets/vendor/aos/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('theCompany/assets/vendor/glightbox/css/glightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('theCompany/assets/vendor/swiper/swiper-bundle.min.css') }}">

        <!-- Main CSS File -->
        <link rel="stylesheet" href="{{ asset('theCompany/assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('theCompany/assets/css/carousel.css') }}">

    </head>
    <body>
        <div id="app"></div> <!-- Vue App Mounts Here -->

        <!-- Vue App -->
        <script src="{{ mix('js/app.js') }}"></script>

        <!-- Vendor JS Files -->
        <script src="{{ asset('theCompany/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('theCompany/assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('theCompany/assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('theCompany/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('theCompany/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('theCompany/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('theCompany/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
        <script src="{{ asset('theCompany/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Main JS File -->
        <script src="{{ asset('theCompany/assets/js/main.js') }}"></script>
    </body>
</html>

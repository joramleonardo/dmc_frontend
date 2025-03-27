<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DOST Multimedia Collection</title>

        <!-- Design fonts -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">

            <!-- CSS here -->
        <!-- CSS Files -->
        <link rel="stylesheet" href="{{ asset('myCustom/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('myCustom/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('myCustom/css/ticker-style.css') }}">
        <link rel="stylesheet" href="{{ asset('myCustom/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('myCustom/css/slicknav.css') }}">
        <link rel="stylesheet" href="{{ asset('myCustom/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('myCustom/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('myCustom/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('myCustom/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('myCustom/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('myCustom/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('myCustom/css/style.css') }}">

    </head>
    <body>
        <div id="app"></div> <!-- Vue App Mounts Here -->

        <!-- Jquery, Popper, Bootstrap -->
        <script src="{{ asset('myCustom/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <!-- Vue App -->
        <script src="{{ mix('js/app.js') }}"></script>


        <!-- JS here -->
        <script src="{{ asset('myCustom/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="{{ asset('myCustom/js/popper.min.js') }}"></script>
        <script src="{{ asset('myCustom/js/bootstrap.min.js') }}"></script>

        <!-- Jquery Mobile Menu -->
        <script src="{{ asset('myCustom/js/jquery.slicknav.min.js') }}"></script>

        <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('myCustom/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('myCustom/js/slick.min.js') }}"></script>

        <!-- Date Picker -->
        <script src="{{ asset('myCustom/js/gijgo.min.js') }}"></script>

        <!-- One Page, Animated-HeadLin -->
        <script src="{{ asset('myCustom/js/wow.min.js') }}"></script>
        <script src="{{ asset('myCustom/js/animated.headline.js') }}"></script>
        <script src="{{ asset('myCustom/js/jquery.magnific-popup.js') }}"></script>

        <!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('myCustom/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('myCustom/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('myCustom/js/jquery.sticky.js') }}"></script>

        <!-- contact js -->
        <script src="{{ asset('myCustom/js/contact.js') }}"></script>
        <script src="{{ asset('myCustom/js/jquery.form.js') }}"></script>
        <script src="{{ asset('myCustom/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('myCustom/js/mail-script.js') }}"></script>
        <script src="{{ asset('myCustom/js/jquery.ajaxchimp.min.js') }}"></script>

        <!-- Jquery Plugins, main Jquery -->
        <script src="{{ asset('myCustom/js/plugins.js') }}"></script>
        <script src="{{ asset('myCustom/js/main.js') }}"></script>

    </body>
</html>

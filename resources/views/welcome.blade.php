<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DOST Multimedia Collection</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="{{ asset('edu/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('edu/assets/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('edu/assets/css/templatemo-edu-meeting.css') }}">
        <link rel="stylesheet" href="{{ asset('edu/assets/css/owl.css') }}">
        <link rel="stylesheet" href="{{ asset('edu/assets/css/lightbox.css') }}">

        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">




    </head>
    <body class="team-page">
        <div id="app"></div> <!-- Vue App Mounts Here -->

        <!-- Vue App -->
        <script src="{{ mix('js/app.js') }}"></script>

        <script src="{{ asset('edu/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('edu/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('edu/assets/js/isotope.min.js') }}"></script>
        <script src="{{ asset('edu/assets/js/owl-carousel.js') }}"></script>
        <script src="{{ asset('edu/assets/js/lightbox.js') }}"></script>
        <script src="{{ asset('edu/assets/js/tabs.js') }}"></script>
        <script src="{{ asset('edu/assets/js/video.js') }}"></script>
        <script src="{{ asset('edu/assets/js/slick-slider.js') }}"></script>
        <script src="{{ asset('edu/assets/js/custom.js') }}"></script>


        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        {{-- <script src="{{ asset('hexaShop/vendor/swiper/swiper-bundle.min.js') }}"></script> --}}


        <script>
            //according to loftblog tut
            $('.nav li:first').addClass('active');

            var showSection = function showSection(section, isAnimate) {
              var
              direction = section.replace(/#/, ''),
              reqSection = $('.section').filter('[data-section="' + direction + '"]'),
              reqSectionPos = reqSection.offset().top - 0;

              if (isAnimate) {
                $('body, html').animate({
                  scrollTop: reqSectionPos },
                800);
              } else {
                $('body, html').scrollTop(reqSectionPos);
              }

            };

            var checkSection = function checkSection() {
              $('.section').each(function () {
                var
                $this = $(this),
                topEdge = $this.offset().top - 80,
                bottomEdge = topEdge + $this.height(),
                wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                  var
                  currentId = $this.data('section'),
                  reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                  reqLink.closest('li').addClass('active').
                  siblings().removeClass('active');
                }
              });
            };

            $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
              e.preventDefault();
              showSection($(this).attr('href'), true);
            });

            $(window).scroll(function () {
              checkSection();
            });


        </script>

        {{-- <script>
            const lightbox = GLightbox({
              selector: '.glightbox'
            });
        </script>

        <script>
            AOS.init({
              duration: 800,
              once: true,
            });
        </script> --}}

    </body>
</html>

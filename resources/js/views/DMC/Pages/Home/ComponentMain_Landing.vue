<script>
    import Swiper from 'swiper';
    import 'swiper/swiper-bundle.min.css';

    import Header from '../Layouts/Header.vue';
    import FeaturedEvents from './ComponentSection_FeaturedEvents.vue';
    import UpcomingEvents from './ComponentSection_UpcomingEvents.vue';
    import PopularCategories from './ComponentSection_PopularCategories.vue';
    import PopularEvents from './ComponentSection_PopularEvents.vue';


    import RecentEvents from './ComponentSection_RecentEvents.vue';
    import RecentCoverages from './ComponentSection_RecentCoverages.vue';
    import Popular from './ComponentSection_PopularEvents.vue';
    import Footer from '../Layouts/Footer.vue';

    export default {
        components: {
            Header,
            FeaturedEvents,
            PopularCategories,
            PopularEvents,
            RecentEvents,
            UpcomingEvents,
            RecentCoverages,
            Popular,
            Footer
        },
        data() {
            return {
                slides: [
                    "https://image.tmdb.org/t/p/w500/ba7hnMx1HAze0QSJSNfsTBycS8U.jpg",
                    "https://image.tmdb.org/t/p/w500/c3XBgBLzB9Sh7k7ewXY2QpfH47L.jpg",
                    "https://image.tmdb.org/t/p/w500/b5rOkbQ0jKYvBqBf3bwJ6nXBOtx.jpg",
                    "https://image.tmdb.org/t/p/w500/aNsrgElf0fiKBSR8cWWEL6XUTte.jpg",
                    "https://image.tmdb.org/t/p/w500/dueiWzWc81UAgnbDAyH4Gjqnh4n.jpg",
                    "https://image.tmdb.org/t/p/w500/hwNRc9ZWrakGdql22srY7DqtmRQ.jpg",
                    "https://image.tmdb.org/t/p/w500/trAOGwksvgHYNpbK4GewbjYQ1pi.jpg",
                    "https://image.tmdb.org/t/p/w500/zAIippNnm6o0gYEtjapbjQSxP8G.jpg",
                    "https://image.tmdb.org/t/p/w500/tNyJxHK3m7NAAKNYITLJ5oxS0YR.jpg",
                    "https://image.tmdb.org/t/p/w500/hMh1mR2kNl8kHjpIuPh4TICTwjo.jpg",
                    "https://image.tmdb.org/t/p/w500/c4EkF5JAZ83bUqNErhuSd9xw6uJ.jpg",
                    "https://image.tmdb.org/t/p/w500/79DgItjsyH5tpA3mC2xv5gU2zlZ.jpg"
                ]
            };
        },
        mounted() {
            this.$nextTick(() => {
                new Swiper('.swiper-container', {
                    slidesPerView: 'auto',
                    spaceBetween: 20,
                    navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                    },

                    mousewheel: true,
                    grabCursor: true
                });
            });
        }
    };
</script>

<template>
    <div>
        <div class="sub-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-8">
                        <div class="left-content">
                        <p>This is an educational <em>HTML CSS</em> template by TemplateMo website.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="right-icons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <Header />

    <main>
        <section class="section main-banner" id="top" data-section="section1">
            <div>
                <iframe src="https://www.youtube.com/embed/fVmGvAxUAjI?autoplay=1&mute=1&loop=1&playlist=fVmGvAxUAjI&controls=0&showinfo=0&modestbranding=1"
                        frameborder="0"
                        allow="autoplay; encrypted-media"
                        allowfullscreen
                        id="bg-video">
                </iframe>
            </div>
            <div class="video-overlay header-text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="caption">
                            <h2>Welcome to DOST Media Collection</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                            <div class="main-button-red">
                                <div class="scroll-to-section"><a href="/events">Browse here</a></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="our-courses" id="courses">
            <div class="container">
                <FeaturedEvents />
            </div>
        </section>

        <section class="apply-now" id="apply">
            <div class="container">
                <UpcomingEvents />
            </div>
        </section>

        <section class="our-courses" id="courses">
            <PopularCategories />

        </section>

        <section class="our-facts">
            <PopularEvents />

        </section>

        <section class="contact-us" id="contact">
            <div class="footer">
            <p>
                Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved.<br />
                Design: <a href="https://templatemo.com" target="_parent">TemplateMo</a><br />
                Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
            </div>
        </section>

    </main>
  </div>
</template>


<style scoped>

    .swiper,.swiper-wrapper {
        overflow: visible !important;
        width: 100%;
        padding: 40px 0;
        position: relative;
    }

    .swiper-slide {
        position: relative;
        width: 240px !important;
        height: 135px;
        margin-right: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: transform 0.3s ease;
    }


    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }



    .swiper-slide img:active {
        cursor: grabbing;
    }

    .swiper-slide:hover {
        transform: scale(1.5);
        transition: all 300ms ease-in-out;
        transition-delay: 300ms;
        z-index: 1;
    }

    .swiper-slide:hover img {
        transition-delay: 300ms;
        box-shadow: 0 0 5px 1px rgba(0,0,0,0.5);
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #fff;
        width: 44px;
        height: 44px;
        background: rgba(0, 0, 0, 0.4);
        border-radius: 50%;
        top: 45%;
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 20px;
    }

    .swiper-scrollbar-drag {
        background: #fff;
    }

    @media (max-width: 768px) {
        .swiper-slide {
            width: 160px !important;
            height: 90px;
        }


        .swiper-button-next,
        .swiper-button-prev {
            display: none;
        }
    }

</style>

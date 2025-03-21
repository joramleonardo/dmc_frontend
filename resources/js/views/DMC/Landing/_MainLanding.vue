

<script>
    import Header from './Layout/Header.vue';
    import * as assets_service from '../../../services/assets_service.js';

    import $ from 'jquery';
    import 'slick-carousel/slick/slick.css';
    import 'slick-carousel/slick/slick-theme.css';
    import 'slick-carousel';

    export default {
        components: {
            Header
        },
        data(){
            return {
                list_featuredEvents: [],
                list_recentEvents: [],
            }
        },
        mounted(){
            this.loadAllEvents();
            this.loadRecentEvents();
        },
        methods:{

            async loadAllEvents() {
                try {
                    const response = await assets_service.getFeaturedEvents();
                    this.list_featuredEvents = response.data; // Store the 3 event results
                    console.log(this.list_featuredEvents);
                        this.$nextTick(() => {
                        this.reinitializeSlider(); // Fix slider after reload
                    });

                } catch (error) {
                    console.error("API Error:", error);
                }
            },
            async loadRecentEvents() {
                    try {
                        const response = await assets_service.getRecentEvents();
                        this.list_recentEvents = response.data; // Store the recent events
                        console.log("===");
                        console.log(this.list_recentEvents);
                    } catch (error) {
                        console.error("API Error:", error);
                    }
                },






            getClass(index) {
                const classes = ["left-side", "center-side", "right-side hidden-md-down"];
                return classes[index] || "default-class";
            },
            formatDate(dateString) {
                if (!dateString) return ""; // Handle empty values

                const options = { day: '2-digit', month: 'long', year: 'numeric' };
                return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
            },
            reinitializeSlider() {
                const slider = $(this.$refs.slider);

                // ✅ Destroy existing instance to prevent duplication
                if (slider.hasClass('slick-initialized')) {
                    slider.slick('unslick');
                }

                // ✅ Reinitialize Slick Carousel
                slider.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    dots: true,
                    arrows: false,
                    infinite: true
                });
            }
        }
    }
</script>


<template>
    <div >

        <!-- Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <img src="myCustom/img/logo/logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- Preloader Start -->
        <header>
            <!-- Header Start -->
            <div class="header-area">
                <div class="main-header ">
                    <!-- <div class="header-top black-bg d-none d-sm-block">
                        <div class="container">
                            <div class="col-xl-12">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="header-info-left">
                                        <ul>
                                            <li class="title"><span class="flaticon-energy"></span> trending-title</li>
                                            <li>Class property employ ancho red multi level mansion</li>
                                        </ul>
                                    </div>
                                    <div class="header-info-right">
                                        <ul class="header-date">
                                            <li><span class="flaticon-calendar"></span> +880166 253 232</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-mid gray-bg">
                        <div class="container">
                            <div class="row d-flex align-items-center">
                                <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                                    <div class="logo">
                                        <a href="index.html"><img src="myCustom/img/logo/logo.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-md-9">
                                    <div class="header-banner f-right ">
                                        <img src="myCustom/img/gallery/header_card.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="header-bottom header-sticky">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                                    <!-- sticky -->
                                    <div class="sticky-logo">
                                        <a href="index.html">
                                            <img src="myCustom/img/logo/logo.png" alt="">
                                        </a>
                                    </div>
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-md-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="index.html">Home</a></li>
                                                <li><a href="#">Category</a>
                                                    <ul class="submenu">
                                                        <li><a href="blog.html">Anniversaries</a></li>
                                                        <li><a href="blog_details.html">Awarding Ceremonies</a></li>
                                                        <li><a href="elements.html">Convention</a></li>
                                                        <li><a href="elements.html">Exhibits</a></li>
                                                        <li><a href="elements.html">Forums</a></li>
                                                    </ul>
                                                </li>

                                                <li><a href="about.html">Events</a></li>
                                                <li><a href="categori.html">Photos</a></li>
                                                <li><a href="latest_news.html">coverages</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <div class="header-right f-right d-none d-lg-block">
                                        <!-- Heder social -->
                                        <!-- <ul class="header-social">
                                            <li><a href="https://www.fb.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-youtube"></i></a></li>
                                        </ul> -->
                                        <!-- Search Nav -->
                                        <div class="nav-search search-switch">
                                            <i class="fa fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mobile Menu -->
                                <div class="col-12">
                                    <div class="mobile_menu d-block d-md-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
        </header>

        <main>
            <!-- Trending Area Start -->
            <div class="trending-area fix pt-25 gray-bg">
                <div class="container">
                    <div class="trending-main">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Trending Top -->
                                <div class="slider-active" ref="slider">
                                    <div v-for="(event, index) in list_featuredEvents.slice(0, 3)" :key="index" class="single-slider">
                                        <div class="trending-top mb-30">
                                            <div class="trend-top-img">
                                                <img :src="'/storage/images/' + event.photo" alt="">
                                                <div class="trend-top-cap">
                                                    <h2>
                                                        <a href="single.html" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">
                                                            {{ event.event_title }}
                                                        </a>
                                                    </h2>
                                                    <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">
                                                        <strong class="trend-category">{{ event.event_category }}</strong>
                                                        by {{ event.organizing_agency }} - {{ formatDate(event.event_date) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Trending Area End -->

            <!-- Whats New Start -->
            <section class="whats-news-area pt-50 pb-20 gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mb-5 mb-lg-0">
                            <div class="blog_left_sidebar">
                                <article class="blog_item" v-for="(event, index) in list_recentEvents.slice(0, 5)" :key="index">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" :src="'/storage/images/' + event.photo" alt="">
                                        <a href="#" class="blog_item_date">
                                            <h3>15</h3>
                                            <p>Jan</p>
                                        </a>
                                    </div>

                                    <div class="blog_details">
                                        <a class="d-inline-block" href="single-blog.html">
                                            <h2>{{ event.event_title }}</h2>
                                        </a>
                                        <!-- <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                            he earth it first without heaven in place seed it second morning saying.</p> -->
                                        <ul class="blog-info-link">
                                            <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                        </ul>
                                    </div>
                                </article>

                                <!-- <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="myCustom/img/blog/single_blog_2.png" alt="">
                                        <a href="#" class="blog_item_date">
                                            <h3>15</h3>
                                            <p>Jan</p>
                                        </a>
                                    </div>

                                    <div class="blog_details">
                                        <a class="d-inline-block" href="single-blog.html">
                                            <h2>Google inks pact for new 35-storey office</h2>
                                        </a>
                                        <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                            he earth it first without heaven in place seed it second morning saying.</p>
                                        <ul class="blog-info-link">
                                            <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                        </ul>
                                    </div>
                                </article>

                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="myCustom/img/blog/single_blog_3.png" alt="">
                                        <a href="#" class="blog_item_date">
                                            <h3>15</h3>
                                            <p>Jan</p>
                                        </a>
                                    </div>

                                    <div class="blog_details">
                                        <a class="d-inline-block" href="single-blog.html">
                                            <h2>Google inks pact for new 35-storey office</h2>
                                        </a>
                                        <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                            he earth it first without heaven in place seed it second morning saying.</p>
                                        <ul class="blog-info-link">
                                            <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                        </ul>
                                    </div>
                                </article>

                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="myCustom/img/blog/single_blog_4.png" alt="">
                                        <a href="#" class="blog_item_date">
                                            <h3>15</h3>
                                            <p>Jan</p>
                                        </a>
                                    </div>

                                    <div class="blog_details">
                                        <a class="d-inline-block" href="single-blog.html">
                                            <h2>Google inks pact for new 35-storey office</h2>
                                        </a>
                                        <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                            he earth it first without heaven in place seed it second morning saying.</p>
                                        <ul class="blog-info-link">
                                            <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                        </ul>
                                    </div>
                                </article>

                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="myCustom/img/blog/single_blog_5.png" alt="">
                                        <a href="#" class="blog_item_date">
                                            <h3>15</h3>
                                            <p>Jan</p>
                                        </a>
                                    </div>

                                    <div class="blog_details">
                                        <a class="d-inline-block" href="single-blog.html">
                                            <h2>Google inks pact for new 35-storey office</h2>
                                        </a>
                                        <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                            he earth it first without heaven in place seed it second morning saying.</p>
                                        <ul class="blog-info-link">
                                            <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                        </ul>
                                    </div>
                                </article> -->

                                <nav class="blog-pagination justify-content-center d-flex">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a href="#" class="page-link" aria-label="Previous">
                                                <i class="ti-angle-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link">1</a>
                                        </li>
                                        <li class="page-item active">
                                            <a href="#" class="page-link">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="#" class="page-link" aria-label="Next">
                                                <i class="ti-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-4">

                            <!-- Most Recent Area -->
                            <div class="most-recent-area">
                                <!-- Section Tittle -->
                                <div class="small-tittle mb-20">
                                    <h4>Upcoming Events</h4>
                                </div>
                                <!-- Details -->
                                <div class="most-recent mb-40">
                                    <div class="most-recent-img">
                                        <img src="myCustom/img/gallery/most_recent.png" alt="">
                                        <div class="most-recent-cap">
                                            <span class="bgbeg">Vogue</span>
                                            <h4><a href="latest_news.html">What to Wear: 9+ Cute Work <br>
                                                Outfits to Wear This.</a></h4>
                                            <p>Jhon  |  2 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single -->
                                <div class="most-recent-single">
                                    <div class="most-recent-images">
                                        <img src="myCustom/img/gallery/most_recent1.png" alt="">
                                    </div>
                                    <div class="most-recent-capt">
                                        <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a></h4>
                                        <p>Jhon  |  2 hours ago</p>
                                    </div>
                                </div>
                                <!-- Single -->
                                <div class="most-recent-single">
                                    <div class="most-recent-images">
                                        <img src="myCustom/img/gallery/most_recent2.png" alt="">
                                    </div>
                                    <div class="most-recent-capt">
                                        <h4><a href="latest_news.html">Most Beautiful Things to Do in Sidney with Your BF</a></h4>
                                        <p>Jhon  |  3 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Whats New End -->

        </main>
    </div>
</template>

<style scoped>
    .trend-top-cap {
        position: absolute;
        bottom: 10%;
        left: 5%;
        width: 95%;
        background: rgba(0, 0, 0, 0.6); /* Semi-transparent black overlay */
        padding: 15px;
        border-radius: 10px;
    }

    .trend-top-cap h2 a{
        font-size: 22px; /* Reduce font size */
        line-height: 1.3;
        font-weight: 600;
        color: white;
        margin-bottom: 5px;
    }

    .trend-top-cap p {
        font-size: 14px;
        color: #ccc;
        margin-bottom: 0;
        display: flex; /* Makes everything in one line */
        align-items: center;
        gap: 10px; /* Adds spacing between elements */
    }

    .trend-category {
        background: #ff4d4d; /* Red background */
        color: white;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block; /* Ensures it remains inline */
    }

    .trend-top-cap span {
        font-size: 12px; /* Category smaller */
        padding: 5px 10px;
        background: #ff4d4d;
        color: white;
        border-radius: 5px;
    }

    .trend-top-img img {
        width: 100%;
        height: 500px; /* Adjust height */
        object-fit: cover; /* Ensures full coverage */
    }

    @media (max-width: 768px) {
        .trend-top-cap h2 {
            font-size: 18px; /* Smaller title on mobile */
        }

        .trend-top-cap {
            bottom: 5%;
            padding: 10px;
        }
    }

    .blog_details, .most-recent-area {
        background-color: white;
        box-shadow: rgba(221, 221, 221, 0.3) 0px 10px 20px 0px;
        border-radius: 7px;
    }



</style>



<script>
    import * as assets_service from '../../../services/assets_service.js';

    import $ from 'jquery';
    import 'slick-carousel/slick/slick.css';
    import 'slick-carousel/slick/slick-theme.css';
    import 'slick-carousel';

    export default {
        data(){
            return {
                list_featuredEvents: [],
            }
        },
        mounted(){
            this.loadAllEvents();
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
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-active" ref="slider">
                            <div v-for="(event, index) in list_featuredEvents.slice(0, 3)" :key="index" class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img :src="'/storage/images/' + event.photo" alt="">
                                        <div class="trend-top-cap">
                                            <h2>
                                                <!-- <a href="single.html" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms"> -->
                                                <router-link v-bind:to="{name : 'single-event', params: { id: event.album_id}}" >
                                                    {{ event.event_title }}
                                                </router-link>
                                                <!-- </a> -->
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




</style>

<script>
    import { getPopularCategoriesWithEvents } from '../../../../services/assets_service';
    import Swiper from 'swiper';
    import 'swiper/swiper-bundle.min.css';


    export default {
        data() {
            return {
                popularCategories: [],
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
        async mounted() {
            await this.loadPopularCategories();

            // Init Swiper after DOM updates
            this.$nextTick(() => {
                document.querySelectorAll('.swiper-container').forEach(container => {
                    new Swiper(container, {
                        slidesPerView: 'auto',
                        spaceBetween: 20,
                        navigation: {
                            nextEl: container.querySelector('.swiper-button-next'),
                            prevEl: container.querySelector('.swiper-button-prev')
                        },
                        mousewheel: true,
                        grabCursor: true
                    });
                });
            });
        },
        methods: {
            async loadPopularCategories() {
                try {
                    const response = await getPopularCategoriesWithEvents();
                    this.popularCategories = response.data;
                    console.log("Popular Categories:", this.popularCategories);
                } catch (error) {
                    console.error("Failed to load popular categories", error);
                }
            },
            formatDate(dateStr) {
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return new Date(dateStr).toLocaleDateString(undefined, options);
            }
        }
    };
</script>


<template>
    <div class="container">
        <div class="col-lg-12">
            <div class="section-heading">
                <h2>Popular Categories</h2>
            </div>
        </div>
        <div class="row" v-for="(category, i) in popularCategories" :key="i">
            <div class="col-lg-12">
                <div class="section-heading-categ">
                    {{ category.category }}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- <div class="swiper-slide" v-for="(event, j) in category.events" :key="event.album_id">
                            <img
                                :src="event.thumbnail ? `/storage/images/${event.thumbnail}` : 'edu/assets/images/placeholder.png'"
                                :alt="event.event_title"
                                class="img-fluid"
                            />

                        </div> -->
                        <div class="swiper-slide" v-for="(event, j) in category.events" :key="event.album_id">
                            <div class="event-card">
                                <img :src="event.thumbnail ? `/storage/images/${event.thumbnail}` : 'edu/assets/images/placeholder.png'"
                                    :alt="event.event_title"
                                    class="img-fluid" />
                                <div class="hover-details">
                                    <h5>{{ event.event_title }}</h5>
                                    <router-link :to="`/single-event/${event.album_id}`" class="view-icon" aria-label="View Event">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 24 24">
                                            <path d="M10 17l5-5-5-5v10z"/>
                                            <path d="M0 24V0h24v24H0z" fill="none"/>
                                        </svg>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </div>
    </div>
</template>



<style scoped>
    .section-heading-categ{
        color: #ffffff
    }
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


    .event-card {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        border-radius: 10px;
    }

    .event-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease, filter 0.3s ease;
        border-radius: 10px;
    }

    .hover-details {
        position: absolute;
        bottom: -100px;
        left: 0;
        width: 100%;
        padding: 10px;
        background: rgba(0, 0, 0, 0.85);
        color: white;
        text-align: left;
        transition: bottom 0.3s ease;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .event-card:hover img {
        transform: scale(1.1);
        filter: brightness(0.6);
    }

    .event-card:hover .hover-details {
        bottom: 0;
    }

    .hover-details h5 {
        font-size: 10px;
        margin: 0;
        font-weight: 500;
        transition: font-size 0.3s ease;
    }

    .event-card:hover .hover-details h5 {
        font-size: 10px;
    }

    .view-icon {
        font-size: 18px;
        color: white;
        text-decoration: none;
        background: #2563eb;
        padding: 6px 10px;
        border-radius: 50%;
        display: inline-block;
        transition: background 0.3s ease;
    }

    .view-icon:hover {
        background: #1d4ed8;
    }


</style>

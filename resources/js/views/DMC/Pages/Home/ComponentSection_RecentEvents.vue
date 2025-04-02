

<script>
    import * as assets_service from '../../../../services/assets_service.js';
    import RecentCoverages from './ComponentSection_RecentCoverages.vue';

    import 'slick-carousel/slick/slick.css';
    import 'slick-carousel/slick/slick-theme.css';
    import 'slick-carousel';

    export default {
        components: {
            RecentCoverages
        },
        data(){
            return {
                list_recentEvents: [],
            }
        },
        mounted(){
            this.loadRecentEvents();
        },
        methods:{
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
    <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="whats-news-wrapper">
            <!-- Heading & Nav Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="small-tittle mb-30">
                        <h4>What's New?</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <!-- Left Details Caption (First Recent Event) -->
                                <div class="col-xl-6 col-lg-12" v-if="list_recentEvents.length > 0">
                                    <div class="whats-news-single mb-40">
                                        <div class="whates-img">
                                            <img :src="'/storage/images/' + list_recentEvents[0].photo" alt="">
                                        </div>
                                        <div class="whates-caption">
                                            <h4>
                                                <!-- <a href="/single-event"> -->
                                                <router-link v-bind:to="{name : 'single-event', params: { id: list_recentEvents[0].album_id}}" >
                                                    {{ list_recentEvents[0].event_title }}
                                                </router-link>
                                                <!-- </a> -->
                                            </h4>
                                            <span>by {{ list_recentEvents[0].organizing_agency }} - {{ formatDate(list_recentEvents[0].event_date) }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Details Caption (Remaining 4 Recent Events) -->
                                <div class="col-xl-6 col-lg-12">
                                    <div class="row">
                                        <div
                                            class="col-xl-12 col-lg-6 col-md-6 col-sm-10"
                                            v-for="(event, index) in list_recentEvents.slice(1)"
                                            :key="index">
                                                <div class="whats-right-single mb-20">
                                                    <div class="whats-right-img">
                                                        <img :src="'/storage/images/' + event.photo" alt="">
                                                    </div>
                                                    <div class="whats-right-cap">
                                                        <span class="colorb">{{ event.event_category }}</span>
                                                        <h4>
                                                            <router-link v-bind:to="{name : 'single-event', params: { id: event.album_id}}" >
                                                                {{ event.event_title }}
                                                            </router-link>
                                                        </h4>
                                                        <p>{{ formatDate(event.event_date) }}</p>
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

        </div>

        <div class="weekly3-news-area pt-20 pb-130">
            <div class="container">
                <div class="weekly3-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <RecentCoverages />
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</template>


<style scoped>



    .blog_details, .most-recent-area {
        background-color: white;
        box-shadow: rgba(221, 221, 221, 0.3) 0px 10px 20px 0px;
        border-radius: 7px;
    }


    .whats-right-single {
        display: flex;
        gap: 10px;
        align-items: flex-start;
    }

    .whats-right-img img {
        width: 80px;         /* Smaller width */
        height: 80px;        /* Maintain aspect ratio */
        object-fit: cover;   /* Ensures no stretch */
        border-radius: 5px;
        flex-shrink: 0;
    }

    .whats-right-cap {
        flex: 1;
    }

    .whats-right-cap span {
        font-size: 12px;
        color: #007bff;
        font-weight: 600;
        text-transform: uppercase;
    }

    .whats-right-cap h4 {
        font-size: 14px;
        margin: 3px 0;
        line-height: 1.3;
    }

    .whats-right-cap p {
        font-size: 12px;
        color: #888;
        margin: 0;
    }



</style>

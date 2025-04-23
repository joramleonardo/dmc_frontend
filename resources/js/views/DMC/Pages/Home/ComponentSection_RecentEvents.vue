

<script>
    import * as assets_service from '../../../../services/assets_service.js';
    import RecentCoverages from './ComponentSection_RecentCoverages.vue';



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
            initMenCarousel() {
                // Destroy first if already initialized
                const $owl = $('.owl-men-item');
                if ($owl.hasClass('owl-loaded')) {
                    $owl.trigger('destroy.owl.carousel');
                    $owl.html($owl.find('.owl-stage-outer').html()); // clean previous wrapper
                }

                $owl.owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: true,

                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        992: {
                            items: 3
                        },
                        1200: {
                            items: 5 // ✅ Show 5 items on large screens
                        }
                    }
                });
            },
            async loadRecentEvents() {
                try {
                    const response = await assets_service.getRecentEvents();
                    this.list_recentEvents = response.data;

                    // Wait until Vue finishes rendering the v-for loop
                    this.$nextTick(() => {
                    this.initMenCarousel();
                    });
                } catch (error) {
                    console.error("API Error:", error);
                }
            },

            formatDate(dateString) {
                if (!dateString) return ""; // Handle empty values

                const options = { day: '2-digit', month: 'long', year: 'numeric' };
                return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
            },
        }
    }
</script>

<template>

        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        <div class="item" v-for="(event, index) in list_recentEvents" :key="index">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                {{ event.event_title }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <img :src="'/storage/images/' + event.photo" alt="">
                            </div>
                            <!-- <div class="down-content">
                                <h4>Classic Spring</h4>
                                <span>$120.00</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row gy-4">

            <div class="col-lg-2 col-md-6 d-flex align-items-stretch"
                data-aos="fade-up" data-aos-delay="100" v-for="(event, index) in list_recentEvents" :key="index">
                <div class="team-member">
                    <div class="member-img">
                        <img :src="'/storage/images/' + event.photo" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">

                    </div>
                </div>
            </div>
        </div> -->

</template>

<style scoped>
    .thumb {
    width: 100%;
    height: 250px; /* Set your desired height */
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* maintain aspect ratio, fill container */
    display: block;
    }


</style>

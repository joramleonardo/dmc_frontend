

<script>
    import * as assets_service from '../../../../services/assets_service.js';



    export default {
        data(){
            return {
                list_featuredEvents: [],
            }
        },
        mounted(){
            this.loadAllEvents();
            //
        },
        methods:{


            // async loadAllEvents() {
            //     try {
            //         const response = await assets_service.getFeaturedEvents();
            //         this.list_featuredEvents = response.data;


            //     } catch (error) {
            //         console.error("API Error:", error);
            //     }
            // },
            async loadAllEvents() {
    try {
        const response = await assets_service.getFeaturedEvents();
        this.list_featuredEvents = response.data;

        this.$nextTick(() => {
            $('.owl-service-item').owlCarousel({
                loop: true,
                margin: 30,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        });

    } catch (error) {
        console.error("API Error:", error);
    }
},
            formatDate(dateString) {
                if (!dateString) return ""; // Handle empty values

                const options = { day: '2-digit', month: 'long', year: 'numeric' };
                return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
            }
        }
    }
</script>

<template>



    <div class="row">
        <div class="col-lg-12">
            <div class="owl-service-item owl-carousel">

                <div  class="item" >
                    <div class="icon">
                        <img src="edu/assets/images/service-icon-01.png" alt="">
                    </div>
                    <div class="down-content">
                        <h4>Best Education</h4>
                        <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
                    </div>
                </div>

                <div class="item">
                <div class="icon">
                    <img src="edu/assets/images/service-icon-02.png" alt="">
                </div>
                <div class="down-content">
                    <h4>Best Teachers</h4>
                    <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
                </div>
                </div>

                <div class="item">
                <div class="icon">
                    <img src="edu/assets/images/service-icon-03.png" alt="">
                </div>
                <div class="down-content">
                    <h4>Best Students</h4>
                    <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
                </div>
                </div>

                <div class="item">
                <div class="icon">
                    <img src="edu/assets/images/service-icon-02.png" alt="">
                </div>
                <div class="down-content">
                    <h4>Online Meeting</h4>
                    <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
                </div>
                </div>

                <div class="item">
                <div class="icon">
                    <img src="edu/assets/images/service-icon-03.png" alt="">
                </div>
                <div class="down-content">
                    <h4>Best Networking</h4>
                    <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
                </div>
                </div>

            </div>
        </div>
    </div>

    <!-- <div class="main-banner" id="top" style="background-color: #000000;">
        <div class="container-fluid container-featured">
            <div class="row">
                <div class="col-lg-6" v-if="list_featuredEvents.length > 0">
                    <div class="left-content">
                        <div class="thumb left-thumb">
                            <div class="right-inner-content inner-content">
                                <h4>{{ list_featuredEvents[0].event_title }}</h4>
                                <div class="main-border-button">
                                    <a href="#">Browse</a>
                                </div>
                            </div>
                            <img :src="'/storage/images/' + list_featuredEvents[0].photo" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6" v-for="(event, index) in list_featuredEvents.slice(1)" :key="index">
                                <div class="right-first-image">
                                    <div class="thumb right-thumb">
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Women</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="#">Browse</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img :src="'/storage/images/' + event.photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->



</template>


<style scoped>


</style>

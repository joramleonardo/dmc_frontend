
<script>
    import * as assets_service from '../../../../services/assets_service.js';


    export default {
        data(){
            return {
                popularEvents: []
            }
        },
        mounted(){
            this.loadPopularEvents();
        },
        methods:{
            formatDate(dateString) {
                if (!dateString) return ""; // Handle empty values

                const options = { day: '2-digit', month: 'long', year: 'numeric' };
                return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
            },
            async loadPopularEvents() {
                try {
                    const response = await assets_service.getPopularEvents_Footer();
                    this.popularEvents = response.data;
                    console.log("FOOTER -- popular events");
                    console.log(this.popularEvents);


                } catch (error) {
                    console.error("API Error:", error);
                }
            },
        }
    }
</script>

<template>
    <footer>
        <!-- Footer Start-->
        <div class="footer-main footer-bg">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <!-- <div class="footer-logo">
                                        <a href="index.html"><img src="myCustom/img/logo/logo2_footer.png" alt=""></a>
                                    </div> -->
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <h4>About Us</h4>
                                            <p class="info1">Department of Science and Technology - Science and Information Technology Institute (DOST-STII)</p>
                                            <p class="info2">Gen. Santos Ave., Upper Bicutan, Taguig City, Metro Manila, 1631, Philippines</p>
                                            <!-- <p class="info2">Phone: +95 (0) 123 456 789 Cell: +95 (0) 123 456 789</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Popular Events</h4>
                                </div>
                                <!-- Popular post -->
                                <!-- <div class="whats-right-single mb-20">
                                    <div class="whats-right-img">
                                        <img src="myCustom/img/gallery/footer_post1.png" alt="">
                                    </div>
                                    <div class="whats-right-cap">
                                        <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a></h4>
                                        <p>Jhon  |  2 hours ago</p>
                                    </div>
                                </div> -->
                                <!-- <div class="media post_item" v-for="(popular, index) in popularEvents" :key="index">
                                    <img :src="'/storage/images/' + popular.first_photo" alt="post">
                                    <div class="media-body">
                                        <router-link v-bind:to="{name : 'single-event', params: { id: popular.album_id}}" >
                                            <h4>{{ popular.event_title }}</h4>
                                        </router-link>
                                        <p>{{ formatDate(popular.event_date) }}</p>
                                    </div>
                                </div> -->
                                <div class="whats-right-single mb-20" v-for="(popular, index) in popularEvents" :key="index">
                                    <div class="whats-right-img">
                                        <img :src="'/storage/images/' + popular.first_photo" alt="post">
                                    </div>
                                    <div class="whats-right-cap">
                                        <router-link v-bind:to="{name : 'single-event', params: { id: popular.album_id}}" >
                                            <h4>{{ popular.event_title }}</h4>
                                        </router-link>
                                        <p>{{ formatDate(popular.event_date) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="banner">
                                    <img src="myCustom/img/gallery/body_card4.png" alt="">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- footer-bottom aera -->
            <div class="footer-bottom-area footer-bg">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
</template>


<style lang="css" scoped>

    .whats-right-img img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 15px;
    }

    .whats-right-cap h4 {
        font-size: 13px;
        font-weight: 700;
        color: #ffffff;
    }


</style>

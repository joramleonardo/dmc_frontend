<script>
    import * as assets_service from '../../../../services/assets_service.js';

    import Header from '../Layouts/Header.vue';
    import Footer from '../Layouts/Footer.vue';



    export default {
        components: {
            Header,
            Footer
        },
        data(){
            return {
                upcoming_id: this.$route.params.id,
                event: null,
            }
        },
        computed: {
        },
        watch: {
            '$route.params.id': {
                immediate: true,
                handler(newId) {
                    this.upcoming_id = newId;
                    this.loadUpcomingEventDetails();
                }
            }
        },
        methods:{
            async loadUpcomingEventDetails() {
                try {
                    const response = await assets_service.getUpcomingEventById(this.upcoming_id);
                    this.event = response.data;
                } catch (error) {
                    console.error("API Error:", error);
                }
            },
            formatDate(dateStr) {
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return new Date(dateStr).toLocaleDateString(undefined, options);
            }
        }
    }
</script>

<template>

    <div >
        <header>
            <Header />
        </header>

        <main v-if="event">

            <section class="whats-news-area pt-50 pb-20 gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                        <div class="whats-news-wrapper">
                            <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-xl-12">
                                    <div class="section-tittle mb-30">
                                        <h3>{{ event.event_title }}</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab content -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Nav Card -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- card one -->
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="row">
                                                <!-- Left Details Caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="whats-news-single mb-40 mb-40">
                                                        <div class="whates-img">
                                                            <img :src="'/storage/images/' + event.event_banner" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Right single caption -->
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="whats-news-single mb-40 mb-40">
                                                        <div class="whates-caption">
                                                            <h4><a href="latest_news.html">{{ event.event_title }}</a></h4>
                                                            <span>by <strong>{{ event.event_organizing_agency }}</strong>   -
                                                                on <strong>{{ event.event_date }}</strong>  </span>
                                                            <p>{{ event.event_description }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- End Nav Card -->
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Most Recent Area -->
                            <div class="most-recent-area">
                                <!-- Section Tittle -->
                                <div class="small-tittle mb-20">
                                    <h4>Recent Events</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <Footer />


    </div>
</template>

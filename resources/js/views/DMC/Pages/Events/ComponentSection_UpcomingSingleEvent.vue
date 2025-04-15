<script>
    import * as assets_service from '../../../../services/assets_service.js';

    import Header from '../Layouts/Header.vue';
    import UpcomingEvents from '../Home/ComponentSection_UpcomingEvents.vue';
    import RelatedEvents from './ComponentSection_RelatedEvents.vue';
    import TagClouds from './ComponentSection_Tags.vue';



    export default {
        components: {
            Header,
            UpcomingEvents,
            RelatedEvents,
            TagClouds
        },
        data(){
            return {
            }
        },
        computed: {
        },
        watch: {
        },
        methods:{

        }
    }
</script>

<template>

    <div >
        <header>
            <Header />
        </header>

        <main>
            <div class="about-area2 gray-bg pt-60 pb-60">
                <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <!-- Trending Tittle -->
                                <div class="about-right mb-90">
                                    <div class="about-img">
                                        <img src="myCustom/img/trending/trending_top.jpg" alt="">
                                    </div>
                                    <div class="heading-news mb-30 pt-30">
                                        <h3>TITLE</h3>
                                    </div>
                                    <div class="about-prea">
                                        <p class="about-pera1 mb-25">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sit amet odio et mauris feugiat varius.
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </main>



    </div>
</template>

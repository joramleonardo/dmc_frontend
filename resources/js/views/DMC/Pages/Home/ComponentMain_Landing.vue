

<script>
    import Header from './ComponentSection_Header.vue';
    import FeaturedEvents from './ComponentSection_FeaturedEvents.vue';
    import RecentEvents from './ComponentSection_RecentEvents.vue';
    import UpcomingEvents from './ComponentSection_UpcomingEvents.vue';
    import RecentCoverages from './ComponentSection_RecentCoverages.vue';

    export default {
        components: {
            Header,
            FeaturedEvents,
            RecentEvents,
            UpcomingEvents,
            RecentCoverages
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
                        <img src="myCustom/img/logo/stii.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- Preloader Start -->
        <header>
            <!-- Header Start -->
            <Header />
            <!-- Header End -->
        </header>

        <main>
            <!-- Trending Area Start -->
            <FeaturedEvents />
            <!-- Trending Area End -->


            <!-- Whats New Start -->
            <section class="whats-news-area pt-50 pb-20 gray-bg">
                <div class="container">
                    <div class="row">
                        <RecentEvents />
                        <UpcomingEvents />

                    </div>
                </div>
            </section>
            <!-- Whats New End -->

            <div class="weekly3-news-area pt-80 pb-130">
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

        </main>
    </div>
</template>

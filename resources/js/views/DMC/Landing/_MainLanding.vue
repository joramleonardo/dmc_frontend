

<script>
    import Header from './SectionHeader.vue';
    import FeaturedEvents from './SectionFeaturedEvents.vue';
    import RecentEvents from './SectionRecentEvents.vue';
    import UpcomingEvents from './SectionUpcomingEvents.vue';

    export default {
        components: {
            Header,
            FeaturedEvents,
            RecentEvents,
            UpcomingEvents
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

        </main>
    </div>
</template>

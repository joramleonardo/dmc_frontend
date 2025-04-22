

<script>
    import Header from '../Layouts/Header.vue';
    import FeaturedEvents from './ComponentSection_FeaturedEvents.vue';
    import RecentEvents from './ComponentSection_RecentEvents.vue';
    import UpcomingEvents from './ComponentSection_UpcomingEvents.vue';
    import RecentCoverages from './ComponentSection_RecentCoverages.vue';
    import Footer from '../Layouts/Footer.vue';

    export default {
        components: {
            Header,
            FeaturedEvents,
            RecentEvents,
            UpcomingEvents,
            RecentCoverages,
            Footer
        }
    }
</script>


<template>
    <div >

        <!-- Header -->
        <header>
            <Header />
        </header>

        <!-- Body -->
        <main>
            <FeaturedEvents />
            <!-- <section class="whats-news-area pt-10 pb-20 gray-bg">
                <div class="container">
                    <div class="row">
                        <RecentEvents />
                        <UpcomingEvents />

                    </div>
                </div>
            </section> -->
        </main>

        <!-- Footer -->
        <!-- <Footer /> -->

    </div>
</template>

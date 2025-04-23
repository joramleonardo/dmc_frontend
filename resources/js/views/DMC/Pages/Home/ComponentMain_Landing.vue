

<script>
    import Header from '../Layouts/Header.vue';
    import FeaturedEvents from './ComponentSection_FeaturedEvents.vue';
    import RecentEvents from './ComponentSection_RecentEvents.vue';
    import UpcomingEvents from './ComponentSection_UpcomingEvents.vue';
    import RecentCoverages from './ComponentSection_RecentCoverages.vue';
    import Popular from './ComponentSection_PopularEvents.vue';
    import Footer from '../Layouts/Footer.vue';

    export default {
        components: {
            Header,
            FeaturedEvents,
            RecentEvents,
            UpcomingEvents,
            RecentCoverages,
            Popular,
            Footer
        },
    }
</script>


<template>
    <div >

        <div class="sub-header">
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8">
                <div class="left-content">
                    <p>This is an educational <em>HTML CSS</em> template by TemplateMo website.</p>
                </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                <div class="right-icons">
                    <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                </div>
            </div>
            </div>
        </div>
            <Header />

        <main>
            <section class="section main-banner" id="top" data-section="section1">
                <div class=" " >
                    <iframe
                        src="https://www.youtube.com/embed/fVmGvAxUAjI?autoplay=1&mute=1&loop=1&playlist=fVmGvAxUAjI&controls=0&showinfo=0&modestbranding=1"
                        frameborder="0"
                        allow="autoplay; encrypted-media"
                        allowfullscreen id="bg-video">
                    </iframe>
                </div>
                <div class="video-overlay header-text">
                    <div class="container">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="caption">
                        <!-- <h6>Hello Students</h6> -->
                        <h2>Welcome to DOST Media Collection</h2>
                        <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce erat massa, aliquet sed luctus dapibus, dignissim sed ligula. Nunc convallis in erat non tempor.
                        </p>
                        <div class="main-button-red">
                            <div class="scroll-to-section"><a href="/events">Browse Events here</a></div>
                        </div>
                    </div>
                        </div>
                        </div>
                    </div>
                </div>


            </section>

            <section class="services">
                <div class="container">
                    <FeaturedEvents />
                </div>
            </section>

            <!-- <FeaturedEvents />

            <section class="section" id="men">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2>LATEST EVENTS</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container wide-container">
                    <RecentEvents />
                </div>
            </section>
            <section class="section coverflow-carousel"  id="men" style="background-color: #000000;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-heading">
                                <h2 style="color: #ffffff;">POPULAR EVENTS</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <Popular />
            </section> -->


        </main>


    </div>
</template>


<style lang="css" scoped>
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

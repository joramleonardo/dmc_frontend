

<script>
    import * as assets_service from '../../../../services/assets_service.js';

    import Header from '../Layouts/Header.vue';
    import PopularEvents from './ComponentSection_PopularEvents.vue';


    export default {
        components: {
            Header,
            PopularEvents
        },
        data(){
            return {
                eventSummaries: []
            }
        },
        mounted(){
            this.loadEventSummaries()
        },
        methods:{
            formatDate(dateString) {
                if (!dateString) return ""; // Handle empty values

                const options = { day: '2-digit', month: 'long', year: 'numeric' };
                return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
            },
            async loadEventSummaries() {
                try {
                    const response = await assets_service.getAllEventsSummary();
                    this.eventSummaries = response.data;
                    console.log(this.eventSummaries);


                } catch (error) {
                    console.error("API Error:", error);
                }
            }
        }
    }
</script>

<template>

    <div>

        <header>
            <Header />
        </header>

        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <article class="blog_item" v-for="(event, index) in eventSummaries" :key="index">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" :src="'/storage/images/' + event.first_photo" alt="">
                                    <div href="#" class="blog_item_date">
                                        <h3>{{ event.event_category }}</h3>
                                        <!-- <p>{{ event.event_category }}</p> -->
                                    </div>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="single-blog.html">
                                        <h2>{{ event.event_title }}</h2>
                                    </a>
                                    <span class="views">
                                        <i class="fa fa-eye"></i> {{ event.views_count }}
                                    </span>
                                    <p>{{ event.event_description }}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-users"></i> {{ event.organizing_agency }}</a></li>
                                        <li><a href="#"><i class="fa fa-camera"></i> {{ event.photo_count }} Photos</a></li>
                                        <li><a href="#"><i class="fa fa-video"></i> {{ event.video_count }} Videos</a></li>
                                    </ul>
                                </div>
                            </article>



                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="#" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
                                            <i class="ti-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder='Search Keyword'
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Search Keyword'">
                                            <div class="input-group-append">
                                                <button class="btns" type="button"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Search</button>
                                </form>
                            </aside>

                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Filter</h4>
                                <ul class="list cat-list">
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>Year</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>Month</p>
                                        </a>
                                    </li>
                                </ul>
                            </aside>

                            <PopularEvents />
                            <!-- <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Popular Events</h3>

                                <div class="media post_item" v-for="(popular, index) in popularEvents" :key="index">
                                    <img :src="'/storage/images/' + popular.first_photo" alt="post">
                                    <div class="media-body">
                                        <a href="single-blog.html">
                                            <h3>{{ popular.event_title }}</h3>
                                        </a>
                                        <p>{{ formatDate(popular.event_date) }}</p>
                                    </div>
                                </div>

                            </aside> -->

                            <aside class="single_sidebar_widget tag_cloud_widget">
                                <h4 class="widget_title">Tag Clouds</h4>
                                <ul class="list">
                                    <li>
                                        <a href="#">project</a>
                                    </li>
                                    <li>
                                        <a href="#">love</a>
                                    </li>
                                    <li>
                                        <a href="#">technology</a>
                                    </li>
                                    <li>
                                        <a href="#">travel</a>
                                    </li>
                                    <li>
                                        <a href="#">restaurant</a>
                                    </li>
                                    <li>
                                        <a href="#">life style</a>
                                    </li>
                                    <li>
                                        <a href="#">design</a>
                                    </li>
                                    <li>
                                        <a href="#">illustration</a>
                                    </li>
                                </ul>
                            </aside>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>

<style lang="css" scoped>
    .views{
        font-style: italic;
        font-weight: 100;
        font-size: 12px;
        color: #999999;
        margin-left: 5px;
    }

    .media.post_item img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 15px;
    }

</style>

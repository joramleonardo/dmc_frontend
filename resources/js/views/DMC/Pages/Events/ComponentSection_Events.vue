<script>
    import * as assets_service from '../../../../services/assets_service.js';
    import Header from '../Layouts/Header.vue';
    import PopularEvents from './ComponentSection_PopularEvents.vue';
    import Footer from '../Layouts/Footer.vue';

    export default {
        components: {
            Header,
            PopularEvents,
            Footer
        },

        data() {
            return {
                eventSummaries: [],
                searchKeyword: '',
                currentPage: 1,
                lastPage: 1,

                selectedYear: '',
                selectedMonth: '',
                showResultText: false, // 👈 new reactive flag

            };
        },

        watch: {
            '$route.query': {
                handler(newQuery) {
                    // console.log("Route changed!", newQuery);
                    // this.loadEventSummaries(parseInt(newQuery.page || 1));

                    this.searchKeyword = newQuery.search || '';
                    this.currentPage = parseInt(newQuery.page || 1);
                    this.loadEventSummaries(this.currentPage);

                },
                immediate: false
            }

        },

        mounted() {
            this.initializeFromRoute();
            this.loadEventSummaries(this.currentPage);
        },


        methods: {
            initializeFromRoute() {
                const query = this.$route.query;

                this.searchKeyword = typeof query.search !== 'undefined' ? query.search : '';
                this.currentPage = query.page ? parseInt(query.page) : 1;

                this.selectedYear = query.year || '';
                this.selectedMonth = query.month || '';
            },
            async loadEventSummaries(page = 1) {
                try {
                    const params = {
                        ...(this.searchKeyword && { search: this.searchKeyword }),
                        ...(this.selectedYear && { year: this.selectedYear }),
                        ...(this.selectedMonth && { month: this.selectedMonth }),
                        page
                    };

                    const response = await assets_service.getAllEventsSummary(params);
                    this.eventSummaries = response.data;
                    this.currentPage = response.data.current_page;
                    this.lastPage = response.data.last_page;
                } catch (error) {
                    console.error("API Error:", error);
                }

                this.showResultText =
                    this.searchKeyword.trim() !== '' &&
                    this.eventSummaries.data &&
                    this.eventSummaries.data.length > 0;

            },
            applyFilters() {
                const query = {
                    ...(this.searchKeyword && { search: this.searchKeyword }),
                    ...(this.selectedYear && { year: this.selectedYear }),
                    ...(this.selectedMonth && { month: this.selectedMonth }),
                    page: 1 // reset page
                };

                console.log("Applying filters with query:", query);
                this.$router.push({ query });
            },
            goToPage(page) {
                if (page >= 1 && page <= this.lastPage) {
                    const query = {
                        ...this.$route.query, // keep current search, filters, etc.
                        page
                    };
                    this.$router.push({ query });
                }
            },

            formatDate(dateString) {
                if (!dateString) return "";
                const options = { day: '2-digit', month: 'long', year: 'numeric' };
                return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
            },
            onMonthYearChange(event) {
                const [year, month] = event.target.value.split('-');
                this.selectedYear = year;
                this.selectedMonth = month;
                this.applyFilters();
            }
        }
    };

</script>


<template>

    <div>
        <!-- Preloader Start -->
        <!-- <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <img src="myCustom/img/logo/stii.png" alt="">
                    </div>
                </div>
            </div>
        </div> -->

        <header>
            <Header />
        </header>

        <section class="blog_area section-padding">
            <div class="container">
                <div class="row result-text" v-if="showResultText">

                    <div class="cl-xl-7 col-lg-8 col-md-10">
                        <!-- Section Tittle -->
                        <div class="section-tittles mb-20">
                            <span class="display-result-text">Displaying results for
                                <!-- <a class="display-result-text-keyword">
                                    {{ tagName }}
                                </a> -->
                                <strong>{{ this.searchKeyword }}</strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <article class="blog_item" v-for="(event, index) in eventSummaries.data || []" :key="index">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" :src="'/storage/images/' + event.first_photo" alt="">
                                        <div href="#" class="blog_item_date">
                                            <h3>{{ event.event_category }}</h3>
                                        </div>
                                    </div>

                                    <div class="blog_details">
                                            <router-link class="d-inline-block" v-bind:to="{name : 'single-event', params: { id: event.album_id}}" >
                                                <h2>{{ event.event_title }}</h2>
                                            </router-link>
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
                                        <li class="page-item" :class="{ disabled: currentPage === 1 }">
                                        <a class="page-link" href="#" @click.prevent="goToPage(currentPage - 1)">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                        </li>

                                        <li class="page-item"
                                            v-for="page in lastPage"
                                            :key="page"
                                            :class="{ active: currentPage === page }">
                                        <a class="page-link" href="#" @click.prevent="goToPage(page)">
                                            {{ page }}
                                        </a>
                                        </li>

                                        <li class="page-item" :class="{ disabled: currentPage === lastPage }">
                                        <a class="page-link" href="#" @click.prevent="goToPage(currentPage + 1)">
                                            <i class="ti-angle-right"></i>
                                        </a>
                                        </li>
                                    </ul>
                                </nav>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <!-- SEARCH WIDGET -->
                            <!-- <aside class="single_sidebar_widget search_widget">
                                <form @submit.prevent="applyFilters">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input v-model="searchKeyword" class="form-control" placeholder="Search Keyword"/>
                                            <div class="input-group-append">
                                                <button class="btns" type="submit">
                                                    <i class="ti-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </aside> -->

                            <!-- FILTER YEAR OR MONTH WIDGET -->
                            <aside class="single_sidebar_widget" v-if="true">
                                <h4 class="widget_title">Filter by Year & Month</h4>

                                <!-- Year Filter -->
                                <div class="form-group mb-2">
                                    <input
                                        type="month"
                                        class="form-control"
                                        @change="onMonthYearChange"
                                    />
                                </div>
                                <!-- Apply Button -->
                            </aside>

                            <!-- POPULAR EVENTS WIDGET -->
                            <PopularEvents />
                            <!-- CHANGE TO UPCOMING EVENTS-->



                        </div>
                    </div>
                </div>
            </div>
        </section>

        <Footer />

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

    .display-result-text{
        font-style: italic;
        text-transform: none;
    }
    .display-result-text-keyword{
        text-transform: uppercase;
        font-style: normal;
        font-weight: 800;
        color: #000000;
        margin-left: 5px;

    }


</style>

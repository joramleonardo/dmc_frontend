<script>
import * as assets_service from '../../../../services/assets_service.js';
import Header from '../Layouts/Header.vue';
import PopularEvents from './ComponentSection_PopularEvents.vue';

export default {
    components: {
        Header,
        PopularEvents
    },

    data() {
        return {
            eventSummaries: [],
            tagName: '',
            currentPage: 1,
            lastPage: 1,
            selectedYear: '',
            selectedMonth: '',
            isLoading: false,
        };
    },

    watch: {
        '$route.query': {
            immediate: true,
            handler(query) {
                this.tagName = query.searchTag || '';
                this.currentPage = parseInt(query.page) || 1;
                this.selectedYear = query.year || '';
                this.selectedMonth = query.month || '';
                this.loadEventSummaries();
            }
        }
    },

    methods: {
        async loadEventSummaries() {
            this.isLoading = true;
            const params = {
                searchTag: this.tagName,
                page: this.currentPage,
                year: this.selectedYear,
                month: this.selectedMonth
            };
            try {
                const response = await assets_service.getEventsByTag(params);
                this.eventSummaries = response.data;
                this.lastPage = response.data.last_page;
            } catch (error) {
                console.error("API Error:", error);
            } finally {
                this.isLoading = false;
            }
        },
        handlePageChange(page) {
            this.$router.push({
                path: '/events-tags',
                query: {
                    searchTag: this.tagName,
                    year: this.selectedYear,
                    month: this.selectedMonth,
                    page: page
                }
            });
        },
        onMonthYearChange(event) {
            const [year, month] = event.target.value.split('-');
            this.selectedYear = year;
            this.selectedMonth = month;
            this.$router.push({
                path: '/events-tags',
                query: {
                    searchTag: this.tagName,
                    year,
                    month,
                    page: 1
                }
            });
        },
        formatDate(dateString) {
            if (!dateString) return "";
            const options = { day: '2-digit', month: 'long', year: 'numeric' };
            return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
        }
    }
};
</script>



<template>

    <div>

        <header>
            <Header />
        </header>

        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="cl-xl-7 col-lg-8 col-md-10">
                        <!-- Section Tittle -->
                        <div class="section-tittles mb-20">
                            <span class="display-result-text">Displaying results for
                                <a class="display-result-text-keyword">
                                    {{ tagName }}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <div v-if="isLoading" class="text-center py-5">Loading...</div>

                            <div v-else-if="eventSummaries && eventSummaries.data && eventSummaries.data.length === 0" class="text-center py-5 text-muted">

                                😕 No results found for <strong>{{ tagName }}</strong>
                            </div>
                            <article class="blog_item" v-for="(event, index) in eventSummaries.data || []" :key="index">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" :src="'/storage/images/' + event.first_photo" alt="">
                                    <div class="blog_item_date"><h3>{{ event.event_category }}</h3></div>
                                </div>
                                <div class="blog_details">
                                    <router-link class="d-inline-block" :to="{ name: 'single-event', params: { id: event.album_id } }">
                                        <h2>{{ event.event_title }}</h2>
                                    </router-link>
                                    <span class="views"><i class="fa fa-eye"></i> {{ event.views_count }}</span>
                                    <p>{{ event.event_description }}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-users"></i> {{ event.organizing_agency }}</a></li>
                                        <li><a href="#"><i class="fa fa-camera"></i> {{ event.photo_count }} Photos</a></li>
                                        <li><a href="#"><i class="fa fa-video"></i> {{ event.video_count }} Videos</a></li>
                                    </ul>
                                </div>
                            </article>

                            <nav v-if="!isLoading && eventSummaries && eventSummaries.data && eventSummaries.data.length" class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item" :class="{ disabled: currentPage === 1 }">
                                        <a class="page-link" href="#" @click.prevent="handlePageChange(currentPage - 1)">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item" v-for="page in lastPage" :key="page" :class="{ active: currentPage === page }">
                                        <a class="page-link" href="#" @click.prevent="handlePageChange(page)">{{ page }}</a>
                                    </li>
                                    <li class="page-item" :class="{ disabled: currentPage === lastPage }">
                                        <a class="page-link" href="#" @click.prevent="handlePageChange(currentPage + 1)">
                                            <i class="ti-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <!-- FILTER YEAR OR MONTH WIDGET -->
                            <aside class="single_sidebar_widget" v-if="true">
                                <h4 class="widget_title">Filter by Year & Month</h4>
                                <div class="form-group mb-2">
                                    <input
                                        type="month"
                                        class="form-control"

                                    />
                                </div>
                            </aside>

                            <!-- POPULAR EVENTS WIDGET -->
                            <PopularEvents />
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


<script>
import * as assets_service from '../../../../services/assets_service.js';


export default {
    data() {
        return {
            list_featuredEvents: [],
        };
    },
    mounted() {
        this.loadAllEvents();
    },
    methods: {
        async loadAllEvents() {
            try {
                const response = await assets_service.getFeaturedEvents();
                this.list_featuredEvents = response.data;

                console.log("Featured Events:", this.list_featuredEvents);

                this.$nextTick(() => {
                    this.initCarousel(); // Initialize after DOM update
                });
            } catch (error) {
                console.error("API Error:", error);
            }
        },
        initCarousel() {
            const el = this.$refs.featuredCarousel;
            if (!el) return;

            // destroy if already initialized
            const $el = $(el);
            if ($el.hasClass('owl-loaded')) {
                $el.trigger('destroy.owl.carousel');
                $el.find('.owl-stage-outer').children().unwrap();
                $el.removeClass("owl-center owl-loaded owl-text-select-on");
            }

            $el.owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: { items: 1 },
                    768: { items: 2 },
                    992: { items: 3 },
                    1200: { items: 4 }
                }
            });
        },
        formatDate(dateString) {
            if (!dateString) return "";
            const options = { day: '2-digit', month: 'long', year: 'numeric' };
            return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
        }
    }
}
</script>


<template>


    <div class="row">
        <div class="col-lg-12">
            <div class="section-heading">
                <h2>Featured Events</h2>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="owl-courses-item owl-carousel" ref="featuredCarousel">
                <div class="item" v-for="(event, index) in list_featuredEvents" :key="index">
                    <div class="image-container">
                        <img :src="'/storage/images/' + event.photo" :alt="event.event_title">
                        <div class="overlay">
                            <h4 class="title">{{ event.event_title }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</template>


<style scoped>

    .item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .image-container {
        position: relative;
        overflow: hidden;
    }

    .image-container img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
    }

    .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 12px 10px;
        text-align: center;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .image-container:hover .overlay {
        opacity: 1;
    }

    .title {
        font-size: 14px;
        font-weight: 200;
        margin: 0;
    }



</style>

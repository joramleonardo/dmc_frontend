

<script>
    import * as assets_service from '../../../../services/assets_service.js';

    import 'slick-carousel/slick/slick.css';
    import 'slick-carousel/slick/slick-theme.css';
    import 'slick-carousel';

    export default {
        data(){
            return {
                list_recentVideos: [],
            }
        },
        mounted(){
            this.loadRecentVideos();
        },
        methods:{
            async loadRecentVideos() {
                try {
                    const response = await assets_service.getRecentVideos();
                    this.list_recentVideos = response.data;
                    console.log("videos");
                    console.log(this.list_recentVideos);

                    this.$nextTick(() => {
                        this.reinitializeSlider();
                    });
                } catch (error) {
                    console.error("API Error:", error);
                }
            },

            getClass(index) {
                const classes = ["left-side", "center-side", "right-side hidden-md-down"];
                return classes[index] || "default-class";
            },
            formatDate(dateString) {
                if (!dateString) return ""; // Handle empty values

                const options = { day: '2-digit', month: 'long', year: 'numeric' };
                return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
            },
            reinitializeSlider() {
                const slider = $(this.$refs.slider);

                // ✅ Destroy existing instance to prevent duplication
                if (slider.hasClass('slick-initialized')) {
                    slider.slick('unslick');
                }

                // ✅ Reinitialize Slick Carousel
                slider.slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    arrows: false,
                    dots: true,
                    responsive: [
                        { breakpoint: 992, settings: { slidesToShow: 3 } },
                        { breakpoint: 768, settings: { slidesToShow: 2 } },
                        { breakpoint: 576, settings: { slidesToShow: 1 } }
                    ]
                });

            },
            getYoutubeThumbnail(url) {
                const match = url.match(/(?:youtube\.com.*(?:\/|v=)|youtu\.be\/)([a-zA-Z0-9_-]+)/);
                return match ? `https://img.youtube.com/vi/${match[1]}/hqdefault.jpg` : '';
            }

        }
    }
</script>



<template>
    <div class="slider-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="small-tittle mb-30">
                    <h4>Recent Coverages</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="weekly3-news-active dot-style compact-style" ref="slider">
                    <div class="video-card" v-for="(video, index) in list_recentVideos" :key="index">
                        <div class="thumb-wrapper">
                            <img
                            class="img-fluid"
                            :src="getYoutubeThumbnail(video.video_link)"
                            alt="Video Thumbnail"
                            />
                            <!-- <router-link v-bind:to="{name : 'single-event', params: { id: video.album_id}}" > -->
                                <router-link
                                    :to="{
                                        name: 'single-event',
                                        params: { id: video.album_id },
                                        query: { video: video.video_id }
                                    }"
                                    >
                                <div class="play-icon">▶</div>
                            </router-link>
                        </div>
                        <!-- <div class="caption">
                            <h6 class="video-title">
                                <a :href="'/event/' + video.album_id">
                                    {{ video.video_link }}
                                </a>
                            </h6>
                            <p class="video-date">{{ video.event_date }}</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>
.weekly3-news-active {
    margin: 0 -10px; /* compensates for individual card padding */
    }

    .video-card {
    padding: 0 10px;
    width: 250px;
    flex-shrink: 0;
    text-align: center;
    }

    .thumb-wrapper {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 10px;
    }

    .thumb-wrapper img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    }

    .play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 28px;
    opacity: 0.8;
    }

    .video-title {
    font-size: 14px;
    font-weight: 600;
    margin: 10px 0 5px;
    }

    .video-date {
    font-size: 13px;
    color: #888;
    }
</style>

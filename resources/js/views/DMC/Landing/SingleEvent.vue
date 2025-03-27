

<script>
    import * as assets_service from '../../../services/assets_service.js';

    import Header from './SectionHeader.vue';
    import UpcomingEvents from './SectionUpcomingEvents.vue';

    import $ from 'jquery';

    export default {
        components: {
            Header,
            UpcomingEvents
        },
        data(){
            return {
                album_id : this.$route.params.id,
                list_eventDetails: [],
                featuredPhoto: null,
                selectedPhotoDetails: null,
                selectedVideo: null,
                activeItem: null,
            }
        },
        mounted(){
            this.loadEventDetails();
        },
        computed: {
            mediaItems() {
                const photos = this.list_eventDetails.photos || [];
                const videos = this.list_eventDetails.videos || [];

                const photoItems = photos.map(item => ({ ...item, media_type: 'photo' }));
                const videoItems = videos.map(item => ({ ...item, media_type: 'video' }));

                return [...photoItems, ...videoItems];
            }
        },
        methods:{
            async loadEventDetails() {
                try {
                    const response = await assets_service.getEventByAlbumId(this.album_id);
                    this.list_eventDetails = response.data;

                    if (this.list_eventDetails.photos && this.list_eventDetails.photos.length > 0) {
                        this.featuredPhoto = this.list_eventDetails.photos[0].photo_fileName;
                        this.selectedPhotoDetails = this.list_eventDetails.photos[0];
                    }

                    this.$nextTick(() => {
                        this.reinitializePhotoSlider();
                    });

                } catch (error) {
                    console.error("API Error:", error);
                }
            },
            selectPhoto(photo) {
                this.featuredPhoto = photo.photo_fileName;
                this.selectedPhotoDetails = photo;
            },

            getVideoEmbedUrl(url) {
                const videoIdMatch = url.match(/(?:youtube\.com.*(?:\/|v=)|youtu\.be\/)([a-zA-Z0-9_-]+)/);
                return videoIdMatch ? `https://www.youtube.com/embed/${videoIdMatch[1]}` : url;
            },
            selectMedia(item) {
                if (item.media_type === 'photo') {
                    this.featuredPhoto = item.photo_fileName;
                    this.selectedPhotoDetails = item;
                    this.selectedVideo = null;
                } else {
                    this.featuredPhoto = null;
                    this.selectedPhotoDetails = null;
                    this.selectedVideo = item;
                }
            },
            getYoutubeThumbnail(url) {
                const videoIdMatch = url.match(/(?:youtube\.com.*(?:\/|v=)|youtu\.be\/)([a-zA-Z0-9_-]+)/);
                return videoIdMatch
                    ? `https://img.youtube.com/vi/${videoIdMatch[1]}/hqdefault.jpg`
                    : '';
            },

            reinitializePhotoSlider() {
            const $slider = $(this.$refs.photoSlider);

            if ($slider.hasClass('slick-initialized')) {
                $slider.slick('unslick');
            }

            $slider.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: false,
                dots: true,
                responsive: [
                { breakpoint: 992, settings: { slidesToShow: 2 } },
                { breakpoint: 768, settings: { slidesToShow: 1 } }
                ]
            });
            }
        }
    }
</script>


<template>
    <div >
        <header>
            <Header />
        </header>

        <main>
            <section class="blog_area single-post-area section-padding-single-event">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 posts-list">
                            <div class="single-post">
                                <h2 class="event-title">
                                    {{list_eventDetails.event_title}}
                                </h2>
                                <div class="feature-img">
                                    <img
                                        v-if="featuredPhoto"
                                        class="img-fluid"
                                        :src="'/storage/images/' + featuredPhoto"
                                        alt="Featured Photo"
                                    />

                                    <div v-else-if="selectedVideo" class="video-wrapper">
                                        <iframe
                                        :src="getVideoEmbedUrl(selectedVideo.video_link)"
                                        frameborder="0"
                                        allowfullscreen
                                        ></iframe>
                                    </div>
                                </div>


                                <div class="blog_details">

                                    <!-- <ul class="blog-info-link mt-3 mb-4">
                                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                    </ul> -->
                                    <div class="slider-wrapper">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="weekly2-news-active d-flex" ref="photoSlider">
                                                    <div class="weekly2-single" v-for="(item, index) in mediaItems" :key="index">
                                                        <div class="weekly2-img" @click="selectMedia(item)" style="cursor: pointer;">

                                                            <img v-if="item.media_type === 'photo'"
                                                                class="img-fluid" :src="'/storage/images/' + item.photo_fileName"
                                                                :alt="item.photo_title || 'Event Photo'" />

                                                            <div v-else class="video-thumb" style="position: relative;" >
                                                                <img
                                                                    class="img-fluid"
                                                                    :src="getYoutubeThumbnail(item.video_link)"
                                                                    alt="Video Thumbnail"
                                                                />
                                                                <div class="play-icon" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 40px; color: white;">
                                                                    ▶
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="weekly2-caption">
                                                            <p>
                                                            <span class="photo-category" v-if="item.media_type === 'photo'">
                                                                PHOTO
                                                            </span>
                                                            <span class="photo-category" v-else>
                                                                VIDEO
                                                            </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="blog_right_sidebar">
                                <aside class="single_sidebar_widget tag_cloud_widget">
                                    <h4 class="widget_title">Photo Information</h4>
                                    <ul class="list" v-if="selectedPhotoDetails">
                                        <li>
                                            <span class="meta-title">
                                                Photo ID:
                                            </span>
                                            <span class="meta-family">
                                                {{ selectedPhotoDetails.photo_id || 'N/A' }}
                                            </span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">
                                                Description:
                                            </span>
                                            <span class="meta-family">
                                                {{ selectedPhotoDetails.photo_description || 'N/A' }}
                                            </span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">
                                                Category:
                                            </span>
                                            <span class="meta-family">
                                                {{ selectedPhotoDetails.photo_category || 'N/A' }}
                                            </span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">
                                                Photographer:
                                            </span>
                                            <span class="meta-family">
                                                {{ selectedPhotoDetails.photo_photographer || 'N/A' }}
                                            </span>
                                        </li> <br>
                                    </ul>
                                    <ul class="list" v-if="selectedVideo">
                                        <li>
                                            <span class="meta-title">Video ID:</span>
                                            <span class="meta-family">{{ selectedVideo.video_id || 'N/A' }}</span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">Description:</span>
                                            <span class="meta-family">{{ selectedVideo.video_description || 'N/A' }}</span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">Category:</span>
                                            <span class="meta-family">{{ selectedVideo.video_category || 'N/A' }}</span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">Videographer:</span>
                                            <span class="meta-family">{{ selectedVideo.video_videographer || 'N/A' }}</span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">Duration:</span>
                                            <span class="meta-family">{{ selectedVideo.video_duration || 'N/A' }}</span>
                                        </li>
                                    </ul>

                                </aside>
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

        </main>
    </div>
</template>

<style lang="css" scoped>

    .photo-category{
        background: #0077b5;
        color: #ffffff;
        font-size: 10px;
        padding: 5px;
        margin: 15px 0;
    }

    .weekly2-single {
        padding: 0 10px;
    }

    .weekly2-news-active {
        margin: 0 -10px;
    }

    .meta-title{
        text-transform: uppercase;
        font-family: Open Sans, sans-serif;
        font-size: .8rem;
        font-weight: 600;
    }

    .meta-family{
        font-family: Open Sans, sans-serif;
        font-size: .9rem;
        margin-top: 0;
    }

    .feature-img {
        margin-bottom: 20px;
    }

    .video-wrapper {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 25px;
        height: 0;
        overflow: hidden;
        border-radius: 10px;
    }

    .video-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .event-title{
        font-weight: 700;
    }

    .weekly2-caption{
        margin-top: 25px;
    }


</style>

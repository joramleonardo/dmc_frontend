

<script>
    import * as assets_service from '../../../../services/assets_service.js';

    import Header from '../Layouts/Header.vue';
    import UpcomingEvents from '../Home/ComponentSection_UpcomingEvents.vue';
    import RelatedEvents from './ComponentSection_RelatedEvents.vue';
    import TagClouds from './ComponentSection_Tags.vue';



    export default {
        components: {
            Header,
            UpcomingEvents,
            RelatedEvents,
            TagClouds
        },
        data(){
            return {
                album_id : this.$route.params.id,
                target_photo_id: this.$route.query.photo || null,
                target_video_id: this.$route.query.video || null,
                searchTag: this.$route.query.searchTag || '', // 👈 added
                list_eventDetails: [],
                featuredPhoto: null,
                selectedPhotoDetails: null,
                selectedVideo: null,
                activeItem: null,
                showRequestModal: false,
                requestForm: {
                    name: '',
                    email: ''
                }
            }
        },
        // mounted(){
        //     this.loadEventDetails();
        // },
        computed: {
            mediaItems() {
                const photos = this.list_eventDetails.photos || [];
                const videos = this.list_eventDetails.videos || [];

                const photoItems = photos.map(item => ({ ...item, media_type: 'photo' }));
                const videoItems = videos.map(item => ({ ...item, media_type: 'video' }));

                return [...photoItems, ...videoItems];
            }
        },
        watch: {
            '$route.params.id': {
                immediate: true,
                handler(newId) {
                    this.album_id = newId;
                    this.loadEventDetails();
                }
            },
            '$route.query.searchTag': {
                immediate: true,
                handler(newTag) {
                    this.searchTag = newTag;
                    this.loadEventsByTag();
                }
            }
        },
        methods:{
            async loadEventDetails() {
                try {
                    const response = await assets_service.getEventByAlbumId(this.album_id);
                    this.list_eventDetails = response.data;
                    console.log("aaa");
                    console.log(this.list_eventDetails);

                    const photos = this.list_eventDetails.photos || [];
                    const videos = this.list_eventDetails.videos || [];

                    // 🌟 1. Check if there's a photo ID from the URL
                    if (this.target_photo_id && photos.length > 0) {
                        const foundPhoto = photos.find(p => p.photo_id == this.target_photo_id);
                        if (foundPhoto) {
                            this.featuredPhoto = foundPhoto.photo_fileName;
                            this.selectedPhotoDetails = foundPhoto;
                            this.selectedVideo = null;
                            return;
                        }
                    }

                    // 🌟 2. Check if there's a video ID from the URL
                    if (this.target_video_id && videos.length > 0) {
                        const foundVideo = videos.find(v => v.video_id == this.target_video_id);
                        if (foundVideo) {
                            this.selectedVideo = foundVideo;
                            this.featuredPhoto = null;
                            this.selectedPhotoDetails = null;
                            return;
                        }
                    }

                    // ✅ 3. Fallback: show first photo if available
                    if (photos.length > 0) {
                        this.featuredPhoto = photos[0].photo_fileName;
                        this.selectedPhotoDetails = photos[0];
                        this.selectedVideo = null;
                    }
                    // ✅ 4. Fallback: show first video if no photo
                    else if (videos.length > 0) {
                        this.selectedVideo = videos[0];
                        this.featuredPhoto = null;
                        this.selectedPhotoDetails = null;
                    }

                    this.$nextTick(() => {
                        this.reinitializePhotoSlider();
                    });

                } catch (error) {
                    console.error("API Error:", error);
                }
            },
            async loadEventsByTag() {
                if (!this.searchTag) return;

                try {
                    const response = await assets_service.getEventsByTag(this.searchTag);
                    this.list_eventDetails = response.data;
                    this.featuredPhoto = null;
                    this.selectedPhotoDetails = null;
                    this.selectedVideo = null;

                    // Optional: Reset slider
                    this.$nextTick(() => {
                        this.reinitializePhotoSlider();
                    });
                } catch (error) {
                    console.error('Failed to load events by tag:', error);
                }
            },
            formatDate(dateString) {
                if (!dateString) return ""; // Handle empty values

                const options = { day: '2-digit', month: 'long', year: 'numeric' };
                return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
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
            },
            openRequestModal() {
                this.showRequestModal = true;
            },

            closeRequestModal() {
                this.showRequestModal = false;
            },
            copyDetails() {
                const details = `
                Event Title: ${this.list_eventDetails.event_title || 'N/A'}
                Event Venue: ${this.list_eventDetails.event_venue || 'N/A'}
                Event Date: ${this.formatDate(this.list_eventDetails.event_date) || 'N/A'}
                Event Organizing Agency: ${this.list_eventDetails.event_organizingAgency || 'N/A'}
                    `.trim();

                    // Copy to clipboard
                    navigator.clipboard.writeText(details)
                    .then(() => {
                        this.$toast.open({
                            message: 'Event details copied to clipboard!',
                            type: 'success',
                            position: 'bottom-right',
                            duration: 5000,
                        });

                        this.closeRequestModal();
                    })
                    .catch(err => {
                        console.error("Failed to copy: ", err);
                        alert("Failed to copy to clipboard. Please try manually.");
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
                                <p class="view-count mb-3">
                                Views: {{ list_eventDetails.views_count || 0 }}
                                </p>
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
                                        <span class="meta-family">{{ selectedVideo.video_description || 'N/A' }}</span>
                                    </div>
                                    <div class="featured-description mt-3">
                                        <p v-if="selectedPhotoDetails && selectedPhotoDetails.photo_description">
                                            {{ selectedPhotoDetails.photo_description }}
                                        </p>
                                        <p v-if="selectedVideo && selectedVideo.video_description">
                                            {{ selectedVideo.video_description }}
                                        </p>
                                    </div>

                                </div>


                                <div class="blog_details">
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
                                    <h4 class="widget_title">Event Information</h4>
                                    <ul class="list">
                                        <li>
                                            <span class="meta-title">Event Title:</span>
                                            <br>
                                            <span class="meta-sub">{{ list_eventDetails.event_title }}</span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">Description:</span>
                                            <br>
                                            <span class="meta-sub">{{ list_eventDetails.event_description }}</span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">Category:</span>
                                            <br>
                                            <span class="meta-sub">
                                                <a href="#">
                                                    {{ list_eventDetails.event_category }}
                                                </a>
                                            </span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">Venue:</span>
                                            <br>
                                            <span class="meta-sub">{{ list_eventDetails.event_venue }}</span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">Date:</span>
                                            <br>
                                            <span class="meta-sub">{{ formatDate(list_eventDetails.event_date) }}</span>
                                        </li> <br>
                                        <li>
                                            <span class="meta-title">Organizing Agency:</span>
                                            <br>
                                            <span class="meta-sub">
                                                <a href="#">
                                                    {{ list_eventDetails.event_organizingAgency }}
                                                </a>
                                            </span>
                                        </li> <br><br>
                                        <button class="genric-btn primary-border small" type="submit" @click="openRequestModal">
                                            Request Copy
                                        </button>

                                    </ul>
                                </aside>

                                <TagClouds v-if="album_id" :albumId="album_id" />
                                <RelatedEvents :albumId="album_id" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <div v-if="showRequestModal" class="modal-overlay">
            <div class="modal-content">
                <h3>Request Photo</h3>

                <p>
                    Click the button below to copy the event details and email it at <strong>default@stii.dost.gov.ph</strong>
                </p>


                <div class="modal-actions">
                    <button class="genric-btn primary small" @click="copyDetails">Copy Details</button>
                    <button class="genric-btn danger small" @click="closeRequestModal">Close</button>
                </div>
            </div>
        </div>


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
        font-family: Open Sans, sans-serif;
        font-size: .8rem;
        font-weight: 600;
    }

    .meta-sub{
        font-size: .9rem;
    }

    .badge{
        font-weight: bold;
        color: white;
        border-radius: 2rem;
        cursor: pointer;
        width: 95.02px;
        height: 25px;
        border: none;
        background-color: #000033;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .meta-family{
        font-family: Open Sans, sans-serif;
        font-size: .9rem;
        margin-top: 0;
    }

    /* .feature-img {
        margin-bottom: 20px;
    } */

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

    .featured-description {
        font-size: 12px;
        font-family: 'Open Sans', sans-serif;
        color: #444;
        font-style: italic;
        text-align: center;
    }

    .view-count {
        font-size: 14px;
        color: #888;
        font-style: italic;
    }
    .widget_title{
        text-transform: uppercase;
    }

    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        background: rgba(0, 0, 0, 0.6);
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        width: 90%;
        max-width: 400px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        font-family: 'Open Sans', sans-serif;
    }

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }


</style>



<script>
    import * as assets_service from '../../../../services/assets_service.js';

    export default {
        data(){
            return {
                list_featuredEvents: [],
                popularEvent: null,
                photos: [],
                videos: [],
            }
        },
        mounted() {
            this.loadAllEvents();
        },
        methods:{

            async loadAllEvents() {
                try {
                    const response = await assets_service.getPopularEvents();
                    const event = response.data[0]; // Take the most popular

                    if (event) {
                        this.popularEvent = event;

                        // Fetch photos and videos from album_id
                        const [photosRes, videosRes] = await Promise.all([
                            assets_service.getPhotosByAlbumId(event.album_id),
                            assets_service.getVideosByAlbumId(event.album_id),
                        ]);

                        this.photos = photosRes.data;
                        this.videos = videosRes.data;
                        console.log("Photos:", this.photos);
                        console.log("Videos:", this.videos);
                        console.log("Event:", event);
                    }
                } catch (error) {
                    console.error("API Error:", error);
                }
            },

            getEmbedUrl(url) {
                // Convert YouTube URL to embeddable format
                const youtubeRegex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w-]+)/;
                const match = url.match(youtubeRegex);
                if (match && match[1]) {
                    return `https://www.youtube.com/embed/${match[1]}`;
                }

                // fallback: return the original URL
                return url;
            },

            formatDate(dateString) {
                if (!dateString) return ""; // Handle empty values

                const options = { day: '2-digit', month: 'long', year: 'numeric' };
                return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
            }
        }
    }
</script>

<template>
    <div class="container">
        <div class="col-lg-12">
            <div class="section-heading">
                <h2>Popular Event</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{ popularEvent?.event_title || 'No Event Found' }}</h2>
                    </div>
                            <div v-for="(photo, i) in photos" :key="i" class="col-6 mb-3">
                                <img :src="`/storage/images/${photo.photo_fileName}`" alt="Event Photo" class="img-fluid rounded shadow">
                            </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">

                    <div class="video text-center">
                        <iframe v-if="videos.length > 0" :src="getEmbedUrl(videos[0].video_link)"
                            width="100%"
                            height="315"
                            frameborder="0"
                            allowfullscreen
                            class="rounded shadow">
                        </iframe>

                        <img v-else-if="photos.length > 0" :src="`/storage/images/${photos[0].photo_fileName}`"
                            alt="First Event Photo"
                            class="img-fluid rounded shadow"/>

                        <img v-else
                            src="edu/assets/images/video-placeholder.png"
                            alt="No Video Available"
                            class="img-fluid rounded shadow"
                        />
                    </div>


            </div>
        </div>
    </div>
</template>


<style scoped>


    .coverflow-carousel {
        padding: 60px 0;
        background-color: #000;
        display: flex;
        justify-content: center;
    }

    .coverflow-swiper {
        width: 100%;
        max-width: 1100px;
        padding-bottom: 60px;
    }

    .swiper-slide {
        width: 250px;
        height: 400px;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease-in-out;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #fff;
    }

    .swiper-pagination-bullet {
        background-color: #fff;
        opacity: 0.6;
    }

    .swiper-pagination-bullet-active {
        background-color: #ffc107;
        opacity: 1;
    }

    .video img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }


</style>

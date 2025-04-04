<script>
        import * as assets_service from '../../../../services/assets_service.js';
        import Header from '../Layouts/Header.vue';
        import PopularEvents from '../Events/ComponentSection_PopularEvents.vue';

        export default {
            components: {
                Header,
                PopularEvents
            },
            data() {
                return {
                    photos: [],
                    currentPage: 1,
                    lastPage: null,
                    loading: false,
                    showModal: false,
                    zoomedPhoto: null, // store selected image
                };
            },
            mounted() {
                this.loadPhotos();
                window.addEventListener('scroll', this.handleScroll);
            },
            methods: {
                async loadPhotos() {
                    if (this.loading || (this.lastPage && this.currentPage > this.lastPage)) return;

                    this.loading = true;
                    try {
                        // Add artificial delay
                        await new Promise(resolve => setTimeout(resolve, 1000)); // 1-second delay

                        const response = await assets_service.getAllPhotos(this.currentPage);
                        this.photos = [...this.photos, ...response.data.data];
                        this.lastPage = response.data.last_page;
                        this.currentPage++;

                    } catch (error) {
                        console.error('Failed to load gallery photos', error);
                    } finally {
                        this.loading = false;
                    }
                },
                handleScroll() {
                    const scrollBottom = window.innerHeight + window.scrollY >= document.body.offsetHeight - 10;
                    if (scrollBottom) this.loadPhotos();
                },
                unmounted() {
                    window.removeEventListener('scroll', this.handleScroll);
                },
                openZoom(photo) {
                    this.zoomedPhoto = photo;
                    this.showModal = true;
                },
                closeZoom() {
                    this.showModal = false;
                    this.zoomedPhoto = null;
                }
            }
        };
</script>


<template>

    <div>
        <!-- Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <img src="myCustom/img/logo/stii.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <header>
            <Header />
        </header>

        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5 mb-lg-0">

                        <div class="gallery-container">
                            <div
                            v-for="(photo, index) in photos"
                            :key="index"
                            class="gallery-item"
                            >
                            <div class="image-wrapper">
                                <img
                                    :src="'/storage/images/' + photo.photo_fileName"
                                    :alt="photo.photo_title || 'Photo'"
                                    @click="openZoom(photo)"
                                    style="cursor: zoom-in"
                                />
                                <div class="hover-caption">
                                    <router-link :to="{ name: 'single-event',  params: { id: photo.album_id }, query: { photo: photo.photo_id }}" >
                                        {{ photo.album_title || 'Untitled Event' }}
                                    </router-link>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="text-center my-3" v-if="loading">
                            <div class="spinner"></div>
                            <p class="mt-2">Loading more photos...</p>
                        </div>
                        <div v-if="showModal" class="zoom-modal" @click.self="closeZoom">
                            <span class="close-btn" @click="closeZoom">&times;</span>
                            <img
                                class="zoomed-img"
                                :src="'/storage/images/' + zoomedPhoto.photo_fileName"
                                :alt="zoomedPhoto.photo_title || 'Zoomed Photo'"
                            />
                            <p class="caption">{{ zoomedPhoto.photo_title || 'Untitled Photo' }}</p>
                        </div>

                    </div>

                </div>
            </div>
        </section>

    </div>




</template>

<style scoped>
    .gallery-container {
    column-count: 3;
    column-gap: 1rem;
    }

    .gallery-item {
    break-inside: avoid;
    margin-bottom: 1rem;
    }

    .image-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    }

    .image-wrapper img {
    width: 100%;
    display: block;
    border-radius: 8px;
    transition: transform 0.3s ease;
    }

    .image-wrapper:hover img {
    transform: scale(1.05);
    }

    .hover-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        text-align: center;
        padding: 8px;
        opacity: 0;
        transition: opacity 0.3s ease;
        font-size: 12px;
    }

    .image-wrapper:hover .hover-caption {
        opacity: 1;
    }

    .spinner {
        width: 30px;
        height: 30px;
        border: 4px solid #ccc;
        border-top-color: #0077b5;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
        margin: 0 auto;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .zoom-modal {
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    }

    .zoomed-img {
    max-width: 90%;
    max-height: 80vh;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
    }

    .caption {
    color: #fff;
    margin-top: 10px;
    font-size: 14px;
    text-align: center;
    }

    .close-btn {
    position: absolute;
    top: 20px;
    right: 30px;
    color: #fff;
    font-size: 30px;
    cursor: pointer;
    z-index: 10000;
    }


</style>

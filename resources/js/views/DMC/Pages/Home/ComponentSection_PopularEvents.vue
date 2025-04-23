

<script>
    import * as assets_service from '../../../../services/assets_service.js';



    export default {
        data(){
            return {
                list_featuredEvents: [],
            }
        },
        mounted() {
            this.loadAllEvents();
        },
        methods:{


            async loadAllEvents() {
                try {
                const response = await assets_service.getPopularEvents();
                this.list_featuredEvents = response.data;

                // ✅ Wait for DOM update, then init Swiper
                this.$nextTick(() => {
                    new Swiper('.coverflow-swiper', {
                    effect: 'coverflow',
                    grabCursor: true,
                    centeredSlides: true,
                    loop: true,
                    slidesPerView: 'auto',
                    coverflowEffect: {
                        rotate: 0,
                        stretch: 0,
                        depth: 150,
                        modifier: 2,
                        slideShadows: true,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    }
                    });
                });

                } catch (error) {
                console.error("API Error:", error);
                }
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



        <div class="swiper coverflow-swiper">
            <div class="swiper-wrapper">
            <div class="swiper-slide" v-for="(event, index) in list_featuredEvents" :key="index">
                <img :src="'/storage/images/' + event.first_photo" alt="event" />
            </div>
            </div>

            <div class="swiper-pagination"></div>
        </div>

</template>


<style scoped>

carousl.css
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

</style>



<script>
    import * as assets_service from '../../../../services/assets_service.js';



    export default {
        data(){
            return {
                list_featuredEvents: [],
            }
        },
        mounted(){
            this.loadAllEvents();
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
        },
        methods:{

            // async loadAllEvents() {
            //     try {
            //         const response = await assets_service.getFeaturedEvents();
            //         this.list_featuredEvents = response.data; // Store the 3 event results
            //         console.log(this.list_featuredEvents);
            //             this.$nextTick(() => {
            //                 this.reinitializeSlider(); // Fix slider after reload
            //             });

            //     } catch (error) {
            //         console.error("API Error:", error);
            //     }
            // },

            async loadAllEvents() {
                try {
                    const response = await assets_service.getFeaturedEvents();
                    this.list_featuredEvents = response.data;

                    this.$nextTick(() => {
                        new Swiper('.coverflow-swiper', {
                        effect: 'coverflow',
                        grabCursor: false,
                        centeredSlides: true,
                        loop: true,
                        slidesPerView: 3, // 👈 Show exactly 5
                        spaceBetween: 0,  // 👈 Reduce spacing if needed
                        coverflowEffect: {
                            rotate: 10,
                            stretch: 0,
                            depth: 100,
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
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    dots: true,
                    arrows: false,
                    infinite: true
                });
            }
        }
    }
</script>

<template>



    <section class="coverflow-carousel">
        <div class="swiper coverflow-swiper">
            <div class="swiper-wrapper">
            <div class="swiper-slide" v-for="(event, index) in list_featuredEvents" :key="index">
                <img :src="'/storage/images/' + event.photo" alt="event" />
            </div>
            </div>

            <!-- Navigation Arrows -->
            <!-- <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> -->

            <!-- Pagination Dots -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

</template>


<style scoped>

</style>

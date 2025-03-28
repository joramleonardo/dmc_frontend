

<script>
    import * as assets_service from '../../../../services/assets_service.js';


    export default {
        data(){
            return {
                popularEvents: []
            }
        },
        mounted(){
            this.loadPopularEvents();
        },
        methods:{
            formatDate(dateString) {
                if (!dateString) return ""; // Handle empty values

                const options = { day: '2-digit', month: 'long', year: 'numeric' };
                return new Intl.DateTimeFormat('en-GB', options).format(new Date(dateString));
            },
            async loadPopularEvents() {
                try {
                    const response = await assets_service.getPopularEvents();
                    this.popularEvents = response.data;
                    console.log("popular events");
                    console.log(this.popularEvents);


                } catch (error) {
                    console.error("API Error:", error);
                }
            },
        }
    }
</script>


<template>
    <aside class="single_sidebar_widget popular_post_widget">
        <h3 class="widget_title">Popular Events</h3>

        <div class="media post_item" v-for="(popular, index) in popularEvents" :key="index">
            <img :src="'/storage/images/' + popular.first_photo" alt="post">
            <div class="media-body">
                <router-link v-bind:to="{name : 'single-event', params: { id: popular.album_id}}" >
                    <h3>{{ popular.event_title }}</h3>
                </router-link>
                <p>{{ formatDate(popular.event_date) }}</p>
            </div>
        </div>

    </aside>
</template>

<style lang="css" scoped>

    .media.post_item img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 15px;
    }

</style>

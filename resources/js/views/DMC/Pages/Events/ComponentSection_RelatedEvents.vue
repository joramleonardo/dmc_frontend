<template>
    <aside class="single_sidebar_widget popular_post_widget">
        <h3 class="widget_title">Related Events</h3>

        <div class="media post_item down-content" v-for="(popular, index) in relatedEvents" :key="index">
            <div class="image-div">
                <img :src="'/storage/images/' + popular.thumbnail" alt="post">
            </div>
            <div class="title-div">
                <router-link v-bind:to="{name : 'single-event', params: { id: popular.album_id}}" >
                    <h3>{{ popular.event_title }}</h3>
                </router-link>
            </div>
        </div>


        <!-- <ul class="list">
            <li v-for="(event, index) in relatedEvents" :key="index">
                <router-link :to="{ name: 'single-event', params: { id: event.album_id } }">
                    <img :src="'/storage/images/' + event.thumbnail" alt="" class="img-thumbnail mb-1" />
                    {{ event.event_title }}
                </router-link>
            </li>
        </ul> -->
    </aside>
</template>

<script>
    import { getRelatedEvents } from '../../../../services/assets_service.js';

    export default {
        props: ['albumId'],
        data() {
            return {
                relatedEvents: []
            };
        },
        mounted() {
            this.loadRelatedEvents();
        },
        methods: {
            async loadRelatedEvents() {
                try {
                    const res = await getRelatedEvents(this.albumId);
                    this.relatedEvents = res.data;
                } catch (e) {
                    console.error('Failed to fetch related events', e);
                }
            }
        }
    };
</script>

<style scoped>

    .down-content{
        background-color: #fff;
        padding: 30px;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    .down-content .image-div{
        float: left;
        text-align: center;
        display: inline-block;
        margin-right: 20px;
    }

    .down-content .title-div h3{
        margin-left: 50px;
        color: #1f272b;
        font-size: 14px;
    }

    .img-thumbnail {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
    }

    .media.post_item img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 15px;
    }

    .media-body h3{
        margin-left: 90px;
        color: #1f272b;
        font-size: 14px;
    }


</style>

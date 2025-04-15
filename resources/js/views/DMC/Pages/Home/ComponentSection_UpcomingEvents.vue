<template>
    <div class="col-lg-4">
        <div class="most-recent-area">
            <div class="small-tittle mb-20">
                <h4>Upcoming Events</h4>
            </div>

            <div class="media post_item most-recent-single" v-for="(event, index) in events" :key="index">
                <img :src="'/storage/images/' + event.event_banner" alt="post">
                <div class="most-recent-capt">
                    <router-link v-bind:to="{name : 'upcoming-single-event', params: { id: event.id}}" >
                        <h4>{{ event.event_title }}</h4>
                    </router-link>
                    <p><strong>Date:</strong> {{ event.event_date }}</p>
                    <p><strong>Location:</strong> {{ event.event_location }}</p>
                    <p><strong>Organizing Agency:</strong> {{ event.event_organizing_agency }}</p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import { getUpcomingEvents } from '../../../../services/assets_service';

    export default {
        data() {
            return {
                events: []
            };
        },
        mounted() {
            this.loadUpcomingEvents();
        },
        methods: {
            async loadUpcomingEvents() {
                try {
                    const response = await getUpcomingEvents();
                    this.events = response.data;
                } catch (error) {
                    console.error("Failed to load upcoming events", error);
                }
            },
            formatDate(dateStr) {
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return new Date(dateStr).toLocaleDateString(undefined, options);
            }
        }
    };
</script>

<style scoped>
    .media.post_item img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 15px;
    }

</style>

<script>
    import Header from '../Layouts/Header.vue';
    import { getSingleUpcomingEvent  } from '../../../../services/assets_service'; // adjust path as needed

    export default {
        components: {
            Header,
        },
        data() {
            return {
                event: null,
            };
        },
        async mounted() {
            const id = this.$route.params.id;
            try {
                const response = await getSingleUpcomingEvent(id);
                this.event = response.data;
                console.log("Event loaded successfully", this.event);
            } catch (error) {
                console.error("Failed to load event", error);
            }
        },
        methods: {
            formatDate(dateStr) {
                const options = { year: 'numeric', month: 'long', day: 'numeric' };
                return new Date(dateStr).toLocaleDateString(undefined, options);
            }
        }
    };


</script>

<template>
    <div>
        <div class="sub-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-8">
                        <div class="left-content">

                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="right-icons">
                        <ul>
                            <li><a href="https://www.facebook.com/dost.stii"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.youtube.com/@DOSTSTIILibrary"><i class="fa fa-youtube-play"></i></a></li>
                            <li><a href="https://stii.dost.gov.ph/"><i class="fa fa-globe"></i></a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Header />

    <section class="heading-page header-text" id="top" v-if="event">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <h6>UPCOMING EVENT</h6>
                <h2>{{ event.event_title }}</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Details -->
    <section class="meetings-page" id="meetings" v-if="event">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="meeting-single-item">
                        <div class="thumb">
                        <div class="date">
                            <h6>{{ formatDate(event.event_date) }}</h6>
                        </div>
                        <img :src="`/storage/images/${event.event_banner}`" alt="Event Banner" class="event-banner" v-if="event.event_banner"/>
                        </div>

                        <div class="down-content">
                        <h4>{{ event.event_title }}</h4>
                        <p><strong>Location:</strong> {{ event.event_location }}</p>
                        <p><strong>Agency:</strong> {{ event.event_organizing_agency }}</p>
                        <p><strong>Duration:</strong> {{ event.event_duration }}</p>
                        <p><strong>VIP Attendees:</strong> {{ event.event_vip_attendees || 'None' }}</p>

                        <p class="description">
                            {{ event.event_description }}
                        </p>
                        </div>
                    </div>

                    <div class="main-button-red mt-4">
                        <router-link to="/upcoming-events">Back To Upcoming Events</router-link>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>
                Copyright...
            </p>
        </div>
    </section>

    </div>
</template>

<style scoped>
    .event-banner {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 8px; /* optional: soft rounded corners */
    }
</style>

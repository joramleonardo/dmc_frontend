


<script>
    import { getUpcomingEvents } from '../../../../services/assets_service';

    export default {
        data() {
            return {
                events: [],
            };
        },
        mounted() {
            this.loadUpcomingEvents();
        },
        computed: {
            nearestEvent() {
                return this.events.length > 0 ? this.events[0] : null;
            }
        },
        methods: {
            async loadUpcomingEvents() {
                try {
                    const response = await getUpcomingEvents();
                    this.events = response.data;
                    console.log("Upcoming events loaded successfully", this.events);
                    console.log(this.events.length);
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


<template>


    <div class="row">
        <div class="col-lg-12">
            <div class="section-heading">
                <h2>Upcoming Events</h2>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="item">
                <h3>{{ nearestEvent.event_title }}</h3>
                <p>{{ formatDate(nearestEvent.event_date) }}</p>
                <div class="main-button-red">
                    <img :src="`/storage/images/${nearestEvent.event_banner}`" alt="Nearest Upcoming Event Banner" class="nearest-event-image"/>
                </div>
            </div>
        </div>

        <div class="col-lg-6">


            <section class="accordion accordion--radio">
                <!-- <div class="tab" v-for="(event, index) in events" :key="event.id || index"> -->
                <div class="tab" v-for="(event, index) in events.filter((e, i) => i !== 0)" :key="event.id || index">
                    <input type="radio" name="accordion-2" :id="`rd${index + 1}`"/>
                    <label class="tab__label" :for="`rd${index + 1}`" >
                        {{ event.event_title }}
                    </label>
                    <div class="tab__content">
                        <p>{{ event.event_description }}</p>
                        <p class="content-date"><strong>Date:</strong> {{ formatDate(event.event_date) }}</p>

                        <div class="scroll-to-section">
                             <router-link :to="`/upcoming-single-event/${event.id}`" class="btn-small">
                                View Event Details
                            </router-link>
                        </div>

                    </div>
                </div>

                <div class="tab">
                    <input type="radio" name="accordion-2" id="rd-close" />
                    <label for="rd-close" class="tab__close">&times;</label>
                </div>
            </section>



        </div>
    </div>
</template>

<style scoped>

    .nearest-event h4 {
        font-size: 26px;
        text-transform: uppercase;
        font-weight: 800;
        color: #fff;
        letter-spacing: 1px;
    }

    .nearest-event-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 8px;
    }

        .btn-small {
            font-size: 0.85rem;
            padding: 4px 10px;
            background-color: #2563eb; /* Tailwind's blue-600 */
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .btn-small:hover {
            background-color: #1d4ed8; /* Tailwind's blue-700 */
        }

        section{
            background-color: #11253b;
        }
        /* Core styles/functionality */
        .tab {
            position: relative;
        }
        .tab input {
            position: absolute;
            opacity: 0;
            z-index: -1;
        }
        .tab__content {
            max-height: 0;
            overflow: hidden;
            transition: all 0.35s;
        }

        .tab__content p{
            color: white;
            font-weight: 200;
        }
        .content-date{
            font-style: italic;
            font-size: 11px;
        }
        .tab input:checked ~ .tab__content {
            max-height: 10rem;
        }

        /* Visual styles */
        .accordion {
            color: var(--theme);
            border: 1px solid;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .tab__label,
        .tab__close {
            display: flex;
            color: white;
            background: var(--theme);
            cursor: pointer;
            font-weight: 600;
        }
        .tab__label {
            justify-content: space-between;
            padding: 1rem;
        }
        .tab__label::after {
            content: "\276F";
            width: 1em;
            height: 1em;
            text-align: center;
            transform: rotate(90deg);
            transition: all 0.35s;
        }
        .tab input:checked + .tab__label::after {
            transform: rotate(270deg);
        }
        .tab__content p {
            margin: 0;
            padding: 1rem;
        }
        .tab__close {
            justify-content: flex-end;
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }
        .accordion--radio {
            --theme: var(--secondary);
        }

        /* Arrow animation */
        .tab input:not(:checked) + .tab__label:hover::after {
            animation: bounce .5s infinite;
        }
        @keyframes bounce {
            25% {
                transform: rotate(90deg) translate(.25rem);
            }
            75% {
                transform: rotate(90deg) translate(-.25rem);
            }
        }



</style>

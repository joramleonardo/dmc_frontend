


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


<template>


    <div class="row">
        <div class="col-lg-6 align-self-center">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Upcoming Events</h2>
                </div>
                <div class="col-lg-6">
                    <!-- <div class="row">
                        <div class="col-12">
                        <div class="count-area-content percentage">
                            <div class="count-digit">94</div>
                            <div class="count-title">Succesed Students</div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="count-area-content">
                            <div class="count-digit">126</div>
                            <div class="count-title">Current Teachers</div>
                        </div>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-6">
                    <!-- <div class="row">
                        <div class="col-12">
                        <div class="count-area-content new-students">
                            <div class="count-digit">2345</div>
                            <div class="count-title">New Students</div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="count-area-content">
                            <div class="count-digit">32</div>
                            <div class="count-title">Awards</div>
                        </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-lg-6">

        <section class="accordion accordion--radio">
            <div class="tab">
                <input type="radio" name="accordion-2" id="rd1">
                <label for="rd1" class="tab__label">Radio</label>
                <div class="tab__content">
                <p>If you want to have only one tab open, you can use <code>&lt;input type="checkbox"&gt;</code>.</p>
                </div>
            </div>
            <div class="tab">
                <input type="radio" name="accordion-2" id="rd2">
                <label for="rd2" class="tab__label">Open single</label>
                <div class="tab__content">
                <p>But if you wanna close the opened tab, you must add a "close" button somewhere, like the one below, that is just another styled radio input.</p>
                </div>
            </div>
            <div class="tab">
                <input type="radio" name="accordion-2" id="rd3">
                <label for="rd3" class="tab__close">Close open tab &times;</label>
            </div>
        </section>


        </div>
    </div>
</template>

<style scoped>

        section{
            background-color: #a12c2f;
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
        .tab input:checked ~ .tab__content {
            max-height: 10rem;
        }

        /* Visual styles */
        .accordion {
            color: var(--theme);
            border: 2px solid;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .tab__label,
        .tab__close {
        display: flex;
            color: white;
            background: var(--theme);
            cursor: pointer;
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

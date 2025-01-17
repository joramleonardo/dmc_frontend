<template>
    <div>
        
        <div id="_spinner">
            <div class="text-center mt-5">
                <b-spinner label="Busy"></b-spinner>
            </div>
        </div>
        <div id="_body" style="display: none">
            <div class="page-header d-print-none">
                <div class="tabler-container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                DOST Events
                            </h2>
                            <!-- <p>Browse and manage all event drafts, reviews, and published items here.</p> -->
                        </div>
                        <div class="col-auto ms-auto d-print-none">
                            <div class="d-flex">
                                <b-button size="sm" @click="addAlbumInfo()" class="mr-1" variant="primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                        Add Event
                                </b-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="tabler-container-xl">
                    <div class="row row-cards">
                        <div class="col-lg-12">
                            <div >
                                <b-tabs card>
                                    <b-tab active>
                                        <template #title>
                                            All 
                                            <span v-if="totalRows_allEvents != 0">
                                                <b-badge variant="primary">{{totalRows_allEvents}}</b-badge>
                                            </span>
                                            <span v-else>
                                                <b-badge variant="secondary">0</b-badge>
                                            </span>
                                        </template>
                                        <div class="row row-cards" v-if="totalRows_allEvents == 0">
                                            <div class="col-sm-6 col-lg-4" >
                                                <div class="row row-cards">
                                                    <div class="h3 m-0">
                                                        NO DATA AVAILAVLE 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cards" v-else>
                                            <div class="col-sm-6 col-lg-4 event-container" v-for="(event, index) in list_allEvents" :key="index">
                                                <router-link v-bind:to="{name : 'album', params: { id: event.album_id}}" style="text-decoration: none;">
                                                    <div class="card card-sm event-card">
                                                        <a class="d-block" v-if="event.first_photo_fileName === null">
                                                            <img src="images/no_img.jpg" class="card-img-top">
                                                        </a>
                                                        <a class="d-block" v-else>
                                                            <img :src="`/storage/images/${event.first_photo_fileName}`" class="card-img-top">
                                                        </a>
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <div style="font-size: 12px; font-weight: 600;">
                                                                    <div class="event-title">{{event.event_title}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div style="margin-top: 1%;">
                                                                    <div v-if="event.album_status === 'Saved as Draft' ">
                                                                        <span class="badge bg-cyan text-cyan-fg status">Draft</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Submitted for Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Submitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Under Review' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Comment' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Revision' ">
                                                                        <span class="badge bg-red text-red-fg">Needs Revision</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Revision For Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Resubmitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Unpublished' ">
                                                                        <span class="badge bg-yellow text-yellow-fg">Unpublished</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Published' ">
                                                                        <span class="badge bg-green text-green-fg">Published</span>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="ms-auto">
                                                                    <a class="text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                                                                        467
                                                                    </a>
                                                                    <a class="ms-3 text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /></svg>
                                                                        67
                                                                    </a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>                           
                                                </router-link>
                                            </div>
                                        </div>
                                    </b-tab>
                                    <b-tab>
                                        <template #title>
                                            Drafts 
                                            <span v-if="totalRows_draft != 0">
                                                <b-badge variant="danger">{{totalRows_draft}}</b-badge>
                                            </span>
                                            <span v-else>
                                                <b-badge variant="secondary">0</b-badge>
                                            </span>
                                        </template>
                                        <div class="row row-cards" v-if="totalRows_draft == 0">
                                                <div class="col-sm-6 col-lg-4" >
                                                    <div class="row row-cards">
                                                        <div class="h3 m-0">
                                                            NO DATA AVAILAVLE 
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row row-cards" v-else>
                                            <div class="col-sm-6 col-lg-4" v-for="(event, index) in list_draft" :key="index">
                                                <router-link v-bind:to="{name : 'album', params: { id: event.album_id}}" style="text-decoration: none;">
                                                    <div class="card card-sm event-card">
                                                        <a class="d-block" v-if="event.first_photo_fileName === null">
                                                            <img src="images/no_img.jpg" class="card-img-top">
                                                        </a>
                                                        <a class="d-block" v-else>
                                                            <img :src="`/storage/images/${event.first_photo_fileName}`" class="card-img-top">
                                                        </a>
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <div style="font-size: 12px; font-weight: 600;">
                                                                    <div>{{event.event_title}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div style="margin-top: 1%;">
                                                                    <div v-if="event.album_status === 'Saved as Draft' ">
                                                                        <span class="badge bg-cyan text-cyan-fg">Draft</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Submitted for Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Submitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Under Review' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Comment' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Revision' ">
                                                                        <span class="badge bg-red text-red-fg">Needs Revision</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Revision For Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Resubmitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Unpublished' ">
                                                                        <span class="badge bg-yellow text-yellow-fg">Unpublished</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Published' ">
                                                                        <span class="badge bg-green text-green-fg">Published</span>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="ms-auto">
                                                                    <a class="text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                                                                        467
                                                                    </a>
                                                                    <a class="ms-3 text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /></svg>
                                                                        67
                                                                    </a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>                           
                                                </router-link>
                                            </div>
                                        </div>
                                    </b-tab>
                                    <b-tab >
                                        <template #title>
                                            Submitted for Review 
                                            <span v-if="totalRows_forReview != 0">
                                                <b-badge variant="danger">{{totalRows_forReview}}</b-badge>
                                            </span>
                                            <span v-else>
                                                <b-badge variant="secondary">0</b-badge>
                                            </span>
                                        </template>
                                        <div class="row row-cards" v-if="totalRows_forReview == 0">
                                                <div class="col-sm-6 col-lg-4" >
                                                    <div class="row row-cards">
                                                        <div class="h3 m-0">
                                                            NO DATA AVAILAVLE 
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row row-cards" v-else>
                                            <div class="col-sm-6 col-lg-4" v-for="(event, index) in list_forReview" :key="index">
                                                <router-link v-bind:to="{name : 'album', params: { id: event.album_id}}" style="text-decoration: none;">
                                                    <div class="card card-sm event-card">
                                                        <a class="d-block" v-if="event.first_photo_fileName === null">
                                                            <img src="images/no_img.jpg" class="card-img-top">
                                                        </a>
                                                        <a class="d-block" v-else>
                                                            <img :src="`/storage/images/${event.first_photo_fileName}`" class="card-img-top">
                                                        </a>
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <div style="font-size: 12px; font-weight: 600;">
                                                                    <div>{{event.event_title}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div style="margin-top: 1%;">
                                                                    <div v-if="event.album_status === 'Saved as Draft' ">
                                                                        <span class="badge bg-cyan text-cyan-fg">Draft</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Submitted for Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Submitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Under Review' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Comment' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Revision' ">
                                                                        <span class="badge bg-red text-red-fg">Needs Revision</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Revision For Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Resubmitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Unpublished' ">
                                                                        <span class="badge bg-yellow text-yellow-fg">Unpublished</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Published' ">
                                                                        <span class="badge bg-green text-green-fg">Published</span>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="ms-auto">
                                                                    <a class="text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                                                                        467
                                                                    </a>
                                                                    <a class="ms-3 text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /></svg>
                                                                        67
                                                                    </a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>                           
                                                </router-link>
                                            </div>
                                        </div>
                                    </b-tab>
                                    <b-tab >
                                        <template #title>
                                            To Be Revised 
                                            <span v-if="totalRows_forRevision != 0">
                                                <b-badge variant="danger">{{totalRows_forRevision}}</b-badge>
                                            </span>
                                            <span v-else>
                                                <b-badge variant="secondary">0</b-badge>
                                            </span>
                                        </template>
                                        <div class="row row-cards" v-if="totalRows_forRevision == 0">
                                                <div class="col-sm-6 col-lg-4" >
                                                    <div class="row row-cards">
                                                        <div class="h3 m-0">
                                                            NO DATA AVAILAVLE 
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row row-cards" v-else>
                                            <div class="col-sm-6 col-lg-4" v-for="(event, index) in list_forRevision" :key="index">
                                                <router-link v-bind:to="{name : 'album', params: { id: event.album_id}}" style="text-decoration: none;">
                                                    <div class="card card-sm event-card">
                                                        <a class="d-block" v-if="event.first_photo_fileName === null">
                                                            <img src="images/no_img.jpg" class="card-img-top">
                                                        </a>
                                                        <a class="d-block" v-else>
                                                            <img :src="`/storage/images/${event.first_photo_fileName}`" class="card-img-top">
                                                        </a>
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <div style="font-size: 12px; font-weight: 600;">
                                                                    <div>{{event.event_title}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div style="margin-top: 1%;">
                                                                    <div v-if="event.album_status === 'Saved as Draft' ">
                                                                        <span class="badge bg-cyan text-cyan-fg">Draft</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Submitted for Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Submitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Under Review' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Comment' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Revision' ">
                                                                        <span class="badge bg-red text-red-fg">Needs Revision</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Revision For Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Resubmitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Unpublished' ">
                                                                        <span class="badge bg-yellow text-yellow-fg">Unpublished</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Published' ">
                                                                        <span class="badge bg-green text-green-fg">Published</span>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="ms-auto">
                                                                    <a class="text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                                                                        467
                                                                    </a>
                                                                    <a class="ms-3 text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /></svg>
                                                                        67
                                                                    </a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>                           
                                                </router-link>
                                            </div>
                                        </div>
                                    </b-tab>
                                    <b-tab >
                                        <template #title>
                                            Unpublished 
                                            <span v-if="totalRows_unpublished != 0">
                                                <b-badge variant="warning">{{totalRows_unpublished}}</b-badge>
                                            </span>
                                            <span v-else>
                                                <b-badge variant="secondary">0</b-badge>
                                            </span>
                                        </template>
                                        <div class="row row-cards" v-if="totalRows_unpublished == 0">
                                            <div class="col-sm-6 col-lg-4" >
                                                <div class="row row-cards">
                                                    <div class="h3 m-0">
                                                        NO DATA AVAILAVLE 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cards" v-else>
                                            <div class="col-sm-6 col-lg-4" v-for="(event, index) in list_unpublished" :key="index">
                                                <router-link v-bind:to="{name : 'album', params: { id: event.album_id}}" style="text-decoration: none;">
                                                    <div class="card card-sm event-card">
                                                        <a class="d-block" v-if="event.first_photo_fileName === null">
                                                            <img src="images/no_img.jpg" class="card-img-top">
                                                        </a>
                                                        <a class="d-block" v-else>
                                                            <img :src="`/storage/images/${event.first_photo_fileName}`" class="card-img-top">
                                                        </a>
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <div style="font-size: 12px; font-weight: 600;">
                                                                    <div>{{event.event_title}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div style="margin-top: 1%;">
                                                                    <div v-if="event.album_status === 'Saved as Draft' ">
                                                                        <span class="badge bg-cyan text-cyan-fg">Draft</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Submitted for Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Submitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Under Review' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Comment' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Revision' ">
                                                                        <span class="badge bg-red text-red-fg">Needs Revision</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Revision For Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Resubmitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Unpublished' ">
                                                                        <span class="badge bg-yellow text-yellow-fg">Unpublished</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Published' ">
                                                                        <span class="badge bg-green text-green-fg">Published</span>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="ms-auto">
                                                                    <a class="text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                                                                        467
                                                                    </a>
                                                                    <a class="ms-3 text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /></svg>
                                                                        67
                                                                    </a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>                           
                                                </router-link>
                                            </div>
                                        </div>
                                    </b-tab>
                                    <b-tab >
                                        <template #title>
                                            Published 
                                            <span v-if="totalRows_published != 0">
                                                <b-badge variant="success">{{totalRows_published}}</b-badge>
                                            </span>
                                            <span v-else>
                                                <b-badge variant="secondary">0</b-badge>
                                            </span>
                                            
                                        </template>
                                        <div class="row row-cards" v-if="totalRows_published == 0">
                                            <div class="col-sm-6 col-lg-4" >
                                                <div class="row row-cards">
                                                    <div class="h3 m-0">
                                                        NO DATA AVAILAVLE 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cards" v-else>
                                            <div class="col-sm-6 col-lg-4" v-for="(event, index) in list_published" :key="index">
                                                <router-link v-bind:to="{name : 'album', params: { id: event.album_id}}" style="text-decoration: none;">
                                                    <div class="card card-sm event-card">
                                                        <a class="d-block" v-if="event.first_photo_fileName === null">
                                                            <img src="images/no_img.jpg" class="card-img-top">
                                                        </a>
                                                        <a class="d-block" v-else>
                                                            <img :src="`/storage/images/${event.first_photo_fileName}`" class="card-img-top">
                                                        </a>
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <div style="font-size: 12px; font-weight: 600;">
                                                                    <div>{{event.event_title}}</div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div style="margin-top: 1%;">
                                                                    <div v-if="event.album_status === 'Saved as Draft' ">
                                                                        <span class="badge bg-cyan text-cyan-fg">Draft</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Submitted for Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Submitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Under Review' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Comment' ">
                                                                        <span class="badge bg-purple text-purple-fg">Under Review</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'For Revision' ">
                                                                        <span class="badge bg-red text-red-fg">Needs Revision</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Revision For Review' ">
                                                                        <span class="badge bg-orange text-orange-fg">Resubmitted to Publisher</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Unpublished' ">
                                                                        <span class="badge bg-yellow text-yellow-fg">Unpublished</span>
                                                                    </div>
                                                                    <div v-if="event.album_status === 'Published' ">
                                                                        <span class="badge bg-green text-green-fg">Published</span>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="ms-auto">
                                                                    <a class="text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                                                                        467
                                                                    </a>
                                                                    <a class="ms-3 text-secondary">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /></svg>
                                                                        67
                                                                    </a>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>                           
                                                </router-link>
                                            </div>
                                        </div>
                                    </b-tab>
                                </b-tabs>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <b-modal id="modal_addAlbumInfo" ref="modal_addAlbumInfo"  title="Event Information" size="xl" centered hide-footer>
            <div class="card" id="createEventForm" >
                <div class="card-header">
                    <h3 class="card-title">EVENT INFORMATION</h3>
                </div>
                <div class="card-body">
                    <div class="row row-cards">
                        <div class="col-md-8">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Title:</label>
                            <b-form-input v-model="ticketData.eventTitle" placeholder="Enter Title..." required></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Category:</label>
                                <div class="col">
                                    <b-form-select v-model="selected_category_album" :options="options_category_album"></b-form-select>
                                    <!-- <select class="form-select" v-model="selected_category_album" required>
                                        <option selected disabled>Please select category</option>
                                        <option value="1">Anniversary</option>
                                        <option value="2">Awarding Ceremonies</option>
                                        <option value="3">Building Inauguration</option>
                                        <option value="4">Conference</option>
                                        <option value="5">Convention</option>
                                        <option value="6">Exhibits</option>
                                        <option value="7">Forum</option>
                                        <option value="8">MOA Signing</option>
                                        <option value="9">MOU Signing</option>
                                        <option value="10">NSTW</option>
                                        <option value="11">NYSTIF</option>
                                        <option value="12">Program Launch</option>
                                        <option value="13">Project Launch</option>
                                        <option value="14">Project Visit</option>
                                        <option value="15">RSTW</option>
                                        <option value="16">Scholarship</option>
                                        <option value="17">Scientific Meeting</option>
                                        <option value="18">Training/Seminar</option>
                                        <option value="19">Others...</option>
                                    </select> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 mb-0">
                            <label class="form-label"><span style="color: red;">* </span>Short Description:</label>
                            <textarea class="form-control" v-model="ticketData.eventDescription" rows="2" placeholder="Short description here.." required></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Date:</label>
                            <b-form-datepicker required id="eventDate" v-model="ticketData.eventDate" class="mb-2"></b-form-datepicker>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Venue:</label>
                            <b-form-input required id="input-2" v-model="ticketData.eventVenue" placeholder="Enter Venue..."   ></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><span style="color: red;">* </span>Sector:</label>
                                <b-form-select v-model="selected_sector" :options="options_sector"></b-form-select>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><span style="color: red;">* </span>Organizing Agency/Office:</label>
                                <b-form-input v-model="ticketData.selected_agency" placeholder="Enter Organizing Agency/Office..." required></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-12" style="color: black !important">
                            <div class="mb-3" style="color: black !important">
                                <label class="form-label"><span style="color: red;">* </span>Tags:</label>
                                <b-form-tags required input-id="tags-basic" name="tags" v-model="ticketData.eventTags" placeholder="Add new tags separated by enter key..."></b-form-tags>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <b-button variant="warning" value="1" @click="saveEvent()">Save as Draft</b-button>
                </div>
            </div>
        </b-modal>


    </div>
</template>


<script type="text/javascript">
    
        import * as assets_service from '../../../services/assets_service.js';
        import * as auth_service from '../../../services/auth_service.js';

        export default {
            data() {
                return {
                    displayName: '',
                    buttonValue: '',
                    albumStatus:'',
                    eventTrackingStatus: '',
                    headerBG_requiredfields: 'danger',
                    headerText_requiredfields: 'light',
                    headerBG_ConfirmCreateAlbum: 'info',
                    headerText_ConfirmCreateAlbum: 'light',
                    headerBG_savedSuccessfully: 'success',
                    headerText_savedSuccessfully: 'light',
                    tabIndex: 0,
                    tabIndex_photo: 0,
                    photoData: [],
                    photo_tabs: [
                        {
                            photo_fileName: null,
                            photo_personInvolved: '',
                            photo_title: '',
                            photo_category: '',
                            photo_description: '',
                            photo_photographer: ''
                        }
                    ],
                    vidClip_tabs: [
                        {
                            video_link: null,
                            video_title: '',
                            video_personInvolved: '',
                            video_category: '',
                            video_duration: '',
                            video_type: '',
                            video_description: '',
                            video_videographer:''
                        }
                    ],
                    photo_tabCounter: 1,
                    vidClip_tabCounter: 1,
                    album_id: 1,
                    photo_id: 1,
                    video_id: 1,
                    value: ['Secretaries', 'tag1', 'tag2'],
                    form: {
                        email: '',
                        name: '',
                        food: null,
                        checked: []
                    },
                    selected_category_album: 'Please select category',
                    options_category_album: [
                        { value: null, text: 'Please select category', disabled: true},
                        { value: 'Anniversary', text: 'Anniversary' },
                        { value: 'Awarding Ceremonies', text: 'Awarding Ceremonies' },
                        { value: 'Building Inauguration', text: 'Building Inauguration' },
                        { value: 'Conference', text: 'Conference' },
                        { value: 'Convention', text: 'Convention' },
                        { value: 'Exhibits', text: 'Exhibits' },
                        { value: 'Forum', text: 'Forum' },
                        { value: 'MOA Signing', text: 'MOA Signing' },
                        { value: 'MOU Signing', text: 'MOU Signing' },
                        { value: 'NSTW', text: 'NSTW' },
                        { value: 'NYSTIF', text: 'NYSTIF' },
                        { value: 'Program Launch', text: 'Program Launch' },
                        { value: 'Prject Launch', text: 'Prject Launch' },
                        { value: 'Project Visit', text: 'Project Visit' },
                        { value: 'RSTW', text: 'RSTW' },
                        { value: 'Scholarship', text: 'Scholarship' },
                        { value: 'Scientific Meeting', text: 'Scientific Meeting' },
                        { value: 'Training/Seminar', text: 'Training/Seminar' },
                        { value: 'Others', text: 'Others...' }
                    ],
                    selected_sector: 'Please select sector',
                    options_sector: [
                        { value: null, text: 'Please select sector', disabled: true},
                        { value: 'Collegial and Scientific Bodies', text: 'Collegial and Scientific Bodies' },
                        { value: 'Regional Offices and S&T Provincial Centers', text: 'Regional Offices and S&T Provincial Centers' },
                        { value: 'Research and Development Institutes', text: 'Research and Development Institutes' },
                        { value: 'Scientific and Technological Services', text: 'Scientific and Technological Services' },
                        { value: 'Sectoral Planning Councils', text: 'Sectoral Planning Councils' },
                        { value: 'Others', text: 'Others...' }
                    ],
                    selected_allAgency: null,
                    options_allAgency: [
                        { value: null, text: 'Please select organizing agency/office', disabled: true},
                        { value: '1', text: 'Food and Nutrition Research Institute' },
                        { value: '2', text: 'Forest Product Research and Industries Development Commission' },
                        { value: '3', text: 'Forest Products Research and Development Institute' },
                        { value: '4', text: 'Gender and Development and Regional Support Service' },
                        { value: '5', text: 'Industrial Technology Development Institute ' },
                        { value: '6', text: 'Metals Industry Research and Development Center' },
                        { value: '7', text: 'National Academy of Science and Technology' },
                        { value: '8', text: 'National Research Council of the Philippines' },
                        { value: '9', text: 'Office of the Secretary' },
                        { value: '10', text: 'Office of the Undersecretary for Regional Operations' },
                        { value: '11', text: 'Office of the Undersecretary for Research and Development' },
                        { value: '12', text: 'Office of the Undersecretary for Scientific and Technical Services' },
                        { value: '13', text: 'Office of the Undersecretary for Special Concerns' },
                        { value: '14', text: 'Philippine Atmospheric, Geophysical and Astronomical Services Administration' },
                        { value: '15', text: 'Philippine Council for Agriculture and Resources and Research Development' },
                        { value: '16', text: 'Others...' }
                    ],
                    selected_agency: null,
                    options_agency: [
                        { value: null, text: 'Please select organizing agency/office', disabled: true},
                        { value: '1', text: 'Attached Agencies' },
                        { value: '2', text: 'Regional Offices' },
                        { value: '3', text: 'Provincial S&T Centers (PSTCs)' },
                        { value: '4', text: 'Others...' }
                    ],
                    show: true,
                    ticketData:{
                        status:'',
                        reference_code:''
                    },
                    list_allEvents: [],
                    list_draft: [],
                    list_forRevision: [],
                    list_forReview: [],
                    list_published: [],
                    list_unpublished: [],
                    totalRows_allEvents: '',
                    totalRows_draft: '',
                    totalRows_forRevision: '',
                    totalRows_forReview: '',
                    totalRows_published: '',
                    totalRows_unpublished: '',
                    id_albumPhoto: '',
                    id_albumVideo: '',
                    total_albumPhotos:'',
                    total_albumVideos: '',
                    finalTime: '',
                    finalDate: '',
                    finalDateTime: '',
                    list_photo: '',
                    photo_length: '',
                    thumbnail: [],
                    albumID: '',
                }
            },
            async mounted(){
                await this.userData();
                this.loadAllEvents();
                this.loadDraftList();
                this.loadForReviewList();
                this.loadForRevisionList();
                this.loadPublishedList();
                this.loadUnpublishedList();

                this.createDate();
            },
            methods: {
                userData: async function(){
                    try{
                        const response = await auth_service.getUserData();
                        this.displayName=response.data.user.name;
                    } catch(error) {
                        this.flashMessage.error({
                        message: 'Some error occured! Please try again.',
                        time: 5000
                        });
                    }
                },
                loadingPage: async function(){
                    document.getElementById("_spinner").style.display = "none";
                    document.getElementById("_body").style.display = "block";
                },
                loadAllEvents: async function() {
                    try{
                        const response_allEvents = await assets_service.getAllListEvents(this.displayName);
                        this.list_allEvents = response_allEvents.data;
                        this.totalRows_allEvents = this.list_allEvents.length;
                        
                    } catch(error) {
                        this.flashMessage.error({
                        message: 'Some error occured! Please try again.',
                        time: 5000
                        });
                    }
                    this.getEventIds();
                },
                loadDraftList: async function() {
                    try{
                        const response = await assets_service.getAllListDraft(this.displayName);
                        this.list_draft = response.data;
                        this.totalRows_draft = this.list_draft.length;
                    } catch(error) {
                        this.flashMessage.error({
                        message: 'Some error occured! Please try again.',
                        time: 5000
                        });
                    }
                },
                loadForRevisionList: async function() {
                    try{
                        const response = await assets_service.getAllListForRevision(this.displayName);
                        this.list_forRevision = response.data;
                        this.totalRows_forRevision= this.list_forRevision.length;
                    } catch(error) {
                        this.flashMessage.error({
                        message: 'Some error occured! Please try again.',
                        time: 5000
                        });
                    }
                },
                loadForReviewList: async function() {
                    try{
                        const response = await assets_service.getAllListForReview(this.displayName);
                        this.list_forReview = response.data;
                        this.totalRows_forReview= this.list_forReview.length;
                    } catch(error) {
                        this.flashMessage.error({
                        message: 'Some error occured! Please try again.',
                        time: 5000
                        });
                    }
                },
                loadPublishedList: async function() {
                    try{
                        const response = await assets_service.getAllListPublished(this.displayName);
                        this.list_published = response.data;
                        this.totalRows_published= this.list_published.length;
                    } catch(error) {
                        this.flashMessage.error({
                        message: 'Some error occured! Please try again.',
                        time: 5000
                        });
                    }
                },
                loadUnpublishedList: async function() {
                    try{
                        const response = await assets_service.getAllListUnpublished(this.displayName);
                        this.list_unpublished = response.data;
                        this.totalRows_unpublished= this.list_unpublished.length;
                    } catch(error) {
                        this.flashMessage.error({
                        message: 'Some error occured! Please try again.',
                        time: 5000
                        });
                    }

                    this.loadingPage();
                },
                createDate(){
                    const date = new Date();
                    const months = [
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                        'July',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December'
                        ];
                    const monthIndex = date.getMonth()
                    const monthName = months[monthIndex]
                    let currentDay= String(date.getDate()).padStart(2, '0');
                    let currentMonth = String(date.getMonth()+1).padStart(2,"0");
                    let currentYear = date.getFullYear();
                    let getHours = date.getHours();
                    let getMinutes = date.getMinutes();
                    let getSeconds = date.getSeconds();
                    let newformat = getHours >= 12 ? 'PM' : 'AM';
                    getHours = getHours % 12;
                    getHours = getHours ? getHours : 12;
                    getMinutes = getMinutes < 10 ? '0' + getMinutes : getMinutes;
                    this.finalTime = getHours + ":" + getMinutes + ":" + getSeconds + " " + newformat;
                    this.finalDate = monthName + " " + currentDay + " " + currentYear;
                    this.finalDateTime = monthName + " " + currentDay + " " + currentYear + " " + getHours + ":" + getMinutes + " " + newformat;
                },
                saveEvent: async function() {

                    if (this.ticketData.eventTitle === undefined || 
                        this.selected_category_album === null  ||  
                        this.selected_sector === null  ||  
                        this.ticketData.eventDescription === undefined  ||  
                        this.ticketData.selected_agency === null  ||  
                        this.ticketData.eventDate === undefined  ||  
                        this.ticketData.eventVenue === undefined  ||  
                        this.ticketData.eventTags === undefined  ){

                            this.$toast.open({
                                message: 'Required Fields!',
                                type: 'error', // Options: 'success', 'info', 'error', 'default'
                                position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                                duration: 5000, 
                            });
                    }
                    else{
                        
                        // EVENT STATUS
                        this.albumStatus = "Saved as Draft";

                        // EVENT TRACKING STATUS
                        this.eventTrackingStatus = "Event Created";
                        
                        try{
                            // GENERATE EVENT ID
                            const const_1 = await assets_service.countAlbumEntry();
                            let totalAlbumEntry = const_1.data;
                            if (totalAlbumEntry == 0 ){
                                this.album_id = "ET" + "2024" + "-0001";
                            }
                            else if (totalAlbumEntry > 0 && totalAlbumEntry < 10){
                                let i = totalAlbumEntry + 1;
                                this.album_id = "ET" + "2024" + "-000" + i;
                            }
                            else if (totalAlbumEntry >= 10){
                                let i = totalAlbumEntry + 1;
                                this.album_id = "ET" + "2024" + "-00" + i;
                            }
                            
                            // CREATE EVENT
                            let formData_eventData = new FormData();
                                formData_eventData.append('album_id', this.album_id);
                                formData_eventData.append('event_title', this.ticketData.eventTitle);
                                formData_eventData.append('event_category', this.selected_category_album);
                                formData_eventData.append('event_sector', this.selected_sector);
                                formData_eventData.append('event_description', this.ticketData.eventDescription);
                                formData_eventData.append('event_organizingAgency', this.ticketData.selected_agency);
                                formData_eventData.append('event_date', this.ticketData.eventDate);
                                formData_eventData.append('event_venue', this.ticketData.eventVenue);
                                formData_eventData.append('event_tags', this.ticketData.eventTags);
                                formData_eventData.append('is_deleted', "0");
                            const response_eventData = await assets_service.addEventData(formData_eventData);

                            // SAVE EVENT TAGS
                            let tagList = [];
                            tagList = this.ticketData.eventTags;
                            for (let i = 0; i < tagList.length; i ++) {
                                let tagName = tagList.slice(i, i+1);
                                let formData_albumTags = new FormData();
                                    formData_albumTags.append('album_id', this.album_id);
                                    formData_albumTags.append('album_tagName', tagName);
                                const response_albumTags = await assets_service.addAlbumTags(formData_albumTags);
                            }

                            // CREATE EVENT TRACKING LOG
                            let formData_eventTrackingLog = new FormData();
                                formData_eventTrackingLog.append('album_id', this.album_id);
                                formData_eventTrackingLog.append('activity', this.eventTrackingStatus);
                                formData_eventTrackingLog.append('date', this.finalDateTime);
                            const response_eventTrackingLog = await assets_service.addTrackingLog(formData_eventTrackingLog);

                            // CREATE EVENT STATUS
                            let formData_albumStatus = new FormData();
                                formData_albumStatus.append('album_id', this.album_id);
                                formData_albumStatus.append('album_status', this.albumStatus);
                                formData_albumStatus.append('name_author', this.displayName);
                            const response_albumStatusData = await assets_service.addAlbumStatus_withAuthor(formData_albumStatus);


                        }catch (error) {
                            this.$toast.open({
                                message: 'An error occured!',
                                type: 'error', // Options: 'success', 'info', 'error', 'default'
                                position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                                duration: 5000, 
                            });
                        }

                        this.ticketData.eventTitle = '';
                        this.ticketData.eventDescription = '';
                        this.ticketData.eventDate = '';
                        this.ticketData.eventVenue = '';
                        this.ticketData.selected_agency = '';
                        this.selected_category_album = '';
                        this.selected_sector = '';
                        this.ticketData.eventTags = [];

                        this.$toast.open({
                            message: 'Event was created successfully!',
                            type: 'success', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                        
                        this.loadAllEvents();
                        this.loadDraftList();
                        this.$refs.modal_addAlbumInfo.hide();

                    }
                },
                addAlbumInfo() {
                    this.$refs['modal_addAlbumInfo'].show();
                },
            }
        }
</script>

<style>
    .event-title{
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin: 5px  ;
    }
    .status{
        font-size: 14px;
        font-weight: bold;
        padding: 5px;
        border-radius: 12px;
        display: inline-block;
        margin: 5px;
        text-transform: uppercase;
    }

    .event-card img {
        width: 100%;
        height: auto; 
        object-fit: cover;
    }

    .event-card {
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .event-card:hover {
        /* transform: translateY(-5px); */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>

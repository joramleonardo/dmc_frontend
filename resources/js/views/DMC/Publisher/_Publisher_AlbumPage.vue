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
                                <span style="color: gray;">Events > </span>{{data_eventInformation.event_title}}
                            </h2>
                            <div style="margin-top: 1%;">
                                <div v-if="currentAlbumStatus === 'Saved as Draft' ">
                                    <span class="badge bg-cyan text-cyan-fg">Draft</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'Submitted for Review' ">
                                    <span class="badge bg-orange text-orange-fg">Submitted for Review</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'Under Review' ">
                                    <span class="badge bg-purple text-purple-fg">Under Review</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'For Comment' ">
                                    <span class="badge bg-purple text-purple-fg">Under Review</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'For Revision' ">
                                    <span class="badge bg-red text-red-fg">Needs Revision</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'Revision For Review' ">
                                    <span class="badge bg-orange text-orange-fg">Revision Done</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'Unpublished' ">
                                    <span class="badge bg-yellow text-yellow-fg">Unpublished</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'Published' ">
                                    <span class="badge bg-green text-green-fg">Published</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto ms-auto d-print-none">
                            <div class="d-flex">
                                <div v-if="currentAlbumStatus === 'Saved as Draft' ">
                                    
                                </div>
                                <div v-if="currentAlbumStatus === 'Submitted for Review' ">
                                    <b-button @click="changeStatus(3)" class="mr-1" variant="danger" >
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-receipt-refund"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" /><path d="M15 14v-2a2 2 0 0 0 -2 -2h-4l2 -2m0 4l-2 -2" /></svg>
                                        Review
                                    </b-button>
                                </div>
                                <div v-if="currentAlbumStatus === 'Revision For Review' ">
                                    <b-button @click="changeStatus(3)" class="mr-1" variant="danger" >
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-receipt-refund"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" /><path d="M15 14v-2a2 2 0 0 0 -2 -2h-4l2 -2m0 4l-2 -2" /></svg>
                                        Review
                                    </b-button>
                                </div>
                                <div v-if="currentAlbumStatus === 'Under Review' ">
                                    <b-button @click="changeStatus(8)" class="mr-1" variant="danger" >
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        Revise
                                    </b-button>
                                    <b-button  @click="changeStatus(6)" class="mr-1" variant="success" >
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-dashed-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" /><path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" /><path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" /><path d="M8.56 20.31a9 9 0 0 0 3.44 .69" /><path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" /><path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" /><path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" /><path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" /><path d="M9 12l2 2l4 -4" /></svg>
                                        Accept
                                    </b-button>
                                </div>
                                <div v-if="currentAlbumStatus === 'For Comment' ">
                                    <b-button @click="changeStatus(4)" class="mr-1" variant="danger" >
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-receipt-refund"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" /><path d="M15 14v-2a2 2 0 0 0 -2 -2h-4l2 -2m0 4l-2 -2" /></svg>
                                        Return for Revision
                                    </b-button>
                                </div>
                                <div v-if="currentAlbumStatus === 'Unpublished' ">
                                    <b-button @click="changeStatus(7)" class="mr-1" variant="info" >
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                                        Publish this Event
                                    </b-button>
                                </div>
                                <div v-if="currentAlbumStatus === 'Published' ">
                                    <b-button @click="changeStatus(9)" class="mr-1" variant="warning" >
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" /><path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" /><path d="M3 3l18 18" /></svg>
                                        Unpublish this Event
                                    </b-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="tabler-container-xl">
                    <div class="row g-4">
                        <div class="col-md-4">

                            <div class="card event-cardd"  id="Event_Information">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    Event Information
                                    </h3>
                                    <div class="card-actions">
                                        <div v-if="currentAlbumStatus === 'For Comment' ">
                                            <b-button @click="leaveComment(data_eventInformation.album_id, 'EVENT DETAILS')" class="mr-1" variant="success" v-b-tooltip.hover title="Comment">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M12.01 18.594l-4.01 2.406v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v5.5" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                                            </b-button>
                                        </div>
                                        <div v-if="currentAlbumStatus === 'Saved as Draft' ">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-5 font-title-size">TITLE:</dt>
                                        <dd class="col-7 font-body-size">{{data_eventInformation.event_title}}</dd>

                                        <dt class="col-5 font-title-size">DESCRIPTION:</dt>
                                        <dd class="col-7 font-body-size">{{data_eventInformation.event_description}}</dd>

                                        <dt class="col-5 font-title-size">DATE:</dt>
                                        <dd class="col-7 font-body-size">{{data_eventInformation.event_date}}</dd>

                                        <dt class="col-5 font-title-size">VENUE:</dt>
                                        <dd class="col-7 font-body-size">{{data_eventInformation.event_venue}}</dd>

                                        <dt class="col-5 font-title-size">ORGANIZING AGENCY:</dt>
                                        <dd class="col-7 font-body-size">{{data_eventInformation.event_organizingAgency}}</dd>

                                        <dt class="col-5 font-title-size">CATEGORY:</dt>
                                        <dd class="col-7 font-body-size">{{data_eventInformation.event_category}}</dd>

                                        <dt class="col-5 font-title-size">SECTOR:</dt>
                                        <dd class="col-7 font-body-size">{{data_eventInformation.event_sector}}</dd>

                                        <dt class="col-5 font-title-size">TAGS:</dt>
                                        <dd class="col-7 font-body-size">
                                            <span v-for="(event, index) in album_tags" :key="index">
                                                <a class="badge badge-outline text-secondary fw-normal badge-pill">
                                                    {{event.album_tagName}}
                                                </a>
                                            </span>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            
                            <div v-if="currentAlbumStatus === 'For Comment' ">
                                <div v-if="noOfComment === 0">
                                    <div class="card event-cardd"  id="Comment Section"  style="margin-top: 15px">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Comment Logs
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            No Comments Yet
                                        </div>
                                    </div>
                                </div>
                                <div v-else>
                                    <div class="card event-cardd"  id="Comment Section"  style="margin-top: 15px">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Comment Logs
                                            </h3>
                                        </div>
                                        <div class="card-body" v-for="(event, index) in list_commentLog" :key="index">
                                            <span v-if="event.section_title === 'EVENT DETAILS'">
                                                <span style="font-weight: 700">{{event.section_title}}</span>
                                                <br>
                                                {{event.section_comment}}
                                            </span>
                                            <span v-if="event.section_title === 'PHOTO DETAILS'">
                                                <span style="font-weight: 700">{{event.section_title}}: </span> {{event.section_id}}
                                                <br>
                                                {{event.section_comment}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div v-if="currentAlbumStatus === 'For Revision' ">
                                <div v-if="noOfComment === 0">
                                    <div class="card event-cardd"  id="Comment Section"  style="margin-top: 15px">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Comment Logs
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            No Comments Yet
                                        </div>
                                    </div>
                                </div>
                                <div v-else>
                                    <div class="card event-cardd"  id="Comment Section"  style="margin-top: 15px">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Comment Logs
                                            </h3>
                                        </div>
                                        <div class="card-body" v-for="(event, index) in list_commentLog" :key="index">
                                            <span v-if="event.section_title === 'EVENT DETAILS'">
                                                <span style="font-weight: 700">{{event.section_title}}</span>
                                                <br>
                                                {{event.section_comment}}
                                            </span>
                                            <span v-if="event.section_title === 'PHOTO DETAILS'">
                                                <span style="font-weight: 700">{{event.section_title}}: </span> {{event.section_id}}
                                                <br>
                                                {{event.section_comment}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div v-if="currentAlbumStatus === 'Revision For Review' ">
                                <div v-if="noOfComment === 0">
                                    <div class="card event-cardd"  id="Comment Section"  style="margin-top: 15px">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Comment Logs
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            No Comments Yet
                                        </div>
                                    </div>
                                </div>
                                <div v-else>
                                    <div class="card event-cardd"  id="Comment Section"  style="margin-top: 15px">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Comment Logs
                                            </h3>
                                        </div>
                                        <div class="card-body" v-for="(event, index) in list_commentLog" :key="index">
                                            <span v-if="event.section_title === 'EVENT DETAILS'">
                                                <span style="font-weight: 700">{{event.section_title}}</span>
                                                <br>
                                                {{event.section_comment}}
                                            </span>
                                            <span v-if="event.section_title === 'PHOTO DETAILS'">
                                                <span style="font-weight: 700">{{event.section_title}}: </span> {{event.section_id}}
                                                <br>
                                                {{event.section_comment}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card event-cardd" id="Event_Tracking_Log" style="margin-top: 15px">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Event Tracking Log
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <pre style="color: white">
                                        <dl class="row" v-for="(list, index) in transformedTrackingLog" :key="index">
                                            <!-- Display the Author only once -->
                                            <template v-if="index === 0">
                                                <dt class="col-5">Author:</dt>
                                                <dd class="col-7">{{ list.name_author }}</dd>
                                            </template>

                                            <dt class="col-5">{{ list.activity }}:</dt>
                                            <dd class="col-7">{{ list.date }}</dd>

                                            <!-- Display the Publisher only once when "Under Review" is displayed for the first time -->
                                            <template v-if="list.activity === 'Under Review' && !firstUnderReviewShown">
                                                <dt class="col-5">Publisher:</dt>
                                                <dd class="col-7">{{ list.name_publisher }}</dd>
                                            </template>
                                        </dl>
                                    </pre>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card event-cardd">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                                    <li class="nav-item">
                                        <a href="#tabs-home-7" class="nav-link active" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg>
                                            Photos
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tabs-profile-7" class="nav-link" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /></svg>
                                            Videos
                                        </a>
                                    </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tabs-home-7">
                                            
                                            <div v-if="this.photo_length === 0">
                                                <div class="row row-cards">
                                                    <div class="h3 m-0">
                                                        NO PHOTO AVAILAVLE 
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-else>
                                                <div class="row row-cards">
                                                    <div class="col-4" v-for="(event, index) in list_photo" :key="index">
                                                        <div class="card event-cardd placeholder-glow">
                                                            <div class="card-header">
                                                                <h5 class="card-title photo-video-font-title-size">
                                                                    {{event.photo_id}}
                                                                </h5>
                                                            </div>
                                                            <a :href="`/storage/images/${event.photo_fileName}`" data-fslightbox="gallery" @click="initLightbox">
                                                                <div :style="{ backgroundImage: `url('/storage/images/${event.photo_fileName}')` }" class="img-responsive img-responsive-1x1 rounded border">
                                                                </div>
                                                            </a>
                                                            <div class="ribbon ribbon-top">
                                                                <div v-if="currentAlbumStatus === 'For Comment' ">
                                                                    <b-button @click="leaveComment(event.photo_id, 'PHOTO DETAILS')" class="mr-1" variant="success" v-b-tooltip.hover title="Comment">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M12.01 18.594l-4.01 2.406v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v5.5" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                                                                    </b-button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <dl class="row">
                                                                    <dt class="col-12 font-title-size">DESCRIPTION:</dt>
                                                                    <dd class="col-12 font-body-size">{{event.photo_description}}</dd>
                                                                    <dt class="col-12 font-title-size">PHOTOGRAPHER:</dt>
                                                                    <dd class="col-12 font-body-size">{{event.photo_photographer}}</dd>
                                                                    <dt class="col-12 font-title-size">CATEGORY:</dt>
                                                                    <dd class="col-12 font-body-size">{{event.photo_category}}</dd>
                                                                    <dt class="col-12 font-title-size">TAGS:</dt>
                                                                    <dd class="col-12 font-body-size">
                                                                        <span v-for="(tag, idx) in event.photo_tags.split(',')" :key="idx" class="tag-style">
                                                                            <a class="badge badge-outline text-secondary fw-normal badge-pill">
                                                                                {{tag}}
                                                                            </a>
                                                                        </span>
                                                                    </dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs-profile-7">
                                                <span v-if="this.video_length === 0">
                                                    <div class="row row-cards">
                                                        <div class="h3 m-0">
                                                            NO VIDEO AVAILAVLE 
                                                        </div>
                                                    </div>
                                                </span>
                                                <span v-else>
                                                    <div class="row row-cards">
                                                        <div class="col-6" v-for="(event, index) in list_video" :key="index">
                                                            <div class="card placeholder-glow">
                                                                <div class="card-header">
                                                                    <h5 class="card-title photo-video-font-title-size">
                                                                        {{event.video_id}}
                                                                    </h5>
                                                                </div>
                                                                <div class="ratio ratio-4x3 card-img-top">
                                                                    <iframe width="420" height="315"
                                                                        :src='`https://www.youtube.com/embed/`+`${event.video_youtubeID}`'>
                                                                        
                                                                    </iframe>
                                                                </div>
                                                                <div class="ribbon ribbon-top">
                                                                    <div v-if="currentAlbumStatus === 'For Comment' ">
                                                                        <b-button @click="leaveComment(event.id, 'VIDEO DETAILS')" class="mr-1" variant="success" v-b-tooltip.hover title="Comment">
                                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M12.01 18.594l-4.01 2.406v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v5.5" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                                                                        </b-button>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body">
                                                                    <dl class="row">
                                                                        <dt class="col-12 font-title-size">Title:</dt>
                                                                        <dd class="col-12">{{event.video_title}}</dd>
                                                                        <dt class="col-12 font-title-size">Description:</dt>
                                                                        <dd class="col-12">{{event.video_description}}</dd>
                                                                        <dt class="col-12 font-title-size">Videographer:</dt>
                                                                        <dd class="col-12">{{event.video_videographer}}</dd>
                                                                        <dt class="col-12 font-title-size">Category:</dt>
                                                                        <dd class="col-12">{{event.video_category}}</dd>
                                                                        <dt class="col-12 font-title-size">Duration:</dt>
                                                                        <dd class="col-12">{{event.video_duration}}</dd>
                                                                        <dt class="col-12 font-title-size">Video Type:</dt>
                                                                        <dd class="col-12">{{event.video_type}}</dd>
                                                                        <dt class="col-12 font-title-size">Tags:</dt>
                                                                        <dd class="col-12">
                                                                            <span v-for="(tag, idx) in event.video_tags.split(',')" :key="idx" class="tag-style">
                                                                                <a class="badge badge-outline text-secondary fw-normal badge-pill">
                                                                                    {{tag}}
                                                                                </a>
                                                                            </span>
                                                                        </dd>
                                                                    </dl>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>



        <b-modal id="modal_commentBox" ref="modal_commentBox"  :title='`${sectionTitle}`' size="xl" centered>
            <div>
                <b-form-group class="group" id="form_externalEventDate">
                    <b-form-textarea v-model="commentSection"  placeholder="Leave a comment here..." rows="5" max-rows="10" ></b-form-textarea>
                </b-form-group> 
            </div>

            <template #modal-footer>
                <b-button variant="warning" value="1" @click="submitComment()">Submit Comment</b-button>
            </template>
        </b-modal>


                            
    </div>
</template>

<script type="text/javascript">
        
        import * as assets_service from '../../../services/assets_service.js';
        import * as auth_service from '../../../services/auth_service.js';

        export default {
            data() {
                return {
                    event_id : this.$route.params.id,
                    albumID:[],
                    albumInfo:{},
                    data_eventInformation: [],
                    data_eventInformation_length: 0,
                    album_tags: [],
                    photo_tags: [],
                    video_tags: [],
                    data_eventInformation_update:{},
                    data_photoInformation_update:{},
                    data_videoInformation_update:{},
                    list_photo: [],
                    list_video: [],
                    photo_length: 0,
                    video_length: 0,
                    albumStatus: '',
                    currentAlbumStatus: '',
                    selected_category_album: null,
                    finalTime: '',
                    finalDate: '',
                    finalDateTime: '',
                    sectionID:'',
                    sectionTitle:'',
                    sectionComment: '',
                    noOfComment: '',
                    commentSection: '',
                    list_commentLog: [],
                    displayName: '',
                    trackingLog: [], // Initialize as an empty array
                    firstUnderReviewShown: false,
                }
            },
            mounted(){
                setTimeout(() => {
                    this.initializeFsLightbox();
                }, 2500); // Adjust delay if needed
                      
                this.userData();
                this.createDate();
                this.loadTrackingLog();
                this.loadEventDetails();
                this.loadAlbumStatus();
                this.loadEventPhotos();
                this.loadEventVideos();
                this.loadCountCommentEntry();
                this.loadCommentLog();
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
                initializeFsLightbox() {
                    if (typeof refreshFsLightbox === 'function') {
                        refreshFsLightbox();
                        console.log("FS Lightbox initialized automatically after delay");
                    } else {
                        console.error("FS Lightbox is not available; check CDN loading");
                    }
                },
                initLightbox() {
                    if (typeof refreshFsLightbox === 'function') {
                        refreshFsLightbox();
                        console.log("FS Lightbox initialized on click");
                    } else {
                        console.error("FS Lightbox is not available; check CDN loading");
                    }
                    },
                initializeLightbox() {
                    setTimeout(() => {
                    if (typeof refreshFsLightbox === 'function') {
                        refreshFsLightbox();
                        console.log("FS Lightbox initialized in this component");
                    } else {
                        console.error("FS Lightbox is not available; check CDN loading");
                    }
                    }, 1000); 
                },
                loadPage: async function(){
                    document.getElementById("_spinner").style.display = "none";
                    document.getElementById("_body").style.display = "block";
                },
                loadTrackingLog: async function (){
                    const response_trackingLog = await assets_service.getTrackingLog(this.event_id);
                    this.trackingLog = response_trackingLog.data;
                    console.log(this.trackingLog);
                },
                loadCommentLog: async function (){
                    const response_commentLog = await assets_service.getCommentLog(this.event_id);
                    this.list_commentLog = response_commentLog.data;
                    console.log("List of Comments");
                    console.log(this.list_commentLog);
                },
                loadAlbumStatus: async function (){
                    const response_statusAlbum = await assets_service.getAlbumStatus(this.event_id);
                    this.currentAlbumStatus = response_statusAlbum.data[0].album_status;
                },
                loadEventDetails: async function(data){

                    const response_eventDetails = await assets_service.getEventDetails(this.event_id);
                    this.data_eventInformation = response_eventDetails.data[0];
                    this.data_eventInformation_length = this.data_eventInformation.length;

                    const response = await assets_service.getAlbumTags_selected(this.event_id);
                    this.album_tags = response.data;

                    // const response_statusAlbum = await assets_service.getAlbumStatus(this.event_id);
                    // this.currentAlbumStatus = response_statusAlbum.data[0].album_status;
                },
                loadEventPhotos: async function(){
                    const response_eventDetails = await assets_service.getEventDetails(this.event_id);
                    this.data_eventInformation = response_eventDetails.data[0];

                    const response_photoList = await assets_service.getListPhoto_selected(this.event_id);
                    this.list_photo = response_photoList.data;
                    this.photo_length = this.list_photo.length;

                    const response = await assets_service.getPhotoTags_selected(this.list_photo[0].photo_id);
                    this.photo_tags = response.data;
                },
                loadEventVideos: async function(){
                    const response_eventDetails = await assets_service.getEventDetails(this.event_id);

                    const response_videoList = await assets_service.getListVideo_selected(this.event_id);
                    this.list_video = response_videoList.data;
                    this.video_length = this.list_video.length;

                    this.loadPage();
                },
                loadCountCommentEntry: async function (){

                    const response_countPhoto = await assets_service.countAlbumComment(this.event_id);
                    this.noOfComment = response_countPhoto.data;


                    console.log("No. of comments: " + this.noOfComment);
                },
                leaveComment: async function (value, section){
                    console.log(value);
                    console.log(section);
                    console.log(this.commentSection);

                    this.sectionID = value;
                    this.sectionTitle = section;
                    
                    this.$refs['modal_commentBox'].show();
                },
                submitComment: async function (){

                    this.sectionComment = this.commentSection;

                    console.log("Insert the data below in the database");
                    console.log("Album ID: " + this.event_id);
                    console.log("section_id: " + this.sectionID);
                    console.log("section_title: " + this.sectionTitle);
                    console.log("section_comment: " + this.sectionComment);

                    try{
                        // Add Comment
                        let formData_commentData = new FormData();
                        formData_commentData.append('album_id', this.event_id);
                        formData_commentData.append('section_id', this.sectionID);
                        formData_commentData.append('section_title', this.sectionTitle);
                        formData_commentData.append('section_comment', this.sectionComment);
                        const response_commentData = await assets_service.addComment(formData_commentData);
                        
                        this.loadCountCommentEntry();
                        this.loadCommentLog();
                        this.commentSection = '';
                        this.$refs['modal_commentBox'].hide();

                        this.$toast.open({
                            message: 'Comment has been submitted',
                            type: 'success', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });


                    }catch (error) {
                        
                    }

                },
                changeStatus: async function (value){

                    
                    const response_eventDetails = await assets_service.getEventDetails(this.event_id);
                    this.data_eventInformation = response_eventDetails.data[0];
                    let albumID = this.data_eventInformation.album_id;
                    

                    if (value == "3"){
                    
                        // EVENT STATUS
                        this.albumStatus = "Under Review";
                        let formData_albumStatus = new FormData();
                        formData_albumStatus.append('name_publisher', this.displayName);
                        formData_albumStatus.append('album_status', this.albumStatus);
                        const response_albumStatusData = await assets_service.updateAlbumStatus_withPublisher(this.event_id, formData_albumStatus);

                        // EVENT TRACKING STATUS
                        this.eventTrackingStatus = "Under Review";
                        let formData_eventTrackingLog = new FormData();
                            formData_eventTrackingLog.append('album_id', this.event_id);
                            formData_eventTrackingLog.append('activity', this.eventTrackingStatus);
                            formData_eventTrackingLog.append('date', this.finalDateTime);
                        const response_eventTrackingLog = await assets_service.addTrackingLog(formData_eventTrackingLog);

                        this.$toast.open({
                            message: 'Under review',
                            type: 'info', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                    }
                    else if (value == "4"){
                    
                        // EVENT STATUS
                        this.albumStatus = "For Revision";
                        let formData_albumStatus = new FormData();
                        formData_albumStatus.append('album_status', this.albumStatus);
                        const response_albumStatusData = await assets_service.updateAlbumStatus(this.event_id, formData_albumStatus);

                        // EVENT TRACKING STATUS
                        this.eventTrackingStatus = "For Revision";
                        let formData_eventTrackingLog = new FormData();
                            formData_eventTrackingLog.append('album_id', this.event_id);
                            formData_eventTrackingLog.append('activity', this.eventTrackingStatus);
                            formData_eventTrackingLog.append('date', this.finalDateTime);
                        const response_eventTrackingLog = await assets_service.addTrackingLog(formData_eventTrackingLog);

                        this.$toast.open({
                            message: 'Event Sent for Revision',
                            type: 'success', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                    }
                    else if (value == "6"){
                    
                        // EVENT STATUS
                        this.albumStatus = "Unpublished";
                        let formData_albumStatus = new FormData();
                        formData_albumStatus.append('album_status', this.albumStatus);
                        const response_albumStatusData = await assets_service.updateAlbumStatus(this.event_id, formData_albumStatus);

                        // EVENT TRACKING STATUS
                        this.eventTrackingStatus = "Accepted";
                        let formData_eventTrackingLog = new FormData();
                            formData_eventTrackingLog.append('album_id', this.event_id);
                            formData_eventTrackingLog.append('activity', this.eventTrackingStatus);
                            formData_eventTrackingLog.append('date', this.finalDateTime);
                        const response_eventTrackingLog = await assets_service.addTrackingLog(formData_eventTrackingLog);

                        this.$toast.open({
                            message: 'Accepted and now for Publish!',
                            type: 'success', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                    }
                    else if (value == "7"){
                        
                        // EVENT STATUS
                        this.albumStatus = "Published";
                        let formData_albumStatus = new FormData();
                        formData_albumStatus.append('album_status', this.albumStatus);
                        const response_albumStatusData = await assets_service.updateAlbumStatus(this.event_id, formData_albumStatus);

                        // EVENT TRACKING STATUS
                        this.eventTrackingStatus = "Published";
                        let formData_eventTrackingLog = new FormData();
                            formData_eventTrackingLog.append('album_id', this.event_id);
                            formData_eventTrackingLog.append('activity', this.eventTrackingStatus);
                            formData_eventTrackingLog.append('date', this.finalDateTime);
                        const response_eventTrackingLog = await assets_service.addTrackingLog(formData_eventTrackingLog);

                        this.$toast.open({
                            message: 'Published successfully!',
                            type: 'success', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                    }
                    else if (value == "8"){
                    
                        // EVENT STATUS
                        this.albumStatus = "For Comment";
                        let formData_albumStatus = new FormData();
                        formData_albumStatus.append('album_status', this.albumStatus);
                        const response_albumStatusData = await assets_service.updateAlbumStatus(this.event_id, formData_albumStatus);
                       
                        this.$toast.open({
                            message: 'Kindly leave a comment to indicate the reason for the revision',
                            type: 'info', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                    }
                    else if (value == "9"){
                    
                        // EVENT STATUS
                        this.albumStatus = "Unpublished";
                        let formData_albumStatus = new FormData();
                        formData_albumStatus.append('album_status', this.albumStatus);
                        const response_albumStatusData = await assets_service.updateAlbumStatus(this.event_id, formData_albumStatus);

                        // EVENT TRACKING STATUS
                        this.eventTrackingStatus = "Unpublished";
                        let formData_eventTrackingLog = new FormData();
                            formData_eventTrackingLog.append('album_id', this.event_id);
                            formData_eventTrackingLog.append('activity', this.eventTrackingStatus);
                            formData_eventTrackingLog.append('date', this.finalDateTime);
                        const response_eventTrackingLog = await assets_service.addTrackingLog(formData_eventTrackingLog);

                        this.$toast.open({
                            message: 'Unpublished successfully!',
                            type: 'success', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                    }



                    this.loadEventDetails();
                    this.loadAlbumStatus();
                    this.loadTrackingLog();
                }
            },
            computed: {
                photoTagsArray: {
                    get() {
                        // Convert the comma-separated string to an array if it's a string
                        return typeof this.data_photoInformation_update.photo_tags === "string"
                        ? this.data_photoInformation_update.photo_tags.split(",")
                        : this.data_photoInformation_update.photo_tags;
                    },
                    set(newTags) {
                        // Set the tags as an array
                        this.data_photoInformation_update.photo_tags = newTags;
                    }
                },
                videoTagsArray: {
                    get() {
                        // Convert the comma-separated string to an array if it's a string
                        return typeof this.data_videoInformation_update.video_tags === "string"
                        ? this.data_videoInformation_update.video_tags.split(",")
                        : this.data_videoInformation_update.video_tags;
                    },
                    set(newTags) {
                        // Set the tags as an array
                        this.data_videoInformation_update.video_tags = newTags;
                    }
                },
                transformedTrackingLog() {
                    return this.trackingLog.map(item => {
                        return {
                        ...item,
                        activity: item.activity === 'Pending for Review' ? 'For Review' : item.activity,
                        };
                    });
                },
            },
            watch: {
                // Reset the "Under Review" flag whenever the tracking log updates
                trackingLog: {
                    immediate: true,
                    handler() {
                        this.firstUnderReviewShown = false;
                    },
                },
            },

        }
</script>

<style>
    .custom-alert {
        position: fixed;
        bottom: 10px; /* Adjust to move closer or farther from the bottom */
        right: 10px; /* Adjust to move closer or farther from the right */
        z-index: 1050; /* Ensure it's on top of other elements */
        max-width: 300px; /* Optional: Control width */
        padding: 15px; /* Add padding for better spacing within the alert */
    }

    .thumb-size{
        width: 50px;
        height: 50px;
    }

    .font-title-size{
        font-size: 12px;
        font-weight: 700;
    }

    .font-body-size{
        font-size: 12px;
    }

    .photo-video-font-title-size{
        font-size: 14px;
    }

    .status{
        font-weight: bold;
        text-transform: uppercase;
    }

    .event-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .event-cardd, .event-card {
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
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
                                <router-link to="/author/events" class="nav-link" style="text-decoration: underline;"> 
                                    EVENTS 
                                </router-link>    
                                > {{data_eventInformation.event_title}}
                            </h2>
                            <div style="margin-top: 1%;">
                                <div v-if="currentAlbumStatus === 'Saved as Draft' ">
                                    <span class="status badge bg-cyan text-cyan-fg">Draft</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'Submitted for Review' ">
                                    <span class="status badge bg-orange text-orange-fg">Submitted to Publisher</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'Under Review' ">
                                    <span class="status badge bg-purple text-purple-fg">Under Review</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'For Comment' ">
                                    <span class="status badge bg-purple text-purple-fg">Under Review</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'For Revision' ">
                                    <span class="status badge bg-red text-red-fg">Needs Revision</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'Revision For Review' ">
                                    <span class="status badge bg-orange text-orange-fg">Resubmitted to Publisher</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'Unpublished' ">
                                    <span class="status badge bg-yellow text-yellow-fg">Unpublished</span>
                                </div>
                                <div v-if="currentAlbumStatus === 'Published' ">
                                    <span class="status badge bg-green text-green-fg">Published</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto ms-auto d-print-none">
                            <div class="d-flex">
                                <div v-if="currentAlbumStatus === 'Saved as Draft' ">
                                    <b-button @click="showModal_uploadPhoto()" class="mr-1" variant="primary"  v-b-tooltip.hover title="Upload Photo">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M12.5 21h-6.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6.5" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l4 4" /><path d="M14 14l1 -1c.67 -.644 1.45 -.824 2.182 -.54" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                                    </b-button>
                                    <b-button @click="showModal_uploadVideo()" class="mr-1" variant="warning"  v-b-tooltip.hover title="Upload Video">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /><path d="M7 12l4 0" /><path d="M9 10l0 4" /></svg>    <!-- Upload Photo -->
                                    </b-button>
                                </div>
                                <div v-if="currentAlbumStatus === 'Submitted for Review' ">

                                </div>
                                <div v-if="currentAlbumStatus === 'Published' ">
                                    
                                </div>
                                <div v-if="currentAlbumStatus === 'Unpublished' ">
                                    
                                </div>
                                <div v-if="currentAlbumStatus === 'For Revision' ">
                                    <b-button @click="showModal_uploadPhoto()" class="mr-1" variant="primary"  v-b-tooltip.hover title="Upload Photo">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M12.5 21h-6.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6.5" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l4 4" /><path d="M14 14l1 -1c.67 -.644 1.45 -.824 2.182 -.54" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                                    </b-button>
                                    <b-button @click="showModal_uploadVideo()" class="mr-1" variant="warning"  v-b-tooltip.hover title="Upload Video">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-video-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l4.553 -2.276a1 1 0 0 1 1.447 .894v6.764a1 1 0 0 1 -1.447 .894l-4.553 -2.276v-4z" /><path d="M3 6m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z" /><path d="M7 12l4 0" /><path d="M9 10l0 4" /></svg>    <!-- Upload Photo -->
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
                            <div class="card event-cardd" id="Event_Information">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    Event Information
                                    </h3>
                                    <div class="card-actions">
                                        
                                        <div v-if="currentAlbumStatus === 'Saved as Draft' ">
                                            <b-button @click="editAlbumInfo()" class="mr-1" variant="success" v-b-tooltip.hover title="Edit Event">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="100"  height="100"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                            </b-button>
                                            <b-button @click="validate_delete_event()" class="mr-1" variant="danger"  v-b-tooltip.hover title="Delete Event">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                            </b-button>
                                        </div>
                                        <div v-if="currentAlbumStatus === 'For Revision' ">
                                            <b-button @click="editAlbumInfo()" class="mr-1" variant="success" v-b-tooltip.hover title="Edit Event">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="100"  height="100"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                            </b-button>
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
                                <div class="card-footer">
                                    <div v-if="currentAlbumStatus === 'Saved as Draft' ">
                                        <b-button value="2" @click="submitToPublisher()" class="mr-1" variant="warning" v-b-tooltip.hover title="Submit for Review">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-send"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                                            Submit to Publisher
                                        </b-button>
                                    </div>
                                    <div v-if="currentAlbumStatus === 'For Revision' ">
                                        <b-button value="2" @click="changeStatus(5)" class="mr-1" variant="warning" v-b-tooltip.hover title="Submit for Review">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-send"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                                            Resubmit to Publisher
                                        </b-button>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div v-if="currentAlbumStatus === 'Return to Author' ">
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
                                                            <div class="card-footer">
                                                                    <div v-if="currentAlbumStatus === 'Saved as Draft' ">
                                                                        <b-button @click="showModal_updatePhoto(event.id)" class="" variant="success"  v-b-tooltip.hover title="Update Photo">
                                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                                        </b-button>
                                                                        <!-- <b-button @click="validate_delete_photo()" class="mr-1" variant="danger"  v-b-tooltip.hover title="Delete Event">
                                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                                        </b-button> -->
                                                                    </div>
                                                                    <div v-if="currentAlbumStatus === 'For Revision' ">
                                                                        <b-button @click="showModal_updatePhoto(event.id)" class="" variant="success"  v-b-tooltip.hover title="Update Photo">
                                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                                        </b-button>
                                                                    </div>
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
                                                            <div class="card event-cardd placeholder-glow">
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
                                                                <div class="card-body">
                                                                    <dl class="row">
                                                                        <dt class="col-12 font-title-size">DESCRIPTION:</dt>
                                                                        <dd class="col-12 font-body-size">{{event.video_description}}</dd>
                                                                        <dt class="col-12 font-title-size">VIDEOGRAPHER:</dt>
                                                                        <dd class="col-12 font-body-size">{{event.video_videographer}}</dd>
                                                                        <dt class="col-12 font-title-size">CATEGORY:</dt>
                                                                        <dd class="col-12 font-body-size">{{event.video_category}}</dd>
                                                                        <dt class="col-12 font-title-size">DURATION:</dt>
                                                                        <dd class="col-12 font-body-size">{{event.video_duration}}</dd>
                                                                        <dt class="col-12 font-title-size">VIDEO TYPE:</dt>
                                                                        <dd class="col-12 font-body-size">{{event.video_type}}</dd>
                                                                        <dt class="col-12 font-title-size">TAGS:</dt>
                                                                        <dd class="col-12 font-body-size">
                                                                            <span v-for="(tag, idx) in event.video_tags.split(',')" :key="idx" class="tag-style">
                                                                                <a class="badge badge-outline text-secondary fw-normal badge-pill">
                                                                                    {{tag}}
                                                                                </a>
                                                                            </span>
                                                                        </dd>
                                                                    </dl>
                                                                </div>
                                                                <div class="card-footer">
                                                                        
                                                                        <div v-if="currentAlbumStatus === 'Saved as Draft' ">
                                                                            <b-button @click="showModal_updateVideo(event.id)" class="" variant="success"  v-b-tooltip.hover title="Update Video">
                                                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                                            </b-button>
                                                                            <b-button @click="validate_delete_video()" class="mr-1" variant="danger"  v-b-tooltip.hover title="Delete Event">
                                                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                                            </b-button>
                                                                        </div>
                                                                        <div v-if="currentAlbumStatus === 'For Revision' ">
                                                                            <b-button @click="showModal_updateVideo(event.id)" class="" variant="success"  v-b-tooltip.hover title="Update Video">
                                                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                                            </b-button>
                                                                        </div>
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

        <b-modal id="modal_albumInfo" ref="modal_albumInfo"  title="Edit Event Information" size="lg" centered>
            <div class="card" id="createEventForm" >
                <div class="card-header">
                    <h3 class="card-title">EVENT INFORMATION</h3>
                </div>
                <div class="card-body">
                    <div class="row row-cards">
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Title:</label>
                            <b-form-input v-model="data_eventInformation_update.event_title" placeholder="Enter Title..." required></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 mb-0">
                            <label class="form-label"><span style="color: red;">* </span>Short Description:</label>
                            <textarea class="form-control" v-model="data_eventInformation_update.event_description" rows="2" placeholder="Short description here.."></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Date:</label>
                            <b-form-datepicker required id="eventDate" v-model="data_eventInformation_update.event_date" class="mb-2"></b-form-datepicker>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Event Venue:</label>
                            <b-form-input required id="input-2" v-model="data_eventInformation_update.event_venue" placeholder="Enter Venue..."   ></b-form-input>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Organizing Agency/Office:</label>
                            <b-form-input v-model="data_eventInformation_update.event_organizingAgency" placeholder="Enter Organizing Agency/Office..." required></b-form-input>
                            </div>
                        </div>
                        <div class="ccol-sm-6 col-md-4">
                            <div class="mb-3">
                            <label class="form-label"><span style="color: red;">* </span>Category:</label>
                                <div class="col">
                                    <select class="form-select" v-model="data_eventInformation_update.event_category">
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
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                                <label class="form-label"><span style="color: red;">* </span>Sector:</label>
                                <div class="col">
                                    <select class="form-select" v-model="data_eventInformation_update.event_sector">
                                        <option selected disabled>Please select sector</option>
                                        <option value="1">Collegial and Scientific Bodies</option>
                                        <option value="2">Regional Offices and S&T Provincial Centers</option>
                                        <option value="3">Research and Development Institutes</option>
                                        <option value="4">Scientific and Technological Services</option>
                                        <option value="5">Sectoral Planning Councils</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="color: black !important">
                            <div class="mb-3" style="color: black !important">
                                <label class="form-label"><span style="color: red;">* </span>Tags:</label>
                                <b-form-tags required input-id="tags-basic" name="tags" v-model="album_tags_new" placeholder="Add new tags separated by enter key..."></b-form-tags>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <template #modal-footer>
                <b-button variant="secondary" @click="$bvModal.hide('modal_albumInfo')">Close</b-button>
                <b-button variant="warning" value="1" @click="updateAlbum()">Update</b-button>
            </template>
        </b-modal>

        <b-modal id="modal_uploadPhoto" ref="modal_uploadPhoto"  title="Upload Photo" size="xl" centered>
            <b-tabs v-model="tabIndex" small card >
                <b-tab title="Photo" >
                    <b-card no-body>
                        <b-tabs card v-model="tabIndex_photo">
                            <b-tab v-for="(photoEntry, i) in photo_tabs" :key="'dyn-tab-' + i" :title="'Photo ' + (i+1)">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 mb-0">
                                        <b-form-group >   
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Select Photo:</label>
                                            <b-form-file placeholder="Choose a file or drop it here..." drop-placeholder="Drop file here..." v-model="photoEntry.photo_fileName">
                                            </b-form-file>
                                        </b-form-group> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 mb-0">
                                        <!-- <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Photo Title:</label>
                                            <b-form-input v-model="photoEntry.photo_title" placeholder="Enter Title..."   ></b-form-input>
                                        </b-form-group>  -->
                                        
                                        <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Photographer:</label>
                                            <b-form-input  v-model="photoEntry.photo_photographer" placeholder="Enter Photographer..."   ></b-form-input>
                                        </b-form-group> 
                                    </div>
                                    <div class="col-md-6 col-lg-6 mb-0">
                                        <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Photo Category:</label>
                                            <b-form-select v-model="photoEntry.selected_photo_category" :options="options_photo_categoryList"></b-form-select>
                                            
                                        </b-form-group> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 mb-0">
                                        <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Short Description of the Photo:</label>
                                            <b-form-textarea id="textarea" v-model="photoEntry.photo_description" placeholder="Short description of the Photo..." rows="3" max-rows="6" ></b-form-textarea>
                                        </b-form-group> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 mb-0">
                                        <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Photo Tags:</label>
                                            <b-form-tags input-id="tags-basic" name="tags" v-model="photoEntry.photo_tags" placeholder="Add new tags separated by enter key..."></b-form-tags>
                                        </b-form-group> 
                                    </div>
                                </div>
                                <b-button style="margin-bottom: 2%" size="sm" variant="danger" class="float-right" @click="clearEntry(i)">
                                        Clear Entry
                                </b-button>
                            </b-tab>
                            <template #tabs-end>
                                <b-nav-item role="presentation" @click.prevent="photo_newTab" href="#"><b>+</b></b-nav-item>
                            </template>
                            <template #empty>
                                <div class="text-center text-muted">
                                    There are no open tabs<br>
                                    Open a new tab using the <b>+</b> button above.
                                </div>
                            </template>
                        </b-tabs>
                    </b-card>
                </b-tab>
            </b-tabs>
            <template #modal-footer>
                <b-button variant="secondary" @click="$bvModal.hide('modal_uploadPhoto')">Close</b-button>
                <b-button variant="warning" value="1" @click="uploadPhoto()">Upload Photo</b-button>
            </template>
        </b-modal>

        <b-modal id="modal_uploadVideo" ref="modal_uploadVideo"  title="Upload Video" size="xl" centered>
            <b-tabs v-model="tabIndex" small card >
                <b-tab title="Video">
                    <b-card no-body>
                        <b-tabs card>
                            <b-tab v-for="(videoEntry, i) in vidClip_tabs" :key="'dyn-tab-' + i" :title="'Video ' + (i+1)">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 mb-0">
                                        <b-form-group >   
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Video (Youtube Link):</label>
                                            <b-form-input id="" v-model="videoEntry.video_link"  placeholder="Enter Youtube Link here..."   ></b-form-input>
                                        </b-form-group> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 mb-0">
                                        <!-- <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Video Title:</label>
                                            <b-form-input v-model="videoEntry.video_title" placeholder="Enter Title..."   ></b-form-input>
                                        </b-form-group>  -->
                                        <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Videographer:</label>
                                            <b-form-input  v-model="videoEntry.video_videographer" placeholder="Enter Photographer..."   ></b-form-input>
                                        </b-form-group> 
                                    </div>
                                    <div class="col-md-6 col-lg-6 mb-0">
                                        <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Video Category:</label>
                                            
                                            <b-form-select v-model="videoEntry.selected_video_category" :options="options_video_categoryList"></b-form-select>
                                            <!-- <div class="col">
                                                <select class="form-select" v-model="selected_category_video">
                                                    <option selected disabled>Please select video category</option>
                                                    <option value="1">Anniversaries</option>
                                                    <option value="2">Awarding Ceremonies </option>
                                                    <option value="3">Competition/ Contests</option>
                                                    <option value="4">Exhibits</option>
                                                    <option value="5">Lectures, Discussion, Seminar, Training</option>
                                                    <option value="6">MOA/MOU signing</option>
                                                    <option value="7">NSTW</option>
                                                    <option value="8">NYSTIF</option>
                                                    <option value="9">Program Launch</option>
                                                    <option value="10">Project Launch</option>
                                                    <option value="11">Project/Program activities</option>
                                                    <option value="12">RSTW</option>
                                                    <option value="13">Same day edits</option>
                                                    <option value="14">Speeches</option>
                                                    <option value="15">Others</option>
                                                </select>
                                            </div> -->
                                            <!-- <b-form-select id="input-3" v-model="videoEntry.video_category" :options="options_category_video"   ></b-form-select>-->
                                        </b-form-group>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 mb-0">
                                        <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Type:</label>
                                            <b-form-select id="input-3" v-model="videoEntry.video_type" :options="options_category_type"   ></b-form-select>
                                        </b-form-group> 
                                    </div>
                                    <div class="col-md-6 col-lg-6 mb-0">
                                        <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Duration (hh:mm:ss):</label>
                                            <b-form-timepicker
                                                v-model="videoEntry.video_duration"
                                                locale="en"
                                                show-seconds
                                                :hour12="false"
                                            ></b-form-timepicker>
                                        </b-form-group> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 mb-0">
                                        <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Short Description of the Video:</label>
                                            <b-form-textarea id="textarea" v-model="videoEntry.video_description" placeholder="Short description of the Video..." rows="3" max-rows="6" ></b-form-textarea>
                                        </b-form-group> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 mb-0">
                                        <b-form-group class="group" id="form_externalEventDate">
                                            <label for="entryDate" class="label" style="color:black; font-weight: bold">Video Tags:</label>
                                            <b-form-tags input-id="tags-basic" name="tags" v-model="videoEntry.video_tags" placeholder="Add new tags separated by enter key..."></b-form-tags>
                                        </b-form-group> 
                                    </div>
                                </div>
                                <b-button size="sm" variant="danger" class="float-right" @click="vidClip_closeTab(i)">
                                        Clear Entry
                                </b-button>
                            </b-tab>
                            <template #tabs-end>
                                <b-nav-item role="presentation" @click.prevent="vidClip_newTab" href="#"><b>+</b></b-nav-item>
                            </template>
                            <template #empty>
                                <div class="text-center text-muted">
                                    There are no open tabs<br>
                                    Open a new tab using the <b>+</b> button above.
                                </div>
                            </template>
                        </b-tabs>
                    </b-card>
                </b-tab>
            </b-tabs>
            <template #modal-footer>
                <b-button variant="secondary" @click="$bvModal.hide('modal_uploadPhoto')">Close</b-button>
                <b-button variant="warning" value="1" @click="uploadVideo()">Upload Video</b-button>
            </template>
        </b-modal>

        <b-modal id="modal_updatePhoto" ref="modal_updatePhoto"  title="Edit Photo Information" size="xl" centered>
            <div class="card" id="createEventForm" >
                <div class="card-header">
                    <h3 class="card-title">PHOTO INFORMATION</h3>
                </div>
                <div class="card-body">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-md-6">
                            <b-form-group >   
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Photo:</label>
                                    <div class="img-responsive rounded border" 
                                    :style="{ backgroundImage: `url('/storage/images/${data_photoInformation_update.photo_fileName}')` }">
                                    </div>
                                
                            </b-form-group> 
                            <b-form-group >   
                                <b-button variant="info" value="1" @click="validate_upload_newPhoto()">Replace this photo</b-button>
                                
                            </b-form-group> 
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <b-form-group class="group" id="form_externalEventDate">
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Photo Description:</label>
                                <b-form-textarea id="textarea" v-model="data_photoInformation_update.photo_description" placeholder="Short description of the Photo..." rows="3" max-rows="6" ></b-form-textarea>
                            </b-form-group> 
                            <b-form-group class="group" id="form_externalEventDate">
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Photographer:</label>
                                <b-form-input  v-model="data_photoInformation_update.photo_photographer" placeholder="Enter Photographer..."   ></b-form-input>
                            </b-form-group> 
                            <b-form-group class="group" id="form_externalEventDate">
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Photo Category:</label>
                                <b-form-select v-model="data_photoInformation_update.photo_category" :options="options_photo_categoryList"></b-form-select>
                                
                            </b-form-group> 
                            <b-form-group class="group" id="form_externalEventDate">
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Photo Tags:</label>
                                <b-form-tags input-id="tags-basic" name="tags" v-model="photoTagsArray" placeholder="Add new tags separated by enter key..."></b-form-tags>
                            </b-form-group> 
                        </div>
                    </div>
                </div>
            </div>

            <template #modal-footer>
                <b-button variant="secondary" @click="$bvModal.hide('modal_updatePhoto')">Close</b-button>
                <b-button variant="warning" value="1" @click="updatePhoto()">Update</b-button>
            </template>
        </b-modal>

        <b-modal id="modal_updateVideo" ref="modal_updateVideo"  title="Edit Video Information" size="xl" centered>
            <div class="card" id="createEventForm" >
                <div class="card-header">
                    <h3 class="card-title">VIDEO INFORMATION</h3>
                </div>
                <div class="card-body">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-md-6">
                            <b-form-group >   
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Video:</label>
                                <br>
                                <iframe width="500" height="315"
                                    :src='`https://www.youtube.com/embed/`+`${data_videoInformation_update.video_youtubeID}`'>
                                    
                                </iframe>
                            </b-form-group> 
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <b-form-group class="group" id="form_externalEventDate">
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Video Description:</label>
                                <b-form-textarea id="textarea" v-model="data_videoInformation_update.video_description" placeholder="Short description of the Photo..." rows="3" max-rows="6" ></b-form-textarea>
                            </b-form-group> 
                            <b-form-group class="group" id="form_externalEventDate">
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Videographer:</label>
                                <b-form-input  v-model="data_videoInformation_update.video_videographer" placeholder="Enter Photographer..."   ></b-form-input>
                            </b-form-group> 
                            <b-form-group class="group" id="form_externalEventDate">
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Video Category:</label>
                                <b-form-select v-model="data_videoInformation_update.selected_video_category" :options="options_video_categoryList"></b-form-select> 
                            </b-form-group> 
                            <b-form-group class="group" id="form_externalEventDate">
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Duration:</label>
                                <b-form-timepicker
                                    v-model="data_videoInformation_update.video_duration"
                                    locale="en"
                                    show-seconds
                                    :hour12="false"
                                ></b-form-timepicker>
                            </b-form-group> 
                            
                            <b-form-group class="group" id="form_externalEventDate">
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Type:</label>
                                <b-form-select id="input-3" v-model="data_videoInformation_update.video_type" :options="options_category_type"   ></b-form-select>
                            </b-form-group> 
                            <b-form-group class="group" id="form_externalEventDate">
                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Video Tags:</label>
                                <!-- <b-form-tags input-id="tags-basic" name="tags" v-model="photo_tags_new" placeholder="Add new tags separated by enter key..."></b-form-tags> -->
                                <b-form-tags input-id="tags-basic" name="tags" v-model="videoTagsArray" placeholder="Add new tags separated by enter key..."></b-form-tags>
                            </b-form-group> 
                        </div>
                    </div>
                </div>
            </div>

            <template #modal-footer>
                <b-button variant="secondary" @click="$bvModal.hide('modal_updateVideo')">Close</b-button>
                <b-button variant="warning" value="1" @click="updateVideo()">Update</b-button>
            </template>
        </b-modal>

        <b-modal id="modal_validatePhoto" ref="modal_validatePhoto"  title="Warning!" size="lg" centered hide-footer
        :header-bg-variant="headerBG_savedSuccessfully" :header-text-variant="headerText_savedSuccessfully">
            <div>
                <h5>Add Photo before submitting!</h5>
            </div>
        </b-modal>

        <b-modal id="modal_validate_deletePhoto" ref="modal_validate_deletePhoto"  title="Are you sure you want to delete this photo?" size="lg" centered 
        :header-bg-variant="headerBG_deleteWarning" :header-text-variant="headerText_savedSuccessfully">
            <div>
                Once deleted, photo will be permanently removed.
            </div>
            <template #modal-footer>
                <b-button variant="danger" value="1" @click="deletePhoto()">Yes</b-button>
                <b-button variant="secondary" @click="$bvModal.hide('modal_validate_deletePhoto')">No</b-button>
            </template>
        </b-modal>

        <b-modal id="modal_validate_deleteVideo" ref="modal_validate_deleteVideo"  title="Are you sure you want to delete this video?" size="lg" centered 
        :header-bg-variant="headerBG_deleteWarning" :header-text-variant="headerText_savedSuccessfully">
            <div>
                Once deleted, video will be permanently removed.
            </div>
            <template #modal-footer>
                <b-button variant="danger" value="1" @click="deleteVideo()">Yes</b-button>
                <b-button variant="secondary" @click="$bvModal.hide('modal_validate_deleteVideo')">No</b-button>
            </template>
        </b-modal>

        <b-modal id="modal_validate_deleteEvent" ref="modal_validate_deleteEvent"  title="Are you sure you want to delete this event?" size="lg" centered 
        :header-bg-variant="headerBG_deleteWarning" :header-text-variant="headerText_savedSuccessfully">
            <div>
                Once deleted, event will be permanently removed.
            </div>
            <template #modal-footer>
                <b-button variant="danger" value="1" @click="deleteEvent()">Yes</b-button>
                <b-button variant="secondary" @click="$bvModal.hide('modal_validate_deleteEvent')">No</b-button>
            </template>
        </b-modal>

        <b-modal id="modal_validate_upload_newPhoto" ref="modal_validate_upload_newPhoto"  title="Are you sure you want to replace this photo?" size="lg" centered 
        :header-bg-variant="headerBG_deleteInfo" :header-text-variant="headerText_savedSuccessfully">
            <div>
                Uploading a new photo will replace the previously uploaded photo.
            </div>
            <template #modal-footer>
                <b-button variant="danger" value="1" @click="select_newPhoto()">Yes</b-button>
                <b-button variant="secondary" @click="$bvModal.hide('modal_validate_upload_newPhoto')">No</b-button>
            </template>
        </b-modal>

        <b-modal id="modal_select_newPhoto" ref="modal_select_newPhoto"  title="Select new photossss" size="lg" centered 
        :header-bg-variant="headerBG_savedSuccessfully" :header-text-variant="headerText_savedSuccessfully">
            <!-- <div>
                <input type="file" @change="handleFileUpload" />
                <b-form-file placeholder="Choose a file or drop it here..." drop-placeholder="Drop file here..." v-model="photoEntry.photo_fileName">
                </b-form-file>
            </div> -->
            <div>
                <!-- <input type="file" @change="handleFileUpload" /> -->
                <b-form-file 
                    placeholder="Choose a file or drop it here..." 
                    drop-placeholder="Drop file here..." 
                    v-model="newPhoto">
                </b-form-file>
                
            </div>
            
            <template #modal-footer>
                <b-button variant="success" value="1" @click="replacePhoto()">Save</b-button>
                <b-button variant="secondary" @click="$bvModal.hide('modal_select_newPhoto')">Cancel</b-button>
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
                    
                    selected_photo_category: 'Please select photo category',
                    options_photo_categoryList: [
                        { value: null, text: 'Please select photo category', disabled: true },
                        { value: 'Assistant Secretaries', text: 'Assistant Secretaries' },
                        { value: 'Deputy Directors', text: 'Deputy Directors' },
                        { value: 'Directors', text: 'Directors' },
                        { value: 'Executive Director', text: 'Executive Director' },
                        { value: 'Group photo', text: 'Group photo' },
                        { value: 'Launch/Events/Activities', text: 'Launch/Events/Activities' },
                        { value: 'Lecturers/Resource Speaker', text: 'Lecturers/Resource Speaker' },
                        { value: 'MOA/MOU signing', text: 'MOA/MOU signing' },
                        { value: 'Participants', text: 'Participants' },
                        { value: 'Portraits', text: 'Portraits' },
                        { value: 'Product/Service', text: 'Product/Service' },
                        { value: 'Project visits', text: 'Project visits' },
                        { value: 'Project/Program activities', text: 'Project/Program activities' },
                        { value: 'Regional Directors', text: 'Regional Directors' },
                        { value: 'Secretaries', text: 'Secretaries' },
                        { value: 'Service Directors', text: 'Service Directors' },
                        { value: 'Undersecretaries', text: 'Undersecretaries' },
                        { value: 'Others...', text: 'Others...' },
                    ],
                    
                    selected_video_category: 'Please select video category',
                    options_video_categoryList: [
                        { value: null, text: 'Please select video category', disabled: true },
                        { value: 'Anniversaries', text: 'Anniversaries' },
                        { value: 'Awarding Ceremonies', text: 'Awarding Ceremonies' },
                        { value: 'Competition/ Contests', text: 'Competition/ Contests' },
                        { value: 'Exhibits', text: 'Exhibits' },
                        { value: 'Lectures,Discussion,Seminar,Training', text: 'Lectures,Discussion,Seminar,Training' },
                        { value: 'MOA/MOU signing', text: 'MOA/MOU signing' },
                        { value: 'NSTW', text: 'NSTW' },
                        { value: 'NYSTIF', text: 'NYSTIF' },
                        { value: 'Program Launch', text: 'Program Launch' },
                        { value: 'Project Launch', text: 'Project Launch' },
                        { value: 'Project/Program activities', text: 'Project/Program activities' },
                        { value: 'RSTW', text: 'RSTW' },
                        { value: 'Same day edits', text: 'Same day edits' },
                        { value: 'Speeches', text: 'Speeches' },
                        { value: 'Others...', text: 'Others...' },
                    ],
                    headerBG_deleteInfo: 'info',
                    headerBG_deleteWarning: 'danger',
                    headerBG_savedSuccessfully: 'warning',
                    headerText_savedSuccessfully: 'light',
                    event_id : this.$route.params.id,
                    albumID:[],
                    albumInfo:{},
                    data_eventInformation: [],
                    data_eventInformation_length: 0,
                    event_tagsss: [],
                    album_tags: [],
                    album_tags_new:[],
                    photo_tags: [],
                    photo_tags_new:[],
                    video_tags: [],
                    video_tags_new:[],
                    photo_tag_list: [],
                    video_tag_list: [],
                    data_eventInformation_update:{},
                    data_photoInformation_update:{},
                    data_videoInformation_update:{},
                    tabIndex: 0,
                    tabIndex_photo: 0,
                    photoData: [],
                    photo_tabs: [
                        {
                            photo_fileName: null,
                            photo_personInvolved: '',
                            photo_title: '',
                            selected_photo_category: '',
                            photo_description: '',
                            photo_photographer: ''
                        }
                    ],
                    photo_tabCounter: 1,
                    photo_id: 1,
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
                    vidClip_tabCounter: 1,
                    video_id: 1,
                    selected_category_photo: null,
                    options_category_photo: [
                        { value: null, text: 'Please select category', disabled: true},
                        { value: '1', text: 'Assistant Secretaries' },
                        { value: '2', text: 'Deputy Directors' },
                        { value: '3', text: 'Directors' },
                        { value: '4', text: 'Executive Director' },
                        { value: '5', text: 'Group photo' },
                        { value: '6', text: 'Launch/ Events/Activities' },
                        { value: '7', text: 'Lecturers/Resource Speaker' },
                        { value: '8', text: 'MOA/MOU signing' },
                        { value: '9', text: 'Participants' },
                        { value: '10', text: 'Portraits' },
                        { value: '11', text: 'Product/Service' },
                        { value: '12', text: 'Project visits' },
                        { value: '13', text: 'Project/Program activities' },
                        { value: '14', text: 'Regional Directors' },
                        { value: '15', text: 'Secretaries' },
                        { value: '16', text: 'Service Directors' },
                        { value: '17', text: 'Undersecretaries' },
                        { value: '18', text: 'Others...' }
                    ],
                    options_category_type: [
                        { value: null, text: 'Please select video type', disabled: true},
                        { value: '1', text: 'Full Video' },
                        { value: '2', text: 'Video Clip' },,
                        { value: '3', text: 'Others...' }
                    ],
                    selected_category_video: null,
                    options_category_video: [
                        { value: null, text: 'Please select category', disabled: true},
                        { value: '1', text: 'Anniversaries' },
                        { value: '2', text: 'Awarding Ceremonies' },
                        { value: '3', text: 'Competition/ Contests' },
                        { value: '4', text: 'Exhibits' },
                        { value: '5', text: 'Lectures, Discussion, Seminar, Training' },
                        { value: '6', text: 'MOA/MOU signing' },
                        { value: '7', text: 'NSTW' },
                        { value: '8', text: 'NYSTIF' },
                        { value: '9', text: 'Program Launch' },
                        { value: '10', text: 'Project Launch' },
                        { value: '11', text: 'Project/Program activities' },
                        { value: '12', text: 'RSTW' },
                        { value: '13', text: 'Same day edits' },
                        { value: '14', text: 'Speeches' },
                        { value: '15', text: 'Others...' }
                    ],
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
                    event_ID: '',
                    trackingLog: [], // Initialize as an empty array
                    firstUnderReviewShown: false,
                    result: '',
                    oldFilename: '', // Replace with the current filename
                    newPhoto: null,
                    update_photoInformation: {
                        photo_fileName: null, // Store the old filename
                    },
                }
            },
            mounted(){
                setTimeout(() => {
                    this.initializeFsLightbox();
                }, 2500); // Adjust delay if needed
                      
                this.loadEventDetails();
                this.loadAlbumStatus();
                this.loadTrackingLog();
                this.loadEventPhotos();
                this.loadEventVideos();

                this.createDate();
                this.loadCommentLog();
                
            },
            methods: {
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
                loadCommentLog: async function (){
                    const response_commentLog = await assets_service.getCommentLog(this.event_id);
                    this.list_commentLog = response_commentLog.data;
                    
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
                loadTrackingLog: async function (){
                    const response_trackingLog = await assets_service.getTrackingLog(this.event_id);
                    this.trackingLog = response_trackingLog.data;
                    
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
                loadPage: async function(){
                    document.getElementById("_spinner").style.display = "none";
                    document.getElementById("_body").style.display = "block";
                },
                editAlbumInfo: async function(data){

                    const response_eventDetails = await assets_service.getEventDetails(this.event_id);
                    this.data_eventInformation_update = response_eventDetails.data[0];
                    this.data_eventInformation_length = this.data_eventInformation_update.length;

                    const response = await assets_service.getAlbumTags_selected(this.event_id);
                    this.album_tags_new = response.data.map(item => item.album_tagName);

                    this.$refs['modal_albumInfo'].show();
                },
                showModal_uploadPhoto: async function(){

                    this.$refs['modal_uploadPhoto'].show();
                },
                showModal_uploadVideo: async function(){

                    this.$refs['modal_uploadVideo'].show();
                },
                showModal_updatePhoto: async function(id){
                    const response_photoDetails = await assets_service.getPhotoDetails(id);
                    this.data_photoInformation_update = response_photoDetails.data[0];


                    const response = await assets_service.getPhotoTags_selected(this.data_photoInformation_update.photo_id);
                    
                    this.photo_tags_new = response.data.map(item => item.photo_tagName);

                    

                    this.$refs['modal_updatePhoto'].show();
                },
                showModal_updateVideo: async function(id){
                    const response_videoDetails = await assets_service.getVideoDetails(id);
                    this.data_videoInformation_update = response_videoDetails.data[0];
                   
                    const response = await assets_service.getVideoTags_selected(this.data_videoInformation_update.video_id);

                    this.video_tags_new = response.data.map(item => item.video_tagName);
                    
                    // console.log("Video ID: " + this.data_videoInformation_update.video_id);
                    
                    this.$refs['modal_updateVideo'].show();
                },
                uploadPhoto: async function() {

                    const response_countAlbumPhoto = await assets_service.countAlbumPhotoEntry(this.data_eventInformation.album_id);

                    try{
                        let formData_photoData = new FormData();
                        let formData_photoTags = new FormData();

                        this.photo_tabs.forEach((photoEntry, index) => {

                            let count_newPhoto = index+1;
                            let totalPhotoEntry = response_countAlbumPhoto.data;
                            let count_finalPhoto = count_newPhoto + totalPhotoEntry;
                            if (totalPhotoEntry => 0 && totalPhotoEntry <= 9 ){
                                let i = count_finalPhoto;
                                this.photo_id = "ETP" + "2024" + "-" + "000" + i  + "-" + i;
                            }
                            else if (totalPhotoEntry > 9){
                                let i = count_finalPhoto;
                                this.photo_id = "ETP" + "2024" + "-" + "00" + i  + "-" + i;
                            }

                            formData_photoData.append(`photo_form[${index}][album_id]`, this.data_eventInformation.album_id);
                            formData_photoData.append(`photo_form[${index}][photo_id]`, this.photo_id );
                            formData_photoData.append(`photo_form[${index}][photo_fileName]`, photoEntry.photo_fileName);
                            //formData_photoData.append(`photo_form[${index}][photo_title]`, photoEntry.photo_title);
                            formData_photoData.append(`photo_form[${index}][photo_category]`, photoEntry.selected_photo_category);
                            formData_photoData.append(`photo_form[${index}][photo_description]`, photoEntry.photo_description);
                            formData_photoData.append(`photo_form[${index}][photo_photographer]`, photoEntry.photo_photographer);
                            formData_photoData.append(`photo_form[${index}][photo_tags]`, photoEntry.photo_tags);

                            this.photo_tag_list = photoEntry.photo_tags;
                        });
                        
                        const response_photoData = await assets_service.addPhotoData(formData_photoData);
                            

                        // Save tags
                        let tagList = [];
                            tagList = this.photo_tag_list;

                        for (let i = 0; i < tagList.length; i ++) {
                            let tagName = tagList.slice(i, i+1);

                            formData_photoTags.append('photo_id', this.photo_id);
                            formData_photoTags.append('photo_tagName', tagName);

                            const response_albumTags = await assets_service.addPhotoTags(formData_photoTags);
                        }

                        this.loadEventPhotos();
                        this.$toast.open({
                            message: 'Photo was added successfully!',
                            type: 'success', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                        this.$refs['modal_uploadPhoto'].hide();
                        this.photo_tabs.forEach((photoEntry, index) => {
                            photoEntry.photo_fileName = null;
                            photoEntry.photo_title = '';
                            photoEntry.photo_photographer = '';
                            photoEntry.selected_photo_category = '';
                            photoEntry.photo_description = '';
                            photoEntry.photo_tags = '';
                        });
                    }catch(error){}
                },
                uploadVideo: async function() {
                    

                    const response_countAlbumVideo = await assets_service.countAlbumVideoEntry(this.data_eventInformation.album_id);
                    // console.log(response_countAlbumVideo.data);

                    try{

                        let formData_videoData = new FormData();
                        let formData_videoTags = new FormData();

                        this.vidClip_tabs.forEach((videoEntry, index) => {

                            let count_newPhoto = index+1;
                            let totalPhotoEntry = response_countAlbumVideo.data;
                            let count_finalPhoto = count_newPhoto + totalPhotoEntry;

                            const albumID = this.data_eventInformation.album_id;
                            const match = albumID.match(/000(\d+)/);
                            if (match) {
                                this.result = match[1]; // "1"
                                //console.log(this.result); // Output: "1"
                            }


                            if (totalPhotoEntry => 0 && totalPhotoEntry <= 9 ){
                                let i = count_finalPhoto;
                                this.video_id = "ETV" + "2024" + "-" + "000" + this.result  + "-" + i;
                            }
                            else if (totalPhotoEntry > 9){
                                
                                let i = count_finalPhoto;
                                this.video_id = "ETV" + "2024" + "-" + "00" + this.result  + "-" + i;
                            }


                            let url = videoEntry.video_link;
                            let urlID = url.split("v=")[1].substring(0, 11)
                                
                            //console.log("this is video id: " + this.video_id);
                            formData_videoData.append(`video_form[${index}][album_id]`, this.data_eventInformation.album_id);
                            formData_videoData.append(`video_form[${index}][video_id]`, this.video_id );
                            formData_videoData.append(`video_form[${index}][video_link]`, videoEntry.video_link);
                            formData_videoData.append(`video_form[${index}][video_youtubeID]`, urlID);
                            formData_videoData.append(`video_form[${index}][video_videographer]`, videoEntry.video_videographer);
                            formData_videoData.append(`video_form[${index}][video_category]`, videoEntry.selected_video_category);
                            formData_videoData.append(`video_form[${index}][video_type]`, videoEntry.video_type);
                            formData_videoData.append(`video_form[${index}][video_duration]`, videoEntry.video_duration);
                            formData_videoData.append(`video_form[${index}][video_description]`, videoEntry.video_description);
                            formData_videoData.append(`video_form[${index}][video_tags]`, videoEntry.video_tags);
                            
                            //console.log("aaa");
                            this.video_tag_list = videoEntry.video_tags;
                        });
                        
                        const response_videoData = await assets_service.addVideoData(formData_videoData);

                        let tagList = [];
                            tagList = this.video_tag_list;

                        for (let i = 0; i < tagList.length; i ++) {
                            let tagName = tagList.slice(i, i+1);

                            formData_videoTags.append('video_id', this.video_id);
                            formData_videoTags.append('video_tagName', tagName);

                            const response_albumTags = await assets_service.addVideoTags(formData_videoTags);
                        }

                        this.loadEventVideos();
                        this.$toast.open({
                            message: 'Video was added successfully!',
                            type: 'success', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                        this.$refs['modal_uploadVideo'].hide();
                        this.vidClip_tabs.forEach((videoEntry, index) => {
                            videoEntry.video_link = '';
                            videoEntry.video_videographer = '';
                            videoEntry.selected_video_category = '';
                            videoEntry.video_type = '';
                            videoEntry.video_duration = '';
                            videoEntry.video_description = '';
                            videoEntry.video_tags = '';
                            
                        });
                    }catch(error){}
                },
                updateAlbum: async function() {
                    let albumID = this.data_eventInformation.album_id;
                    try{
                        let formData_ = new FormData();
                        formData_.append('event_title', this.data_eventInformation_update.event_title);
                        formData_.append('event_description', this.data_eventInformation_update.event_description);
                        formData_.append('event_date', this.data_eventInformation_update.event_date);
                        formData_.append('event_venue', this.data_eventInformation_update.event_venue);
                        formData_.append('event_organizingAgency', this.data_eventInformation_update.event_organizingAgency);
                        formData_.append('event_category', this.data_eventInformation_update.event_category);
                        formData_.append('event_sector', this.data_eventInformation_update.event_sector);
                        formData_.append('event_tags', this.album_tags_new);
                        
                        const response_ = await assets_service.updateAlbum(albumID, formData_);
                        
                        // Save tags
                        let formData_albumTags = new FormData();
                        let tagList = [];
                        tagList = this.album_tags_new;

                        for (let i = 0; i < tagList.length; i ++) {
                            let tagName = tagList.slice(i, i+1);
             
                            const response_albumTags = await assets_service.checkAlbumTagsExists(this.data_eventInformation_update.album_id,tagName);
                            //console.log(tagName +": " + response_albumTags.data.message)

                            if (response_albumTags.data.message === "none"){
                                formData_albumTags.append('album_id', this.data_eventInformation_update.album_id);
                                formData_albumTags.append('album_tagName', tagName);
                                //console.log(tagName +": " + "Added to db");

                                const response_albumTags = await assets_service.addAlbumTags(formData_albumTags);
                            }
                        }

                        this.loadEventDetails();
                        this.$toast.open({
                            message: 'Event Information was updated successfully!',
                            type: 'success', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                        this.$refs['modal_albumInfo'].hide();
                        //console.log("Event Information updated successfully!");
                        
                    }
                    catch(error){
                        //console.log("An error occurred!");
                    }
                },
                getAlbumID: async function(){
                    
                    const response_eventDetails = await assets_service.getEventDetails(this.event_id);
                    this.data_eventInformation = response_eventDetails.data[0];
                    let albumID = this.data_eventInformation.album_id;
                },
                submitToPublisher: async function(){
                    const response_countPhoto = await assets_service.countAlbumPhotoEntry(this.event_id);
                    let photo = response_countPhoto.data;

                    if (photo > 0){
                        // EVENT STATUS
                        this.albumStatus = "Submitted for Review";
                        // EVENT TRACKING STATUS
                        this.eventTrackingStatus = "Pending for Review";
                        
                        try{

                            // CREATE EVENT TRACKING LOG
                            let formData_eventTrackingLog = new FormData();
                                formData_eventTrackingLog.append('album_id', this.event_id);
                                formData_eventTrackingLog.append('activity', this.eventTrackingStatus);
                                formData_eventTrackingLog.append('date', this.finalDateTime);
                            const response_eventTrackingLog = await assets_service.addTrackingLog(formData_eventTrackingLog);

                            // UPDATE EVENT STATUS
                            let formData_albumStatus = new FormData();
                            formData_albumStatus.append('album_status', this.albumStatus);
                            const response_albumStatusData = await assets_service.updateAlbumStatus(this.event_id, formData_albumStatus);



                            this.loadAlbumStatus();
                            this.loadTrackingLog();
                            this.$toast.open({
                                message: 'Submitted to Publisher successfully!',
                                type: 'success', // Options: 'success', 'info', 'error', 'default'
                                position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                                duration: 5000, 
                            });

                        }catch(error){
                            this.$toast.open({
                                message: 'An error occured!',
                                type: 'error', // Options: 'success', 'info', 'error', 'default'
                                position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                                duration: 5000, 
                            });
                        }

                    }
                    else{
                        this.$toast.open({
                            message: 'Add Photo before submitting!',
                            type: 'error', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                    }
                },
                changeStatus: async function (value){

                    const response_eventDetails = await assets_service.getEventDetails(this.event_id);
                    this.data_eventInformation = response_eventDetails.data[0];
                    let albumID = this.data_eventInformation.album_id;

                    if (value == "5"){
                        // EVENT STATUS
                        this.albumStatus = "Revision For Review";
                        let formData_albumStatus = new FormData();
                        formData_albumStatus.append('name_publisher', "Khasian Romulo");
                        formData_albumStatus.append('album_status', this.albumStatus);
                        const response_albumStatusData = await assets_service.updateAlbumStatus_withPublisher(this.event_id, formData_albumStatus);

                        // EVENT TRACKING STATUS
                        this.eventTrackingStatus = "Revision For Review";
                        let formData_eventTrackingLog = new FormData();
                            formData_eventTrackingLog.append('album_id', this.event_id);
                            formData_eventTrackingLog.append('activity', this.eventTrackingStatus);
                            formData_eventTrackingLog.append('date', this.finalDateTime);
                        const response_eventTrackingLog = await assets_service.addTrackingLog(formData_eventTrackingLog);

                        this.$toast.open({
                            message: 'Resubmitted to Publisher successfully!',
                            type: 'success', // Options: 'success', 'info', 'error', 'default'
                            position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                            duration: 5000, 
                        });
                    }
                    this.loadEventDetails();
                    this.loadAlbumStatus();
                    this.loadTrackingLog();
                    this.loadCommentLog();

                    
                },
                updatePhoto: async function() {


                    let photoID = this.data_photoInformation_update.photo_id;
                    
                    try{
                        let formData_ = new FormData();
                        formData_.append('photo_fileName', this.data_photoInformation_update.photo_fileName);
                        formData_.append('photo_description', this.data_photoInformation_update.photo_description);
                        formData_.append('photo_photographer', this.data_photoInformation_update.photo_photographer);
                        formData_.append('photo_category', this.data_photoInformation_update.photo_category);
                        formData_.append('photo_tags', this.photoTagsArray);
                        
                        const response_ = await assets_service.updatePhoto(this.data_photoInformation_update.id, formData_);
                        

                        this.loadEventPhotos();
                        this.$toast.open({
                            message: 'Photo information was updated successfully!',
                            type: 'success', 
                            position: 'bottom-right',
                            duration: 5000, 
                        });
                        this.$refs['modal_updatePhoto'].hide();
                        
                    }
                    catch(error){
                        this.$toast.open({
                            message: 'An error occured! Photo information was not updated.',
                            type: 'danger', 
                            position: 'bottom-right',
                            duration: 5000, 
                        });
                    }
                },
                updateVideo: async function() {

                    let photoID = this.data_videoInformation_update.video_id;
                    try{
                        let formData_ = new FormData();
                        
                        formData_.append('video_description', this.data_videoInformation_update.video_description);
                        formData_.append('video_videographer', this.data_videoInformation_update.video_videographer);
                        formData_.append('video_category', this.data_videoInformation_update.selected_video_category);
                        formData_.append('video_duration', this.data_videoInformation_update.video_duration);
                        formData_.append('video_type', this.data_videoInformation_update.video_type);
                        formData_.append('video_tags', this.videoTagsArray);
                        
                        const response_ = await assets_service.updateVideo(this.data_videoInformation_update.id, formData_);
                        
                       
                        this.loadEventVideos();
                        this.$toast.open({
                            message: 'Video information was updated successfully!',
                            type: 'success', 
                            position: 'bottom-right',
                            duration: 5000, 
                        });

                        this.$refs['modal_updateVideo'].hide();
                        
                    }
                    catch(error){
                        this.$toast.open({
                            message: 'An error occured! Video information was not updated.',
                            type: 'danger', 
                            position: 'bottom-right',
                            duration: 5000, 
                        });
                    }
                },
                clearEntry(index){
                    this.photo_tabs.splice(index,1);
                },
                photo_newTab() {
                    this.photo_tabs.push({
                            photo_fileName: null,
                            photo_title: '',
                            photo_photographer: '',
                            selected_photo_category: '',
                            photo_description: '',
                            photo_tags: '',
                        })
                    this.tabIndex_photo = this.photo_tabs.length+2;
                    
                },
                vidClip_newTab() {
                    this.vidClip_tabs.push({
                            video_link: '',
                            video_videographer: '',
                            selected_video_category: '',
                            video_type: '',
                            video_duration: '',
                            video_description: '',
                            video_tags: '',
                        })
                },
                validate_delete_event: async function(){
                    this.$refs['modal_validate_deleteEvent'].show();
                },
                deleteEvent: async function () {

                    let albumID = this.data_eventInformation.album_id;
                    try{
                        let formData_ = new FormData();
                        formData_.append('is_deleted', "1");
                        
                        const response_ = await assets_service.deleteAlbum(albumID, formData_);
                        
                        this.$toast.open({
                            message: 'Event was deleted successfully!',
                            type: 'success', 
                            position: 'bottom-right',
                            duration: 5000, 
                        });

                    }
                    catch(error){
                        this.$toast.open({
                            message: 'An error occured! Event cannot be deleted.',
                            type: 'danger', 
                            position: 'bottom-right',
                            duration: 5000, 
                        });
                    }


                    this.$refs['modal_validate_deleteEvent'].hide();
                    
                    this.$toast.open({
                        message: 'Event was deleted successfully!',
                        type: 'success', // Options: 'success', 'info', 'error', 'default'
                        position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                        duration: 5000, 
                    });
                    
                    this.$router.push('/author/events');
                },
                validate_delete_photo: async function(){
                    this.$refs['modal_validate_deletePhoto'].show();
                },
                deletePhoto: async function () {
                    this.$refs['modal_validate_deletePhoto'].hide();
                    
                    this.$toast.open({
                        message: 'Photo was deleted successfully!',
                        type: 'success', // Options: 'success', 'info', 'error', 'default'
                        position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                        duration: 5000, 
                    });
                    
                    this.loadEventPhotos();
                },
                validate_delete_video: async function(){
                    this.$refs['modal_validate_deleteVideo'].show();
                },
                deleteVideo: async function () {
                    this.$refs['modal_validate_deleteVideo'].hide();
                    
                    this.$toast.open({
                        message: 'Video was deleted successfully!',
                        type: 'success', // Options: 'success', 'info', 'error', 'default'
                        position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                        duration: 5000, 
                    });
                    
                    this.loadEventVideos();
                },
                validate_upload_newPhoto: async function(){
                    this.$refs['modal_validate_upload_newPhoto'].show();
                },
                select_newPhoto: async function(){
                    this.$refs['modal_validate_upload_newPhoto'].hide();
                    this.$refs['modal_select_newPhoto'].show();
                },
                handleFileUpload(event) {
                    this.newPhoto = event.target.files[0]; // Get the selected file
                },
                replacePhoto: async function () {
                    if (!this.newPhoto) {
                        alert('Please select a new photo to upload!');
                        return;
                    }
                    else{
                        const formData = new FormData();
                        formData.append('old_filename', this.data_photoInformation_update.photo_fileName);
                        formData.append('new_photo', this.newPhoto);
                        try {
                            const response = await assets_service.replacePhoto(formData); // Call the API
                            this.data_photoInformation_update.photo_fileName = response.new_filename; // Update the old filename
                            this.$refs['modal_select_newPhoto'].hide();
                            this.$refs['modal_updatePhoto'].hide();

                            this.loadEventPhotos();
                            this.$toast.open({
                                message: 'Photo was replaced successfully!',
                                type: 'success', // Options: 'success', 'info', 'error', 'default'
                                position: 'bottom-right', // Options: 'top', 'top-right', 'top-left', 'bottom', 'bottom-right', 'bottom-left'
                                duration: 5000, 
                            });
                        } catch (error) {
                            
                            this.$toast.open({
                                message: 'An error occured! Photo cannot be replaced.',
                                type: 'danger', 
                                position: 'bottom-right',
                                duration: 5000, 
                            });
                            console.error('Error replacing photo:', error.response?.data?.message || error.message);
                        }
                    }
                },
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
/** 
        onChange(e) {
            this.questionImage = e.target.files[0];
            this.fields.img = [this.questionImage];
            this.previewImage();
        },
        previewImage() {
            const file = this.questionImage;
            if (!file) return;

            if (!file.type.match("image.*")) {
                alert("Please select an image file");
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                this.questionImagePath = e.target.result;
            };
            reader.readAsDataURL(file);
        },
*/
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
        font-size: 10px;
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
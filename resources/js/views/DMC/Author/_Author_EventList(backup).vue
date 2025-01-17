<template>
    <div>
        <div class="page-header d-print-none">
            <div class="tabler-container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            EVENT LIST
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="tabler-container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                    <li class="nav-item">
                                        <a href="#tabs-home-1" class="nav-link active" data-bs-toggle="tab">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tabs-profile-1" class="nav-link" data-bs-toggle="tab">Profile</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-home-1">
                                        <h4>Home tab</h4>
                                        <div>Cursus turpis vestibulum, dui in pharetra vulputate id sed non turpis ultricies fringilla at sed facilisis lacus pellentesque purus nibh</div>
                                    </div>
                                    <div class="tab-pane" id="tabs-profile-1">
                                        <h4>Profile tab</h4>
                                        <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
                                    </div>
                                </div>
                            </div> -->
                            <b-tabs card>
                                <b-tab active>
                                    <template #title>
                                        Drafts 
                                        <span v-if="totalRows_draft != 0">
                                            <b-badge variant="danger">{{totalRows_draft}}</b-badge>
                                        </span>
                                        <span v-else>
                                            <b-badge variant="secondary">0</b-badge>
                                        </span>
                                    </template>
                                    <b-table hover 
                                        :items="list_draft"
                                        :fields="fields_draft"
                                        show-empty
                                        >

                                        <template #cell(details)="row">
                                            <b-button size="sm" @click="viewAlbumInfo(row.item, row.index, $event.target)" class="mr-1" variant="info">
                                                View Details
                                            </b-button>
                                        </template>
                                        <template #cell(action)="row">
                                            <!-- <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="success">
                                                Edit
                                            </b-button>
                                            <b-button size="sm" value="2" @click="changeStatus()" class="mr-1" variant="warning">
                                                Submit to Publisher
                                            </b-button>
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="danger">
                                                Delete
                                            </b-button> -->
                                            <div class="dropdown">
                                                <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" @click="edit_eventInformation(row.item, row.index, $event.target)" >
                                                    <!-- <a class="dropdown-item" href="#" @click="info(row.item, row.index, $event.target)" > -->
                                                        <!-- <b-button size="sm" class="mr-1" variant="success"> -->
                                                            Edit
                                                        <!-- </b-button> -->
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </template>
    
                                    </b-table>
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
                                    <b-table striped hover 
                                        :items="list_forReview"
                                        :fields="fields_forReview"
                                        show-empty
                                        >
    
                                        <template #cell(action)="row">
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="success">
                                                Edit
                                            </b-button>
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="warning">
                                                Submit to Publisher
                                            </b-button>
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="danger">
                                                Delete
                                            </b-button>
    
                                        </template>
                                        <template #cell(details)="row">
                                            <b-button size="sm" @click="viewAlbumInfo(row.item, row.index, $event.target)" class="mr-1" variant="info">
                                                View Details
                                            </b-button>
    
                                        </template>
                                        <template #empty="scope">
                                            {{ scope.emptyText }}
                                        </template>
    
                                    </b-table>
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
                                    <b-table striped hover 
                                        :items="list_forRevision"
                                        :fields="fields_draft"
                                        show-empty
                                        >
    
                                        <template #cell(action)="row">
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="success">
                                                Edit
                                            </b-button>
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="warning">
                                                Submit to Publisher
                                            </b-button>
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="danger">
                                                Delete
                                            </b-button>
    
                                        </template>
                                        <template #cell(details)="row">
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="info">
                                                View Details
                                            </b-button>
    
                                        </template>
                                        <template #empty="scope">
                                            {{ scope.emptyText }}
                                        </template>
    
                                    </b-table>
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
                                    <b-table striped hover 
                                        :items="list_unpublished"
                                        :fields="fields_draft"
                                        show-empty
                                        >
    
                                        <template #cell(action)="row">
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="success">
                                                Edit
                                            </b-button>
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="warning">
                                                Submit to Publisher
                                            </b-button>
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="danger">
                                                Delete
                                            </b-button>
    
                                        </template>
                                        <template #cell(details)="row">
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="info">
                                                View Details
                                            </b-button>
    
                                        </template>
                                        <template #empty="scope">
                                            {{ scope.emptyText }}
                                        </template>
    
                                    </b-table>
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
                                    <b-table striped hover 
                                        :items="list_published"
                                        :fields="fields_draft"
                                        show-empty
                                        >
    
                                        <template #cell(action)="row">
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="success">
                                                Edit
                                            </b-button>
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="warning">
                                                Submit to Publisher
                                            </b-button>
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="danger">
                                                Delete
                                            </b-button>
    
                                        </template>
                                        <template #cell(details)="row">
                                            <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1" variant="info">
                                                View Details
                                            </b-button>
    
                                        </template>
                                        <template #empty="scope">
                                            {{ scope.emptyText }}
                                        </template>
    
                                    </b-table>
                                </b-tab>
                            </b-tabs>
    
                            <b-modal id="modal_albumInfo" ref="modal_albumInfo"  title="Event Information" size="xl" centered ok-only @hide="resetInfoModal">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                                <table class="table card-table table-vcenter text-nowrap datatable">
                                                    <thead>
                                                        <tr>
                                                            <th class="w-1">Album ID</th>
                                                            <th>Title</th>
                                                            <th>Description</th>
                                                            <th>Date</th>
                                                            <th>Venue</th>
                                                            <th>Organizing Agency/Office</th>
                                                            <th>Category</th>
                                                            <th>Sector</th>
                                                            <th>Tags</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                <td><span class="text-secondary">001401</span></td>
                                                                <td>{{albumInfo.event_title}}</td>
                                                                <td>{{albumInfo.event_description}}</td>
                                                                <td>{{albumInfo.event_date}}</td>
                                                                <td>{{albumInfo.event_venue}}</td>
                                                                <td>{{albumInfo.event_organizingAgency}}</td>
                                                                <td>
                                                                
                                                                    <span v-if="albumInfo.event_category === '1'">
                                                                        Assistant Secretaries
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '2'">
                                                                        Deputy Directors
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '3'">
                                                                        Directors
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '4'">
                                                                        Executive Director
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '5'">
                                                                        Group photo
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '6'">
                                                                        Launch/ Events/Activities
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '7'">
                                                                        Lecturers/Resource Speaker
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '8'">
                                                                        MOA/MOU signing
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '9'">
                                                                        Participants
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '10'">
                                                                        Product/Service
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '11'">
                                                                        Portraits
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '12'">
                                                                        Project visits
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '13'">
                                                                        Project/Program activities
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '14'">
                                                                        Regional Directors
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '15'">
                                                                        Secretaries
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '16'">
                                                                        Service Directors
                                                                    </span>
                                                                    <span v-if="albumInfo.event_category === '17'">
                                                                        Undersecretaries
                                                                    </span>
                                                                </td>
                                                                <td>{{albumInfo.event_sector}}</td>
                                                                <td>{{albumInfo.event_tags}}</td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                </div>  
                                <div class="card mt-2">
                                    <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table card-table table-vcenter text-nowrap datatable">
                                                    <thead>
                                                        <tr>
                                                            <th class="w-1">Photo ID</th>
                                                            <th>Photo</th>
                                                            <th>Title</th>
                                                            <th>Description</th>
                                                            <th>Category</th>
                                                            <th>Photographer</th>
                                                            <th>Tags</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody v-if="photo_length === 0">
                                                        NO PHOTO AVAILAVLE
                                                    </tbody>
                                                    <tbody  v-else>
                                                            <tr v-for="(event, index) in list_photo" :key="index">
                                                                <td><span class="text-secondary">001401</span></td>
                                                                <td>
                                                                    <a data-fslightbox="gallery" :href='`/storage/images/${event.photo_fileName}`'>
                                                                        <div class="img-responsive img-responsive-1x1 rounded border" 
                                                                        :style="{ backgroundImage: `url('/storage/images/${event.photo_fileName}')` }">
                                                                        </div>
                                                                    </a>
                                                                </td>
                                                                <td>{{event.photo_title}}</td>
                                                                <td>{{event.photo_description}}</td>
                                                                <td>{{event.photo_category}}</td>
                                                                <td>{{event.photo_photographer}}</td>
                                                                <td>{{event.photo_tags}}</td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- <div class="d-flex align-items-center mt-2 photo-style">
                                                    <span class="avatar me-3 rounded">
                                                        <a data-fslightbox="gallery" :href='`/storage/images/${event.photo_fileName}`'>
                                                            <div class="img-responsive img-responsive-1x1 rounded border img-width" 
                                                            :style="{ backgroundImage: `url('/storage/images/${event.photo_fileName}')` }">
                                                            </div>
                                                        </a>
                                                    </span>
                                                    <div>
                                                        <div class="datagrid">
                                                            <div class="datagrid-item">
                                                                <div class="datagrid-title">Photo Title</div>
                                                                <div class="datagrid-content">{{event.photo_title}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="datagrid" style="margin-top: 1px">
                                                            <div class="datagrid-item">
                                                                <div class="datagrid-title">Description</div>
                                                                <div class="datagrid-content">{{event.photo_description}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="datagrid mt-2">
                                                            <div class="datagrid-item" >
                                                                <div class="datagrid-title">Category</div>
                                                                <div class="datagrid-content">{{albumInfo.event_category}}</div>
                                                            </div>
                                                            <div class="datagrid-item" >
                                                                <div class="datagrid-title">Sector</div>
                                                                <div class="datagrid-content">{{albumInfo.event_sector}}</div>
                                                            </div>
                                                            <div class="datagrid-item">
                                                                <div class="datagrid-title">Tags</div>
                                                                <div class="datagrid-content">{{albumInfo.event_tags}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div> -->
                                        

                                        <!-- <h4>
                                            Photos
                                        </h4>
                                        <span v-if="photo_length === 0">
                                            
                                        </span>
                                        <span v-else>
                                            <span v-for="(event, index) in list_photo" :key="index">
                                                <b-media style="margin-bottom: 5px;">
                                                    <template #aside>
                                    
                                                        <a data-fslightbox="gallery" :href='`/storage/images/${event.photo_fileName}`'>
                                            
                                                            <div class="img-responsive img-responsive-1x1 rounded border img-width" 
                                                            :style="{ backgroundImage: `url('/storage/images/${event.photo_fileName}')` }">
    
                                                            </div>
                                                        </a>
                                                        
                                                    </template>
    
                                                    <h5 class="mt-0">{{event.photo_title}}</h5>
                                                    <p>{{event.photo_description}}</p>
                                                    
                                                </b-media>
                                            </span>
                                        </span> -->

                                    </div>     
                                </div>    
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <div class="card-body">
                                            <h3 class="card-title">Youtube Player</h3>
                                            <!-- <div class="plyr__video-embed" id="player">
                                                <iframe
                                                    src="https://www.youtube.com/embed/TDum3De1Tt0"
                                                    allowfullscreen
                                                    allow="autoplay; encrypted-media"
                                                ></iframe>
                                            </div> -->
                                            <span v-for="(event, index) in list_video" :key="index">
                                                <b-media style="margin-bottom: 5px;">
                                                    <template #aside>
                                                    
                                                        <iframe width="420" height="315"
                                                            :src='`https://www.youtube.com/embed/`+`${event.video_youtubeID}`'>
                                                            
                                                        </iframe>
                                                    </template>
    
                                                    <h5 class="mt-0">{{event.video_title}}</h5>
                                                    <p>{{event.video_description}}</p>
                                                    
                                                </b-media>
                                            </span>
                                        </div>

                                    </div>     
                                </div>              
        
                                <!-- <div class="modal-card">
                                    
                                    <div class="modal-card-body">
                                        <h4>
                                            {{albumInfo.event_title}}
                                        </h4>
                                        <p>
                                            {{albumInfo.event_description}}
                                        </p>
                                        <b-list-group horizontal>
                                            <b-list-group-item>
                                                <span style="font-weight: 600;"> Category: </span>
                                                
                                                    <span v-if="albumInfo.event_category === '1'">
                                                        Anniversaries
                                                    </span>
                                                    <span v-if="albumInfo.event_category === '2'">
                                                        Awarding Ceremonies
                                                    </span>
                                                    <span v-if="albumInfo.event_category === '3'">
                                                        Competition/ Contests
                                                    </span>
                                                    <span v-if="albumInfo.event_category === '4'">
                                                        Exhibits
                                                    </span>
                                                    <span v-if="albumInfo.event_category === '5'">
                                                        Lectures, Discussion, Seminar, Training
                                                    </span>
                                                    <span v-if="albumInfo.event_category === '6'">
                                                        MOA/MOU signing
                                                    </span>
                                                    <span v-if="albumInfo.event_category === '7'">
                                                        NSTW
                                                    </span>
                                                    <span v-if="albumInfo.event_category === '8'">
                                                        NYSTIF
                                                    </span>
                                                    <span v-if="albumInfo.event_category === '9'">
                                                        Program Launch'
                                                    </span>
                                                    <span v-if="albumInfo.event_category === '10'">
                                                        Project Launch
                                                    </span>
                                            </b-list-group-item>
                                            
                                            <b-list-group-item>
                                                <span style="font-weight: 600;"> Date: </span>
                                                    {{albumInfo.event_date}}
                                            </b-list-group-item>
                                            <b-list-group-item>
                                                <span style="font-weight: 600;"> Venue: </span>
                                                    {{albumInfo.event_venue}}
                                                </b-list-group-item>
                                            <b-list-group-item>
                                                <span style="font-weight: 600;"> Tags: </span>
                                                    <span v-for="(event, index) in list_albumTags" :key="index">
                                                        <b-badge variant="dark">{{ event.album_tagName }}</b-badge>
                                                    </span>
                                                    
                                                </b-list-group-item>
                                        </b-list-group>
                                    </div>
                                </div>
                                <div class="modal-card">
                                    <div class="modal-card-body" >
                                        <h4>
                                            Photos
                                        </h4>
                                        <span v-if="photo_length === 0">
                                            NO PHOTO AVAILAVLE
                                        </span>
                                        <span v-else>
                                            <span v-for="(event, index) in list_photo" :key="index">
                                                <b-media style="margin-bottom: 5px;">
                                                    <template #aside>
                                    
                                                        <a data-fslightbox="gallery" :href='`/storage/images/${event.photo_fileName}`'>
                                            
                                                            <div class="img-responsive img-responsive-1x1 rounded border img-width" 
                                                            :style="{ backgroundImage: `url('/storage/images/${event.photo_fileName}')` }">
    
                                                            </div>
                                                        </a>
                                                        
                                                    </template>
    
                                                    <h5 class="mt-0">{{event.photo_title}}</h5>
                                                    <p>{{event.photo_description}}</p>
                                                    
                                                </b-media>
                                            </span>
                                        </span>
    
                                    </div>
                                </div>
                                <div class="modal-card">
                                    <div class="modal-card-body" >
                                        <h4>
                                            Videos
                                        </h4>
                                        <span v-if="video_length === 0">
                                            NO VIDEO AVAILAVLE
                                        </span>
                                        <span v-else>
                                            <span v-for="(event, index) in list_video" :key="index">
                                                <b-media style="margin-bottom: 5px;">
                                                    <template #aside>
                                                    
                                                        <iframe width="420" height="315"
                                                            :src='`https://www.youtube.com/embed/`+`${event.video_youtubeID}`'>
                                                            
                                                        </iframe>
                                                    </template>
    
                                                    <h5 class="mt-0">{{event.video_title}}</h5>
                                                    <p>{{event.video_description}}</p>
                                                    
                                                </b-media>
                                            </span>
                                        </span>
    
                                    </div>
    
                                </div> -->
    
                                
                            </b-modal>  
    
                            <b-modal :id="infoModal.id" title='Event Information' size="lg" centered ok-only @hide="resetInfoModal">
                                <div class="row" style="margin-bottom: 10px">
                                    <div class="col-md-4 col-lg-4 mb-0">
                                        <span style="font-weight: 700">
                                            Event Title
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-lg-8 mb-0">
                                        National Commission on Muslim Filipinos (NCMF) on Halal Testing Ceremonial Signing of MOA
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 10px">
                                    <div class="col-md-4 col-lg-4 mb-0">
                                        <span style="font-weight: 700">
                                            Description
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-lg-8 mb-0">
                                        Halal Testing Ceremonial Signing of MOA with DOST-OURO
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 10px">
                                    <div class="col-md-4 col-lg-4 mb-0">
                                        <span style="font-weight: 700">
                                            Organizing Agency/Office
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-lg-8 mb-0">
                                        OURO
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 10px">
                                    <div class="col-md-4 col-lg-4 mb-0">
                                        <span style="font-weight: 700">
                                            Event Category
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-lg-8 mb-0">
                                        MOA Signing
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 10px">
                                    <div class="col-md-4 col-lg-4 mb-0">
                                        <span style="font-weight: 700">
                                            Event Date
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-lg-8 mb-0">
                                        2024-01-04
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 10px">
                                    <div class="col-md-4 col-lg-4 mb-0">
                                        <span style="font-weight: 700">
                                            Event Venue
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-lg-8 mb-0">
                                        Molave Function Room, Dusit Thani Hotel, Makati City
                                    </div>
                                </div>
                            </b-modal>

                            
                            <b-modal id="assignModalForm_2" ref="assignModalForm_2" size="xl"  hide-footer title="Edit Ticket Details">
                                    <div class="card" id="createEventForm" >
                                        <div class="card-header">
                                            <h3 class="card-title">EVENT INFORMATION</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row row-cards">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                    <label class="form-label"><span style="color: red;">* </span>Event Tccd itle:</label>
                                                    <b-form-input v-model="data_eventInformation.event_title" required></b-form-input>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3 mb-0">
                                                    <label class="form-label"><span style="color: red;">* </span>Short Description:</label>
                                                    <textarea class="form-control" v-model="data_eventInformation.event_description" rows="2" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="mb-3">
                                                    <label class="form-label"><span style="color: red;">* </span>Event Date:</label>
                                                    <b-form-datepicker required id="eventDate" v-model="data_eventInformation.event_date" class="mb-2"></b-form-datepicker>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="mb-3">
                                                    <label class="form-label"><span style="color: red;">* </span>Event Venue:</label>
                                                    <b-form-input required id="input-2" v-model="data_eventInformation.event_venue" placeholder="Enter Venue..."   ></b-form-input>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="mb-3">
                                                    <label class="form-label"><span style="color: red;">* </span>Organizing Agency/Office:</label>
                                                    <b-form-input v-model="data_eventInformation.event_organizingAgency" placeholder="Enter Organizing Agency/Office..." required></b-form-input>
                                                    </div>
                                                </div>
                                                <div class="ccol-sm-6 col-md-3">
                                                    <div class="mb-3">
                                                    <label class="form-label"><span style="color: red;">* </span>Category:</label>
                                                        <div class="col">
                                                            <select class="form-select" v-model="data_eventInformation.event_category">
                                                                <option selected disabled>Please select category</option>
                                                                <option value="1">Assistant Secretaries</option>
                                                                <option value="2">Deputy Directors</option>
                                                                <option value="3">Directors</option>
                                                                <option value="4">Executive Director</option>
                                                                <option value="5">Group photo</option>
                                                                <option value="6">Launch/ Events/Activities</option>
                                                                <option value="7">Lecturers/Resource Speaker</option>
                                                                <option value="8">MOA/MOU signing</option>
                                                                <option value="9">Participants</option>
                                                                <option value="10">Portraits</option>
                                                                <option value="11">Product/Service</option>
                                                                <option value="12">Project visits</option>
                                                                <option value="13">Project/Program activities</option>
                                                                <option value="14">Regional Directors</option>
                                                                <option value="15">Secretaries</option>
                                                                <option value="16">Service Directors</option>
                                                                <option value="17">Undersecretaries</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="mb-3">
                                                        <label class="form-label"><span style="color: red;">* </span>Sector:</label>
                                                        <div class="col">
                                                            <select class="form-select" v-model="data_eventInformation.event_sector">
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
                                                        <b-form-tags style="background-color: #151F2C !important" required input-id="tags-basic" name="tags" v-model="album_tags" placeholder="Add new tags separated by enter key..."></b-form-tags>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                

                                                <div class="card-header">
                                                    <h3 class="card-title">EVENT INFORMATION</h3>
                                                </div>
                            
                                                <b-tabs v-model="tabIndex" small card>
                                                    <b-tab title="Photo">
                                                        <b-card no-body>
                                                            <b-tabs card>
                                                                <b-tab v-for="(photoEntry, i) in photo_tabs" :key="'dyn-tab-' + i" :title="'Photo ' + (i+1)">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-lg-6 mb-0">
                                                                            <b-form-group >   
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Select Photo:</label>
                                                                                <b-form-file placeholder="Choose a file or drop it here..." drop-placeholder="Drop file here..." v-model="photoEntry.photo_fileName">
                                                                                </b-form-file>
                                                                            </b-form-group> 
                                                                        </div>
                                                                        <div class="col-md-6 col-lg-6 mb-0">
                                                                            <b-form-group class="group" id="form_externalEventDate">
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Photo Title:</label>
                                                                                <b-form-input v-model="photoEntry.photo_title" placeholder="Enter Title..."   ></b-form-input>
                                                                            </b-form-group> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-lg-4 mb-0">
                                                                            <b-form-group class="group" id="form_externalEventDate">
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Photo Category:</label>
                                                                                <b-form-select id="input-3" v-model="photoEntry.category_photo" :options="options_category_photo"   ></b-form-select>
                                                                            </b-form-group> 
                                                                        </div>
                                                                        <div class="col-md-4 col-lg-4 mb-0">
                                                                            <b-form-group class="group" id="form_externalEventDate">
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Person Involved:</label>
                                                                                <b-form-input v-model="photoEntry.photo_personInvolved" placeholder="Enter Names..."   ></b-form-input>
                                                                            </b-form-group> 
                                                                        </div>
                                                                        <div class="col-md-4 col-lg-4 mb-0">
                                                                            <b-form-group class="group" id="form_externalEventDate">
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Photographer:</label>
                                                                                <b-form-input  v-model="photoEntry.photo_photographer" placeholder="Enter Photographer..."   ></b-form-input>
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
                                                                    <b-button size="sm" variant="danger" class="float-right" @click="clearEntry(i)">
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
                                                    <!-- <b-tab title="Video Clip">
                                                        <b-card no-body>
                                                            <b-tabs card>
                                                                <b-tab v-for="(videoEntry, i) in vidClip_tabs" :key="'dyn-tab-' + i" :title="'Video Clip ' + (i+1)">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-lg-4 mb-0">
                                                                            <b-form-group >   
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Video Clip Link:</label>
                                                                                <b-form-input id="" v-model="videoEntry.video_link"  placeholder="Enter Youtube Link here..."   ></b-form-input>
                                                                            </b-form-group> 
                                                                        </div>
                                                                        <div class="col-md-4 col-lg-4 mb-0">
                                                                            <b-form-group class="group" id="form_externalEventDate">
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Video Title:</label>
                                                                                <b-form-input v-model="videoEntry.video_title" placeholder="Enter Title..."   ></b-form-input>
                                                                            </b-form-group> 
                                                                        </div>
                                                                        <div class="col-md-2 col-lg-2 mb-0">
                                                                            <b-form-group class="group" id="form_externalEventDate">
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Duration:</label>
                                                                                <b-form-input id="input-2" v-model="videoEntry.video_duration" placeholder="Enter duration time..."   ></b-form-input>
                                                                            </b-form-group> 
                                                                        </div>
                                                                        <div class="col-md-2 col-lg-2 mb-0">
                                                                            <b-form-group class="group" id="form_externalEventDate">
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Video Type:</label>
                                                                                <b-form-select id="input-3" v-model="videoEntry.video_type" :options="options_category_type"   ></b-form-select>
                                                                            </b-form-group> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-lg-4 mb-0">
                                                                            <b-form-group class="group" id="form_externalEventDate">
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Video Category:</label>
                                                                                <b-form-select id="input-3" v-model="videoEntry.video_category" :options="options_category_video"   ></b-form-select>
                                                                            </b-form-group> 
                                                                        </div>
                                                                        <div class="col-md-4 col-lg-4 mb-0">
                                                                            <b-form-group class="group" id="form_externalEventDate">
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Person Involved:</label>
                                                                                <b-form-input v-model="videoEntry.video_personInvolved" placeholder="Enter Names..."   ></b-form-input>
                                                                            </b-form-group> 
                                                                        </div>
                                                                        <div class="col-md-4 col-lg-4 mb-0">
                                                                            <b-form-group class="group" id="form_externalEventDate">
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Videographer:</label>
                                                                                <b-form-input  v-model="videoEntry.video_photographer" placeholder="Enter Photographer..."   ></b-form-input>
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
                                                                                <label for="entryDate" class="label" style="color:black; font-weight: bold">Video Clip Tags:</label>
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
                                                    </b-tab> -->
                                                </b-tabs> 

                                                <!-- <div style="margin-top:40px">
                                                    <b-button variant="warning" value="1" @click="openConfirmCreateAlbum(1)">Save as Draft</b-button>
                                                    <b-button variant="primary" value="2" @click="openConfirmCreateAlbum(2)">Submit to Publisher</b-button>
                                                    <b-button variant="danger" >Reset</b-button>

                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            <b-button variant="warning" value="1" @click="openConfirmCreateAlbum(1)">Save as Draft</b-button>
                                            <b-button variant="primary" value="2" @click="openConfirmCreateAlbum(2)">Submit to Publisher</b-button>
                                            <b-button variant="danger" >Reset</b-button>
                                        </div>
                                    </div>
                            </b-modal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </template>
        
        
        <script>
        
            import * as assets_service from '../../../services/assets_service';
            
        
            export default {
                data() {
                    return {
                        infoModal: {
                            id: 'info-modal',
                            title: '',
                            content: ''
                        },
                        list_photo: [],
                        list_video: [],
                        photo_length: 0,
                        video_length: 0,
                        list_albumTags: [],
                        albumInfo:{},
                        list_draft: [],
                        list_forRevision: [],
                        list_forReview: [],
                        list_published: [],
                        list_unpublished: [],
                        totalRows_draft: '',
                        totalRows_forRevision: '',
                        totalRows_forReview: '',
                        totalRows_published: '',
                        totalRows_unpublished: '',
                        buttonValue: '',
                        infoModal: {
                            id: 'info-modal',
                            title: '',
                            content: ''
                        },
                        fields_draft: [
                            // { key: 'id', label: 'No'},
                            { key: 'album_id', label: 'Album ID'},
                            { key: 'event_title', label: 'Title'},
                            // { key: 'event_category', label: 'Category'},
                            { key: 'album_status', label: 'Status'},
                            { key: 'details', label: 'Details'},
                            { key: 'action', label: 'Action' }
                        ],
                        fields_forReview: [
                            // { key: 'id', label: 'No'},
                            { key: 'album_id', label: 'Album ID'},
                            { key: 'event_title', label: 'Title'},
                            // { key: 'event_category', label: 'Category'},
                            { key: 'album_status', label: 'Status'},
                            { key: 'details', label: 'Details'}
                        ],
                        data_eventInformation:{},
                        selected_category_album: null,
                        options_category_album: [
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
                            { value: '17', text: 'Undersecretaries' }
                        ],
                        selected_category_album: null,
                        options_category_album: [
                            { value: null, text: 'Please select category', disabled: true},
                            { value: '1', text: 'Anniversary' },
                            { value: '2', text: 'Awarding Ceremonies' },
                            { value: '3', text: 'Building Inauguration' },
                            { value: '4', text: 'Conference' },
                            { value: '5', text: 'Convention' },
                            { value: '6', text: 'Exhibits' },
                            { value: '7', text: 'Forum' },
                            { value: '8', text: 'MOA Signing' },
                            { value: '9', text: 'MOU Signing' },
                            { value: '10', text: 'NSTW' },
                            { value: '11', text: 'NYSTIF' },
                            { value: '12', text: 'Program Launch' },
                            { value: '13', text: 'Prject Launch' },
                            { value: '14', text: 'Project Visit' },
                            { value: '15', text: 'RSTW' },
                            { value: '16', text: 'Scholarship' },
                            { value: '17', text: 'Scientific Meeting' },
                            { value: '18', text: 'Training/Seminar' }
                        ],
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
                            { value: '17', text: 'Undersecretaries' }
                        ],
                        options_category_type: [
                            { value: null, text: 'Please select video type', disabled: true},
                            { value: '1', text: 'Full Video' },
                            { value: '2', text: 'Video Clip' },
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
                            { value: '15', text: 'Others' }
                        ],
                        selected_sector: null,
                        options_sector: [
                            { value: null, text: 'Please select sector', disabled: true},
                            { value: '1', text: 'Collegial and Scientific Bodies' },
                            { value: '2', text: 'Regional Offices and S&T Provincial Centers' },
                            { value: '3', text: 'Research and Development Institutes' },
                            { value: '4', text: 'Scientific and Technological Services' },
                            { value: '5', text: 'Sectoral Planning Councils' }
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
                            { value: '15', text: 'Philippine Council for Agriculture and Resources and Research Development' }
                        ],
                        selected_agency: null,
                        options_agency: [
                            { value: null, text: 'Please select organizing agency/office', disabled: true},
                            { value: '1', text: 'Attached Agencies' },
                            { value: '2', text: 'Regional Offices' },
                            { value: '3', text: 'Provincial S&T Centers (PSTCs)' }
                        ],
                        album_tags: [],
                    }
                    
                },
                mounted(){
                    this.loadDraftList();
                    this.loadForReviewList();
                    this.loadForRevisionList();
                    this.loadPublishedList();
                    this.loadUnpublishedList();
                },
                methods: {
                    edit_eventInformation: async function(data) {
                        this.data_eventInformation = {...data}

                        const response = await assets_service.getTags_selected(this.data_eventInformation.album_id);
                        this.album_tags = response.data.map(item => item.album_tagName);
                        console.log(this.album_tags);
                        

                        const response_photos = await assets_service.getListPhoto_selected(this.data_eventInformation.album_id);
                        // this.album_tags = response.data.map(item => item.album_tagName);
                        console.log(response_photos.data);

                        this.$refs['assignModalForm_2'].show();


                        // let govTypeId = this.data_eventInformation_update.supportType;
                        // if (govTypeId == "Livestream" || govTypeId == "IS" || govTypeId == "TWG"|| govTypeId == "Other"){
                        //     this.$refs['assignModalForm_1'].show();
                        // } else if (govTypeId == "Technical Support" ){
                        //     this.$refs['assignModalForm_2'].show();
                        // }
                    },
                    info(item, index, button) {
                        this.infoModal.title = `Row index: ${index}`
                        this.infoModal.content = JSON.stringify(item, null, 2)
                        this.$root.$emit('bv::show::modal', this.infoModal.id, button)
                    },
                    loadDraftList: async function() {
                        try{
                            const response = await assets_service.getAllListDraft();
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
                            const response = await assets_service.getAllListForRevision();
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
                            const response = await assets_service.getAllListForReview();
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
                            const response = await assets_service.getAllListPublished();
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
                            const response = await assets_service.getAllListUnpublished();
                            this.list_unpublished = response.data;
                            this.totalRows_unpublished= this.list_unpublished.length;
                        } catch(error) {
                            this.flashMessage.error({
                            message: 'Some error occured! Please try again.',
                            time: 5000
                            });
                        }
                    },
                    info(item, index, button) {
                        this.infoModal.title = `Row index: ${index}`
                        this.infoModal.content = JSON.stringify(item, null, 2)
                        this.$root.$emit('bv::show::modal', this.infoModal.id, button)
                        console.log(`Row index: ${index}`);
                        console.log(item.album_id);
                    },
                    resetInfoModal() {
                        this.infoModal.title = ''
                        this.infoModal.content = ''
                    },
                    onFiltered(filteredItems) {
                        // Trigger pagination to update the number of buttons/pages due to filtering
                        this.totalRows = filteredItems.length
                        this.currentPage = 1
                    },
                    viewAlbumInfo: async function(data) {
                        this.albumInfo = {...data};
                        let a = this.albumInfo.album_id;
                        // console.log(a);
    
                        const response_photoList = await assets_service.getListPhoto_selected(a);
                        this.list_photo = response_photoList.data;
                        this.photo_length = this.list_photo.length;
                        // console.log(this.photo_length);
    
                        const response_albumTags = await assets_service.getTags_selected(a);
                        this.list_albumTags = response_albumTags.data;
                        // console.log(this.list_albumTags);
                        
                        const response_videoList = await assets_service.getListVideo_selected(a);
                        this.list_video = response_videoList.data;
                        this.video_length = this.list_video.length;
                        console.log("video lenght: " +this.video_length);
                        
                        this.$refs['modal_albumInfo'].show();
                    },
                    changeStatus: async function (){
    
                        console.log(this.buttonValue);
    
                        // if (this.buttonValue == "1"){
                        //     this.albumStatus = "Saved as Draft"
                        // }
                        // else if (this.buttonValue == "2"){
                        //     this.albumStatus = "Submitted for Review";
                        // }
                        // else if (this.buttonValue == "3"){
                        //     this.albumStatus = "Published";
                        // }
                        // else if (this.buttonValue == "4"){
                        //     this.albumStatus = "Unpublished";
                        // }
                        // else if (this.buttonValue == "5"){
                        //     this.albumStatus = "For Revision";
                        // }
    
                        // console.log(this.albumStatus)
    
    
                        try{
                            
                            // let formData_albumStatus = new FormData();
                            // formData_albumStatus.append('album_id', this.album_id);
                            // formData_albumStatus.append('album_status', this.albumStatus);
                            // const response_albumStatusData = await assets_service.addAlbumStatus(formData_albumStatus);
                            
                        }catch(error){
    
                        }
                    },
                }
            }
        </script>
        
    
     
        <style>
            .form-label{
                color: black;
            }
    
            .card-title{
                color: black;
            }
    
            /* .form-select{
                background-color: white;
            } */
            .card-header-tabs{
                background-color: rgba(0, 0, 0, 0.03);
            }
    
            .list-group-item{
                background-color: #151f2c !important;
            }
    
            .img-width{
                width: 50px;
            }
    
            .datagrid-content{
                color: black;
                font-weight: 700;
            }
            .photo-style{
                border: 1px solid #151f2c;
                padding: 15px;
            }
    
        </style>
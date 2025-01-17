<template>
    <div>
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            ADD EVENT
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
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
                                                Review Details
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
                                                    <a class="dropdown-item" href="#" @click="info(row.item, row.index, $event.target)" >
                                                        <!-- <b-button size="sm" class="mr-1" variant="success"> -->
                                                            Edit
                                                        <!-- </b-button> -->
                                                    </a>
                                                    <a class="dropdown-item" href="#">Change permissions</a>
                                                    <a class="dropdown-item text-danger" href="#">Delete user</a>
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
    
                        const response_albumTags = await assets_service.getAlbumTags_selected(a);
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
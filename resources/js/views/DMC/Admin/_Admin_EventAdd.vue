<template>

    <div>
    
    
            <!-- Page header -->
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
            <!-- Page body -->
            <div class="page-body">
              <div class="container-xl">
                  <div class="row row-cards">
    
                    <!-- <b-form id="createEventForm"> -->
    
                        <div class="col-lg-12">
                            <div class="row row-cards">
                                <div class="col-12">
                                    <div class="card" id="createEventForm" >
                                        <div class="card-header">
                                            <h3 class="card-title">EVENT INFORMATION</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row row-cards">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                    <label class="form-label"><span style="color: red;">* </span>Event Title:</label>
                                                    <b-form-input v-model="ticketData.eventTitle" placeholder="Enter Title..." required></b-form-input>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3 mb-0">
                                                    <label class="form-label"><span style="color: red;">* </span>Short Description:</label>
                                                    <textarea class="form-control" v-model="ticketData.eventDescription" rows="2" placeholder="Short description here.."></textarea>
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
                                                <div class="col-md-5">
                                                    <div class="mb-3">
                                                    <label class="form-label"><span style="color: red;">* </span>Organizing Agency/Office:</label>
                                                    <b-form-input v-model="selected_agency" placeholder="Enter Organizing Agency/Office..." required></b-form-input>
                                                    </div>
                                                </div>
                                                <div class="ccol-sm-6 col-md-3">
                                                    <div class="mb-3">
                                                    <label class="form-label"><span style="color: red;">* </span>Category:</label>
                                                        <div class="col">
                                                            <select class="form-select" v-model="selected_category_album">
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
                                                            <select class="form-select" v-model="selected_sector">
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
                                                        <b-form-tags style="background-color: #151F2C !important" required input-id="tags-basic" name="tags" v-model="ticketData.eventTags" placeholder="Add new tags separated by enter key..."></b-form-tags>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                

                            
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
                                                    <b-tab title="Video Clip">
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
                                                    </b-tab>
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
                                </div>
                            </div>
                        </div>
    


                        <b-modal id="modal_ConfirmCreateAlbum" ref="modal_ConfirmCreateAlbum" centered title="Are you sure you want to create New Album?" hide-footer no-close-on-backdrop
                        :header-bg-variant="headerBG_ConfirmCreateAlbum" :header-text-variant="headerText_ConfirmCreateAlbum">
                            <div>
                                <!-- <h5>Album was created successfully</h5> -->
                                <!-- <h5>Are you sure you want to create New Album?</h5> -->
                            </div>
                            <div>
                                <b-button class="mt-3" variant="primary" @click="createTicket_external()">Yes</b-button>
                                <b-button class="mt-3" variant="danger" @click="hide_ConfirmCreateAlbum()">No</b-button>
                            </div>
                        </b-modal>

                        <b-modal id="modal_savedSuccessfully" ref="modal_savedSuccessfully" centered title="Success" hide-footer no-close-on-backdrop
                        :header-bg-variant="headerBG_savedSuccessfully" :header-text-variant="headerText_savedSuccessfully">
                            <div>
                                <h5>Album was created successfully!</h5>
                            </div>
                            <div>
                                <b-button class="mt-3" variant="primary" @click="reloadPage()">Okay</b-button>
                            </div>
                        </b-modal>

                        <b-modal id="modal_requiredfields" ref="modal_requiredfields" centered title="Warning" hide-footer no-close-on-backdrop 
                                :header-bg-variant="headerBG_requiredfields" :header-text-variant="headerText_requiredfields">
                            <div>
                                <h5>Please fill out all required fields!</h5>
                            </div>
                            <div>
                                <b-button class="mt-3" variant="info" @click="close_requiredfields()">Okay</b-button>
                            </div>
                        </b-modal>
                  </div>
              </div>
            </div>
    
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
                    headerBG_requiredfields: 'danger',
                    headerText_requiredfields: 'light',
                    headerBG_ConfirmCreateAlbum: 'info',
                    headerText_ConfirmCreateAlbum: 'light',
                    headerBG_savedSuccessfully: 'success',
                    headerText_savedSuccessfully: 'light',
                    tabIndex: 0,
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
                    show: true,
                    ticketData:{
                        status:'',
                        reference_code:''
                    },
                }
            },
            mounted(){
                this.userData();
            },
            methods: {
                // open_requiredfields(){
                //     this.$refs.modal_requiredfields.show()
                // },
                close_requiredfields(){
                    this.$refs.modal_requiredfields.hide()
                },
                openConfirmCreateAlbum(val){
                    this.buttonValue = val;
                    console.log(this.buttonValue);
                   
                    if (this.ticketData.eventTitle === undefined || 
                        this.selected_category_album === null  ||  
                        this.selected_sector === null  ||  
                        this.ticketData.eventDescription === undefined  ||  
                        this.selected_agency === null  ||  
                        this.ticketData.eventDate === undefined  ||  
                        this.ticketData.eventVenue === undefined  ||  
                        this.ticketData.eventTags === undefined  ){
    
                            this.$refs.modal_requiredfields.show()
                    }
                    else{
                        this.$refs.modal_ConfirmCreateAlbum.show()
                    }
                },
                hide_ConfirmCreateAlbum() {
                    this.$refs.modal_ConfirmCreateAlbum.hide()
                },
                reloadPage() {
                    this.$refs.modal_savedSuccessfully.hide()
                    window.location.reload();
                },
                createTicket_external: async function() {
    
                    if (this.buttonValue == "1"){
                        this.albumStatus = "Saved as Draft"
                    }
                    else if (this.buttonValue == "2"){
                        this.albumStatus = "Submitted for Review";
                    }
                    else if (this.buttonValue == "3"){
                        this.albumStatus = "Published";
                    }
                    else if (this.buttonValue == "4"){
                        this.albumStatus = "Unpublished";
                    }
                    else if (this.buttonValue == "5"){
                        this.albumStatus = "For Revision";
                    }
    
                        // console.log(this.albumStatus);
    
                    try{
                        // Generate Album ID
                        const const_1 = await assets_service.countAlbumEntry();
                        let totalAlbumEntry = const_1.data;
                        if (totalAlbumEntry ==0 ){
                            this.album_id = "PA2024-0001";
                        }
                        else if (totalAlbumEntry <= 9 ){
                            let i = totalAlbumEntry + 1;
                            this.album_id = "PA2024-000" + i;
                        }
                        else if (totalAlbumEntry > 9){
                            let i = totalAlbumEntry + 1;
                            this.album_id = "PA2024-00" + i;
                        }
                        
                        // Create an Album
                        let formData_eventData = new FormData();
                        formData_eventData.append('album_id', this.album_id);
                        formData_eventData.append('event_title', this.ticketData.eventTitle);
                        formData_eventData.append('event_category', this.selected_category_album);
                        formData_eventData.append('event_sector', this.selected_sector);
                        formData_eventData.append('event_description', this.ticketData.eventDescription);
                        formData_eventData.append('event_organizingAgency', this.selected_agency);
                        formData_eventData.append('event_date', this.ticketData.eventDate);
                        formData_eventData.append('event_venue', this.ticketData.eventVenue);
                        formData_eventData.append('event_tags', this.ticketData.eventTags);
                        const response_eventData = await assets_service.addEventData(formData_eventData);
                        
                        // Save tags
                        let formData_albumTags = new FormData();
                        let tagList = [];
                        tagList = this.ticketData.eventTags;
    
                        for (let i = 0; i < tagList.length; i ++) {
                            let tagName = tagList.slice(i, i+1);
    
                            formData_albumTags.append('album_id', this.album_id);
                            formData_albumTags.append('album_tagName', tagName);
    
                            const response_albumTags = await assets_service.addAlbumTags(formData_albumTags);
                        }
    
                        
                        // Save Album Status 
                        
                        // Save Photos
                        let formData_photoData = new FormData();
    
                        this.photo_tabs.forEach((photoEntry, index) => {
                            console.log("this is album id" + this.album_id);
                            formData_photoData.append(`photo_form[${index}][album_id]`, this.album_id);
                            // formData_photoData.append(`photo_form[${index}][photo_id]`, this.photo_id);
                            formData_photoData.append(`photo_form[${index}][photo_fileName]`, photoEntry.photo_fileName);
                            formData_photoData.append(`photo_form[${index}][photo_personInvolved]`, photoEntry.photo_personInvolved);
                            formData_photoData.append(`photo_form[${index}][photo_title]`, photoEntry.photo_title);
                            formData_photoData.append(`photo_form[${index}][photo_category]`, photoEntry.category_photo);
                            formData_photoData.append(`photo_form[${index}][photo_description]`, photoEntry.photo_description);
                            formData_photoData.append(`photo_form[${index}][photo_photographer]`, photoEntry.photo_photographer);
                            formData_photoData.append(`photo_form[${index}][photo_tags]`, photoEntry.photo_tags);
                        });
                        
                        const response_photoData = await assets_service.addPhotoData(formData_photoData);
    
                        // Save Videos
                        let formData_videoData = new FormData();
                        this.vidClip_tabs.forEach((videoEntry, index) => {
                            let url = videoEntry.video_link;
                            let urlID = url.split("v=")[1].substring(0, 11)
                                
                            console.log("this is album id" + this.album_id);
                            formData_videoData.append(`video_form[${index}][album_id]`, this.album_id);
                            formData_videoData.append(`video_form[${index}][video_link]`, videoEntry.video_link);
                            formData_videoData.append(`video_form[${index}][video_youtubeID]`, urlID);
                            formData_videoData.append(`video_form[${index}][video_title]`, videoEntry.video_title);
                            formData_videoData.append(`video_form[${index}][video_personInvolved]`, videoEntry.video_personInvolved);
                            formData_videoData.append(`video_form[${index}][video_category]`, videoEntry.video_category);
                            formData_videoData.append(`video_form[${index}][video_duration]`, videoEntry.video_duration);
                            formData_videoData.append(`video_form[${index}][video_type]`, videoEntry.video_type);
                            formData_videoData.append(`video_form[${index}][video_description]`, videoEntry.video_description);
                            formData_videoData.append(`video_form[${index}][video_videographer]`, videoEntry.video_videographer);
                        });
                        
                        const response_videoData = await assets_service.addVideoData(formData_videoData);
                        // this.ticketData.eventTitle = "";
                        // this.ticketData.eventDescription = "";
    
                        
    
    
                    }catch (error) {
                        // this.flashMessage.error({
                        //     message: 'An error occured. Please try again!'
                        // });
                    }
    
                    
                    this.$refs.modal_ConfirmCreateAlbum.hide()
                    this.$refs.modal_savedSuccessfully.show()
                    
    
                    // this.flashMessage.success({
                    //             message: 'Album Created Successfully!'
                    //     });
                        
    
                },
                changeStatus: async function (){
    
                    if (this.buttonValue == "1"){
                        this.albumStatus = "Saved as Draft"
                    }
                    else if (this.buttonValue == "2"){
                        this.albumStatus = "Submitted for Review";
                    }
                    else if (this.buttonValue == "3"){
                        this.albumStatus = "Published";
                    }
                    else if (this.buttonValue == "4"){
                        this.albumStatus = "Unpublished";
                    }
                    else if (this.buttonValue == "5"){
                        this.albumStatus = "For Revision";
                    }
    
                    try{
                        
                    }catch(error){
    
                    }
                },
                countAlbumPhotoEntry: async function(){
                    
                        // const const_2 = assets_service.countAlbumPhotoEntry(this.album_id);
                        // let totalAlbumPhotoEntry = const_1.data;
                        // return totalAlbumPhotoEntry;
                        return "hello";
                        // if (totalAlbumPhotoEntry <= 9){
                        //     let i = totalAlbumPhotoEntry++;
                        //     this.photo_id_id = "PH2024-0000" + i;
                        // }
                        // else if (totalAlbumPhotoEntry > 9){
                        //     let i = totalAlbumPhotoEntry++;
                        //     this.photo_id_id = "PH2024-000" + i;
                        // }
                },
                clearEntry(index){
                    this.photo_tabs.splice(index,1);
                },
                photo_newTab() {
                    this.photo_tabs.push({
                            photo_fileName: null,
                            photo_personInvolved: '',
                            photo_title: '',
                            photo_category: '',
                            photo_description: '',
                            photo_photographer: '',
                            photo_photographer: ''
                        })
                },
                vidClip_newTab() {
                    this.vidClip_tabs.push({
                            photo_fileName: null,
                            photo_personInvolved: '',
                            photo_title: '',
                            photo_category: '',
                            photo_description: '',
                            photo_photographer: '',
                            photo_photographer: ''
                        })
                },
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
                }
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


    </style>
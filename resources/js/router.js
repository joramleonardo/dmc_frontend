import Vue from 'vue';
import Router from 'vue-router';

import Login from './views/Login/Login.vue';
import Landing from './views/DMC/_Landing.vue';

import Admin_Home from './views/DMC/Admin/_Admin_Home.vue';
import Admin_Dashboard from './views/DMC/Admin/_Admin_Dashboard.vue';
import Admin_Event_Add from './views/DMC/Admin/_Admin_EventAdd.vue';
import Admin_Event_List from './views/DMC/Admin/_Admin_EventList.vue';

import Author_Home from './views/DMC/Author/_Author_Home.vue';
import Author_Events from './views/DMC/Author/_Author_Events.vue';
import Author_Dashboard from './views/DMC/Author/_Author_Dashboard.vue';
import Author_Event_Add from './views/DMC/Author/_Author_EventAdd.vue';
import Author_Event_List from './views/DMC/Author/_Author_EventList.vue';
import Author_Album_Page from './views/DMC/Author/_Author_AlbumPage.vue';


import Publisher_Home from './views/DMC/Publisher/_Publisher_Home.vue';
import Publisher_Events from './views/DMC/Publisher/_Publisher_Events.vue';
import Publisher_Album_Page from './views/DMC/Publisher/_Publisher_AlbumPage.vue';


import Photo_Add from './views/DMC/Admin/_Admin_EventAdd.vue';
import Photo_List from './views/DMC/Admin/_Admin_EventAdd.vue';
import Video_Add from './views/DMC/Admin/_Admin_EventAdd.vue';
import Video_List from './views/DMC/Admin/_Admin_EventAdd.vue';


import Landing_Holder from './views/DMC/Landing/_Holder.vue';
import Landing_Home from './views/DMC/Landing/Home.vue';
import Landing_Events from './views/DMC/Landing/Events.vue'; //Album
import Landing_Coverages from './views/DMC/Landing/Coverages.vue'; //Videos
import Landing_Photos from './views/DMC/Landing/Photos.vue'; //Photos
import Landing_SingleEvent from './views/DMC/Landing/SingleEvent.vue'; //Single Event
import Landing_SingleVideo from './views/DMC/Landing/SingleVideo.vue'; //Single Video
import Landing_SinglePhoto from './views/DMC/Landing/SinglePhoto.vue'; //Single Photo




Vue.use(Router);

const routes = [
    
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/',
        name: '',
        component: Landing_Holder,
        children: [
            {
                path: '/home',
                name: 'home',
                component: Landing_Home,
            },
            {
                path: '/events',
                name: 'events',
                component: Landing_Events,
            },
            {
                path: '/coverages',
                name: 'coverages',
                component: Landing_Coverages,
            },
            {
                path: '/photos',
                name: 'photos',
                component: Landing_Photos,
            },
            {
                path: '/single-event',
                name: 'single-event',
                component: Landing_SingleEvent,
            },
            {
                path: '/single-video',
                name: 'single-video',
                component: Landing_SingleVideo,
            },
            {
                path: '/single-photo',
                name: 'single-photo',
                component: Landing_SinglePhoto,
            },
        ]
    },
    
];

const router = new Router({
    routes: routes,
    linkActiveClass: 'active'
});

export default router;
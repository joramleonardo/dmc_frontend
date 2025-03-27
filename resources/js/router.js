import Vue from 'vue';
import Router from 'vue-router';

import Login from './views/Login/Login.vue';

import Landing_Main from './views/DMC/Landing/_MainLanding.vue';
import Landing_Holder from './views/DMC/Landing/_Holder.vue';
import Landing_Home from './views/DMC/Landing/Home.vue';
import Landing_Events from './views/DMC/Landing/Events.vue'; //Album
import Landing_Coverages from './views/DMC/Landing/Coverages.vue'; //Videos
import Landing_Photos from './views/DMC/Landing/Photos.vue'; //Photos
import Landing_SingleEvent from './views/DMC/Landing/SingleEvent.vue'; //Single Event
import Landing_SingleVideo from './views/DMC/Landing/SingleVideo.vue'; //Single Video
import Landing_SinglePhoto from './views/DMC/Landing/SinglePhoto.vue'; //Single Photo


import _Home from './views/DMC/Landing/_Home.vue';
import _Photos from './views/DMC/Landing/_Photos.vue';


Vue.use(Router);

const routes = [

    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/_home',
        name: '_home',
        component: _Home
    },
    {
        path: '/_photos',
        name: '_photos',
        component: _Photos
    },
    {
        path: '/',
        name: '',
        component: Landing_Main
    },
    {
        path: '/holder',
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
                path: '/single-event/:id',
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
    mode: 'history', // <---- Change from hash to history mode
    routes: routes,
    linkActiveClass: 'active'
});

export default router;

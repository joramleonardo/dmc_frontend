import Vue from 'vue';
import Router from 'vue-router';

import Login from './views/Login/Login.vue';



import HomePage from './views/DMC/Landing/_Holder.vue';
import Landing_Main from './views/DMC/Pages/Home/ComponentMain_Landing.vue';
import Landing_SingleEvent from './views/DMC/Pages/Events/ComponentSection_SingleEvent.vue';
import Events from './views/DMC/Pages/Events/ComponentSection_Events.vue';
import EventsByTags from './views/DMC/Pages/Events/ComponentSection_EventsByTags.vue';
import EventsByCategory from './views/DMC/Pages/Events/ComponentSection_EventsByCategory.vue';
import UpcomingSingleEvent from './views/DMC/Pages/Events/ComponentSection_UpcomingSingleEvent.vue';


import PhotoGallery from './views/DMC/Pages/Photos/ComponentSection_PhotoGallery.vue';

import Landing_Home from './views/DMC/Landing/Home.vue';
import Landing_Coverages from './views/DMC/Landing/Coverages.vue';
import Landing_Photos from './views/DMC/Landing/Photos.vue';
// import Landing_SingleVideo from './views/DMC/Landing/SingleVideo.vue';
// import Landing_SinglePhoto from './views/DMC/Landing/SinglePhoto.vue';



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
        path: '/photos',
        name: 'photos',
        component: PhotoGallery
    },
    {
        path: '/events',
        name: 'events',
        component: Events
    },
    {
        path: '/events-tags',
        name: 'events-tags',
        component: EventsByTags
    },
    {
        path: '/events-category',
        name: 'events-category',
        component: EventsByCategory
    },
    {
        path: '/',
        name: '',
        component: Landing_Main
    },
    {
        path: '/single-event/:id',
        name: 'single-event',
        component: Landing_SingleEvent,
    },
    {
        path: '/upcoming-single-event/:id',
        name: 'upcoming-single-event',
        component: UpcomingSingleEvent,
    },
    // {
    //     path: '/holder',
    //     name: '',
    //     component: HomePage,
    //     children: [
    //         {
    //             path: '/home',
    //             name: 'home',
    //             component: Landing_Home,
    //         },
    //         {
    //             path: '/coverages',
    //             name: 'coverages',
    //             component: Landing_Coverages,
    //         },
    //         {
    //             path: '/photos',
    //             name: 'photos',
    //             component: Landing_Photos,
    //         },
    //         {
    //             path: '/single-event/:id',
    //             name: 'single-event',
    //             component: Landing_SingleEvent,
    //         },
    //     ]
    // },

];

const router = new Router({
    mode: 'history', // <---- Change from hash to history mode
    routes: routes,
    linkActiveClass: 'active'
});

export default router;

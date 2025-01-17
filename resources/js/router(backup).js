import Vue from 'vue';
import Router from 'vue-router';
import LoginPage from './views/Login.vue';

//SUPER ADMIN-ACCESS
import SuperAdmin_Home from './views/Home_SuperAdmin.vue';
import SuperAdmin_Dashboard from './views/Dashboard-SuperAdmin.vue';
import SuperAdmin_HealthAndTraining from './views/HealthAndTraining.vue';
import SuperAdmin_HT_Employee from './views/tblEmployee.vue';
import SuperAdmin_HT_Training from './views/tblTraining.vue';
import SuperAdmin_HT_HealthCondition from './views/tblHealthcondition.vue';
import SuperAdmin_Library from './views/Library.vue';
import SuperAdmin_LIB_Client from './views/tbl-Library-Client.vue';
import SuperAdmin_LIB_MaterialRequest from './views/tbl-Library-MaterialRequest.vue';
import SuperAdmin_LIB_Request from './views/tblRequest.vue';
import SuperAdmin_LIB_Evaluation from './views/tblEvaluation.vue';
import SuperAdmin_LIB_ResearchLog from './views/tblResearchlog.vue';
import SuperAdmin_SJA from './views/ScienceJourno.vue';
import SuperAdmin_SJA_Event from './views/tblEvent.vue';
import SuperAdmin_SJA_Speaker from './views/tblSpeaker.vue';
import SuperAdmin_SJA_Participants from './views/tblParticipants.vue';
import SuperAdmin_PJS from './views/PJS.vue';
import SuperAdmin_PJS_Researcher from './views/tblResearcher.vue';
import SuperAdmin_PJS_Manuscript from './views/tblManuscript.vue';
import SuperAdmin_AdminUsers from './views/AdminUsers.vue';

import Admin_HealthAndTraining from './views/HealthAndTraining.vue';
import Admin_HT_Employee from './views/tblEmployee.vue';
import Admin_HT_Training from './views/tblTraining.vue';
import Admin_HT_HealthCondition from './views/tblHealthcondition.vue';
import Admin_Library from './views/Library.vue';
import Admin_LIB_Client from './views/tbl-Library-Client.vue';
import Admin_LIB_Request from './views/tblRequest.vue';
import Admin_LIB_Evaluation from './views/tblEvaluation.vue';
import Admin_LIB_ResearchLog from './views/tblResearchlog.vue';
import Admin_LIB_Ollp from './views/tbl-Library-Ollp.vue';
import Admin_LIB_Webinar from './views/tbl-Library-Webinar.vue';
import Admin_SJA from './views/ScienceJourno.vue';
import Admin_SJA_Event from './views/tblEvent.vue';
import Admin_SJA_Speaker from './views/tblSpeaker.vue';
import Admin_SJA_Participants from './views/tblParticipants.vue';
import Admin_PJS from './views/PJS.vue';
import Admin_PJS_Researcher from './views/tblResearcher.vue';
import Admin_PJS_Manuscript from './views/tblManuscript.vue';
import Admin_Starbooks from './views/Starbooks.vue';
import Admin_DOSTv from './views/DOSTv.vue';

// AuthorHR_ ACCESS
import AuthorHR_Home from './views/Home_AuthorHR.vue';
import AuthorHR_Dashboard from './views/Dashboard-Author-HR.vue';
import AuthorHR_HealthAndTraining from './views/HealthAndTraining.vue';
import AuthorHR_HT_Employee from './views/tblEmployee.vue';
import AuthorHR_HT_Training from './views/tblTraining.vue';
import AuthorHR_HT_HealthCondition from './views/tblHealthcondition.vue';

// AuthorLibrary_ ACCESS
import AuthorLibrary_Home from './views/Home_AuthorLibrary.vue';
import AuthorLibrary_Dashboard from './views/Dashboard-Author-Library.vue';
import AuthorLibrary_LIB from './views/Library.vue';
import AuthorLibrary_LIB_MaterialRequest from './views/tbl-Library-MaterialRequest.vue';
import AuthorLibrary_LIB_Ollp from './views/tbl-Library-Ollp.vue';
import AuthorLibrary_LIB_Webinar from './views/tbl-Library-Webinar.vue';
import AuthorLibrary_LIB_Client from './views/tbl-Library-Client.vue';
import AuthorLibrary_LIB_Request from './views/tblRequest.vue';
import AuthorLibrary_LIB_Evaluation from './views/tblEvaluation.vue';
import AuthorLibrary_LIB_ResearchLog from './views/tblResearchlog.vue';


// AuthorSJA_ ACCESS
import AuthorSJA_Home from './views/Home_AuthorSJA.vue';
import AuthorSJA_Dashboard from './views/Dashboard-Author-SJA.vue';
import AuthorSJA_SJA from './views/ScienceJourno.vue';
import AuthorSJA_SJA_Event from './views/tblEvent.vue';
import AuthorSJA_SJA_Speaker from './views/tblSpeaker.vue';
import AuthorSJA_SJA_Participants from './views/tblParticipants.vue';

// AuthorPJS_ ACCESS
import AuthorPJS_Home from './views/Home_AuthorPJS.vue';
import AuthorPJS_Dashboard from './views/Dashboard-Author-PJS.vue';
import AuthorPJS_PJS from './views/PJS.vue';
import AuthorPJS_PJS_Researcher from './views/tblResearcher.vue';
import AuthorPJS_PJS_Manuscript from './views/tblManuscript.vue';

// AuthorSTARBOOKS_ ACCESS
import AuthorSTARBOOKS_Home from './views/Home_AuthorStarbooks.vue';
import AuthorSTARBOOKS_Dashboard from './views/Dashboard-Author-Starbooks.vue';
import AuthorSTARBOOKS_data from './views/tblStarbooks.vue';

// AuthorDOSTv_ ACCESS
import AuthorDOSTv_Home from './views/Home_AuthorDOSTv.vue';
import AuthorDOSTv_Dashboard from './views/Dashboard-Author-DOSTv.vue';
import AuthorDOSTv_DOSTv from './views/DOSTv.vue';
import AuthorDOSTv_DOSTv_ExperTalk from './views/tblDOSTvExperTalk.vue';
import AuthorDOSTv_DOSTv_ExperTalkGuest from './views/tblDOSTvExperTalkGuest.vue';
import AuthorDOSTv_DOSTv_ExperTalkViews from './views/tblDOSTvExperTalkViews.vue';

//ADMIN-ACCESS
import Admin_Home from './views/Home_Admin.vue';
import Admin_Dashboard from './views/Dashboard-Admin.vue';
import AdminHR_Dashboard from './views/Dashboard-Author-HR.vue';
import AdminLibrary_Dashboard from './views/Dashboard-Author-Library.vue';
import AdminSJA_Dashboard from './views/Dashboard-Author-SJA.vue';
import AdminPJS_Dashboard from './views/Dashboard-Author-PJS.vue';
import AdminSTARBOOKS_Dashboard from './views/Dashboard-Author-Starbooks.vue';
import AdminDOSTv_Dashboard from './views/Dashboard-Author-DOSTv.vue';


import Home from './views/Main/Home.vue';
import Dashboard from './views/Main/Dashboard.vue';
import DOSTv from './views/Main/A_DOSTv.vue';
import HR from './views/Main/A_hr.vue';
import Library from './views/Main/A_Library.vue';
import PJS from './views/Main/A_PJS.vue';
import SJA from './views/Main/A_SJA.vue';
import STARBOOKS from './views/Main/A_Starbooks.vue';

import Landing from './views/DMC/_Landing.vue';


Vue.use(Router);

const routes = [
    
    {
        path: '/',
        name: '',
        component: Landing
    },
    {
        path: '/home',
        name: 'home',
        component: Home,
        children: [
            {
                path: '/dashboard/',
                name: 'dashboard',
                component: Dashboard,
            },
            {
                path: '/starbooks/',
                name: 'starbooks',
                component: STARBOOKS,
            },
            {
                path: '/sja/',
                name: 'sja',
                component: SJA,
            },
            {
                path: '/pjs/',
                name: 'pjs',
                component: PJS,
            },
            {
                path: '/dostv/',
                name: 'dostv',
                component: DOSTv,
            },
            {
                path: '/hr/',
                name: 'hr',
                component: HR,
            },
            {
                path: '/library/',
                name: 'library',
                component: Library,
            },
        ],
    },
    //Super Admin Routes
    {
        path: '/superadmin',
        name: 'superadmin',
        component: SuperAdmin_Home,
        children: [
            {
                path: '/superadmin/dashboard',
                name: 'superadmin-dashboard',
                component: SuperAdmin_Dashboard,
            },
            {
                path: '/superadmin/healthandtraining',
                name: 'superadmin-healthandtraining',
                component: SuperAdmin_HealthAndTraining
            },
                    {
                        path: '/superadmin/healthandtraining/employee',
                        name: 'superadmin-employee',
                        component: SuperAdmin_HT_Employee
                    },
                    {
                        path: '/superadmin/healthandtraining/training',
                        name: 'superadmin-training',
                        component: SuperAdmin_HT_Training
                    },
                    {
                        path: '/superadmin/healthandtraining/healthcondition',
                        name: 'superadmin-health',
                        component: SuperAdmin_HT_HealthCondition
                    },
            {
                path: '/superadmin/library',
                name: 'superadmin-library',
                component: SuperAdmin_Library
            },
                    {
                        path: '/superadmin/library/materialrequest',
                        name: 'superadmin-materialrequest',
                        component: SuperAdmin_LIB_MaterialRequest
                    },
                    {
                        path: '/superadmin/library/client',
                        name: 'superadmin-client',
                        component: SuperAdmin_LIB_Client
                    },
                    {
                        path: '/superadmin/library/request',
                        name: 'superadmin-request',
                        component: SuperAdmin_LIB_Request
                    },
                    {
                        path: '/superadmin/library/evaluation',
                        name: 'superadmin-evaluation',
                        component: SuperAdmin_LIB_Evaluation
                    },
                    {
                        path: '/superadmin/library/researchlog',
                        name: 'superadmin-researchlog',
                        component: SuperAdmin_LIB_ResearchLog
                    },
            {
                path: '/superadmin/sciencejourno',
                name: 'superadmin-sciencejourno',
                component: SuperAdmin_SJA
            },
                    {
                        path: '/superadmin/sciencejourno/event',
                        name: 'superadmin-event',
                        component: SuperAdmin_SJA_Event
                    },
                    {
                        path: '/superadmin/sciencejourno/speaker',
                        name: 'superadmin-speaker',
                        component: SuperAdmin_SJA_Speaker
                    },
                    {
                        path: '/superadmin/sciencejourno/participants',
                        name: 'superadmin-participants',
                        component: SuperAdmin_SJA_Participants
                    },
            {
                path: '/superadmin/pjs',
                name: 'superadmin-pjs',
                component: SuperAdmin_PJS
            },
                    {
                        path: '/superadmin/pjs/researcher',
                        name: 'superadmin-researcher',
                        component: SuperAdmin_PJS_Researcher
                    },
                    {
                        path: '/superadmin/pjs/manuscript',
                        name: 'superadmin-manuscript',
                        component: SuperAdmin_PJS_Manuscript
                    },
            {
                path: '/superadmin/users',
                name: 'superadmin-users',
                component: SuperAdmin_AdminUsers
            },
        ],
    },
    //Admin Routes
    {
        path: '/admin',
        name: 'admin',
        component: Admin_Home,
        children: [
            {
                path: '/admin/dashboard',
                name: 'admin-dashboard',
                // component: Admin_Dashboard,
                component: AdminHR_Dashboard,
            },
            {
                path: '/admin/dashboard/library',
                name: 'admin-dashboard-library',
                component: AdminLibrary_Dashboard,
            },
            {
                path: '/admin/dashboard/hr',
                name: 'admin-dashboard-hr',
                component: AdminHR_Dashboard,
            },
            {
                path: '/admin/dashboard/starbooks',
                name: 'admin-dashboard-starbooks',
                component: AdminSTARBOOKS_Dashboard,
            },
            {
                path: '/admin/dashboard/sja',
                name: 'admin-dashboard-sja',
                component: AdminSJA_Dashboard,
            },
            {
                path: '/admin/dashboard/pjs',
                name: 'admin-dashboard-pjs',
                component: AdminPJS_Dashboard,
            },
            {
                path: '/admin/dashboard/dostv',
                name: 'admin-dashboard-dostv',
                component: AdminDOSTv_Dashboard,
            },


            {
                path: '/admin/healthandtraining',
                name: 'admin-healthandtraining',
                component: Admin_HealthAndTraining
            },
                    {
                        path: '/admin/healthandtraining/employee',
                        name: 'admin-employee',
                        component: Admin_HT_Employee
                    },
                    {
                        path: '/admin/healthandtraining/training',
                        name: 'admin-training',
                        component: Admin_HT_Training
                    },
                    {
                        path: '/admin/healthandtraining/healthcondition',
                        name: 'admin-health',
                        component: Admin_HT_HealthCondition
                    },
            {
                path: '/admin/library',
                name: 'admin-library',
                component: Admin_Library
            },
                    {
                        path: '/admin/library/client',
                        name: 'admin-client',
                        component: Admin_LIB_Client
                    },
                    {
                        path: '/admin/library/request',
                        name: 'admin-request',
                        component: Admin_LIB_Request
                    },
                    {
                        path: '/admin/library/evaluation',
                        name: 'admin-evaluation',
                        component: Admin_LIB_Evaluation
                    },
                    {
                        path: '/admin/library/researchlog',
                        name: 'admin-researchlog',
                        component: Admin_LIB_ResearchLog
                    },
                    {
                        path: '/admin/library/ollp',
                        name: 'admin-ollp',
                        component: Admin_LIB_Ollp
                    },
                    {
                        path: '/admin/library/webinar',
                        name: 'admin-webinar',
                        component: Admin_LIB_Webinar
                    },
            {
                path: '/admin/sciencejourno',
                name: 'admin-sciencejourno',
                component: Admin_SJA
            },
                    {
                        path: '/admin/sciencejourno/event',
                        name: 'admin-event',
                        component: Admin_SJA_Event
                    },
                    {
                        path: '/admin/sciencejourno/speaker',
                        name: 'admin-speaker',
                        component: Admin_SJA_Speaker
                    },
                    {
                        path: '/admin/sciencejourno/participants',
                        name: 'admin-participants',
                        component: Admin_SJA_Participants
                    },
            {
                path: '/admin/pjs',
                name: 'admin-pjs',
                component: Admin_PJS
            },
                    {
                        path: '/admin/pjs/researcher',
                        name: 'admin-researcher',
                        component: Admin_PJS_Researcher
                    },
                    {
                        path: '/admin/pjs/manuscript',
                        name: 'admin-manuscript',
                        component: Admin_PJS_Manuscript
                    },
            {
                path: '/admin/starbooks',
                name: 'admin-starbooks',
                component: Admin_Starbooks
            },
            {
                path: '/admin/dostv',
                name: 'admin-dostv',
                component: Admin_DOSTv
            },
        ],
    },
    //Author HR Routes
    {
        path: '/author/hr',
        name: 'author-hr',
        component: AuthorHR_Home,
        children: [
            {
                path: '/author/hr/dashboard',
                name: 'author-hr-dashboard',
                component: AuthorHR_Dashboard,
            },
            {
                path: '/author/hr/healthandtraining',
                name: 'author-hr-healthandtraining',
                component: AuthorHR_HealthAndTraining
            },
                    {
                        path: '/author/hr/healthandtraining/employee',
                        name: 'author-hr-employee',
                        component: AuthorHR_HT_Employee
                    },
                    {
                        path: '/author/hr/healthandtraining/training',
                        name: 'author-hr-training',
                        component: AuthorHR_HT_Training
                    },
                    {
                        path: '/author/hr/healthandtraining/healthcondition',
                        name: 'author-hr-health',
                        component: AuthorHR_HT_HealthCondition
                    }
        ],
    },
    //Author Libray Routes
    {
        path: '/author/library',
        name: 'author-lib',
        component: AuthorLibrary_Home,
        children: [
            {
                path: '/author/library/dashboard',
                name: 'author-lib-dashboard',
                component: AuthorLibrary_Dashboard,
            },
            {
                path: '/author/lib/library/',
                name: 'author-lib-library',
                component: AuthorLibrary_LIB
            },
                    {
                        path: '/author/library/materialrequest',
                        name: 'author-materialrequest',
                        component: AuthorLibrary_LIB_MaterialRequest
                    },
                    {
                        path: '/author/library/client',
                        name: 'author-lib-client',
                        component: AuthorLibrary_LIB_Client
                    },
                    {
                        path: '/author/library/request',
                        name: 'author-lib-request',
                        component: AuthorLibrary_LIB_Request
                    },
                    {
                        path: '/author/library/evaluation',
                        name: 'author-lib-evaluation',
                        component: AuthorLibrary_LIB_Evaluation
                    },
                    {
                        path: '/author/library/researchlog',
                        name: 'author-lib-researchlog',
                        component: AuthorLibrary_LIB_ResearchLog
                    },
                    {
                        path: '/author/library/ollp',
                        name: 'author-lib-ollp',
                        component: AuthorLibrary_LIB_Ollp
                    },
                    {
                        path: '/author/library/webinar',
                        name: 'author-lib-webinar',
                        component: AuthorLibrary_LIB_Webinar
                    }
        ],
    },
    //Author PJS Routes
    {
        path: '/author/pjs',
        name: 'author-pjs',
        component: AuthorPJS_Home,
        children: [
            {
                path: '/author/pjs/pjs',
                name: 'author-pjs-pjs',
                component: AuthorPJS_PJS,
            },
            {
                path: '/author/pjs/dashboard',
                name: 'author-pjs-dashboard',
                component: AuthorPJS_Dashboard,
            },
            {
                path: '/author/pjs/researcher',
                name: 'author-pjs-researcher',
                component: AuthorPJS_PJS_Researcher
            },
            {
                path: '/author/pjs/manuscript',
                name: 'author-pjs-manuscript',
                component: AuthorPJS_PJS_Manuscript
            },
        ],
    },
    //Author SJA Routes
    {
        path: '/author/sja',
        name: 'author-sja',
        component: AuthorSJA_Home,
        children: [
            {
                path: '/author/sja/dashboard',
                name: 'author-sja-dashboard',
                component: AuthorSJA_Dashboard,
            },
            {
                path: '/author/sja/sja',
                name: 'author-sja-sja',
                component: AuthorSJA_SJA,
            },
            {
                path: '/author/sja/event',
                name: 'author-sja-event',
                component: AuthorSJA_SJA_Event
            },
            {
                path: '/author/sja/speaker',
                name: 'author-sja-speaker',
                component: AuthorSJA_SJA_Speaker
            },
            {
                path: '/author/sja/participants',
                name: 'author-sja-participants',
                component: AuthorSJA_SJA_Participants
            }
        ],
    },
    //Author DOSTv Routes
    {
        path: '/author/dostv',
        name: 'author-dostv',
        component: AuthorDOSTv_Home,
        children: [
            {
                path: '/author/dostv/dashboard',
                name: 'author-dostv-dashboard',
                component: AuthorDOSTv_Dashboard,
            },
            {
                path: '/author/dostv/dostv',
                name: 'author-dostv-dostv',
                component: AuthorDOSTv_DOSTv,
            },
            {
                path: '/author/dostv/expertalk',
                name: 'author-dostv-expertalk',
                component: AuthorDOSTv_DOSTv_ExperTalk
            },
            {
                path: '/author/dostv/expertalk/guest',
                name: 'author-dostv-expertalk-guest',
                component: AuthorDOSTv_DOSTv_ExperTalkGuest
            },
            {
                path: '/author/dostv/expertalk/views',
                name: 'author-dostv-expertalk-views',
                component: AuthorDOSTv_DOSTv_ExperTalkViews
            },
        ],
    },
    //Author STARBOOKS Routes
    {
        path: '/author/starbooks',
        name: 'author-starbooks',
        component: AuthorSTARBOOKS_Home,
        children: [
            {
                path: '/author/starbooks/dashboard',
                name: 'author-starbooks-dashboard',
                component: AuthorSTARBOOKS_Dashboard,
            },
            {
                path: '/author/starbooks/data',
                name: 'author-starbooks-data',
                component: AuthorSTARBOOKS_data
            }
        ],
    },
    //Login Routes
    {
        path: '/login',
        name: 'login',
        component: LoginPage
    },
    // {
    //     path: '/',
    //     name: '',
    //     component: LoginPage
    // }
];

const router = new Router({
    routes: routes,
    linkActiveClass: 'active'
});

export default router;
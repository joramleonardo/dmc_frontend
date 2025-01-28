import Vue from 'vue';
import App from './App.vue';
import router from './router';

// import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
// import 'vue-toast-notification/dist/theme-sugar.css';

import BootstrapVue from 'bootstrap-vue';
import VueToast from 'vue-toast-notification';

// Register BootstrapVue
Vue.use(BootstrapVue);

// Register VueToast separately
Vue.use(VueToast);

new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
// Vue.mixin({
//     mounted() {
//         if (typeof refreshFsLightbox === 'function') {
//             refreshFsLightbox();
//             console.log("FS Lightbox initialized in component");
//         } else {
//             console.error("FS Lightbox is not available; check CDN loading");
//         }
//     }
// });

// Vue.mixin({
//     mounted() {
//         if (typeof refreshFsLightbox === 'function') {
//             refreshFsLightbox();
//         }
//     }
// });

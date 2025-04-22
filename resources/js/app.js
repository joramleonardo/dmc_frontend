import Vue from 'vue';
import App from './App.vue';
import router from './router';


// import 'bootstrap-vue/dist/bootstrap-vue.css';
// import 'vue-toast-notification/dist/theme-sugar.css';


// import BootstrapVue from 'bootstrap-vue';
// import VueToast from 'vue-toast-notification';

// Vue.use(BootstrapVue);
// Vue.use(VueToast);

new Vue({
    el: '#app',
    router,
    render: h => h(App)
});

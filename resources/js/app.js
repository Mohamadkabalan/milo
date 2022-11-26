import Vue from 'vue';
window.Vue = Vue;
window.axios = require("axios");
Vue.prototype.$http = axios;
window.VeeValidate = require("vee-validate");
window.jQuery = window.$ = require("jquery");
window.eventBus = new Vue();
Vue.config.devtools = true;
require('./bootstrap');

Vue.use(VeeValidate);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 */
Vue.component('Login', require('./components/Login.vue').default);
Vue.component('Survey', require('./components/Survey.vue').default);
Vue.component('Register', require('./components/Register.vue').default);
Vue.component('Statistic', require('./components/Statistic.vue').default);
Vue.component('Step1', require('./components/Step1.vue').default);
Vue.component('Step2', require('./components/Step2.vue').default);
Vue.component('SubmitButton', require('./components/submit-button.vue').default);
Vue.component('question', require('./components/question.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
$(document).ready(function () {
    const app = new Vue({
        el: '#app',
    });
});


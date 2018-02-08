
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('step-one', require('./components/dashboard/entities/event/StepOne'));
Vue.component('step-two', require('./components/dashboard/entities/event/StepTwo'));
Vue.component('rate-setup', require('./components/dashboard/entities/rate/RateSetup'));
Vue.component('new-rate', require('./components/dashboard/entities/rate/NewRate'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const dashboard = new Vue({
    el: '#dashboard'
});
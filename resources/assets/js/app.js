
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.EventBus = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('event-list', require('./components/frontend/entities/event/EventList'));
Vue.component('hotel-list', require('./components/frontend/entities/hotel/HotelList'));
Vue.component('cart', require('./components/frontend/Cart'));
Vue.component('package-calculator', require('./components/frontend/entities/package/PackageCalculator'));
let app = new Vue({
    el: '#app'
});


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);


export let store = {
    filter: 'hello',
};


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('district-decoration', require('./components/DistrictDecoration.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('algemeenbeeld', require('./components/Algemeenbeeld.vue'));
// Vue.component('algemeenbeeldresultaten', require('./components/Algemeenbeeldresultaten.vue'));

// Vue.component('scan-results', require('./components/ScanResults.vue'));

Vue.component('scan-slider', require('./components/ScanSlider.vue'));

// Utility
Vue.component('countdown', require('./components/Countdown.vue'));

// Controlled Components
Vue.component('slider-input', require('./components/SliderInput.vue'));

const app = new Vue({
    el: '#app',
});

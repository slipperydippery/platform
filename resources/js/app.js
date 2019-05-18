
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

import 'lazysizes';
// import a plugin Note: the *.min.js files are not included in the npm package.
// import 'lazysizes/parent-fit/ls.parent-fit';

window.Vue = require('vue');
import 'babel-polyfill'
import BootstrapVue from 'bootstrap-vue'
import PortalVue from 'portal-vue'
Vue.use(BootstrapVue);
Vue.use(PortalVue);


export let store = {
	scan: {
		answers: [
			 { "id": 1, "answer": null},
			 { "id": 2, "answer": null},
			 { "id": 3, "answer": null},
			 { "id": 4, "answer": null},
			 { "id": 5, "answer": null},
			 { "id": 6, "answer": null},
			 { "id": 7, "answer": null},
			 { "id": 8, "answer": null},
			 { "id": 9, "answer": null},
			 { "id": 10, "answer": null},
			 { "id": 11, "answer": null},
			 { "id": 12, "answer": null},
			 { "id": 13, "answer": null},
			 { "id": 14, "answer": null},
			 { "id": 15, "answer": null},
			 { "id": 16, "answer": null},
			 { "id": 17, "answer": null},
			 { "id": 18, "answer": null},
			 { "id": 19, "answer": null},
			 { "id": 20, "answer": null},
		],
	},
	group: {},
	partners: {
	},
    activetheme: 1,
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
Vue.component('select-districts', require('./components/SelectDistricts'));
Vue.component('select-instanties', require('./components/SelectInstanties'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('algemeenbeeld', require('./components/Algemeenbeeld.vue'));
// Vue.component('algemeenbeeldresultaten', require('./components/Algemeenbeeldresultaten.vue'));

// Scan itself
Vue.component('algemeenbeeld', require('./components/Algemeenbeeld.vue'));
Vue.component('algemeenbeeldresultaten', require('./components/Algemeenbeeldresultaten.vue'));

Vue.component('scan-results', require('./components/ScanResults.vue'));

Vue.component('scan-slider', require('./components/ScanSlider.vue'));
// Vue.component('answer-result-slider', require('./components/AnswerResultSlider.vue'));
Vue.component('result-slider', require('./components/ResultSlider.vue'));
Vue.component('result-slider-average', require('./components/ResultSliderAverage.vue'));
Vue.component('average-slider', require('./components/AverageSlider.vue'));

Vue.component('mini-measure', require('./components/MiniMeasure.vue'));
Vue.component('big-measure', require('./components/BigMeasure.vue'));
Vue.component('frontrunner', require('./components/Frontrunner.vue'));

Vue.component('set-followup', require('./components/SetFollowup.vue'));

Vue.component('date-input', require('./components/DateInput.vue'));
Vue.component('date-picker', require('./components/DatePicker.vue'));

Vue.component('select-compare-scans', require('./components/SelectCompareScans.vue'));
Vue.component('compare-theme-results', require('./components/CompareThemeResults.vue'));

Vue.component('edit-scan', require('./components/EditScan.vue'));
Vue.component('edit-districts', require('./components/EditDistricts'));

Vue.component('scan-overview', require('./components/ScanOverview.vue'));
Vue.component('edit-group-icon-modal', require('./components/EditGroupIconModal.vue'));
Vue.component('comparison-overview', require('./components/ComparisonOverview.vue'));

Vue.component('manage-articletypes', require('./components/ManageArticletypes.vue'));
Vue.component('manage-articles', require('./components/ManageArticles.vue'));
Vue.component('edit-article-modal', require('./components/EditArticleModal.vue'));

// Utility
Vue.component('countdown', require('./components/Countdown.vue'));

Vue.component('join-with-code', require('./components/JoinWithCode.vue'));


// Controlled Components
Vue.component('slider-input', require('./components/SliderInput.vue'));
Vue.component('copy-icon', require('./components/CopyIcon.vue'));
Vue.component('promote-user-dropdown-modal', require('./components/PromoteUserDropdownModal.vue'));
Vue.component('remove-user-dropdown-modal', require('./components/RemoveUserDropdownModal.vue'));
Vue.component('message-user-dropdown-modal', require('./components/MessageUserDropdownModal.vue'));

const app = new Vue({
    el: '#app',
});

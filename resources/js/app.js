/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import {
    Button,
    HasError,
    AlertError,
    AlertErrors,
    AlertSuccess
} from 'vform/src/components/bootstrap5'
// 'vform/src/components/bootstrap4'
// 'vform/src/components/tailwind'

Vue.component(Button.name, Button)
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertErrors.name, AlertErrors)
Vue.component(AlertSuccess.name, AlertSuccess)


import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.min.css';
Vue.use(VueIziToast, {
    position: "topCenter",
    progressBarColor: "#FFFFFF",
});

var VueSlugify = require('vue-slugify')
Vue.use(VueSlugify)

Vue.use(require('vue-moment'));

import moment from 'moment'

Vue.filter('simpleDate', function (value) {
    if (value) {
        return moment(String(value)).format('Do MMMM YYYY') //M d, Y h:i:s a /MM/DD/YYYY hh:mm
    }
});

Vue.filter('longDateTime', function (value) {
    if (value) {
        return moment(String(value)).format('Do MMMM YYYY, hh:mm a') //M d, Y h:i:s a /MM/DD/YYYY hh:mm
    }
});

import VueClipboard from 'vue-clipboard2'
VueClipboard.config.autoSetContainer = true // add this line
Vue.use(VueClipboard)

Vue.filter('dateTime', function (value) {
    if (value) {
        return moment(String(value)).format('Do MMM YY, hh:mm a') //M d, Y h:i:s a /MM/DD/YYYY hh:mm
    }
});






Vue.filter('format_number', function (value) {
    return parseInt(value).toLocaleString()
})

import {
    Datetime
} from 'vue-datetime'
// You need a specific loader for CSS files
import 'vue-datetime/dist/vue-datetime.css'
Vue.component('datetime', Datetime);

import VModal from 'vue-js-modal'
Vue.use(VModal, {
    dialog: true,
})

import {
    loadProgressBar
} from 'axios-progress-bar'
loadProgressBar()
import 'axios-progress-bar/dist/nprogress.css'

import Vue2Editor from "vue2-editor";
Vue.use(Vue2Editor);

import cookieconsent from 'vue-cookieconsent-component'
Vue.component('cookie-consent', cookieconsent)

// import "vue-easytable/libs/theme-default/index.css"; // import style
// import VueEasytable from "vue-easytable";
// Vue.use(VueEasytable);
// import "vue-easytable/libs/theme-default/index.css"; // import style

// import { VeTable, VePagination, VeIcon, VeLoading, VeLocale } from "vue-easytable"; // import library

// Vue.use(VeTable);
// Vue.use(VePagination);
// Vue.use(VeIcon);
// Vue.use(VeLoading);

// Vue.prototype.$veLoading = VeLoading;
// Vue.prototype.$veLocale = VeLocale;

import route from 'ziggy';
import {
    Ziggy
} from './ziggy';

Vue.mixin({
    data() {
        return {
            voters_name: window.electo ? window.electo.voters_name : null
        }
    },
    methods: {
        route: (name, params, absolute) => route(name, params, absolute, Ziggy),
        truncate_text: (str, num) => {
            if (str.length <= num) {
                return str
            }
            return str.slice(0, num) + '...'
        }
    },
});

import {
    VTooltip,
    VPopover,
    VClosePopover
} from 'v-tooltip'
Vue.directive('tooltip', VTooltip)
Vue.directive('close-popover', VClosePopover)
Vue.component('v-popover', VPopover)


import VueCountdown from '@chenfengyuan/vue-countdown';
Vue.component(VueCountdown.name, VueCountdown);

import tinymce from 'vue-tinymce-editor'
Vue.component('tinymce', tinymce)

import Highcharts from 'highcharts';
import HighchartsVue from 'highcharts-vue'
import exportingInit from 'highcharts/modules/exporting'
exportingInit(Highcharts)
import loadDrillDown from 'highcharts/modules/drilldown'
loadDrillDown(Highcharts)
Vue.use(HighchartsVue)


import PusherVue from 'pusher-vue';
Vue.use(PusherVue, {
    appKey: '5bfbf7c4eb1a2aad954f',
    cluster: 'mt1',
    debug: true,
    debugLevel: 'all'
});

import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
Vue.use(Loading, {
    loader: 'bars',
});

import OtpInput from "@bachdgvn/vue-otp-input";
Vue.component("v-otp-input", OtpInput);

import VueTour from 'vue-tour'
require('vue-tour/dist/vue-tour.css')
Vue.use(VueTour)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
import store from './vuex/store'
import 'vuetify/dist/vuetify.min.css'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(Vuetify)

//Base Components
Vue.component('app-panel', require('./components/Panel.vue'));
Vue.component('app-modal', require('./components/modal/Modal.vue'));
Vue.component('app-modal-link', require('./components/modal/ModalLink.vue'));
Vue.component('app-form', require('./components/Form.vue'));

//Page Components
Vue.component('user-table', require('./components/Pages/User/Index'))



const app = new Vue({
    el: '#app',
    store,
    mounted: function(){
        document.getElementById('app').style.display = "block";
    }
});

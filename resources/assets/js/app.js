
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('app-panel', require('./components/Panel.vue'));
Vue.component('app-pagina', require('./components/Pagina.vue'));
Vue.component('app-table-list', require('./components/TableList.vue'));
Vue.component('user-table',require('./components/User/UserTable.vue'));



const app = new Vue({
    el: '#app'
});

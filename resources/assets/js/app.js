
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
//
import './bootstrap';
import Vue from 'vue'; // Importing Vue Library
import VueRouter from 'vue-router'; // importing Vue router library
import router from './routes';

window.Vue = Vue;
Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('app', require('./components/App.vue'));
// Vue.component('bars', require('./components/Bars.vue'));
// Vue.component('users', require('./components/Users.vue'));
//

const app = new Vue({
    el: '#app',
    router,

    created: function(){
        console.log("*DEBUGGER* : App instance created");
    }
});



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
import VeeValidate from 'vee-validate';

import store  from './store/store';
import router from './routes';


window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(VeeValidate);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('app', require('./components/app/App.vue'));

Vue.component('osm-map', require('./components/osm/OsmMap.vue'));


Vue.component('bar-list', require('./components/bar/BarList.vue'));
Vue.component('bar-view', require('./components/bar/BarView.vue'));


import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';

// Vue.component('user-list', require('./components/user/UserList.vue'));
// Vue.component('user-view', require('./components/user/ProfileView.vue'));



const app = new Vue({
    el: '#app',
    router,
    store: store,

    created: function(){
        console.log("*DEBUGGER* : App instance created");
    },

    data () {
        return {
            bbox: '',


        }
    },

    methods: {
        //I use it to calculate the time taken to execute a function.
        debug: function (fn, fn_name)
        {
            let t0 = performance.now();
            fn();
            let t1 = performance.now();
            console.log("*DEBUGGER* : Call to function " + fn_name + "() took " + (t1 - t0) + " milliseconds.")
        },



    }

});


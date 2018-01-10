
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
Vue.component('maps', require('./components/Map.vue'));

const app = new Vue({
    el: '#app',
    router,

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


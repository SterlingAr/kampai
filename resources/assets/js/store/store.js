
import Vue from "vue";

import Vuex from 'vuex';
//
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {

        object: {
            name: 'Kampai',
        },
        bars: []

    },

    getters: {

        appTitle: state => {
            return state.object;
        },



    },

    mutations: {

        changeTitle: state => {

             state.object.name = 'KAMPAI';

        }

    }

});


export default store;
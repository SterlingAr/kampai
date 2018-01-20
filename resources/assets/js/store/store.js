
import Vue from "vue";
import axios from 'axios';
import Vuex from 'vuex';

//
import map_storage from './modules/map_storage';
import app_storage from './modules/app_storage';
//
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {

        appTitle: {
            title: 'Kampai',
        },



    },

    getters: {

        currentTitle: state =>
        {
            return state.appTitle;
        },




    },

    mutations: {

        changeTitle: (state, payload) =>
        {

             state.appTitle.title = payload.title;

        },



    },
    //Reminder: Commit actions using ONLY actions
    actions: {

        changeTitle: ({commit}, object) =>
        {
          // axios.get('https://kampai.local/api/admin/title/edit')
          //     .then(function(response){
          //      commit('changeTitle', response);
          //
          //  });
            commit('changeTitle', object);

        },





    },

    modules: {
        map_storage,
        app_storage
    }

});


export default store;
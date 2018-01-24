
import Vue from "vue";
import axios from 'axios';
import Vuex from 'vuex';

//
import map_storage from './modules/map_storage';
import app_storage from './modules/app_storage';
import bars_storage from './modules/bars_storage';
import bar_view_storage from './modules/bar_view_storage';

//
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {

        appTitle: {
            title: 'Kampai',
        },

        api_base_uri: '',

            test: 'Hellow from root component.'



    },

    getters: {

        currentTitle: state =>
        {
            return state.appTitle;
        },

        currentBaseURI: state =>
        {
            return state.api_base_uri;
        }



    },

    mutations: {

        changeTitle: (state, newTitleObject) =>
        {

             state.appTitle.title = newTitleObject.title;

        },

        changeBaseURI: (state,newUriObject) =>
        {
            return state.api_base_uri = newUriObject.api_base_uri;
        }



    },
    //Reminder: Commit actions using ONLY actions
    actions: {

        changeTitle: ({commit}, newTitleObject) =>
        {
          // axios.get('https://kampai.local/api/admin/title/edit')
          //     .then(function(response){
          //      commit('changeTitle', response);
          //
          //  });
            commit('changeTitle', newTitleObject);

        },


        changeBaseUriAction: ({commit}, newUriObject) =>
        {

        }


    },

    modules: {
        app_storage,
        map_storage,
        bars_storage,
        bar_view_storage,
    }

});


export default store;
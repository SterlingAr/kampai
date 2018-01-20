import VueRouter from 'vue-router';

import App from './components/app/App.vue';


import BarList from './components/bar/BarList.vue';

import Register from './components/auth/Register.vue';
import Login from './components/auth/Login.vue';

import ProfileView from './components/user/ProfileView.vue';

import OsmMap from './components/osm/OsmMap.vue';

import Users from './components/user/UserList.vue';


let routes = [

    {
        //The SideMenu and SideMenuContent view should be shown in the same parent view.
        path: '/',
        name: 'home',
        component: App,
        children: [
        {
            path: '/bars',
            name: 'bar_list',
            components:
            {
                default: BarList,

            },

            props: {
                default: true,
            }


        },
        {
            path: '/login',
            name: 'login',
            components:
            {
                login: Login,
            }
        },

        {
            path: '/register',
            name: 'register',
            components:
            {
                register: Register,
            }
        },

        {
            path: '/profile',
            name: 'profile',
            components:
            {
                profile_view: ProfileView,
            }
        }

        ]

    },



];

export default new VueRouter({routes});
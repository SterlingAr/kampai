import VueRouter from 'vue-router';

import App from './components/app/App.vue';
import SideMenuContent from './components/app/SideMenuContent.vue';


import BarList from './components/bar/BarList.vue';
import BarItem from './components/bar/BarItem.vue';

import Register from './components/auth/Register.vue';
import Login from './components/auth/Login.vue';

import ProfileView from './components/user/ProfileView.vue';

import OsmMap from './components/osm/OsmMap.vue';

import Users from './components/user/UserList.vue';


let routes = [

    {
        path: '/',
        name: 'home',
        component: SideMenuContent,
        children: [
        {
            path: '/bars',
            name: 'bar_list',
            components:
            {
                default: BarList,


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
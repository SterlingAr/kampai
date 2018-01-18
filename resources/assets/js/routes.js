import VueRouter from 'vue-router';
import Users from './components/user/UserList.vue';

import App from './components/app/App.vue';

import BarList from './components/bar/BarList.vue';
import BarItem from './components/bar/BarItem.vue';

import Register from './components/auth/Register.vue';
import Login from './components/auth/Login.vue';

import ProfileView from './components/user/ProfileView';


let routes = [

    {
        path: '/',
        component: App,
        children:[
            {
                path: 'bars',
                component: BarList,
                children: [
                    {
                        path: 'bar',
                        component: BarItem

                    },

                    // {
                    //     path: 'bar/:id',
                    //     component: BarView
                    // }
                ]
            },
            ///
            {
                path: 'login',
                component: Login,
                children: [

                ]
            },

            {
                path: 'register',
                component: Register
            },

            {

                path: 'profile/user',
                component: ProfileView,
                props: { user: false }

            }


        ]
    },




];

export default new VueRouter({routes});
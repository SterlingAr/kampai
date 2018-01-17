import VueRouter from 'vue-router';
import App from './components/app/App.vue';
import Bars from './components/bar/Bars.vue';
import Users from './components/Users.vue';
import Login from './components/Login.vue';



let routes = [

    {
        path: '/',
        component: App
    },

    {
        path: '/bars',
        component: Bars
    },

    {
        path: '/users',
        component: Users
    },
    {
        path:   '/users/login',
        component:  Login
    }
];

export default new VueRouter({routes});
import VueRouter from 'vue-router';
import App from './components/App.vue';
import Bars from './components/Bars.vue';
import Users from './components/Users.vue';



let routes = [

    {
        path: '/bar',
        component: App
    },

    {
        path: '/bars',
        component: Bars
    },

    {
        path: '/users',
        component: Users
    }
];

export default new VueRouter({routes});
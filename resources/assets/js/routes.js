import VueRouter from 'vue-router';
import App from './components/app/App.vue';
import BarList from './components/bar/BarList.vue';
import Users from './components/Users.vue';
import BarItem from './components/bar/BarItem.vue';

import Login from './components/auth/Login.vue';



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
            }

        ]
    },




];

export default new VueRouter({routes});
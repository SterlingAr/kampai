import VueRouter from 'vue-router';
import App from './components/app/App.vue';
import Bars from './components/bar/BarList.vue';
import Users from './components/Users.vue';
import Login from './components/Login.vue';
import Bar from './components/bar/BarItem.vue';



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

                    {
                        path: 'bar/:id',
                        component: BarView
                    }
                ]
            },
            ///
            {
                path: 'users',
                component: Users,
            }

        ]
    },




    {
        path: '/barsss',
        component: Bars,
        children: [
            {
                path: 'bar',
                component: Bar

            }
        ]
    },

    {
        path: '/userssss',
        component: Users
    },
    {
        path:   '/users/login',
        component:  Login
    }
];

export default new VueRouter({routes});
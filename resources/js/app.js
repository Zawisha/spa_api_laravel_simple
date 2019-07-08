
//
// require('./bootstrap');
//
// window.Vue = require('vue');
//
//
//
// // const files = require.context('./', true, /\.vue$/i);
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
//
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//
//
//
// const app = new Vue({
//     el: '#app',
// });

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import Hello from './components/Hello'
import Home from './components/Home'
import UsersIndex from './components/UsersIndex'
import UsersEdit from './components/UsersEdit'
import NotFound from './components/NotFound'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/hello',
            name: 'hello',
            component: Hello,
        },
        {
            path: '/users',
            name: 'users.index',
            component: UsersIndex,
        },
        {
            path: '/users/:id/edit',
            name: 'users.edit',
            component: UsersEdit,
        },
        {
            path: '/404',
            name: '404',
            component: NotFound },

        {   path: '*',
            redirect: '/404' },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
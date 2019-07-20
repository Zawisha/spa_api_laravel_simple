

import Vue from 'vue'
import VueRouter from 'vue-router'

//V-form
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);


Vue.use(VueRouter);

import App from './components/App'
import Hello from './components/Hello'
import Home from './components/Home'
import UsersIndex from './components/UsersIndex'
import UsersEdit from './components/UsersEdit'
import NotFound from './components/NotFound'
import Account from './components/Account'

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
            component: NotFound
        },

        {
            path: '*',
            redirect: '/404'
        },
        {
            path: '/account',
            name: 'log',
            component: Account
        }

    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
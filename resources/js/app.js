

import Vue from 'vue'
import VueRouter from 'vue-router'
import moment from 'moment'




// progress bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
})

//sweetalert
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast;

//
window.Fire = new Vue();

//V-form
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);



Vue.use(VueRouter);


Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);




//
import AuthorizedClients from './components/passport/AuthorizedClients.vue'

import App from './components/App'
import Hello from './components/Hello'
import Home from './components/Home'
import UsersIndex from './components/UsersIndex'
import UsersEdit from './components/UsersEdit'
import NotFound from './components/NotFound'
import Account from './components/Account'
import LoginPassport from "./components/LoginPassport";
import RegisterPassport from "./components/RegisterPassport";

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
        },
        {
            path: '/login_passport',
            name: 'log_pas',
            component: LoginPassport
        },
        {
            path: '/register_passport',
            name: 'reg_pas',
            component: RegisterPassport
        }

    ],
});


Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});

Vue.filter('myDate', function (created) {
    return  moment(created).format('MMMM Do YYYY');
});




const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

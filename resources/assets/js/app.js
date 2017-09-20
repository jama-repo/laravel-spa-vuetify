/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuetify  from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(VueRouter);
Vue.use(Vuetify);

// const token = "_token="+document.head.querySelector('meta[name="csrf-token"]').content;

const router = new VueRouter({
    routes:[
		{path:'/profile/',component:require('./components/ProfileComponent.vue')}
    ]
});

Vue.component('login-page', require('./components/LoginComponent.vue'));
Vue.component('register-page', require('./components/RegisterComponent.vue'));
Vue.component('home', require('./components/HeaderComponent.vue'));

const app = new Vue({
    el: '#app',
    router
})

// require('./bootstrap');
// window.Vue = require('vue');
// //Vue.component('example', require('./components/Example.vue'));
// const app = new Vue({
//     el: '#app'  
// });



import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './App.vue';
import SalesCategory from './components/SalesCategory/ShowSalesCategory.vue';
import CreateSalesCategory from './components/SalesCategory/CreateSalesCategory.vue';

const routes = [
  {
    name: 'CreateSalesCategory',
    path: '/admin/sales/category/create',
    component: CreateSalesCategory
  },
  {
      name: 'SalesCategory',
      path: '/admin/sales/category',
      component: SalesCategory
  },
  
];

const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, App)).$mount('#app');
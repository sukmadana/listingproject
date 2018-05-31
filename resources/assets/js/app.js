
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

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);


import App from './App.vue';
import SalesCategory from './components/SalesCategory/ShowSalesCategory.vue';
import CreateSalesCategory from './components/SalesCategory/CreateSalesCategory.vue';
import EditSalesCategory from './components/SalesCategory/EditSalesCategory.vue';

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
  {
    name: 'EditSalesCategory',
    path: '/admin/sales/category/edit/:id',
    component: EditSalesCategory
},

];

const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, App)).$mount('#app');
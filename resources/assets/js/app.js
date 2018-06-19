
//require('./bootstrap');
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

import ListingCategory from './components/ListingCategory/ShowListingCategory.vue';
import CreateListingCategory from './components/ListingCategory/CreateListingCategory.vue';
import EditListingCategory from './components/ListingCategory/EditListingCategory.vue';

import ListingFeature from './components/Feature/ShowFeature.vue';
import CreateFeature from './components/Feature/CreateFeature.vue';
import EditFeature from './components/Feature/EditFeature.vue';

import ShowSales from './components/Sales/ShowSales.vue';
import CreateSales from './components/Sales/CreateSales.vue';
import EditSales from './components/Sales/EditSales.vue';
import ViewSales from './components/Sales/ViewSales.vue';


import FontAwesomeIcon from '@fortawesome/vue-fontawesome';


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

  {
    name: 'CreateListingCategory',
    path: '/admin/listing/category/create',
    component: CreateListingCategory
  },
  {
    name: 'ListingCategory',
    path: '/admin/listing/category',
    component: ListingCategory
  },
  {
    name: 'EditListingCategory',
    path: '/admin/listing/category/edit/:id',
    component: EditListingCategory
  },

  
  {
    name: 'ListingFeature',
    path: '/admin/listing/feature',
    component: ListingFeature
  },
  {
    name: 'CreateFeature',
    path: '/admin/listing/feature/create',
    component: CreateFeature
  },
  {
    name: 'EditFeature',
    path: '/admin/listing/feature/edit/:id',
    component: EditFeature
  },

  {
    name: 'ShowSales',
    path: 'localhost/listingproject/public/admin/sales/all',
    component: ShowSales
  },
  {
    name: 'CreateSales',
    path: '/admin/sales/create',
    component: CreateSales
  },
  {
    name: 'EditSales',
    path: '/admin/sales/edit/:id',
    component: EditSales
  },
  {
    name: 'ViewSales',
    path: '/admin/sales/view/:id',
    component: ViewSales
  },
  
];

const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, App)).$mount('#app');
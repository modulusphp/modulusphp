
require('./bootstrap');

// Dependencies
import VueRouter from 'vue-router';
import routes from './routes.js';


// Components
Vue.component('example-component', require('./components/example.vue'));

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
  router,
  el: '#app'
});
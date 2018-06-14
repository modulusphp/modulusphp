// routes

export default [
  {
    path: '/',
    name: 'Home',
    component: require('./components/app/welcome.vue')
  },
  {
    path: '*',
    name: 'notfound',
    component: require('./components/app/404.vue')
  }
];
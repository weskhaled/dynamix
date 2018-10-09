// // import $ from 'jquery';
// import 'bootstrap';
// import Vue from 'vue';
// import VueRouter from 'vue-router';
// import ElementUI from 'element-ui';
// // import 'element-ui/lib/theme-chalk/index.css';
// import locale from 'element-ui/lib/locale/lang/en';
// import App from './App.vue';
// Vue.use(ElementUI, { locale });
// Vue.use(VueRouter);
// // import Card from './vue/card.vue';
// // const NotFound = { template: '<div><p>Page not found</p><router-link to="/" name="name">Home</router-link></div>' };
// const Home = { template: '<div><p>home page</p><router-link to="#about" name="name1">Home</router-link></div>' };
// // const About = { template: '<div><p>about page</p><router-link to="#home" name="name2">Home</router-link></div>' };

// // const routes = {
// //   '/wp-admin/admin.php?page=settings': Home,
// //   '/wp-admin/admin.php?page=settings#about': About,
// // };
// var router = new VueRouter({
//   mode: 'history',
//   routes: [
//       {
//           path: '/wp-admin/admin.php?page=settings',
//           name: 'home',
//           component: Home,
//       },
//   ],
// });

// new Vue({
//   el: "#appadmin",
//   router: router,
//   render: h => h(App),
// })
// // new Vue({
// //   el: '#appadmin',
// //   router: router,
// //   data: {
// //     visible:false,
// //     value7:'',
// //     // currentRoute: window.location.pathname,
// //     // currentRoute: (location.pathname+location.search).substr(0)+location.hash,
// //   },
// //   // computed: {
// //   //   ViewComponent () {
// //   //     return routes[this.currentRoute] || NotFound ;
// //   //   },
// //   // },
// //   // render (h) { return h(this.ViewComponent) },
// //   // components: {
// //   //   Card,
// //   // },
// //   created: function () {
// //     console.log('this is a vue js home page');
// //   },
// // });

// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue';
import 'bootstrap';
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en';
Vue.use(ElementUI, { locale });
import App from './vue/app.vue';
// const App = {name:'app', template: '<div id="app"><router-view></router-view></div>'};
import router from './router';

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#appadmin',
  router,
  template: '<App/>',
  components: { App },
})
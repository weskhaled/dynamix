// import $ from 'jquery';
// import axios from 'axios';
// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue';
import 'bootstrap';
import VueApexCharts from 'vue-apexcharts'
import {VueMasonryPlugin} from 'vue-masonry';
import VueFeatherIcon from 'vue-feather-icon'
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en';
Vue.use(VueFeatherIcon);
Vue.use(VueApexCharts)
Vue.use(ElementUI, { locale });
Vue.use(VueMasonryPlugin);
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
// $.ajax({
//   url: ajax_object.ajax_url,
//   method: 'POST',
//   data: { action: 'get_sliders' },
// }).done(function (data) {
//   // console.warn("FILL THE DATA IN THE MODAL WITH what you got from ajax");
//   console.log(data); // this way I get a modal template; now I  can fill it with the data provided by a previous ajax to the REST API :) 
// });
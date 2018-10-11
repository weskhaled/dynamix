// import $ from 'jquery';

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
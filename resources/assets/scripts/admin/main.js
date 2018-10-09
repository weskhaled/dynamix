// import $ from 'jquery';
import 'bootstrap';
import Vue from 'vue';
import ElementUI from 'element-ui';
// import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en';

Vue.use(ElementUI, { locale });
import Card from './vue/card.vue';

console.log('westest');

new Vue({
  el: '#appadmin',
  data: {
    visible:false,
    value7:'',
  },
  components: {
    Card,
  },
  created: function () {
    console.log('this is a vue js home page');
  },
});
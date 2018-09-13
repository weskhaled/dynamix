import Vue from 'vue';
import Card from '../vue/card.vue'
export default {
  init() {
    // JavaScript to be fired on the home page
    // new Vue({
    //     el: "apptest",
    // })
    new Vue({
      el: '#app',      
      components: {
        Card,
      },
      created: function () {
        console.log('this is a vue js home page');
      },
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

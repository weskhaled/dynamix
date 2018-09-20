import Vue from 'vue';
import Swiper from 'swiper';
// import Card from '../vue/card.vue'
export default {
  init() {
    // JavaScript to be fired on the home page
    new Vue({
    })
    // new Vue({
    //   el: '#app',      
    //   components: {
    //     Card,
    //   },
    //   created: function () {
    //     console.log('this is a vue js home page');
    //   },
    // });

    new Swiper('#quote-clients', {
      speed: 400,
      spaceBetween: 0,
      grabCursor: true,
      autoplay: {
        delay: 50000,
      },
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        type: 'bullets',
      },
    });
    new Swiper('#partners-slider', {
      speed: 400,
      slidesPerView: 'auto',
      spaceBetween: 30,
      grabCursor: true,
      freeMode: true,
      loop: true,
      // scrollbar: {
      //   el: '.swiper-scrollbar',
      //   draggable: true,
      // },
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

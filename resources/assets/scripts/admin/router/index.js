import Vue from 'vue'
import Router from 'vue-router'
import Index from '../vue/components/index.vue'
import About from '../vue/components/about.vue'
import Slider from '../vue/components/slider.vue'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'index',
      component: Index,
    },
    {
      path: '/about',
      name: 'about',
      component: About,
    },
    {
      path: '/slider',
      name: 'slider',
      component: Slider,
    },
  ],
})
import Vue from 'vue'
import Router from 'vue-router'
import Index from '../vue/components/index.vue'
import About from '../vue/components/about.vue'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Index',
      component: Index,
    },
    {
      path: '/about',
      name: 'About',
      component: About,
    },
  ],
})
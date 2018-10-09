import Vue from 'vue'
import Router from 'vue-router'
import Hello from '../vue/components/hello.vue'
import About from '../vue/components/about.vue'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Hello',
      component: Hello,
    },
    {
      path: '/about',
      name: 'About',
      component: About,
    },
  ],
})
import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Emergencycall from '@/components/Emergencycall'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/call/:id',
      name: 'Emergency Call',
      component: Emergencycall
    }
  ]
})
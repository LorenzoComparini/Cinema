import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

import Home from './components/Home'
import MovieSchedule from './components/MovieSchedule'
import buyTicket from './components/buyTicket'

Vue.use(VueRouter)

import "./style.css"
Vue.config.productionTip = false

const routes = [
  {
    path: '',
    redirect: '/home'
  },
  {
    path: '/home',
    name: 'home',
    component: Home 
  },
  {
    path: '/movies/schedule/:id',
    name: 'schedule',
    component: MovieSchedule
  },
  {
    path: '/movies/schedule/ticket/:id',
    name: 'buyTicket',
    component: buyTicket
  },
]

const router = new VueRouter({
  mode: 'history',
  routes
})


new Vue({
  render: h => h(App),
  router
}).$mount('#app')

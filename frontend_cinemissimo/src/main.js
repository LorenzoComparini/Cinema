import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'

import Home from './components/Home'

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
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})


new Vue({
  render: h => h(App),
  router
}).$mount('#app')

import Vue from 'vue'
import App from './App.vue'

import LandCreate from '@/components/LandCreate'
import LandList from '@/components/LandList'
import LandDetail from '@/components/LandDetail'

import VueRouter from 'vue-router'

Vue.use(VueRouter)
Vue.config.productionTip = false

const routes = [
  {
    path:"/list",
    name:"list_lands",
    component:LandList
  },
  {
    path:"/detail/:id",
    name:"detail_land",
    component:LandDetail
  },
  {
    path:"/create",
    name:"insert_land",
    component:LandCreate
  },
  {
    path:"/update",
    name:"update_land",
    component:LandCreate
  },
  {
    path:"",
    redirect:"/list"
  }
];

const router = new VueRouter({
  mode:'history',
  routes
});

new Vue({
  render: h => h(App),
  router
}).$mount('#app')

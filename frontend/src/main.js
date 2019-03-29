import Vue from 'vue'
import App from './App.vue'
import router from './router/'
import VueResource from 'vue-resource'

//Bootstrap files 
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

//Hover css libary 
require('./assets/hover-min.css')
//Custom css file
require('./assets/main.css')


Vue.use(BootstrapVue)
Vue.use(VueResource)
Vue.config.productionTip = false

new Vue({
  el: '#app',
  router,
  render: h => h(App),
}).$mount('#app')

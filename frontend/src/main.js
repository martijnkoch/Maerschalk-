import Vue from 'vue'
import App from './App.vue'
import router from './router/'

//Bootstrap files 
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

//Custom css file
require('./assets/main.css')

Vue.use(BootstrapVue)
Vue.config.productionTip = false

new Vue({
  el: '#app',
  router,
  render: h => h(App),
}).$mount('#app')

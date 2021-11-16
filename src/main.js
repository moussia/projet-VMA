import Vue from 'vue'
import App from './App.vue'
import router from './router'
import { MdButton, MdContent, MdTabs, MdCard, MdField, MdSnackbar } from 'vue-material/dist/components'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'


Vue.use(MdSnackbar)
Vue.use(MdField)
Vue.use(MdButton)
Vue.use(MdCard)
Vue.use(MdContent)
Vue.use(MdTabs)
Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')

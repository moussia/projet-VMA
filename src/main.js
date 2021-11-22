import Vue from 'vue'
import App from './App.vue'
import router from './router'
import { MdButton, MdContent, MdTabs, MdCard, MdField, MdSnackbar, MdRadio, MdMenu, MdToolbar, MdBottomBar, MdDialog } from 'vue-material/dist/components'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'


Vue.use(MdSnackbar)
Vue.use(MdDialog)
Vue.use(MdMenu)
Vue.use(MdToolbar)
Vue.use(MdBottomBar)
Vue.use(MdField)
Vue.use(MdButton)
Vue.use(MdCard)
Vue.use(MdContent)
Vue.use(MdTabs)
Vue.use(MdRadio)
Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')

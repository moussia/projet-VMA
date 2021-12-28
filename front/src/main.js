import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store';
import axios from 'axios';
import { MdButton, MdContent, MdTabs, MdCard, MdField, MdSnackbar, MdRadio, MdMenu, MdToolbar, MdBottomBar, MdDialog } from 'vue-material/dist/components'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'

axios.defaults.withCredentials = true
axios.defaults.baseURL = 'https://127.0.0.1:8000/api';

axios.interceptors.response.use(undefined, function (error) {
  if (error) {
    const originalRequest = error.config;
    if (error.response.status === 401 && !originalRequest._retry) {
      originalRequest._retry = true;
      store.dispatch("LogOut");
      return router.push("/login");
    }
  }
});

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
  store,
  router,
  render: h => h(App)
}).$mount('#app')

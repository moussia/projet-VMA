import Vue from 'vue'
import VueRouter from 'vue-router'
import store from "../store";

import Home from '../views/Home.vue'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'
import ForgetPassword from '../views/ForgetPassword.vue'
import MyAccount from '../views/MyAccount.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/home',
    name: 'Home',
    component: Home
  },
  {
    path: '/register',
    name: 'Register',
    component: Register,
    meta: { guest: true },
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
    meta: { guest: true },

  },
  {
    path: '/my-account',
    name: 'MyAccount',
    component: MyAccount,
    meta: { requiresAuth: true },
  },
  {
    path: '/forgetPassword',
    name: 'ForgetPassword',
    component: ForgetPassword
  },
  {
    path: '/about',
    name: 'About',
    component: () => import('../views/About.vue')
  },
  {
    path: '/erreur',
    name: 'error404',
    component: () => import('../views/Page404.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.requiresAuth)) {
    if (store.getters.isAuthenticated) {
      next();
      return;
    }
    next("/login");
  } else {
    next();
  }
});

export default router

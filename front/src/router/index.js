import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'
import ForgetPassword from '../views/ForgetPassword.vue'
import MyAccount from '../views/MyAccount.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/inscription',
    name: 'Register',
    component: Register
  },
  {
    path: '/connexion',
    name: 'Login',
    component: Login
  },
  {
    path: '/moncompte',
    name: 'MyAccount',
    component: MyAccount
  },
  {
    path: '/motdepasseoublie',
    name: 'ForgetPassword',
    component: ForgetPassword
  },
  {
    path: '/a-propos',
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

export default router

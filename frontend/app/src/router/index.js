import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '@/views/Home/index.vue';
import Cart from '@/views/Cart';
import auth from './modules/auth';
import cart from './modules/cart';
import product from './modules/product';

Vue.use(VueRouter);

const routes = [
  ...auth,
  ...cart,
  ...product,
  {
    path: '/',
    name: 'home.index',
    component: Home,
    meta: {
      // layout: 'auth',
      title: 'Trang chủ',
    },
  },
  {
    path: '/shopping-cart',
    name: 'cart.index',
    component: Cart,
    meta: {
      title: 'Giỏ hàng',
    },
  },
];

export default new VueRouter({
  mode: 'history',
  routes,
});

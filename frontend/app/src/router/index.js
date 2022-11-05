import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '@/views/Home/index.vue';
import Products from '@/views/Products';

Vue.use(VueRouter);

const routes = [
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
    path: '/products',
    name: 'products.index',
    component: Products,
    meta: {
      // layout: 'auth',
      title: 'Sản phẩm',
    },
  },
];

export default new VueRouter({
  mode: 'history',
  routes,
});

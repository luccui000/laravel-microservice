import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '@/views/Home/index.vue';
import Products from '@/views/Products';
import ProductDetail from '@/views/ProductDetail';
import Cart from "@/views/Cart";

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
    }
  },
  {
    path: '/products/:id',
    name: 'products.show',
    component: ProductDetail,
    meta: {
      title: 'Chi tiết sản phẩm',
    }
  },
  {
    path: '/shopping-cart',
    name: 'cart.index',
    component: Cart,
    meta: {
      title: 'Giỏ hàng'
    }
  }
];

export default new VueRouter({
  mode: 'history',
  routes,
});

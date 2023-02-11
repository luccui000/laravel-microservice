import Vue from 'vue';
import VueRouter from 'vue-router';
import LoginView from '@/views/auth/login.vue';
import DashboardView from '@/views/dashboard/index.vue';
import ProductView from '@/views/product/index.vue';
import ProductCreateView from '@/views/product/create.vue';
import ProductUpdateView from '@/views/product/update.vue';
import DiscountView from '@/views/discount/index.vue';
import BrandView from '@/views/brand/index.vue';
import SupplierView from '@/views/supplier/index.vue';
import CategoryView from '@/views/category/index.vue';
import CouponView from '@/views/coupon/index.vue';
import OrderView from '@/views/order/index.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/login',
    name: 'auth.login',
    component: LoginView,
    meta: {
      layout: 'auth',
      title: 'Đăng nhập tài khoản',
    },
  },
  {
    path: '/dashboard',
    name: 'dashboard.index',
    component: DashboardView,
    meta: {
      title: 'Tổng quan',
    },
  },
  {
    path: '/products',
    name: 'product.index',
    component: ProductView,
    meta: {
      title: 'Sản phẩm',
    },
  },
  {
    path: '/products/create',
    name: 'product.create',
    component: ProductCreateView,
    meta: {
      title: 'Thêm mới sản phẩm',
    },
  },
  {
    path: '/products/update/:id',
    name: 'product.update',
    component: ProductUpdateView,
    meta: {
      title: 'Thêm mới sản phẩm',
    },
  },
  {
    path: '/categories',
    name: 'category.index',
    component: CategoryView,
    meta: {
      title: 'Danh mục',
    },
  },
  {
    path: '/suppliers',
    name: 'supplier.index',
    component: SupplierView,
    meta: {
      title: 'Nhà cung cấp',
    },
  },
  {
    path: '/brands',
    name: 'brand.index',
    component: BrandView,
    meta: {
      title: 'Thương hiệu',
    },
  },
  {
    path: '/discounts',
    name: 'discount.index',
    component: DiscountView,
    meta: {
      title: 'Giảm giá',
    },
  },
  {
    path: '/coupons',
    name: 'coupon.index',
    component: CouponView,
    meta: {
      title: 'Mã giảm giá',
    },
  },
  {
    path: '/orders',
    name: 'order.index',
    component: OrderView,
    meta: {
      title: 'Đơn hàng',
    },
  },
];

export default new VueRouter({
  mode: 'history',
  routes,
});

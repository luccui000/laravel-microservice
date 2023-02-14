import Cart from '@/views/Cart/index.vue';
import Checkout from '@/views/Checkout/index.vue';
import CheckoutSuccess from '@/views/Checkout/success.vue';
import TrackingOrderView from '@/views/TrackingOrder/index.vue';
import TrackingOrderVerifyView from '@/views/TrackingOrder/verify.vue';

const cart = [
  {
    path: '/cart',
    component: Cart,
    meta: {
      title: 'Giỏ hàng',
    },
  },
  {
    path: '/checkout',
    component: Checkout,
    meta: {
      title: 'Thanh toán',
    },
  },
  {
    path: '/checkout/success',
    component: CheckoutSuccess,
    meta: {
      title: 'Thanh toán thành công',
    },
  },
  {
    path: '/tracking-order',
    component: TrackingOrderView,
    meta: {
      title: 'Thanh toán thành công',
    },
  },
  {
    path: '/tracking-order/verify',
    component: TrackingOrderVerifyView,
    meta: {
      title: 'Thanh toán thành công',
    },
  },
];

export default cart;

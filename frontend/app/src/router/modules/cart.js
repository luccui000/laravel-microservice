import Cart from '@/views/Cart/index.vue';
import Checkout from '@/views/Checkout/index.vue';

const cart = [
  {
    path: '/cart',
    component: Cart,
    meta: {
      title: 'Cart',
    },
  },
  {
    path: '/checkout',
    component: Checkout,
    meta: {
      title: 'Checkout',
    },
  },
];

export default cart;

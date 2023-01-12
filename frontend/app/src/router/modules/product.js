const product = [
  {
    path: '/products',
    component: () => import('@/views/Products/index.vue'),
    meta: {
      title: 'Product',
    },
  },
  {
    path: '/products/:id',
    name: 'products.show',
    component: () => import('@/views/ProductDetail/index.vue'),
    meta: {
      title: 'Chi tiết sản phẩm',
    },
  }
];

export default product;

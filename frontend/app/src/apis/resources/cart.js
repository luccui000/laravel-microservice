import Resource from '../resource';
import request from '../request';

class Cart extends Resource {
  constructor() {
    super('/carts');
  }

  getCarts() {
    return request({
      url: '/fe/get-order',
      method: 'POST',
    });
  }

  updateQuantity(id, data) {
    return request({
      url: `/fe/cart/update/${id}/quantity`,
      method: 'POST',
      data,
    });
  }

  deleteProduct(productId) {
    return request({
      url: `/fe/cart/product/delete`,
      method: 'POST',
      data: {
        product_id: productId,
      },
    });
  }

  applyCoupon(couponName) {
    return request({
      url: `/fe/cart/apply-coupon`,
      method: 'POST',
      data: {
        coupon: couponName,
      },
    });
  }

  checkout(params) {
    return request({
      url: `/fe/cart/checkout`,
      method: 'POST',
      data: params,
    });
  }
}

export default new Cart();

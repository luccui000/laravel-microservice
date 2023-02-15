import request from '../request';
import Resource from '../resource';

class Order extends Resource {
  constructor() {
    super('orders');
  }

  getOrder() {
    return request({
      url: '/fe/get-order',
      method: 'POST',
    });
  }

  addToCart(data) {
    return request({
      url: '/fe/add-to-cart',
      method: 'POST',
      data,
    });
  }

  getOrderTracking(phone) {
    return request({
      url: '/fe/tracking-order',
      method: 'POST',
      data: {
        phone: phone,
      },
    });
  }

  verifyOrderTracking(code) {
    return request({
      url: '/fe/tracking-order/verify',
      method: 'POST',
      data: {
        code: code,
      },
    });
  }

  getOrderByPhone(phone) {
    return request({
      url: '/fe/get-order-by-phone',
      method: 'POST',
      data: {
        phone: phone,
      },
    });
  }
}

export default new Order();

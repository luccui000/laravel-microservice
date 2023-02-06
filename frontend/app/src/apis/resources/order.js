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
}

export default new Order();

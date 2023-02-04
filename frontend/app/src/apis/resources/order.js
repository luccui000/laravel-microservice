import request from '../request';
import Resource from '../resource';

class Order extends Resource {
  constructor() {
    super('orders');
  }

  getOrder() {
    return request({
      url: '/fe/get-order',
      method: 'POST'
    })
  }
}

export default new Order();

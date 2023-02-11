import request from '@/utils/request';
import Resource from '@/apis/resource';

class Order extends Resource {
  constructor() {
    super('/orders');
  }

  getOrders(status = 'success') {
    return request({
      url: '/orders',
      method: 'POST',
      data: {
        status: status,
      },
    });
  }
}

export default new Order();

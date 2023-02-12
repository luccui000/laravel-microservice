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

  confirmOrder(id) {
    return request({
      url: `/orders/${id}/confirm`,
      method: 'POST',
    });
  }

  cancelOrder(id) {
    return request({
      url: `/orders/${id}/cancel`,
      method: 'POST',
    });
  }
}

export default new Order();

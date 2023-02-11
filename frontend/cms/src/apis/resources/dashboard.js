import request from '@/utils/request';
import Resource from '../resource';

class Dashboard extends Resource {
  constructor() {
    super('/');
  }

  getOrders() {
    return request({
      url: '/dashboard/orders',
      method: 'GET',
    });
  }
}

export default new Dashboard();

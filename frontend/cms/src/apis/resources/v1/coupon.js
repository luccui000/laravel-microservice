import Resource from '@/apis/resource';
import request from '@/utils/request';

class Coupon extends Resource {
  constructor() {
    super('/coupons');
  }

  create() {
    return request({
      url: '/coupons',
      method: 'POST',
    });
  }
}

export default new Coupon();

import Resource from '@/apis/resource';
import request from '@/apis/request';

class Header extends Resource {
  constructor() {
    super('/fe/header');
  }

  products(data) {
    return request({
      url: '/fe/header/products',
      method: 'GET',
      data,
    });
  }
}

export default new Header();

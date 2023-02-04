import Resource from '@/apis/resource';
import request from '@/apis/request';

class Product extends Resource {
  constructor() {
    super('products');
  }

  addToCart(data) {
    return request({
      uri: '/fe/add-to-cart',
      method: 'POST',
      data,
    });
  }
}

export default new Product();

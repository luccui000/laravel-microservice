import Resource from '@/apis/resource';
import request from '@/apis/request';

class Product extends Resource {
  constructor() {
    super('products');
  }

  getAll(data, page) {
    return request({
      url: `/products/get-all?page=${page}`,
      method: 'POST',
      data,
    });
  }

  addToCart(data) {
    return request({
      uri: '/fe/add-to-cart',
      method: 'POST',
      data,
    });
  }

  getAttributes() {
    return request({
      url: '/get-attribute',
      method: 'POST',
    });
  }
}

export default new Product();

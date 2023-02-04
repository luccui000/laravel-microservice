import request from '@/utils/request';
import Resource from '../../resource';

class Product extends Resource {
  constructor() {
    super('/products');
  }

  getProducts(page) {
    page = page || 1;
    return request({
      url: `/products?page=${page}`,
      method: 'GET',
    });
  }

  getAttributes() {
    return request({
      url: '/get-attribute',
      method: 'POST',
    });
  }

  create(params) {
    return request({
      url: '/products/create',
      method: 'POST',
      data: params,
    });
  }

  getAll() {
    return request({
      url: '/products/get-all',
      method: 'POST',
    });
  }
}

export default new Product();

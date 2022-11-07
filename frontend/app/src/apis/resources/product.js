import Resource from '@/apis/resource';

class Product extends Resource {
  constructor() {
    super('products');
  }
}

export default new Product();

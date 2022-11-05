import Resource from '@/apis/resource';

class Product extends Resource {
  constructor(uri) {
    super(uri);
  }
}

export default new Product('/products');

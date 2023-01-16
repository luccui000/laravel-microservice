import Resource from '@/apis/resource';

class FeProduct extends Resource {
  constructor() {
    super('fe/products');
  }
}

export default new FeProduct();

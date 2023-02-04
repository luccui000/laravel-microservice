import Resource from '@/apis/resource';

class Supplier extends Resource {
  constructor() {
    super('/suppliers');
  }
}

export default new Supplier();

import Resource from '@/apis/resource';

class Brand extends Resource {
  constructor() {
    super('/brands');
  }
}

export default new Brand();

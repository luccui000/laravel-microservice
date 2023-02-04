import Resource from '@/apis/resource';
import request from '@/utils/request';

class Discount extends Resource {
  constructor() {
    super('/discounts');
  }
}

export default new Discount();

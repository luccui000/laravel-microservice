import request from '@/utils/request';
import Resource from '../../resource';

class Customer extends Resource {
  constructor() {
    super('/customers');
  }
}

export default new Customer();

import request from '@/utils/request';
import Resource from '../../resource';

class User extends Resource {
  constructor() {
    super('/');
  }

  getInfo() {
    return request({
      url: '/me',
      method: 'POST',
    });
  }
}

export default new User();

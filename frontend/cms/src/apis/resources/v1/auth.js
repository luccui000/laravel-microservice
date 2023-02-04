import Resource from '@/apis/resource';
import request from '@/utils/request';

class Auth extends Resource {
  constructor() {
    super('/');
  }

  login({ email, password }) {
    return request({
      url: '/login',
      method: 'POST',
      data: { email, password },
    });
  }
}

export default new Auth();

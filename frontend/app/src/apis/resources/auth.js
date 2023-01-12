import Resource from '@/apis/resource';
import request from '@/apis/request';

class Auth extends Resource {
  constructor() {
    super('/');
  }
  login(email, password) {
    return request({
      url: 'login',
      method: 'POST',
      data: {
        email,
        password,
      },
    });
  }
  me() {
    return request({
      url: 'me',
      method: 'GET',
    });
  }
}

export default new Auth();

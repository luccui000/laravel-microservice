import Resource from '@/apis/resource';
import request from '@/apis/request';

class Auth extends Resource {
  constructor() {
    super('/');
  }
  login(email, password) {
    return request({
      url: '/fe/login',
      method: 'POST',
      data: {
        email,
        password,
      },
    });
  }

  register(data) {
    return request({
      url: '/fe/register',
      method: 'POST',
      data,
    });
  }

  verify(code) {
    return request({
      url: '/fe/user/verify',
      method: 'POST',
      data: {
        code: code,
      },
    });
  }

  me() {
    return request({
      url: '/fe/me',
      method: 'POST',
    });
  }

  logout() {
    return request({
      url: '/fe/logout',
      method: 'POST',
    });
  }

  updateProfile(data) {
    return request({
      url: '/fe/update-profile',
      method: 'POST',
      data,
    });
  }

  updateAddress(data) {
    return request({
      url: '/fe/update-address',
      method: 'POST',
      data,
    });
  }
}

export default new Auth();

import request from '../request';
import Resource from '../resource';

class Home extends Resource {
  constructor() {
    super('/');
  }

  getData() {
    return request({
      url: '/fe/home',
      method: 'GET',
    });
  }
}

export default new Home();

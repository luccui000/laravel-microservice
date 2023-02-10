import request from '@/utils/request';
import Resource from '../resource';

class Dashboard extends Resource {
  constructor() {
    super('/');
  }

  
}

export default new Dashboard();

import request from '@/utils/request';
import Resource from '../../resource';

class Post extends Resource {
  constructor() {
    super('/posts');
  }
}

export default new Post();

import Resource from '@/apis/resource';

class Category extends Resource {
  constructor() {
    super('/categories');
  }
}

export default new Category();

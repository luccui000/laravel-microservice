import Resource from '@/apis/resource';

class Category extends Resource {
  constructor(uri) {
    super(uri);
  }
}

export default new Category('/categories');

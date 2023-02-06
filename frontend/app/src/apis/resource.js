import request from '@/apis/request';

export default class Resource {
  constructor(uri) {
    this.uri = uri;
  }

  all(params = {}) {
    return request({
      url: this.uri,
      method: 'GET',
      data: params,
    });
  }

  get(id) {
    return request({
      url: `${this.uri}/${id}`,
      method: 'GET',
    });
  }

  store(resource) {
    return request({
      url: this.uri,
      method: 'POST',
      data: resource,
    });
  }

  update(resource, id) {
    return request({
      url: `${this.uri}/${id}`,
      method: 'PUT',
      data: resource,
    });
  }

  destroy(id) {
    return request({
      url: `${this.uri}/${id}`,
      method: 'DELETE',
    });
  }
}

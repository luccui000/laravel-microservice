import request from '../request';
import Resource from '../resource';

class Address extends Resource {
  constructor() {
    super('/fe/address');
  }

  provinces() {
    return request({
      url: '/fe/address/provinces',
      method: 'GET',
    });
  }

  districts(province) {
    return request({
      url: `/fe/address/districts?province_id=${province}`,
      method: 'GET',
    });
  }

  wards(district) {
    return request({
      url: `/fe/address/wards?district_id=${district}`,
      method: 'GET',
    });
  }

  getFee(data) {
    return request({
      url: '/fe/get-fee',
      method: 'POST',
      data,
    });
  }
}

export default new Address();

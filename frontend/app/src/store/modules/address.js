// import address from '@/apis/resources/address';

import address from '@/apis/resources/address';

const state = {
  provinces: [],
  districts: [],
  wards: [],
  filter: {
    province: null,
    district: null,
    ward: null,
  },
  fee: 0,
};
const getters = {};
const actions = {
  provinces({ commit }) {
    return new Promise((resolve, reject) => {
      address
        .provinces()
        .then((response) => {
          const { data } = response;
          commit('SET_PROVINCES', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(new Error(error)));
    });
  },
  districts({ commit, state }) {
    return new Promise((resolve, reject) => {
      address
        .districts(state.filter.province)
        .then((response) => {
          const { data } = response;
          commit('SET_DISTRICTS', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  wards({ commit, state }) {
    return new Promise((resolve, reject) => {
      address
        .wards(state.filter.district)
        .then((response) => {
          const { data } = response;
          commit('SET_WARDS', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  getFee({ commit, state }) {
    return new Promise((resolve, reject) => {
      address
        .getFee(state.filter)
        .then((response) => {
          const { data } = response;
          console.log(data.data);
          commit('SET_FEE', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_PROVINCES(state, provinces) {
    state.provinces = provinces;
  },
  SET_DISTRICTS(state, districts) {
    state.districts = districts;
  },
  SET_WARDS(state, wards) {
    state.wards = wards;
  },
  SET_PROVINCE(state, province) {
    state.filter.province = province;
  },
  SET_DISTRICT(state, district) {
    state.filter.district = district;
  },
  SET_WARD(state, ward) {
    state.filter.ward = ward;
  },
  SET_FILTER(state, filter) {
    state.filter = filter;
  },
  SET_FEE(state, fee) {
    state.fee = fee;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

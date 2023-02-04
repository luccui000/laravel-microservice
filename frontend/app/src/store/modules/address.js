// import address from '@/apis/resources/address';

import address from '@/apis/resources/address';

const state = {
  provinces: [],
  districts: [],
  wards: [],
};
const getters = {};
const actions = {
  provinces({ commit }) {
    return new Promise((resolve, reject) => {
      address
        .provinces()
        .then((response) => {
          const { data } = response;
          commit('SET_PROVINCE', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(new Error(error)));
    });
  },
  districts({ commit }, province) {
    return new Promise((resolve, reject) => {
      address
        .districts(province)
        .then((response) => {
          const { data } = response;
          commit('SET_DISTRICT', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  wards({ commit }, district) {
    return new Promise((resolve, reject) => {
      address
        .wards(district)
        .then((response) => {
          const { data } = response;
          commit('SET_WARD', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_PROVINCE(state, provinces) {
    state.provinces = provinces;
  },
  SET_DISTRICT(state, districts) {
    state.districts = districts;
  },
  SET_WARD(state, wards) {
    this.wards = wards;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

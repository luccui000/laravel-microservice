import brand from '@/apis/resources/v1/brand';

const state = {
  brands: [],
};
const getters = {};
const actions = {
  getAll({ commit }) {
    return new Promise((resolve, reject) => {
      brand
        .all()
        .then((response) => {
          const { data } = response;
          commit('SET_BRAND', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  delete(_, id) {
    return new Promise((resolve, reject) => {
      brand
        .destroy(id)
        .then((response) => {
          resolve(response.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_BRAND(state, brands) {
    state.brands = brands;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

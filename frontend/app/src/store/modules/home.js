import home from '@/apis/resources/home';

const state = {
  bestsellers: [],
  newests: [],
};
const getters = {};
const actions = {
  getData({ commit }) {
    return new Promise((resolve, reject) => {
      home
        .getData()
        .then((response) => {
          const { data } = response;
          commit('SET_BEST_SELLER', data.data.bestseller);
          commit('SET_NEWEST', data.data.newest);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_BEST_SELLER(state, data) {
    state.bestsellers = data;
  },
  SET_NEWEST(state, data) {
    state.newests = data;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

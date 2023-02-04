import header from '@/apis/resources/header';

const state = {
  products: [],
};
const getters = {};
const actions = {
  getProducts({ commit }) {
    return new Promise((resolve, reject) => {
      header
        .products()
        .then((response) => {
          const { data } = response;
          commit('SET_PRODUCTS', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_PRODUCTS(state, products) {
    state.products = products;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

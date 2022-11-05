import product from '@/apis/resources/product';

export default {
  namespaced: true,
  state: {
    products: null,
  },
  getters: {
    all(state) {
      return state.products;
    },
  },
  actions: {
    async getAll({ commit }) {
      const response = await product.all();
      return commit('SET_PRODUCT', response.data.data);
    },
  },
  mutations: {
    SET_PRODUCT(state, products) {
      state.products = products;
    },
  },
};

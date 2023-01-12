const state = {
  carts: [],
};
const getters = {
  carts(state) {
    return state.carts;
  },
};
const actions = {
  addToCart({ commit }, { product, quantity }) {
    console.log(product, quantity);
    commit('ADD_TO_CART');
  },
};
const mutations = {
  ADD_TO_CART(state) {
    console.log(state);
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

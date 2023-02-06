import order from '@/apis/resources/order';

const state = {
  userOrders: [],
};
const getters = {
  userOrders(state) {
    return state.userOrders;
  },
};
const actions = {
  getOrder({ commit }) {
    return new Promise((resolve, reject) => {
      order
        .getOrder()
        .then((response) => {
          const { data } = response;
          commit('SET_USER_ORDER', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(new Error(error)));
    });
  },

  addToCart(_, params) {
    return new Promise((resolve, reject) => {
      order
        .addToCart(params)
        .then((response) => {
          const { data } = response;
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_USER_ORDER(state, orders) {
    state.userOrders = orders;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

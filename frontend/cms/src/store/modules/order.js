import order from '@/apis/resources/v1/order';

const state = {
  orders: [],
};
const getters = {};
const actions = {
  getOrders({ commit }, status) {
    return new Promise((resolve, reject) => {
      order
        .getOrders(status)
        .then((response) => {
          const { data } = response;
          commit('SET_ORDERS', data.data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },

  confirmOrder(_, id) {
    return new Promise((resolve, reject) => {
      order
        .confirmOrder(id)
        .then((response) => {
          const { data } = response;
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },

  cancelOrder(_, id) {
    return new Promise((resolve, reject) => {
      order
        .cancelOrder(id)
        .then((response) => {
          const { data } = response;
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_ORDERS(state, orders) {
    state.orders = orders;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
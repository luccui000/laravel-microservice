import dashboard from '@/apis/resources/dashboard';

const state = {
  orders: {},
  success: {},
  failed: {},
};
const getters = {
  chartData(state) {
    const labels = Object.keys(state.orders);
    const valuesAll = Object.values(state.orders);
    const valuesSuccess = Object.values(state.success);
    const valuesFailed = Object.values(state.failed);

    return {
      labels: labels,
      datasets: [
        {
          label: 'Tổng số đơn hàng',
          backgroundColor: '#f87979',
          data: valuesAll,
        },
        {
          label: 'Đơn hàng đã hoàn thành',
          backgroundColor: '#61c5b2',
          data: valuesSuccess,
        },
        {
          label: 'Đơn hàng thất bại',
          backgroundColor: '#f62d51',
          data: valuesFailed,
        },
      ],
    };
  },
};
const actions = {
  getOrders({ commit }) {
    return new Promise((resolve, reject) => {
      dashboard
        .getOrders()
        .then((response) => {
          const { data } = response;
          commit('SET_ORDERS', data.data.all);
          commit('SET_ORDERS_SUCCESS', data.data.success);
          commit('SET_ORDERS_FAILED', data.data.failed);
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
  SET_ORDERS_SUCCESS(state, orders) {
    state.success = orders;
  },
  SET_ORDERS_FAILED(state, orders) {
    state.failed = orders;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

import order from '@/apis/resources/order';
import auth from '@/apis/resources/auth';
import router from '@/router';

const state = {
  userOrders: [],
  orders: [],
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
      auth
        .me()
        .then(() => {
          order
            .addToCart(params)
            .then((response) => {
              const { data } = response;
              resolve(data.data);
            })
            .catch((error) => reject(error));
        })
        .catch((error) => {
          const response = error.response;
          if (response.status == 401) {
            router.push('/login');
          }
        });
    });
  },
  getOrderTracking(_, phone) {
    return new Promise((resolve, reject) => {
      order
        .getOrderTracking(phone)
        .then((response) => {
          resolve(response);
        })
        .catch((error) => reject(error));
    });
  },

  verifyOrderTracking({ dispatch }, code) {
    return new Promise((resolve, reject) => {
      order
        .verifyOrderTracking(code)
        .then((response) => {
          if (response.data.success) {
            dispatch('getOrderByPhone', response.data.phone);
          } else {
            reject('Mã xác nhận không hợp lệ hoặc đã hết hạn');
          }
        })
        .catch((error) => reject(error));
    });
  },

  getOrderByPhone({ commit }, phone) {
    return new Promise((resolve, reject) => {
      order
        .getOrderByPhone(phone)
        .then((response) => {
          const { data } = response;
          commit('SET_MY_ORDERS', data.data);
          router.push('/tracking-order/list');
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_USER_ORDER(state, orders) {
    state.userOrders = orders;
  },
  SET_MY_ORDERS(state, orders) {
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

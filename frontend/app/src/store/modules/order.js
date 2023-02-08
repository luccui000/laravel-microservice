import order from '@/apis/resources/order';
import auth from '@/apis/resources/auth';
import router from '@/router';

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

import customer from '@/apis/resources/v1/customer';

const state = {
  customers: [],
};
const getters = {};
const actions = {
  getAll({ commit }) {
    return new Promise((resolve, reject) => {
      customer
        .all()
        .then((response) => {
          const { data } = response;
          commit('SET_CUSTOMERS', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_CUSTOMERS(state, customers) {
    state.customers = customers;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

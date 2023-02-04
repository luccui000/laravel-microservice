import supplier from '@/apis/resources/v1/supplier';

const state = {
  suppliers: [],
};

const getters = {};

const actions = {
  getAll({ commit }) {
    return new Promise((resolve, reject) => {
      supplier
        .all()
        .then((response) => {
          const { data } = response;
          commit('SET_SUPPLIER', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  delete(_, id) {
    return new Promise((resolve, reject) => {
      supplier
        .destroy(id)
        .then((response) => {
          resolve(response.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_SUPPLIER(state, suppliers) {
    state.suppliers = suppliers;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

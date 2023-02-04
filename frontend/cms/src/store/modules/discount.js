import discount from '@/apis/resources/v1/discount';

const state = {
  discounts: [],
};

const getters = {};

const actions = {
  getAll({ commit }) {
    return new Promise((resolve, reject) => {
      discount
        .all()
        .then((response) => {
          const { data } = response;
          if (data.success) {
            commit('SET_DISCOUNT', data.data);
            resolve(data.data);
          } else {
            reject(data.error);
          }
        })
        .catch((error) => reject(error));
    });
  },
  store(_, params)  {
    return new Promise((resolve, reject) => {
      discount
        .store(params)
        .then((response) => {
          const { data } = response;
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  update(_, { params, id }) {
    return new Promise((resolve, reject) => {
      discount
        .update(params, id)
        .then((response) => {
          const { data } = response;
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};

const mutations = {
  SET_DISCOUNT(state, discounts) {
    state.discounts = discounts;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

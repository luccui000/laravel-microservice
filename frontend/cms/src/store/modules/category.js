import category from '@/apis/resources/v1/category';

const state = {
  categories: [],
};
const getters = {};
const actions = {
  getAll({ commit }) {
    return new Promise((resolve, reject) => {
      category
        .all()
        .then((response) => {
          const { data } = response;
          commit('SET_CATEGORY', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
  delete(_, id) {
    return new Promise((resolve, reject) => {
      category
        .destroy(id)
        .then((response) => {
          resolve(response.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_CATEGORY(state, categories) {
    state.categories = categories;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};

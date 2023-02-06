import category from '@/apis/resources/category';

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
          commit('SET_CATEGORIES', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_CATEGORIES(state, categories) {
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

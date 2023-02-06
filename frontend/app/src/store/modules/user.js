import user from '@/apis/resources/auth';

const state = {
  user: null,
};
const getters = {
  user(state) {
    return state.user;
  },
};
const actions = {
  getInfo({ commit }) {
    return new Promise((resolve, reject) => {
      user
        .me()
        .then((response) => {
          const { data } = response;
          commit('SET_USER', data.data);
          resolve(data.data);
        })
        .catch((error) => reject(error));
    });
  },
};
const mutations = {
  SET_USER(state, user) {
    state.user = user;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
